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
                  <h5 class="h5_title">Get Ready</h5>
                </b-card-header>
                <b-card-body>
                  <p>Congratulations! Let's Start</p>
                  <p>
                    You can access this App from now but keep patience as it may take some
                    time to import data from your store.
                  </p>
                  <p>We will notify you once the data importing is completed.</p>
                  <div class="start_now btn_align_loader">
                    <button
                      v-if="!isLoader"
                      class="primary_btn"
                      @click="nextStep"
                      type="button"
                    >
                      Get Ready
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
import TitleMob from "../common/DynamicTitle.vue";
export default {
  components: {
    "title-mob": TitleMob,
  },
  data() {
    return {
      currentStore: "",
      isLoader: false,
    };
  },
  mounted() {
    document.body.classList.add("install_body");
    if (localStorage) {
      this.currentStore = JSON.parse(localStorage.getItem("pzs_current_Store"));
      if (this.currentStore.current_step === 1) {
        this.$router.push("/welcome");
      }/* else if (this.currentStore.current_step === 2) {
        this.$router.push("/import");
      }*/ else if (this.currentStore.current_step === 2) {
        // this.$router.push("/getready");
      } else if (this.currentStore.current_step === 3) {
        this.$router.push("/dashboard");
      }
    }
  },
  methods: {
    nextStep() {
      this.isLoader = true;
      let item = {
        store_id: +this.currentStore.store_id,
        next_step: 4,
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
