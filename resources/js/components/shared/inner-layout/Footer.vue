<template>
  <footer class="app_footer">
    <!-- <ul class="fter_link">
      <li>
        <a href="JavaScript:void(0);" @click="openPrivacyPolicy">Privacy Policy</a>
      </li>
    </ul> -->
    <p>
      <a target="_blank" href="faq">FAQ</a> |
      <a target="_blank" href="privacy-policy">Privacy Policy</a> | © {{currentDate.getFullYear()}}
      {{ appName }}, All rights reserved
    </p>
  </footer>
</template>

<script>
import config from "../../../config";
export default {
  data() {
    return {
      appName: "",
      currentDate: new Date,
    };
  },
  created() {
    this.appName = config.APP_NAME;
  },
  methods: {
    openPrivacyPolicy() {
      window.open(config.BASE_URL + "privacy-policy", "_blank");
    },
  },
};
</script>

<style></style>
