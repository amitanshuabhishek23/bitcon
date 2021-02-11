<template>
  <main class="app-content">
    <title-mob />
    <section class="integration_themes">
      <b-tabs class="setup__tabs">
        <b-tab title="App Setup" active>
          <b-row v-if="!isLoaderScreen">
            <b-col lg="12"></b-col>
            <b-col lg="6">
              <div class="themes_mod">
                <b-card no-body class="card__panel">
                  <b-card-header>
                    <h5 class="h5_title">Step-1</h5>
                  </b-card-header>
                  <b-card-body>
                    <b-card-text>
                      Select your theme and click on "Publish Integration" to integrate
                      with the application code.
                    </b-card-text>
                    <div class="select_themes select2_mod">
                      <label class="label_mod">Select your theme</label>
                      <!-- <select v-model="theme_id" class="form-control select_mod cst_input">
                    <option v-for="(item,i) of themeDetail" :value="item.id" :key="i">{{item.name}}</option>
                  </select>-->
                      <multiselect
                        class
                        track-by="name"
                        label="name"
                        v-model="theme_id"
                        :options="themeDetail"
                        :searchable="false"
                      ></multiselect>
                      <div class="publish_btn btn_align_loader">
                        <button v-if="!isLoader" @click="updateTheme" class="primary_btn">
                          Publish Integration
                        </button>
                        <button v-if="isLoader" disabled class="primary_btn">
                          <div class="d-flex justify-content-center">
                            <b-spinner label="Loading..."></b-spinner>
                          </div>
                        </button>
                      </div>
                    </div>
                  </b-card-body>
                </b-card>
              </div>
            </b-col>
            <b-col lg="6">
              <div class="themes_mod">
                <b-card no-body class="card__panel">
                  <b-card-header>
                    <h5 class="h5_title">Step-2</h5>
                  </b-card-header>
                  <b-card-body>
                    <b-card-text>
                      Keep the below setting "Yes" if you want to activate the Pinch &
                      Zoom feature on your selected theme.
                    </b-card-text>
                    <div class="select_themes">
                      <label>Activate Pinch & Zoom feature on the storefront.</label>
                      <div class="toggle_switch">
                        <div class="cst_switch_btn">
                          <span class="inte_label">No</span>
                          <input
                            type="checkbox"
                            v-model="status_front"
                            hidden="hidden"
                            id="sameCollection"
                            @change="updateThemeFonts"
                          />
                          <label for="sameCollection" class="switch"></label>
                          <span class="inte_label">Yes</span>
                        </div>
                      </div>
                    </div>
                  </b-card-body>
                </b-card>
              </div>
            </b-col>
            <b-col lg="12">
              <div class="theme_note">
                <b-card no-body class="card__panel">
                  <b-card-header>
                    <h5 class="h5_title">Important Note:</h5>
                  </b-card-header>
                  <b-card-body>
                    <b-card-text>
                      Important Note: The Pinch & Zoom feature on the storefront will work
                      with your integrated theme only. You need to set Pinch & Zoom
                      feature "Yes" and check it with the respective product images on
                      that theme. If you need any help, please contact us at
                      <b-link>support@hubifyapps.com</b-link>
                    </b-card-text>
                  </b-card-body>
                </b-card>
              </div>
            </b-col>
          </b-row>
          <div v-if="isLoaderScreen" class="pre_loader">
            <div class="spinner-border spinner-border-sm btn-spinner">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </b-tab>
        <b-tab title="Clean App Code">
          <b-row>
            <b-col lg="12">
              <!-- <div class="theme_note"> -->
              <b-card no-body class="card__panel">
                 <b-card-header>
                 <h5 class="h5_title">Please click on the "Clean Code" to remove our app code from your theme</h5> 
                </b-card-header>
                <b-card-body>
                  <b-card-text>
                    <button
                      type="button"
                      @click.prevent="$bvModal.show('confirm')"
                      class="primary_btn"
                    >
                      Clean Code
                    </button>
                  </b-card-text>
                  <p class="card-text">
                    Important Note: If you face any issue in accessing theme functions after installing our App. In this case, just click on "Clean Code" button to remove our App code from your theme. If you need any help, please contact us at
                    <a href="#" target="_self" class="">support@hubifyapps.com</a></p>
                </b-card-body>
              </b-card>
              <!-- </div> -->
            </b-col>
          </b-row>
        </b-tab>
      </b-tabs>
    </section>
    <b-modal id="confirm" title="Theme Code Clean">
      <div class="mnul_body">
        <div class="mnul_item">Are you sure to theme code clean?</div>
      </div>
      <div class="modal_ftr">
        <div class="modal_ftr_block">
          <ul class="modal_ftr_btn">
            <li>
              <button class="btn_default_cst" @click="$bvModal.hide('confirm')">
                Cancel
              </button>
            </li>
            <li>
              <button
                v-if="!isLoader"
                @click.prevent="appCodeCleanUp"
                class="primary_btn"
              >
                Clean
              </button>
              <button v-if="isLoader" class="primary_btn loader-btn" disabled>
                <div class="spinner-border spinner-border-sm btn-spinner" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </b-modal>
  </main>
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
      themeDetail: [],
      theme_id: "",
      status_front: "",
      isLoaderScreen: false,
      isLoader: false,
      selectedId: "",
    };
  },
  created() {
    if (localStorage) {
      this.currentStore = JSON.parse(localStorage.getItem("pzs_current_Store"));
    }
    this.getPublishTheme();
    this.getAppPublishTheme();
  },
  methods: {
    getPublishTheme() {
      this.$store
        .dispatch("getPublishTheme", +this.currentStore.store_id)
        .then((res) => {
          if (res.status === true) {
            this.selectedId = res.data.theme_id;
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
    getAppPublishTheme() {
      this.isLoaderScreen = true;
      this.$store
        .dispatch("getAppPublishTheme", +this.currentStore.store_id)
        .then((res) => {
          this.isLoaderScreen = false;
          if (res.status === true) {
            this.themeDetail = res.data;
            this.status_front = +res.status_front;
            for (let i = 0; i < this.themeDetail.length; i++) {
              console.log(this.themeDetail[i].id);
              console.log(this.selectedId);
              if (this.themeDetail[i].id === this.selectedId) {
                this.theme_id = this.themeDetail[i];
              }
            }
          }
        })
        .catch((e) => {
          this.isLoaderScreen = false;
          console.log(e);
        });
    },
    updateTheme() {
      this.isLoader = true;
      let item = {
        store_id: +this.currentStore.store_id,
        theme_id: this.theme_id.id,
      };
      console.log(item);
      this.$store
        .dispatch("updateAppPublishTheme", item)
        .then((res) => {
          this.isLoader = false;
          if (res.status === true) {
            this.getPublishTheme();
            this.getAppPublishTheme();
            this.$toastr.s(res.message, "Success");
          } else {
            this.$toastr.e(res.message, "Error");
          }
        })
        .catch((e) => {
          this.isLoader = false;
          console.log(e);
        });
    },
    updateThemeFonts() {
      // this.isLoader = true;
      let item = {
        store_id: +this.currentStore.store_id,
        status_front:
          this.status_front == true
            ? 1
            : 0 || this.status_front == false
            ? 0
            : 1 || this.status_front == 1
            ? 1
            : 0 || this.status_front == 0
            ? 0
            : 1,
      };
      console.log(item);
      this.$store
        .dispatch("updateThemeStatus", item)
        .then((res) => {
          this.isLoader = false;
          if (res.status === true) {
            this.getPublishTheme();
            this.getAppPublishTheme();
            this.$toastr.s(res.message, "Success");
          } else {
            this.$toastr.e(res.message, "Error");
          }
        })
        .catch((e) => {
          this.isLoader = false;
          console.log(e);
        });
    },
    appCodeCleanUp() {
      this.isLoader = true;
      this.$store
        .dispatch("appCodeCleanUp", +this.currentStore.store_id)
        .then((res) => {
          this.isLoader = false;
          if (res.status === true) {
            this.$toastr.s(res.message, "Success");
            this.$bvModal.hide("confirm");
          } else {
            this.$toastr.e(res.message, "Error");
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

<style></style>
