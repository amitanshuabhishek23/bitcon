<template>
  <div>
    <main class="app-content">
      <section class="oneplus_app">
        <b-card class="card__panel" no-body>
          <b-card-header>
            <h4 class="h4_title">Recommended Shopify Apps</h4>
           <!-- <b-card-text
              >Add Your Expenses Here (Expenses Includes: Rent, Salary,Travel,
              Taxes, Etc.)</b-card-text
            >-->
          </b-card-header>
          <b-card-body>
            <b-row
              v-match-heights="{
                el: ['.oneplus_item'],
                disabled: [
                  767,
                  [920, 1200],
                ],
              }"
            >
              <b-col
                class="oneplus_col"
                lg="3"
                v-for="(item, i) of currentRecommendedApps"
                :key="i"
              >
                <div class="oneplus_item">
                  <div class="oneplus_icn">
                    <b-img :src="item.img_link" :alt="item.title"></b-img>
                  </div>
                  <h5 class="h5_title">{{ item.title }}</h5>
                  <p>{{ item.description }}</p>
                  <span class="oneplus_trial">{{ item.price }}.</span>
                  <span class="oneplus_trial">{{ item.free_trial }}.</span>
                  <div class="oneplus_btn">
                    <b-link
                      class="primary_btn"
                      :href="item.href_link"
                      target="_blank"
                      >Try it for Free</b-link
                    >
                  </div>
                </div>
              </b-col>
            </b-row>
          </b-card-body>
        </b-card>
      </section>
    </main>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentRecommendedApps: [],
      isLoaderScreen: false,
    };
  },
  created() {
    this.getRecommendedApps();
  },
  methods: {
    getRecommendedApps() {
      this.isLoaderScreen = true;
      this.$store
        .dispatch("getRecommendedApps")
        .then((res) => {
          if (res.status === true) {
            this.currentRecommendedApps = res.data;
            this.isLoaderScreen = false;
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>

<style></style>
