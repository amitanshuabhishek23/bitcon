<template>
  <div class="title_mod">
        <h1 class="app_title">{{selectActive}}</h1>
  </div>
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
