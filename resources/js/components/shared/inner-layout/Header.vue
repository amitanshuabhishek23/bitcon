<template>
  <header class="app_header">
    <b-navbar toggleable="lg" type="dark">
      <b-navbar-brand href>
        <router-link to="/dashboard">
          <b-img
            :src="assetsURL + 'app/images/icons/logo_mob.png'"
            alt="Hubifyapps"
            class="mob_logo"
            fluid
          ></b-img>
          <b-img
            :src="assetsURL + 'app/images/icons/logo_mob.png'"
            alt="Hubifyapps"
            class="mob_logo_white"
            fluid
          ></b-img>
        </router-link>
        <h1 class="app_title">{{ selectActive }}</h1>
      </b-navbar-brand>
      <div class="app_nav_right">
        <b-nav class="mob_header">
          <b-nav-item class="slice-btn" v-b-toggle.sidebar-border>
            <i class="fa fa-bars" aria-hidden="true"></i>
          </b-nav-item>
          <b-link v-b-toggle href="#mobTopheader" @click.prevent>
            <i class="fa fa-ellipsis-v mob-ellips" aria-hidden="true"></i>
          </b-link>
        </b-nav>
        <b-collapse id="mobTopheader" class="top_header">
          <li class="dropdown_cst dropdown">
            <div class="username_circle">{{ initials(currentStore.store_name) }}</div>
            <span
              class="dropdown-toggle"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-expanded="false"
            >
              {{ currentStore.store_name }}</span
            >
            <ul
              id="profile_dropdown"
              class="dropdown-menu"
              aria-labelledby="dropdownMenuButton"
            >
              <li><router-link to="/profile">Profile</router-link></li>
              <li><router-link to="/faq">FAQs</router-link></li>
              <li>
                <b-link href="javascript:void(0)" @click.prevent="logoutApp"
                  >Logout</b-link
                >
              </li>
            </ul>
          </li>
        </b-collapse>
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
      currentStore: "",
    };
  },
  created() {
    this.assetsURL = config.ASSET_URL_PREFIX;
    this.selectActive = this.$route.meta.title;
    if (localStorage) {
      this.currentStore = JSON.parse(localStorage.getItem("pzs_current_Store"));
    }
  },
  watch: {
    $route(to, from) {
      this.selectActive = this.$route.meta.title;
    },
  },
  methods: {
    logoutApp() {
      this.$store
        .dispatch("logout")
        .then((res) => {
          console.log(res);
          if (res.status === true) {
            localStorage.removeItem("pzs_current_Store");
            localStorage.removeItem("pzs_access_token");
            this.$router.push("/login");
          }
        })
        .catch((e) => console.log(e));
    },
    initials(fullName) {
      try {
        let iniName = fullName.charAt(0);
        return iniName;
      } catch (e) {}
    },
  },
};
</script>
