import Vue from "vue/dist/vue.esm.js";
import Index from "./Index.vue";
import CV from "./CV.vue";
import Polymial from "./Polymial.vue";
import Line from "./Line.vue";
import VueRouter from "vue-router";
import BootstrapVue from "bootstrap-vue";
import VueSidebarMenu from "vue-sidebar-menu";
import { dom } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import * as VueGoogleMaps from "vue2-google-maps";
import Antd from "ant-design-vue";
import "vue-sidebar-menu/dist/vue-sidebar-menu.css";
import ref from "vue-ref";

dom.watch();
Vue.config.productionTip = false;
Vue.component("font-awesome-icon", FontAwesomeIcon);
Vue.use(VueSidebarMenu);
Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(Antd);
Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyCQWpAtVowR7C1BRlml8_LeRMWSpKUZ1HQ",
    libraries: "places,drawing,visualization"
  }
});
Vue.use(ref, { name: "ant-ref" });

const router = new VueRouter({
  routes: [
    { path: "/", component: Index },
    { path: "/restaurant", component: Index },
    { path: "/polymial", component: Polymial },
    { path: "/cv", component: CV },
    { path: "/lineproject", component: Line }
  ]
});

new Vue({
  router
}).$mount("#app");
