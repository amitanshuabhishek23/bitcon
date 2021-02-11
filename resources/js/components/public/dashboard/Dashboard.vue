<template>
  <div>
    <main class="app-content">
      <title-mob />
      <section class="dashboard">
        <b-row v-if="!isLoaderScreen">
          <b-col xl="8">
            <b-row>
              <b-col lg="12">
                <aside class="alert_box">
                  <b-alert variant="warning" show
                    ><b> Important </b>How to disable default image zoom option of Shopify
                    theme?
                    <router-link to="faq" target="_blank"
                      >Click here and read first question of FAQ</router-link
                    >
                  </b-alert>
                </aside>
              </b-col>
            </b-row>
             <b-row>
              <b-col lg="12">
                <aside class="alert_box">
                  <b-alert variant="danger" show
                    ><b> Important </b>How to remove our app code automaticaly from your theme before unintall the app

                    <router-link to="theme-integration"
                      >Click here </router-link
                    > clean app code
                  </b-alert>
                </aside>
              </b-col>
            </b-row>
            <b-row v-if="status_front === 0">
              <b-col lg="12">
                <aside class="alert_box">
                  <b-alert variant="danger" show
                    ><b> {{ appNAME }} Feature Is Disable Now!</b> If you want to activate
                    the feature on the storefront,
                    <router-link to="/theme-integration">Click here</router-link></b-alert
                  >
                </aside>
              </b-col>
            </b-row>
            <div class="hero_abt">
              <b-card class="card_panel">
                <b-row>
                  <b-col lg="12" class="hero_abt_col">
                    <div class="hero_abt_info">
                      <div class="hero_abt_title">
                        <h4 class="h4_title">
                          Step to Get Started with
                          {{ appNAME }}
                        </h4>
                      </div>
                    </div>
                  </b-col>
                  <b-col lg="6" class="hero_abt_col">
                    <div class="abt_vidoes">
                      <iframe
                        width="100%"
                        height="315"
                        src="https://www.youtube.com/embed/x18-04V9m4c"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                      ></iframe>
                    </div>
                  </b-col>
                </b-row>
              </b-card>
            </div>
          </b-col>
          <b-col xl="4">
            <div class="hero_ele">
              <b-card no-body class="card_panel">
                <article class="faq_info">
                  <div class="hero_ele_title">
                    <h4 class="h4_title">FAQ</h4>
                  </div>
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
                              <viewer :options="{ toolbar: false, navbar: false }">
                                <b-img
                                  :src="assetsURL + 'app/images/thumbnails/theme_1.png'"
                                  alt="top left side in dropdown findProducts page"
                                  fluid
                                ></b-img>
                              </viewer>
                            </div>

                            >> then open "products page" >> "Enable image zoom" and
                            unchecked the box to disable default setting. then "save"
                            changes

                            <div class="faq_img">
                              <viewer :options="{ toolbar: false, navbar: false }">
                                <b-img
                                  :src="assetsURL + 'app/images/thumbnails/theme_2.png'"
                                  alt="tEnable image zoom"
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
                           On which theme this app is compatible with?
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
                            >This app is compatible with the following themes- Debut, Brooklyn and Supply..</b-card-text
                          >
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
                    
                  </div>
                  <div class="view_more">
                    <router-link class="action_link" target="_blank" to="faq">View More</router-link>
                  </div>
                </article>
                <article class="support_info">
                  <div class="hero_ele_title">
                    <h4 class="h4_title">Help &amp; Support</h4>
                  </div>
                  <b-nav vertical>
                    <b-nav-item class="nav-link_cst">
                      <span> <i class="fa fa-envelope-o" aria-hidden="true"></i> </span
                      >support@hubifyapps.com
                    </b-nav-item>
                  </b-nav>
                </article>
                <article class="latest_update d-none">
                  <div class="hero_ele_title">
                    <h4 class="h4_title">Latest Updates</h4>
                  </div>
                  <ul class="update_info">
                    <div class="update_line"></div>
                    <li>
                      <span class="update_date">April 13</span>
                      <p>
                        Integrated with
                        <a href="#" target="_blank">ReConvert</a>. Display recommendations
                        on thank you page.
                      </p>
                    </li>
                    <li>
                      <span class="update_date">March 12</span>
                      <p>
                        Launched a new widget
                        <a href="#">Inspired by your browser history</a>.
                      </p>
                    </li>
                    <span id="more">
                      <li>
                        <span class="update_date">Jan 17</span>
                        <p>Integrated with Judge.me Review App.</p>
                        <p>Show reviews from Judge.me app in {{ appNAME }} widgets.</p>
                      </li>
                      <li>
                        <span class="update_date">Jan 13</span>
                        <p>
                          Integrated with
                          <a href="#" target="_blank">Pagefly Pagebuilder App</a>.
                        </p>
                        <p>Now use {{ appNAME }} widgets in Pagefly app too.</p>
                      </li>
                      <li>
                        <span class="update_date">Jan 11</span>
                        <p>Integrated with Alireviews Review App.</p>
                        <p>Show reviews from Alireviews app in {{ appNAME }} widgets.</p>
                      </li>
                      <li>
                        <span class="update_date">Jan 6</span>
                        <p>Launched Email Recommendations Widget.</p>
                        <p>Send product recommendations in your Email campaigns.</p>
                      </li>
                    </span>
                    <a
                      href="javascript:void();"
                      onclick="myFunction()"
                      id="myBtn"
                      class="faq_viewmore"
                      style="text-decoration: none"
                      >Read more</a
                    >
                    <span id="dots">&nbsp;</span>
                  </ul>
                </article>
              </b-card>
            </div>
          </b-col>
        </b-row>
        <div v-if="isLoaderScreen" class="pre_loader">
          <div class="spinner-border btn-spinner">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
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
      assetsURL: "",
      currentStore: "",
      dashboardDetail: [],
      isLoaderScreen: false,
      appNAME: "",
      status_front: "",
      Options: {
        inline: true,
        button: true,
        navbar: false,
        title: true,
        toolbar: false,
        tooltip: true,
        movable: false,
        zoomable: true,
        rotatable: true,
        scalable: true,
        transition: true,
        fullscreen: true,
        keyboard: true,
        url: "data-source",
      },
    };
  },
  mounted() {
    document.body.classList.remove("login-body");
    document.body.classList.remove("install_body");
  },
  created() {
    this.assetsURL = config.ASSET_URL_PREFIX;
    this.appNAME = config.APP_NAME;
    if (localStorage) {
      this.currentStore = JSON.parse(localStorage.getItem("pzs_current_Store"));
    }
    this.getActiveWidgetsList();
    this.getAppPublishTheme();
  },
  methods: {
    getAppPublishTheme() {
      this.isLoaderScreen = true;
      this.$store
        .dispatch("getAppPublishTheme", +this.currentStore.store_id)
        .then((res) => {
          this.isLoaderScreen = false;
          if (res.status === true) {
            this.status_front = +res.status_front;
          }
        })
        .catch((e) => {
          this.isLoaderScreen = false;
          console.log(e);
        });
    },
    getActiveWidgetsList() {
      this.isLoaderScreen = true;
      this.$store
        .dispatch("getActiveWidgetsList", +this.currentStore.store_id)
        .then((res) => {
          this.isLoaderScreen = false;
          if (res.status === true) {
            this.dashboardDetail = res.data;
          }
        })
        .catch((e) => {
          this.isLoaderScreen = false;
        });
    },
  },
};
</script>
