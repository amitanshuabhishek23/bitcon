<template>
  <aside class="app_sidebar">
    <b-sidebar id="sidebar-border" sidebar-class="hero_sidebar">
      <div class="sidebar_logo">
        <router-link to="/dashboard">
          <b-img
            class="light_themes_logo"
            :src="assetsURL + 'app/images/icons/logo.png'"
            alt="Hubifyapps"
            fluid
          ></b-img>
          <b-img
            class="dark_themes_logo"
            :src="assetsURL + 'app/images/icons/logo-white.png'"
            alt="Hubifyapps"
            fluid
          ></b-img>
        </router-link>
      </div>
      <b-nav vertical class="install_app">
        <div class="install_process"></div>
        <li :class="[currentPage.includes('welcome') ? activeClass : '']">
          <div class="install_circle">
            <span>1</span>
            <i class="fa fa-check" aria-hidden="true"></i>
          </div>
          <router-link to="/welcome">
            Welcome
            <!-- <span>What's Hubifyapps ?</span> -->
          </router-link>
        </li>
        <!-- <li>
          <div class="install_circle">
            <span>2</span>
            <i class="fa fa-check" aria-hidden="true"></i>
          </div>
          <router-link to="/subscription-plans">
            Subscription Plans
            <span></span>
          </router-link>
        </li>-->
    <!--     <li :class="[currentPage.includes('getready') ? activeClass : '']">
          <div class="install_circle">
            <span>2</span>
            <i class="fa fa-check" aria-hidden="true"></i>
          </div>
          <router-link to="/getready">
            Get Ready
            <span></span>
          </router-link>
        </li> -->
      </b-nav>
    </b-sidebar>
  </aside>
</template>
<script>
import config from "../../../config";
export default {
  data() {
    return {
      setupWidgetsList: [],
      assetsURL: "",
      activeClass: "current_install",
    };
  },
  created() {
    this.assetsURL = config.ASSET_URL_PREFIX;
    this.getSidebarList();
  },
  computed: {
    currentPage() {
      return this.$route.path;
    },
  },
  methods: {
    getSidebarList() {
      this.$store
        .dispatch("getWidgetsPageList")
        .then((res) => {
          console.log(res);
          if (res.status === true) {
            this.setupWidgetsList = res.data;
          }
        })
        .catch((e) => console.log(e));
    },
  },
};
</script>
<style></style>
