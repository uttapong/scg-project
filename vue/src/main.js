/* ============
 * Main File
 * ============
 *
 * Will initialize the application.
 */

import Vue from "vue";

/* ============
 * Plugins
 * ============
 *
 * Import and bootstrap the plugins.
 */

import * as VueGoogleMaps from "vue2-google-maps";
import "./plugins/vuex";
import "./plugins/axios";
import { i18n } from "./plugins/vue-i18n";
import { router } from "./plugins/vue-router";
import "./plugins/vuex-router-sync";
import "./plugins/bootstrap";
import "./plugins/font-awesome";
import BootstrapVue from "bootstrap-vue";
import ref from "vue-ref";
import Antd from "ant-design-vue";

/* ============
 * Styling
 * ============
 *
 * Import the application styling.
 * Stylus is used for this boilerplate.
 *
 * If you don't want to use Stylus, that's fine!
 * Replace the stylus directory with the CSS preprocessor you want.
 * Import the entry point here & install the webpack loader.
 *
 * It's that easy...
 *
 * http://stylus-lang.com/
 */

/* ============
 * Main App
 * ============
 *
 * Last but not least, we import the main application.
 */

import App from "./App.vue";
import store from "./store";

Vue.config.productionTip = false;

Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyCQWpAtVowR7C1BRlml8_LeRMWSpKUZ1HQ",
    libraries: "places,drawing,visualization"
  }
});
// store.dispatch('auth/check');

Vue.use(BootstrapVue);
Vue.use(ref, { name: "ant-ref" });
Vue.use(Antd);
/* eslint-disable no-new */
new Vue({
  /**
   * Bind the Vue instance to the HTML.
   */
  el: "#app",

  /**
   * The localization plugin.
   */
  i18n,

  /**
   * The router.
   */
  router,

  /**
   * The Vuex store.
   */
  store,

  /**
   * Will render the application.
   *
   * @param {Function} h Will create an element.
   */
  render: h => h(App)
});
