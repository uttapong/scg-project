<template>
  <b-container fluid>
    <b-row>
      <Sidebar/>
      <div class="scg-map">
        <b-row>
          <b-col col lg="12" cols="12">
            <b-row class="justify-content-md-center">
              <b-col col lg="12" cols="12">
                <div class="search-header">
                  <gmap-autocomplete @place_changed="setPlace" class="search-input"></gmap-autocomplete>
                  <a-icon v-show="loading" type="sync" spin class="loading"/>
                  <div class="slider">
                    <a-slider
                      :marks="radiusRange"
                      :step="500"
                      :defaultValue="1000"
                      :tooltipVisible="true"
                      @afterChange="changeRangeSlicer"
                      :max="5000"
                      :min="1000"
                    />
                  </div>
                </div>
                <GmapMap
                  :center="center"
                  :zoom="zoom"
                  map-type-id="terrain"
                  style="width: 100%; height: 100vh"
                  :options="{
                    zoomControl: true,
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    rotateControl: false,
                    fullscreenControl: false,
                    disableDefaultUi: true
                  }"
                >
                  <GmapMarker
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.position"
                    :clickable="true"
                    :draggable="false"
                    :animation="4"
                  />
                  <GmapCircle
                    v-for="(pin) in centerMarkers"
                    :key="pin.Id"
                    :center="centerCircle"
                    :radius="radius"
                    :visible="true"
                    :options="{fillColor:'#5f3996',fillOpacity:0.2,strokeColor: '#5f3996',
            strokeOpacity: 1,
            strokeWeight: 3}"
                  ></GmapCircle>
                  <Circle :radius="radius" :center="center"/>
                </GmapMap>
                <div v-if="markers.length>0" class="search-result-scroll" ref="scrollable">
                  <div
                    class="restaurant"
                    v-for="(restaurant,index) in markers"
                    :key="restaurant.id"
                    @click="focusRestaurant(restaurant)"
                    :id="'restaurant'+index"
                  >
                    <div class="res-content">
                      <h4>{{restaurant.name}}</h4>
                      <p>
                        <a-rate :defaultValue="restaurant.rating" allowHalf disabled/>
                      </p>
                      <div v-if="markers.length===1">
                        <p>{{restaurant.address}}</p>
                        <p>
                          <b-button size="sm" v-on:click="backToSearch">Back to Search Result</b-button>
                        </p>
                      </div>
                    </div>
                    <div class="res-photo">
                      <img
                        :src="restaurant.photo"
                        alt="Image not found"
                        onerror="this.src='noimage.png';"
                      >
                    </div>
                  </div>
                  <template v-if="markers.length>1 && this.nextPageToken!=''">
                    <button
                      class="btn next-page btn-secondary"
                      v-on:click="searchRestaurant('next')"
                    >Next Page</button>
                  </template>
                </div>
              </b-col>
            </b-row>
          </b-col>
        </b-row>
      </div>
    </b-row>
  </b-container>
</template>
<script>
import axios from "axios";
import { setupCache } from "axios-cache-adapter";
import "./assets/restaurant.css";
import "./assets/global.css";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import "ant-design-vue/dist/antd.css";
import Sidebar from "./components/Sidebar";
const cache = setupCache({
  maxAge: 15 * 60 * 1000
});

const api = axios.create({
  adapter: cache.adapter
});

export default {
  components: {
    Sidebar
  },
  data: function() {
    return {
      searchResult: [],
      loading: false,
      markers: [],
      selectedMarker: [],
      location: null,
      center: { lat: 13.8234866, lng: 100.5081204 }, //default at Bangsue,Bangkok
      centerCircle: { lat: 13.8234866, lng: 100.5091204 }, //pan area to the left
      zoom: 12,
      radius: 1000,
      centerMarkers: [
        {
          Id: 99,
          name: "Bangsue",
          position: { lat: 13.7234866, lng: 100.5081204 }
        }
      ],
      radiusRange: {
        1000: "1 Km",
        2000: "2 Km",
        3000: "3 Km",
        4000: "4 Km",
        5000: "5 Km"
      },
      restaurantSelected: false,
      nextPageToken: ""
    };
  },
  methods: {
    /*  Set place on search */
    setPlace(place) {
      console.log(place);
      this.location = place.id ? place : null;
    },
    /*  Set radius on range slider change */
    changeRangeSlicer(value) {
      this.radius = value;
    },
    /*  Redraw google viewport and zoom level base on distance */
    setZoomLevel(newRadius) {
      if (newRadius >= 5000) {
        this.zoom = 13;
      } else if (newRadius >= 4000) {
        this.zoom = 13;
      } else if (newRadius >= 3000) {
        this.zoom = 14;
      } else if (newRadius >= 2000) {
        this.zoom = 14;
      } else {
        this.zoom = 15;
      }
    },
    /*  focus restaurant on selected then change markers and zoom level */
    focusRestaurant(restaurant) {
      this.markers = [restaurant];
      this.restaurantSelected = true;
      this.zoom = 18;
      this.center = {
        lat: restaurant.position.lat,
        lng: restaurant.position.lng + 0.001
      };
    },
    /*  Go back to search result, reset zoom level */
    backToSearch() {
      this.restaurantSelected = false;
      this.searchRestaurant("first");
      this.setZoomLevel(this.radius);
    },
    /*  Call backend api: search for restaurant base on lat,lng and adjustable radius 
    Would retrieve data from cache if has been stored */
    searchRestaurant(page) {
      //skip if no location specified
      if (this.location == null) return;
      this.loading = true;

      let apiUrl = `http://localhost/scg/search/${this.location.geometry.location
        .lat()
        .toString()
        .replace(".", ",")}/${this.location.geometry.location
        .lng()
        .toString()
        .replace(".", ",")}/${this.radius}`;

      let params = {};
      /* add pageToken string parameter 
        and token segment to store on backend cache*/
      if (page == "next") {
        params["next_page_token"] = this.nextPageToken;
        apiUrl = apiUrl + "/" + this.nextPageToken.substring(0, 20);
      }
      api
        .get(apiUrl, {
          params: params
        })
        .then(async response => {
          this.result = response.data;
          this.nextPageToken = response.data.next_page_token
            ? response.data.next_page_token
            : "";
          /*  Delay setting data during wait for google animation to complete */
          setTimeout(() => {
            const result = response.data.results.map(value => {
              return {
                id: value.id,
                position: {
                  lng: value.geometry.location.lng,
                  lat: value.geometry.location.lat
                },
                icon: value.icon,
                name: value.name,
                rating: value.rating,
                photo:
                  value.photos && value.photos[0]
                    ? "https://maps.googleapis.com/maps/api/place/photo?key=AIzaSyCQWpAtVowR7C1BRlml8_LeRMWSpKUZ1HQ&maxwidth=300&maxheight=200&photoreference=" +
                      value.photos[0].photo_reference
                    : "noimage.png",
                address: value.vicinity
              };
            });
            this.markers = result;
            this.setZoomLevel(this.radius);
            /* Scroll to top on next page clicked */
            if (page == "next") this.$refs.scrollable.scrollTo(0, 0);

            /*  shift center to the left to display restaruant ui blocks */
            this.center = {
              lat: this.location.geometry.location.lat(),
              lng: this.location.geometry.location.lng() + 0.01
            };
            this.centerCircle = {
              lat: this.location.geometry.location.lat(),
              lng: this.location.geometry.location.lng()
            };
          }, 500);
        })
        .then(() => {
          this.loading = false;
        });
    }
  },
  /*  Recalculate data on attributes changed */
  watch: {
    location: function() {
      this.searchRestaurant("first");
    },
    radius: function(newRadius) {
      this.searchRestaurant("first");
      this.setZoomLevel(newRadius);
    }
  }
};
</script>
