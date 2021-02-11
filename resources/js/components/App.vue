<template>
  <div>
    <component :is="layout">
      <router-view />
    </component>
    <!-- <footers v-if="currentUrl != '/login' && currentUrl != '/autologin'" /> -->
  </div>
</template>

<script>
import InnerLayoutComponent from "./shared/InnerLayout.vue";
// import OuterLayoutComponent from "./shared/OuterLayout.vue";
// import Footer from "./shared/inner-layout/Footer.vue";
const default_layout = "default";
export default {
  components: {
    layout: InnerLayoutComponent,
    // outer: OuterLayoutComponent,
    // footers: Footer,
  },
  data() {
    return { currentUrl: "", currentStore: "" };
  },
  created: function () {
    this.currentUrl = window.location.pathname;
  },
  mounted() {
    if (localStorage) {
      this.currentStore = JSON.parse(localStorage.getItem("pzs_current_Store"));
      if (this.currentStore) {
        try {
          document.body.classList.remove("light-themes");
          document.body.classList.remove("dark-themes");
          document.body.classList.add(this.currentStore.app_theme + "-themes");
        } catch (e) {}
      } else {
        document.body.classList.remove("light-themes");
        document.body.classList.remove("dark-themes");
        document.body.classList.add("light-themes");
      }
    }
  },
  computed: {
    layout() {
      return (this.$route.meta.layout || default_layout) + "-layout";
    },
  },
  watch: {
    $route(to, from) {
      this.currentUrl = window.location.pathname;
    },
  },
};
</script>

<style></style>
