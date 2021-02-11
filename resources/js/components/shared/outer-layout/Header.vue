<template>
  <header class="app_header">
    <b-navbar toggleable="lg" type="dark">
      <b-navbar-brand href>
        <router-link to="/dashboard">
          <b-img
            :src="assetsURL +'app/images/icons/logo-white.png'"
            alt="Hubifyapps"
           fluid class="login_header_dark"
          ></b-img>
          <b-img
            :src="assetsURL +'app/images/icons/logo.png'"
            alt="Hubifyapps"
           fluid class="login_header_light"
          ></b-img>
        </router-link>
        <h1 class="app_title">{{selectActive}}</h1>
      </b-navbar-brand>
      <div class="app_nav_right">
        <b-nav class="mob_header">
          <b-nav-item class="slice-btn" v-b-toggle.sidebar-border>
            <i class="fa fa-bars" aria-hidden="true"></i>
          </b-nav-item>
          <b-nav-item class="d-none" data-toggle="collapse" data-target="#mobTopheader">
            <i class="fa fa-ellipsis-v mob-ellips" aria-hidden="true"></i>
          </b-nav-item>
        </b-nav>
        <b-nav id="mobTopheader" class="top_header collapse d-none">
          <li>
            <router-link to="/faq" class="primary_btn faq_btn">FAQs</router-link>
          </li>
          <li>
            <select class="form-control cst_select select_mod" id="sel1">
              <option value>Select Language</option>
              <option value="af">Afrikaans</option>
              <option value="sq">Albanian</option>
              <option value="am">Amharic</option>
              <option value="ar">Arabic</option>
              <option value="hy">Armenian</option>
              <option value="az">Azerbaijani</option>
              <option value="eu">Basque</option>
              <option value="be">Belarusian</option>
              <option value="bn">Bengali</option>
              <option value="bs">Bosnian</option>
              <option value="bg">Bulgarian</option>
              <option value="ca">Catalan</option>
              <option value="ceb">Cebuano</option>
              <option value="ny">Chichewa</option>
            </select>
          </li>
          <li>
            <router-link to="/help-support" class="primary_btn help_btn">Help & Support</router-link>
          </li>
        </b-nav>
      </div>
    </b-navbar>
  </header>
</template>

<script>
import config from "../../../config";
export default {
  data() {
    return {
      assetsURL: "",
      selectActive: "",
    };
  },
  created() {
    this.assetsURL = config.ASSET_URL_PREFIX;
    this.selectActive = this.$route.meta.title;
  },
  watch: {
    $route(to, from) {
      this.selectActive = this.$route.meta.title;
    },
  },
};
</script>
