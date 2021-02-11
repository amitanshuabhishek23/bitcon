<template>
  <div>
    <outer-headers />
    <outer-sidebar v-if="currentUrl != '/login'" />
    <slot />
    <outer-footer v-if="currentUrl != '/login'" />
  </div>
</template>

<script>
import HeaderComponent from "../shared/outer-layout/Header.vue";
import SidebarComponent from "../shared/outer-layout/Sidebar.vue";
import FooterComponent from "../shared/outer-layout/Footer.vue";

export default {
  components: {
    "outer-headers": HeaderComponent,
    "outer-sidebar": SidebarComponent,
    "outer-footer": FooterComponent,
  },
  data() {
    return { currentUrl: "" };
  },
  created: function () {
    this.currentUrl = window.location.pathname;
    console.log(this.currentUrl);
  },
  watch: {
    $route(to, from) {
      this.currentUrl = window.location.pathname;
    },
  },
};
</script>

<style></style>
