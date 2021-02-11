<template>
  <div>
    <main class="app-content">
      <title-mob />
      <section class="installapp_pages">
        <b-row>
          <b-col xl="12">
            <div class="install_content">
              <b-card no-body class="card__panel">
                <b-card-header class="card__header">
                  <h5 class="h5_title">Welcome</h5>
                </b-card-header>
                <b-card-body>
                  <p>
                    Congratulations! You have successfully created your account for
                   <b> {{ currentStore.store_url }}</b> store.
                  </p>
                  <p>
                    Using {{ appName }} App features, you can easily allow your customer to zoom in and zoom out product images on all devices (desktop, mobile & iPad)
                  </p>
                  <p>
                    Click on the Start Now to access the dashboard.

                  </p>
                  <div class="start_now btn_align_loader">
                    <button
                      v-if="!isLoader"
                      class="primary_btn"
                      @click="nextStep"
                      type="button"
                    >
                      start now
                    </button>
                    <button v-if="isLoader" disabled class="primary_btn">
                      <div class="d-flex justify-content-center">
                        <b-spinner label="Loading..."></b-spinner>
                      </div>
                    </button>
                  </div>
                </b-card-body>
              </b-card>
            </div>
          </b-col>
        </b-row>
      </section>
    </main>
  </div>
</template>
<script>
import config from '../../../config';
import TitleMob from "../common/DynamicTitle.vue";
export default {
  components: {
    "title-mob": TitleMob,
  },
  data() {
    return {
      currentStore: "",
      isLoader: false,
      appName: "",
    };
  },
  created() {
    this.appName = config.APP_NAME;
  },
  mounted() {
    document.body.classList.add("install_body");
    if (localStorage) {
      this.currentStore = JSON.parse(localStorage.getItem("pzs_current_Store"));
      console.log(this.currentStore);
      if (this.currentStore.current_step == 1) {
        // this.$router.push("/welcome");
      } /*else if (this.currentStore.current_step == 2) {
        this.$router.push("/import");
      }*/ else if (this.currentStore.current_step == 2) {
        this.$router.push("/dashboard");
      } else if (this.currentStore.current_step == 3) {
        this.$router.push("/dashboard");
      }
    }
  },
  methods: {
    nextStep() {
      this.isLoader = true;
      let item = {
        store_id: +this.currentStore.store_id,
        next_step: 2,
      };
      this.$store
        .dispatch("updateStep", item)
        .then((res) => {
          this.isLoader = false;
          if (res.status === true) {
            localStorage.setItem("pzs_current_Store", JSON.stringify(res.data));
            this.$router.push("/dashboard");
          }
        })
        .catch((e) => {
          this.isLoader = false;
          console.log(e);
        });
    },
  },
};
</script>

s
