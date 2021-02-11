<template>
  <div>
    <inner-headers />
    <inner-sidebars />
    <slot />
    <inner-footers />
  </div>
</template>

<script>
import HeaderComponent from "../shared/inner-layout/Header.vue";
import SidebarComponent from "../shared/inner-layout/Sidebar.vue";
import FooterComponent from "../shared/inner-layout/Footer.vue";

export default {
  components: {
    "inner-headers": HeaderComponent,
    "inner-sidebars": SidebarComponent,
    "inner-footers": FooterComponent,
  },
};
</script>

<style></style>
