<template>
  <div class="sidebar">
    <ul>
      <router-link to="/restaurant">
        <li>
          <font-awesome-icon icon="map-marker-alt"/>
        </li>
      </router-link>
      <router-link to="/polymial">
        <li>
          <font-awesome-icon icon="calculator"/>
        </li>
      </router-link>
      <router-link to="/cv">
        <li>
          <font-awesome-icon icon="id-badge"/>
        </li>
      </router-link>
      <router-link to="/lineproject">
        <li>
          <font-awesome-icon :icon="['fab', 'line']"/>
        </li>
      </router-link>
    </ul>
  </div>
</template>

<script>
import { dom, library } from "@fortawesome/fontawesome-svg-core";
import {
  faCalculator,
  faMapMarkerAlt,
  faIdBadge
} from "@fortawesome/free-solid-svg-icons";
import { faLine } from "@fortawesome/free-brands-svg-icons";
import "vue-sidebar-menu/dist/vue-sidebar-menu.css";

dom.watch();

library.add(faCalculator, faMapMarkerAlt, faIdBadge, faLine);
export default {
  name: "HelloWorld",
  props: {
    msg: String
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
a {
  color: rgba(255, 255, 255, 0.6);
}
a:hover {
  color: #fff;
}
.sidebar {
  width: 80px;
  padding: 0 0px;
  display: inline-block;
  background: #000;
  min-height: 100vh;
  background: rgba(73, 68, 170, 1);
  background: -moz-linear-gradient(
    top,
    rgba(73, 68, 170, 1) 0%,
    rgba(143, 49, 137, 1) 100%
  );
  background: -webkit-gradient(
    left top,
    left bottom,
    color-stop(0%, rgba(73, 68, 170, 1)),
    color-stop(100%, rgba(143, 49, 137, 1))
  );
  background: -webkit-linear-gradient(
    top,
    rgba(73, 68, 170, 1) 0%,
    rgba(143, 49, 137, 1) 100%
  );
  background: -o-linear-gradient(
    top,
    rgba(73, 68, 170, 1) 0%,
    rgba(143, 49, 137, 1) 100%
  );
  background: -ms-linear-gradient(
    top,
    rgba(73, 68, 170, 1) 0%,
    rgba(143, 49, 137, 1) 100%
  );
  background: linear-gradient(
    to bottom,
    rgba(73, 68, 170, 1) 0%,
    rgba(143, 49, 137, 1) 100%
  );
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4944aa', endColorstr='#8f3189', GradientType=0 );
}
ul {
  list-style-type: none;
  display: block;
  width: 80px;
  padding: 0px;
  text-align: center;
}
.sidebar li {
  display: block;
  width: 100%;
  color: #ddd;
  margin: 5px 0px;
  font-size: 1.6rem;
  padding: 20px 0px;
}
.sidebar li:hover {
  background-color: rgba(255, 255, 255, 0.2);
  cursor: pointer;
  opacity: 1;
  -webkit-transition: opacity 1s ease-in;
  -moz-transition: opacity 1s ease-in;
  -o-transition: opacity 1s ease-in;
  -ms-transition: opacity 1s ease-in;
  transition: opacity 1s ease-in;
}
</style>
