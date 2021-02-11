<template>
  <div>
    <main class="app-content">
      <title-mob />
      <section class="faqs">
        <b-row>
          <b-col xl="12">
            <div class="faqs_content">
              <b-card no-body class="card__panel">
                <b-card-header><h5 class="h5_title">FAQ's</h5></b-card-header>
                <b-card-body>
                  <div class="accordion" role="tablist">
                    <b-card no-body class="faqs_items">
                      <b-card-header header-tag="header" role="tab">
                        <div block v-b-toggle.accordfaq-1>
                          <h6 class="h6_title">
                            How to disable default image zoom option of Shopify theme?
                          </h6>
                        </div>
                      </b-card-header>
                      <b-collapse
                        id="accordfaq-1"
                        accordion="my-accordion"
                        role="tabpanel"
                      >
                        <b-card-body>
                          <b-card-text
                            >Go to online store >> Choose theme, on which you want to
                            disable product image zoom option and click on "Customize"
                            button > find "Products page" on the top left side
                            <div class="faq_img">
                              <b-img
                                :src="assetsURL + 'app/images/thumbnails/theme_1.png'"
                                alt="top left side in dropdown findProducts page"
                                fluid
                              ></b-img>
                            </div>

                            >> then open "products page" >> "Enable image zoom" and
                            unchecked the box to disable default setting. then "save"
                            changes

                            <div class="faq_img">
                              <b-img
                                :src="assetsURL + 'app/images/thumbnails/theme_2.png'"
                                alt="top left side in dropdown findProducts page"
                                fluid
                              ></b-img>
                            </div>
                          </b-card-text>
                        </b-card-body>
                      </b-collapse>
                    </b-card>
                    <b-card no-body class="faqs_items">
                      <b-card-header header-tag="header" role="tab">
                        <div block v-b-toggle.accordfaq-10>
                          <h6 class="h6_title">How to Increase Image Quality?</h6>
                        </div>
                      </b-card-header>
                      <b-collapse
                        id="accordfaq-10"
                        accordion="my-accordion"
                        role="tabpanel"
                      >
                        <b-card-body>
                          <b-card-text>
                            Go to online store >> Choose theme, on which you want to
                            Increase product image Quality and click on "Action" then
                            "Edit code"
                            <div class="faq_img">
                              <viewer :options="{ toolbar: false, navbar: false }">
                                <b-img
                                  :src="assetsURL + 'app/images/thumbnails/theme_6.png'"
                                  alt="Action >> Edit code"
                                  fluid
                                ></b-img>
                              </viewer>
                            </div>

                            >> then you will see "Snippets" on your >> go to "media.liquid"

                            <div class="faq_img">
                              <viewer :options="{ toolbar: false, navbar: false }">
                                <b-img
                                  :src="assetsURL + 'app/images/thumbnails/theme_5.png'"
                                  alt="Change image dimension"
                                  fluid
                                ></b-img>
                              </viewer>
                            </div>

                             >>In the "media.liquid" find first Tag "img" after that
                                replace img_url value like: 1296x1296 (big size)

                            <div class="faq_img">
                              <viewer :options="{ toolbar: false, navbar: false }">
                                <b-img
                                  :src="assetsURL + 'app/images/thumbnails/theme_4.png'"
                                  alt="find img tag and change image dimension"
                                  fluid
                                ></b-img>
                              </viewer>
                            </div>
                          </b-card-text>
                        </b-card-body>
                      </b-collapse>
                    </b-card>
                    <b-card no-body class="faqs_items">
                      <b-card-header header-tag="header" role="tab">
                        <div block v-b-toggle.accordfaq-2>
                          <h6 class="h6_title">
                            How does the zoom in & zoom-out work on mobile?
                          </h6>
                        </div>
                      </b-card-header>
                      <b-collapse
                        id="accordfaq-2"
                        accordion="my-accordion"
                        role="tabpanel"
                      >
                        <b-card-body>
                          <b-card-text
                            >It is as simple as work on other devices. Just click/pinch on
                            the image to display on the full screen.</b-card-text
                          >
                        </b-card-body>
                      </b-collapse>
                    </b-card>
                    <b-card no-body class="faqs_items">
                      <b-card-header header-tag="header" role="tab">
                        <div block v-b-toggle.accordfaq-11>
                          <h6 class="h6_title">How to clean up our app code from your theme before Uninstall the app?</h6>
                        </div>
                      </b-card-header>
                      <b-collapse
                        id="accordfaq-11"
                        accordion="my-accordion"
                        role="tabpanel"
                      >
                        <b-card-body>
                          <b-card-text>
                            Go to online store >> Choose theme, from which you want to
                            clean up our app code and click on "Action" then
                            "Edit code"
                            <div class="faq_img">
                              <viewer :options="{ toolbar: false, navbar: false }">
                                <b-img
                                  :src="assetsURL + 'app/images/thumbnails/theme_6.png'"
                                  alt="Action >> Edit code"
                                  fluid
                                ></b-img>
                              </viewer>
                            </div>

                            >> then go to "Layout" option >> "Theme.liquid"
                             >> then open file and find below<br><b> "{% include 'product_pinch_zoom' %}" </b> <br>then delete this line and save page
                            <div class="faq_img">
                              <viewer :options="{ toolbar: false, navbar: false }">
                                <b-img
                                  :src="assetsURL + 'app/images/thumbnails/theme_7.png'"
                                  alt="find theme.liquid"
                                  fluid
                                ></b-img>
                            
                              </viewer>
                            </div>
                            >> then go to "Snippets" option >> Find "product_pinch_zoom.liquid" and click on "Delete file"
                            <div class="faq_img">
                              <viewer :options="{ toolbar: false, navbar: false }">
                                <b-img
                                  :src="assetsURL + 'app/images/thumbnails/theme_8.png'"
                                  alt="find img tag and change image dimension"
                                  fluid
                                ></b-img>
                              </viewer>
                            </div>
                          </b-card-text>
                        </b-card-body>
                      </b-collapse>
                    </b-card>
                    <b-card no-body class="faqs_items">
                      <b-card-header header-tag="header" role="tab">
                        <div block v-b-toggle.accordfaq-12>
                          <h6 class="h6_title">How to clean up our app code automatically from the theme?</h6>
                        </div>
                      </b-card-header>
                      <b-collapse
                        id="accordfaq-12"
                        accordion="my-accordion"
                        role="tabpanel"
                      >
                        <b-card-body>
                          <b-card-text>
                           It's simple process. Go to Dashboard--> App Setup Menu--> Clean App Code--> Click on Clean Code button then It will remove our app code from your theme. If you need any help, please contact us at support@hubifyapps.com
                            <div class="faq_img">
                              <viewer :options="{ toolbar: false, navbar: false }">
                                <b-img
                                  :src="assetsURL + 'app/images/thumbnails/theme_9.png'"
                                  alt="Action >> Edit code"
                                  fluid
                                ></b-img>
                              </viewer>
                            </div>

                           
                          </b-card-text>
                        </b-card-body>
                      </b-collapse>
                    </b-card>
                    <b-card no-body class="faqs_items">
                      <b-card-header header-tag="header" role="tab">
                        <div block v-b-toggle.accordfaq-3>
                          <h6 class="h6_title">
                            Does {{ appNAME }} work with product variants?
                          </h6>
                        </div>
                      </b-card-header>
                      <b-collapse
                        id="accordfaq-3"
                        accordion="my-accordion"
                        role="tabpanel"
                      >
                        <b-card-body>
                          <b-card-text
                            >Yes, {{ appNAME }} works with product variant images as per
                            the customer selection.</b-card-text
                          >
                        </b-card-body>
                      </b-collapse>
                    </b-card>
                    <b-card no-body class="faqs_items">
                      <b-card-header header-tag="header" role="tab">
                        <div block v-b-toggle.accordfaq-4>
                          <h6 class="h6_title">
                            Can I disable the {{ appNAME }} feature?
                          </h6>
                        </div>
                      </b-card-header>
                      <b-collapse
                        id="accordfaq-4"
                        accordion="my-accordion"
                        role="tabpanel"
                      >
                        <b-card-body>
                          <b-card-text
                            >Yes, you can enable-disable {{ appNAME }} storefront setting
                            from the dashboard--> Go to App Setup--> Step 2
                            enable-disable setting as per your preferen</b-card-text
                          >
                        </b-card-body>
                      </b-collapse>
                    </b-card>
                    <b-card no-body class="faqs_items">
                      <b-card-header header-tag="header" role="tab">
                        <div block v-b-toggle.accordfaq-5>
                          <h6 class="h6_title">How do I uninstall the App?</h6>
                        </div>
                      </b-card-header>
                      <b-collapse
                        id="accordfaq-5"
                        accordion="my-accordion"
                        role="tabpanel"
                      >
                        <b-card-body>
                          <b-card-text
                            >Just simple, go to your App store and uninstall the
                            App.</b-card-text
                          >
                        </b-card-body>
                      </b-collapse>
                    </b-card>
                    <b-card no-body class="faqs_items">
                      <b-card-header header-tag="header" role="tab">
                        <div block v-b-toggle.accordfaq-6>
                          <h6 class="h6_title">Can I get support from you directly?</h6>
                        </div>
                      </b-card-header>
                      <b-collapse
                        id="accordfaq-6"
                        accordion="my-accordion"
                        role="tabpanel"
                      >
                        <b-card-body>
                          <b-card-text>
                            Yes, Just email us at support@hubifyapps.com and our team will
                            help you with any queries like App installation, set up to
                            match your theme, customisation, and troubleshooting any
                            issues.</b-card-text
                          >
                        </b-card-body>
                      </b-collapse>
                    </b-card>
                    <b-card no-body class="faqs_items">
                      <b-card-header header-tag="header" role="tab">
                        <div block v-b-toggle.accordfaq-7>
                          <h6 class="h6_title">How much does this app cost?</h6>
                        </div>
                      </b-card-header>
                      <b-collapse
                        id="accordfaq-7"
                        accordion="my-accordion"
                        role="tabpanel"
                      >
                        <b-card-body>
                          <b-card-text
                            >It is completely free for now. Just install it and utilise
                            all amazing features.</b-card-text
                          >
                        </b-card-body>
                      </b-collapse>
                    </b-card>
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
import TitleMob from "../common/DynamicTitle.vue";
export default {
  components: {
    "title-mob": TitleMob,
  },
  data() {
    return {
      appNAME: "",
    };
  },
  created() {
    this.assetsURL = config.ASSET_URL_PREFIX;
    this.appNAME = config.APP_NAME;
  },
};
</script>
