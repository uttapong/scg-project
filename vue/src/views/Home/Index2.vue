<template>
  <v-layout>
    <v-card contextual-style="warning">
      <span slot="header">
        Restaurant Search
      </span>
      <div slot="body">
        <div class="row">
          <div class="col-md-12 pb-3">
            <form
              class="card p-2"
              @submit.prevent="searchPlace(searchdata)"
            >
              <div class="input-group">
                <input
                  v-model="searchdata.keyword"
                  type="text"
                  class="form-control"
                  placeholder="Keyword of restaurant...">
                <div class="input-group-append">
                  <button
                    type="submit"
                    class="btn btn-secondary">Search</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-12 pb-3">
            <div class="row">
              <div class="col-md-4 pb-3">
                <div class="card">
                  <div class="card-header">
                    Search Result <b>{{ places.length }}</b> Items
                  </div>
                  <div
                    v-if="loading"
                    class="list-place">
                    <div class="card-body">
                      <div class="spinner-grow text-danger" />
                      <div class="spinner-grow text-warning" />
                      <div class="spinner-grow text-success" />
                    </div>
                  </div>
                  <ul
                    v-else
                    class="list-place list-group list-group-flush"
                  >
                    <section v-if="places.length === 0">
                      <div class="card-body">
                        <b> Hi. Foodie </b>
                      </div>
                    </section>
                    <section v-else>
                      <li
                        v-for="loc in places"
                        :key="loc.place_id"
                        :class="[activeIndex === loc.place_id ? ' active':'']"
                        class="list-group-item"
                        style="cursor: pointer;"
                        @click="toggleInfoWindow(loc)">
                        <div class="row">
                          <div class="col-md-3 col-4">
                            <img
                              :src="loc.icon"
                              class="img-fluid rounded-circle pt-2">
                          </div>
                          <div class="col-md-9 col-8">
                            <p><b>{{ loc.name }}</b></p>
                            <span class="text-muted">Rating {{ loc.rating }}</span>
                          </div>
                        </div>
                      </li>
                    </section>
                  </ul>
                </div>
              </div>
              <div class="col-md-8">
                <GmapMap
                  ref="mapRef"
                  :center="{lat:10, lng:10}"
                  :zoom="12"
                  :options="{
                    zoomControl: true,
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    rotateControl: false,
                    fullscreenControl: true,
                    disableDefaultUi: false
                  }"
                  style="width: 100%; height: 500px"
                  map-type-id="roadmap"
                >
                  <GmapMarker
                    v-for="loc in places"
                    :key="loc.place_id"
                    :position="{lat: loc.geometry.location.lat, lng: loc.geometry.location.lng}"
                    :clickable="true"
                    :draggable="false"
                    @click="toggleInfoWindow(loc)"
                  />
                  <GmapInfoWindow
                    :options="infoOptions"
                    :position="infoWindowPos"
                    :opened="infoWinOpen"
                    @closeclick="infoWinOpen=false"
                  >
                    <div v-html="infoContent" />
                  </GmapInfoWindow>
                </GmapMap>
              </div>
            </div>
          </div>
        </div>
      </div>
    </v-card>
    <div v-if="showModal">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div
              class="modal-dialog"
              role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Warning</h5>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span
                      aria-hidden="true"
                      @click="showModal = false">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>{{ warningMsg }}</p>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    @click="showModal = false">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>

  </v-layout>
</template>
<style scoped>
.list-group-item.active {
  background-color:orange;
  border-color: orange;

}
.list-place {
  min-height: 450px;
  max-height: 450px;
  overflow-y:auto;
}
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
</style>

<script>
import VLayout from '@/layouts/Default.vue';
import VCard from '@/components/Card.vue';
import axios from 'axios';

export default {
  /**
   * The name of the page.
   */
  name: 'HomeIndex',

  /**
   * The components that the page can use.
   */
  components: {
    VLayout,
    VCard,
  },

  /**
   * The data that can be used by the page.
   *
   * @returns {Object} The view-model data.
   */
  data() {
    return {
      activeIndex: '',
      mylocation: {
        lat: null,
        lng: null,
      },
      searchdata: {
        keyword: null,
        latLng: null,
      },
      places: [],
      loading: false,
      showModal: false,
      warningMsg: 'Please check input',
      infoContent: '',
      infoWindowPos: {
        lat: 0,
        lng: 0,
      },
      infoOptions: {
        pixelOffset: {
          width: 0,
          height: -35,
        },
      },
      infoWinOpen: false,
      currentPlaceId: null,
    };
  },


  mounted() {
    this.geolocation();
  },
  /**
   * The methods the page can use.
   */
  methods: {
    /**
     * Will Search Restaurant Place.
     *
     * @param {Object} searchdata input field.
     */
    searchPlace(searchdata) {
      if (searchdata.keyword === null) {
        this.showModal = true;
        this.warningMsg = 'Please typing keyword to search.';
        return;
      }
      if (this.mylocation.lat === null || this.mylocation.lng === null) {
        this.warningMsg = 'Please allow access your location';
        return;
      }
      this.searchdata.latLng = `${this.mylocation.lat},${this.mylocation.lng}`;
      const url = `http://localhost:8080/api/restaurant_list/${searchdata.keyword}/${this.searchdata.latLng}/`;
      this.loading = true;
      axios
        .get(url)
        .then((response) => {
          this.places = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          this.loading = false;
        });
    },
    setMyLocation(position) {
      this.mylocation.lat = position.coords.latitude;
      this.mylocation.lng = position.coords.longitude;
      this.$refs.mapRef.$mapPromise.then((map) => {
        map.panTo({ lat: this.mylocation.lat, lng: this.mylocation.lng });
      });
    },
    geolocation() {
      navigator.geolocation.getCurrentPosition(this.setMyLocation, this.locationError);
    },
    locationError(err) {
      console.warn(`ERROR(${err.code}): ${err.message}`);
    },
    toggleInfoWindow(loc) {
      this.activeIndex = loc.place_id;
      console.log(this.activeIndex);
      this.$refs.mapRef.$mapPromise.then((map) => {
        map.setZoom(14);
      });
      this.infoWindowPos = loc.geometry.location;
      this.infoContent = this.getInfoWindowContent(loc);

      // check if its the same marker that was selected if yes toggle
      if (this.currentPlaceId === loc.place_id) {
        this.infoWinOpen = !this.infoWinOpen;
      } else {
        this.infoWinOpen = true;
        this.currentPlaceId = loc.place_id;
      }
    },
    getInfoWindowContent(marker) {
      return (`<div class="card">
                  <div class="card-header">
                    ${marker.name}
                  </div>
                  <div class="card-body">
                    <div class="content">
                      ${marker.formatted_address}
                    </div>
                  </div>
                </div>`);
    },

  },
};
</script>
