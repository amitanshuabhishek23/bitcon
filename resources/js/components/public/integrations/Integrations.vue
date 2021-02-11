<template>
  <div>
    <main class="app-content">
      <section class="integrations">
        <b-row>
          <b-col xl="12">
            <div class="integra_content">
              <b-card no-body class="card__panel">
                <b-card-header class="card__header">
                  <h5 class="h5_title">Integrations</h5>
                </b-card-header>
                <b-card-body>
                  <div class="api_key_info">
                    <p>Copy the API key and use for integration with any other app.</p>
                    <div class="api_input">
                      <label class="label_mod">Api key</label>
                      <input
                        type="text"
                        class="form-control"
                        value="a55621-42d9ee-cfb0c6-e8b95c-74f8d7"
                      />
                      <hr />
                      <div class="api_btn">
                        <button type="text" class="btn_default_cst">
                          Generate New Api Key
                        </button>
                        <button type="text" class="btn_default_cst">
                          Copy To Clipboard
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="integ_mod">
                    <b-row>
                      <b-col class="inte_col" sm="6" md="6" xl="3">
                        <div class="integ_item integ_height">
                          <div class="integ_item_img">
                            <b-img
                              :src="assetsURL + 'app/images/icons/loox_icn.png'"
                              alt="Loox"
                            ></b-img>
                          </div>
                          <h5>LOOX</h5>
                          <p>
                            Collect product reviews with photos &amp; boost sales with
                            reviews.
                          </p>
                          <div class="learn_btn">
                            <a href="#" class="btn_default_cst">Learn More</a>
                          </div>
                        </div>
                      </b-col>
                      <b-col class="inte_col" sm="6" md="6" xl="3">
                        <div class="integ_item integ_height">
                          <div class="integ_item_img">
                            <b-img
                              :src="assetsURL + 'app/images/icons/judge_icn.png'"
                              alt="JUDGE.ME PRODUCT REVIEWS"
                            ></b-img>
                          </div>
                          <h5>JUDGE.ME PRODUCT REVIEWS</h5>
                          <p>Fully-featured reviews app with product reviews.</p>
                          <div class="learn_btn">
                            <a href="#" class="btn_default_cst">Learn More</a>
                          </div>
                        </div>
                      </b-col>
                      <b-col class="inte_col" sm="6" md="6" xl="3">
                        <div class="integ_item integ_height">
                          <div class="integ_item_img">
                            <b-img
                              :src="assetsURL + 'app/images/icons/all-review_icn.png'"
                              alt="ALI REVIEWS"
                            ></b-img>
                          </div>
                          <h5>ALI REVIEWS</h5>
                          <p>
                            Import AliExpress product reviews, photo reviews, boost sales.
                          </p>
                          <div class="learn_btn">
                            <a href="#" class="btn_default_cst">Learn More</a>
                          </div>
                        </div>
                      </b-col>
                      <b-col class="inte_col" sm="6" md="6" xl="3">
                        <div class="integ_item integ_height">
                          <div class="integ_item_img">
                            <b-img
                              :src="assetsURL + 'app/images/icons/shopify_review.png'"
                              alt="SHOPIFY REVIEWS"
                            ></b-img>
                          </div>
                          <h5>SHOPIFY REVIEWS</h5>
                          <p>
                            Allows you to add a customer review feature to your products
                          </p>
                          <div class="learn_btn">
                            <a href="#" class="btn_default_cst">Learn More</a>
                          </div>
                        </div>
                      </b-col>
                      <b-col class="inte_col" sm="6" md="6" xl="3">
                        <div class="integ_item integ_height">
                          <div class="integ_item_img">
                            <b-img
                              :src="assetsURL + 'app/images/icons/yotpo_icn.png'"
                              alt="Yotpo: Photo &amp; Product Reviews"
                            ></b-img>
                          </div>
                          <h5>Yotpo: Photo &amp; Product Reviews</h5>
                          <p>
                            Collect product reviews, photo reviews, site reviews &amp;
                            ratings.
                          </p>
                          <div class="learn_btn">
                            <a href="#" class="btn_default_cst">Learn More</a>
                          </div>
                        </div>
                      </b-col>
                      <b-col class="inte_col" sm="6" md="6" xl="3">
                        <div class="integ_item integ_height">
                          <div class="integ_item_img">
                            <b-img
                              :src="assetsURL + 'app/images/icons/pagefly_icn.png'"
                              alt="PageFly Advanced Page Builder"
                            ></b-img>
                          </div>
                          <h5>PageFly Advanced Page Builder</h5>
                          <p>
                            Build landing page, product page, blog, FAQ page &amp; Funnel.
                          </p>
                          <div class="learn_btn">
                            <a href="#" class="btn_default_cst">Learn More</a>
                          </div>
                        </div>
                      </b-col>
                      <b-col class="inte_col" sm="6" md="6" xl="3">
                        <div class="integ_item integ_height">
                          <div class="integ_item_img">
                            <b-img
                              :src="assetsURL + 'app/images/icons/stock_icn.png'"
                              alt="Back In Stock ‑ Restock Alerts"
                            ></b-img>
                          </div>
                          <h5>Back In Stock ‑ Restock Alerts</h5>
                          <p>
                            Now send Personalized Product Recommendations by
                            {{ appNAME }} in your back in stock notifications.
                          </p>
                          <div class="learn_btn learn_btn_ele">
                            <a href="#" class="btn_default_cst">Learn More</a>
                            <a href="#" class="btn_default_cst">Get API Key</a>
                          </div>
                          <div class="getapi_text">
                            a55621-42d9ee-cfb0c6-e8b95c-74f8d7
                          </div>
                        </div>
                      </b-col>
                      <b-col class="inte_col" sm="6" md="6" xl="3">
                        <div class="integ_item integ_height">
                          <div class="integ_item_img">
                            <b-img
                              :src="assetsURL + 'app/images/icons/slidecart_icn.png'"
                              alt="SLIDE CART"
                            ></b-img>
                          </div>
                          <h5>SLIDE CART</h5>
                          <p>
                            Sticky cart drawer with upselling, rewards and announcements!
                          </p>
                          <div class="learn_btn">
                            <a href="#" class="btn_default_cst">Learn More</a>
                          </div>
                        </div>
                      </b-col>
                      <b-col class="inte_col" sm="6" md="6" xl="3">
                        <div class="integ_item integ_height">
                          <div class="integ_item_img">
                            <b-img
                              :src="assetsURL + 'app/images/icons/gempages_icn.png'"
                              alt="GemPages Page Builder &amp; Funnel"
                            ></b-img>
                          </div>
                          <h5>GemPages Page Builder &amp; Funnel</h5>
                          <p>
                            Home page, product page, collection page, sales pages &amp;
                            FAQs
                          </p>
                          <div class="learn_btn">
                            <a href="#" class="btn_default_cst">Learn More</a>
                          </div>
                        </div>
                      </b-col>
                    </b-row>
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
import config from "../../../config";
export default {
  data() {
    return {
      assetsURL: "",
      appNAME: "",
    };
  },
  created() {
    this.assetsURL = config.ASSET_URL_PREFIX;
    this.appNAME = config.APP_NAME;
  },
  methods: {},
};
</script>
