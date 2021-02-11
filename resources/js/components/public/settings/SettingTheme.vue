<template>
  <main class="app-content">
    <title-mob />
    <section class="integration_themes">
      <b-row v-if="!isLoaderScreen">
        <b-col lg="12"></b-col>
        <b-col lg="12">
          <div class="themes_mod">
            <b-card no-body class="card__panel">
              <b-card-header>
                <h5 class="h5_title">Admin Theme Colors Setting</h5>
              </b-card-header>
              <b-card-body>
                <b-card-text>
                  We are managing 2 theme colors for the App's admin panel, please select
                  your preference.
                </b-card-text>
                <b-row>
                  <b-col lg="3">
                    <div class="select_themes">
                      <!-- <label>Pop-up feature visibility on the storefront</label> -->
                      <div class="form-group select2_mod">
                        <!-- <span class="inte_label">Dark</span> -->
                        <!-- <input
                        type="checkbox"
                        v-model="theme_set"
                        hidden="hidden"
                        id="sameCollection"
                        @change="setTheme($event)"
                      />
                      <label for="sameCollection" class="switch"></label>-->
                        <multiselect
                          v-model="theme_set"
                          :options="themeDetail"
                          :searchable="false"
                          @select="setTheme"
                        ></multiselect>
                        <!-- <span class="inte_label">Light</span> -->
                      </div>
                    </div>
                  </b-col>
                </b-row>
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
    </section>

    <!-- <b-modal id="theme" size="md" title="Delete">
      <div class="mnul_body">
        <div class="mnul_item">Are you sure to delete?</div>
      </div>
      <div class="modal_ftr">
        <div class="modal_ftr_block">
          <ul class="modal_ftr_btn">
            <li>
              <button class="btn_default_cst" @click="$bvModal.hide('theme');">Cancel</button>
            </li>
            <li>
              <button @click.prevent="deleteProduct(selectedProduct)" class="primary_btn dis">Delete</button>
            </li>
          </ul>
        </div>
      </div>
    </b-modal>-->
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
      isLoaderScreen: false,
      isLoader: false,
      theme_set: "",
      themeDetail: ["light", "dark"],
    };
  },
  created() {},
  mounted() {
    if (localStorage) {
      this.currentStore = JSON.parse(localStorage.getItem("pzs_current_Store"));
      console.log(this.currentStore.app_theme);
    }
    this.theme_set = this.currentStore.app_theme;
    document.body.classList.remove("dark-themes");
    document.body.classList.remove("light-themes");
    document.body.classList.add(this.currentStore.app_theme + "-themes");
  },
  methods: {
    setTheme(e) {
      console.log(e);
      this.theme_set = e;
      console.log(this.theme_set);
      let item = {
        store_id: +this.currentStore.store_id,
        app_theme: this.theme_set,
      };
      this.$store
        .dispatch("updateAppTheme", item)
        .then((res) => {
          if (res.status === true) {
            localStorage.setItem("pzs_current_Store", JSON.stringify(res.data));
            console.log(res.data.app_theme);
            document.body.classList.remove("dark-themes");
            document.body.classList.remove("light-themes");
            document.body.classList.add(res.data.app_theme + "-themes");
          }
          console.log(res);
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>

<style></style>
