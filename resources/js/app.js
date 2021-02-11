/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
// window.Vue = require('vue');
import App from './components/App.vue'
import router from './routers/router';
import store from './store/index';
import './http-common';
import config from './config';
config.ASSET_URL_PREFIX = $('input[name=BS_URL_ASSET]').val();
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Inner from "./components/shared/InnerLayout.vue";
import Outer from "./components/shared/OuterLayout.vue";
import NoLayout from "./components/shared/NoLayout.vue";

Vue.component("inner-layout", Inner);
Vue.component("outer-layout", Outer);
Vue.component("no-sidebar-layout", NoLayout);

import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'
// register globally
Vue.component('multiselect', Multiselect)

import VueMatchHeights from 'vue-match-heights';
Vue.use(VueMatchHeights, {
  disabled: [768], // Optional: default viewports widths to disabled resizing on. Can be overridden per usage
});

import InfiniteLoading from 'vue-infinite-loading';
Vue.use(InfiniteLoading, { /* options */ });

import VueToastr from "vue-toastr";
Vue.use(VueToastr, {
    defaultTimeout: 3000,
    defaultProgressBar: false,
    defaultProgressBarValue: 0,
    defaultType: "success",
});

import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);

import 'viewerjs/dist/viewer.css'
import Viewer from 'v-viewer'
Vue.use(Viewer)

const app = new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
});
