<template>
  <main class="app-content">
    <title-mob />

    <section class="ac_details">
      <b-tabs class="setup__tabs">
        <b-tab title="Account" active>
          <b-row>
            <b-col lg="12">
              <b-card no-body class="store_info card__panel">
                <b-card-header>
                  <h5 class="h5_title">Store Details</h5>
                </b-card-header>
                <b-card-body>
                  <form action>
                    <b-row>
                      <b-col lg="6">
                        <div class="form-group">
                          <label class="cst_label">Name of store</label>
                          <input type="text" readonly v-model="store_name" class="form-control" />
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="form-group">
                          <label class="cst_label">Store URL</label>
                          <input type="text" readonly v-model="store_url" class="form-control" />
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="form-group">
                          <label class="cst_label">Store currency</label>
                          <input type="text" readonly v-model="currency_sign" class="form-control" />
                          <span
                            class="currency_tagline"
                          >Currency should match your platform's currency setting.</span>
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="form-group">
                          <label class="cst_label">Currency display type</label>
                          <input type="text" readonly v-model="currency" class="form-control" />
                        </div>
                      </b-col>
                    </b-row>
                  </form>
                </b-card-body>
              </b-card>
            </b-col>
            <!-- <b-col lg="12">
              <b-card no-body class="store_info card__panel">
                <b-card-header>
                  <h5 class="h5_title">Customer Notifications</h5>
                </b-card-header>
                <b-card-body>
                  <p>This will be the email and name that your customers will see when they receive email notifications.</p>
                  <form action>
                    <b-row>
                      <b-col lg="6">
                        <div class="form-group">
                          <label class="cst_label">Sender name</label>
                          <input type="text" class="form-control" />
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="form-group">
                          <label class="cst_label">Reply-to email</label>
                          <input type="text" class="form-control" />
                        </div>
                      </b-col>
                    </b-row>
                  </form>
                </b-card-body>
              </b-card>
            </b-col>-->
          </b-row>
        </b-tab>
       <!--  <b-tab title="Billing">
          <b-row class="justify-content-center">
            <b-col lg="4">
            <div class="billing_items">
          <b-card no-body class="card__panel">
            <b-card-header> <h5 class="h5_title">{{activePlan ? '$'+activePlan.price+'/Month' : ''}}</h5> <small>(14 Days Free Trial)</small> </b-card-header>
          <b-card-body class="no_body">
            <ul>
              <li class="billing_info">
                <span class="right_icon">✓</span>Auto & Manual Recommendations
              </li>
              <li class="billing_info">
                <span class="right_icon">✓</span>Related Products
              </li>
              <li class="billing_info">
                <span class="right_icon">✓</span>Widget customization
              </li>
              <li class="billing_info">
                <span class="right_icon">✓</span>Add Unlimited products & Increase traffic
              </li>
              <li class="billing_info">
                <span class="right_icon">✓</span>Advance Analytics
              </li>
            </ul>
             <div class="btn_billing"><button class="primary_btn disabled_btn">Activated</button></div>
            </b-card-body>
          </b-card>
          </div>
            </b-col>
          </b-row>
        </b-tab> -->
      </b-tabs>
    </section>
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
      storeDetail: "",
      store_name: "",
      store_url: "",
      currency_sign: "",
      currency: "",
      activePlan: "",
    };
  },
  created() {
    if (localStorage) {
      this.currentStore = JSON.parse(localStorage.getItem("pzs_current_Store"));
      this.getStoreDetails();
      this.getBillingPlan();
      this.getActivePricePlan();
    }
  },
  mounted() {},
  methods: {
    getStoreDetails() {
      this.$store
        .dispatch("getStore", +this.currentStore.store_id)
        .then((res) => {
          console.log(res);
          if (res.status === true) {
            this.storeDetail = res.data;
            this.store_name = this.storeDetail.store_name;
            this.store_url = this.storeDetail.store_url;
            this.currency_sign = this.storeDetail.currency_sign;
            this.currency = this.storeDetail.currency;
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
    getBillingPlan() {
      this.$store
        .dispatch("getPricePlansList", +this.currentStore.store_id)
        .then((res) => {
          console.log(res);
          if (res.status === true) {
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
    getActivePricePlan() {
      this.$store
        .dispatch("getActivePricePlan", +this.currentStore.store_id)
        .then((res) => {
          console.log(res);
          if (res.status === true) {
            this.activePlan = res.data[0];
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>

<style>
</style>