<template>
  <div>
    <section class="login_page">
      <b-container>
        <b-row>
          <b-col xl="6" offset-xl="3">
            <div class="login_block">
              <b-card class="card__panel">
                <h3 class="h3_title">{{ appName }}</h3>
                <p>
                  Insert your domain below to Add and Install the Pinch & Zoom App to your
                  Shopify store.<br />
                  Start now and utilise all amazing features to attract your customers.
                </p>
                <form method="GET" :action="baseURL + 'install'" @submit="checkForm">
                  <div class="form-group text-left">
                    <label>Store Domain</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Please Enter Your URL"
                      name="shop"
                      v-model="shop"
                    />
                    <p class="error_login" v-if="errors.length">
    <!-- <b>Please correct the following error(s):</b> -->
    <ul>
      <li v-for="(error,i) in errors" :key="i">{{ error }}</li>
    </ul>
  </p>
                  </div>
                  <div class="login__btn">
                    <button type="submit" class="primary_btn">Login</button>
                  </div>
                </form>
              </b-card>
              <div class="pawered_by text-center">
                <p>
                  Powered by <b-link href="https://hubifyapps.com/">Hubify apps</b-link>
                </p>
              </div>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>
    <footer class="app_footer login_footer">
      <!-- <ul class="fter_link">
      <li>
        <a href="JavaScript:void(0);" @click="openPrivacyPolicy">Privacy Policy</a>
      </li>
    </ul> -->
      <p>
        <a href="JavaScript:void(0);" @click="openPrivacyPolicy">Privacy Policy</a> | ©
        {{ currentDate.getFullYear() }} {{ appName }}, All rights reserved
      </p>
    </footer>
  </div>
</template>

<script>
import config from "../../../config";
import FooterComponent from "../../shared/outer-layout/Footer.vue";
export default {
  components: {
    "outer-footers": FooterComponent,
  },
  data() {
    return {
      baseURL: "",
      shop: "",
      appName: "",
      currentDate: new Date(),
      errors: []
    };
  },
  mounted() {
    document.body.classList.remove("install_body");
    document.body.classList.add("login-body");
  },
  created() {
    this.baseURL = config.API_AUTH_URL;
    this.appName = config.APP_NAME;
  },
  methods: {
    checkForm(e) {
      console.log(e);
      if (this.shop) return true;
      this.errors = [];
      if (!this.shop) this.errors.push("Store Domain required.");
      e.preventDefault();
    },
     openPrivacyPolicy() {
      window.open(config.BASE_URL + "privacy-policy", "_blank");
    },
  },
};
</script>
