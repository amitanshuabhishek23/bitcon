<template>
  <div>
    <main class="app-content">
      <div class="create_e_widgets">
        <div class="theme_panel">
          <b-row>
            <b-col class="creat_col p_0" xl="3">
              <!-- Widget tabs -->
              <div class="widgets_tabs">
                <ul class="nav nav-tabs">
                  <li>
                    <a class="active" data-toggle="tab" href="#campaignType">1</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#emailService">2</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#visualSettings">3</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#overview">4</a>
                  </li>
                </ul>
                <div class="widgets_img_content">
                  <div class="campaignType">
                    <img
                      :src="assetsURL +'app/images/thumbnails/selectcampaign-img.png'"
                      alt="Campaign Type"
                      class="img-responsive"
                    />
                    <article class>
                      <h3 class="md_title">Campaign Type</h3>
                      <p class="cst_para">
                        Create new email campaign, select the product recommendation you
                        want to include in your emails among the 4 modules we have, and get the embeddable
                        code for your emails campaign.
                      </p>
                    </article>
                  </div>
                  <div class="emailService">
                    <img
                      :src="assetsURL +'app/images/thumbnails/emailservice-img.svg'"
                      alt="Email Service"
                      class="img-responsive"
                    />
                    <article class>
                      <h3 class="md_title">Email Service</h3>
                      <p class="cst_para">
                        Send email product recommendations to your customer through
                        MailChimp or Klaviyo which makes the process super easy.
                      </p>
                    </article>
                  </div>
                  <div class="visualSettings">
                    <img
                      :src="assetsURL +'app/images/thumbnails/visualsettings-img.svg'"
                      alt="Visual Settings"
                      class="img-responsive"
                    />
                    <article class>
                      <h3 class="md_title">Visual Settings</h3>
                      <p class="cst_para">
                        Change the design of the recommended products widget that you want
                        to add in your email campaigns by using our design editor here.
                      </p>
                    </article>
                  </div>
                  <div class="overview">
                    <img
                      :src="assetsURL +'app/images/thumbnails/overview-img.svg'"
                      alt="Visual Settings"
                      class="img-responsive"
                    />
                    <article class>
                      <h3 class="md_title">Overview</h3>
                      <p class="cst_para">
                        You are all set to launch your campaign, copy the generated HTML
                        code and save this campaign and paste this code in your email template.
                      </p>
                    </article>
                  </div>
                </div>
              </div>
            </b-col>
            <!-- // Widget tabs -->
            <b-col class="creat_col" xl="9">
              <div class="tabs_pagination">
                <ul>
                  <li class="page-item pull-left disabled">
                    <a class="primary_btn page-previous" href="#" tabindex="-1" data-id="1">Previous</a>
                  </li>
                  <li class="page-item pull-right" data-id="2">
                    <a class="primary_btn page-next" href="#" data-id="2" style>Next</a>
                  </li>
                </ul>
              </div>
              <div class="email_widgets_right">
                <div class="tab-content">
                  <!-- Campain Type -->
                  <div id="campaignType" class="tab-pane fade in active campaignTypeCon">
                    <b-row>
                      <b-col class="c_type_col" md="6" lg="3">
                        <input
                          id="sellingProducts"
                          class="radio-custom widget_name"
                          name="widget_name"
                          value="top_selling_products"
                          type="radio"
                          checked
                        />
                        <label for="sellingProducts" class="radio-custom-label">
                          <div class="produc_panel">
                            <img
                              :src="assetsURL +'app/images/thumbnails/topselling-temp.png'"
                              alt="Top Selling Products"
                            />
                            <h6 class="sm_title">Top Selling Products</h6>
                            <p class="sm_para">
                              Shows products which were sold most number of times or the
                              best sellers by A.I.
                            </p>
                          </div>
                        </label>
                      </b-col>
                      <b-col class="c_type_col" md="6" lg="3">
                        <input
                          id="trendingProducts"
                          class="radio-custom widget_name"
                          name="widget_name"
                          value="top_selling_products"
                          type="radio"
                        />
                        <label for="trendingProducts" class="radio-custom-label">
                          <div class="produc_panel">
                            <img
                              :src="assetsURL +'app/images/thumbnails/trending-temp.png'"
                              alt="Trending Products"
                            />
                            <h6 class="sm_title">Trending Products</h6>
                            <p class="sm_para">This section will show the recently sold products</p>
                          </div>
                        </label>
                      </b-col>
                      <b-col class="c_type_col" md="6" lg="3">
                        <input
                          id="newArrivals"
                          class="radio-custom widget_name"
                          name="widget_name"
                          value="top_selling_products"
                          type="radio"
                        />
                        <label for="newArrivals" class="radio-custom-label">
                          <div class="produc_panel">
                            <img
                              :src="assetsURL +'app/images/thumbnails/trending-temp.png'"
                              alt="New Arrivals"
                            />
                            <h6 class="sm_title">New Arrivals</h6>
                            <p class="sm_para">Shows the newly added products from store</p>
                          </div>
                        </label>
                      </b-col>
                      <b-col class="c_type_col" md="6" lg="3">
                        <input
                          id="featuredProducts"
                          class="radio-custom widget_name"
                          name="widget_name"
                          value="top_selling_products"
                          type="radio"
                        />
                        <label for="featuredProducts" class="radio-custom-label">
                          <div class="produc_panel">
                            <img
                              :src="assetsURL +'app/images/thumbnails/trending-temp.png'"
                              alt="Featured Products"
                            />
                            <h6 class="sm_title">Featured Products</h6>
                            <p class="sm_para">
                              You can assign products to a collection and select that
                              here to show Featured Products
                            </p>
                          </div>
                        </label>
                      </b-col>
                    </b-row>
                  </div>
                  <!-- // Campain Type -->
                  <!-- Email Service -->
                  <div id="emailService" class="tab-pane fade emailService_con">
                    <b-row>
                      <b-col md="6">
                        <input
                          id="mailchimpbtn"
                          class="radio-custom widget_name"
                          name="widget_name"
                          value="top_selling_products"
                          type="radio"
                        />
                        <label for="mailchimpbtn" class="radio-custom-label">
                          <div class="produc_panel">
                            <img
                              :src="assetsURL +'app/images/thumbnails/mailchimp-img.svg'"
                              alt="Top Selling Products"
                            />
                          </div>
                        </label>
                      </b-col>
                      <b-col md="6">
                        <input
                          id="klaviyobtn"
                          class="radio-custom widget_name"
                          name="widget_name"
                          value="top_selling_products"
                          type="radio"
                        />
                        <label for="klaviyobtn" class="radio-custom-label">
                          <div class="produc_panel">
                            <img
                              :src="assetsURL +'app/images/thumbnails/klavio-img.svg'"
                              alt="Top Selling Products"
                            />
                          </div>
                        </label>
                      </b-col>
                    </b-row>
                  </div>
                  <!-- // Email Service -->
                  <!-- Visual Settings -->
                  <div id="visualSettings" class="tab-pane fade visualSettings_con">
                    <b-row>
                      <b-col xl="6">
                        <div class="cont_left">
                          <div class="form-group">
                            <h6 class="h6_title">Global</h6>
                            <label class="theme_label">Email width (px)</label>
                            <input
                              type="number"
                              class="form-control theme_input"
                              min="1"
                              max="1000"
                              value="500"
                            />
                          </div>
                          <div class="form-group">
                            <label class="theme_label">Font Family</label>
                            <h6 class="h6_title">Heading</h6>
                            <input
                              type="text"
                              class="form-control theme_input"
                              min="1"
                              max="1000"
                              value="New Arrivals"
                              placeholder="Recommanded for you"
                            />
                          </div>
                          <div class="form-group">
                            <label class="theme_label">Size (px)</label>
                            <input
                              type="number"
                              class="form-control theme_input"
                              min="1"
                              max="1000"
                              value="18"
                            />
                          </div>
                          <b-row class="form-group inputStyle">
                            <b-col lg="4">
                              <label class="theme_label">Text Style</label>
                              <div class="form-group inputStyle_wrapper">
                                <span class="inputStyle_font">
                                  <input
                                    type="checkbox"
                                    name="widget_title_bold"
                                    class="radio-custom widget_check theme_input"
                                    id="widget_style1"
                                  />
                                  <label for="widget_style1" class="radio-custom-label">
                                    <i class="fa fa-bold" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font">
                                  <input
                                    type="checkbox"
                                    class="radio-custom widget_check theme_input"
                                    name="widget_title_itelic"
                                    id="widget_style2"
                                  />
                                  <label for="widget_style2" class="radio-custom-label">
                                    <i class="fa fa-italic" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font">
                                  <input
                                    type="checkbox"
                                    class="radio-custom widget_check theme_input"
                                    name="widget_title_underline"
                                    id="widget_style3"
                                  />
                                  <label for="widget_style3" class="radio-custom-label">
                                    <i class="fa fa-underline" aria-hidden="true"></i>
                                  </label>
                                </span>
                              </div>
                            </b-col>
                            <b-col lg="4">
                              <label class="theme_label">Text Align</label>
                              <div class="form-group inputStyle_wrapper">
                                <span class="inputStyle_font">
                                  <input
                                    type="radio"
                                    name="widget_title_align"
                                    class="radio-custom"
                                    id="widget_align1"
                                    value="left"
                                  />
                                  <label for="widget_align1" class="radio-custom-label">
                                    <i class="fa fa-align-left" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font active">
                                  <input
                                    type="radio"
                                    name="widget_title_align"
                                    class="radio-custom"
                                    id="widget_align2"
                                    checked
                                    value="center"
                                  />
                                  <label for="widget_align2" class="radio-custom-label">
                                    <i class="fa fa-align-center" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font">
                                  <input
                                    type="radio"
                                    name="widget_title_align"
                                    class="radio-custom"
                                    id="widget_align3"
                                    value="right"
                                  />
                                  <label for="widget_align3" class="radio-custom-label">
                                    <i class="fa fa-align-right" aria-hidden="true"></i>
                                  </label>
                                </span>
                              </div>
                            </b-col>
                            <b-col lg="4">
                              <label class="theme_label">Color</label>
                              <div class="colorbox_wrapper">
                                <input
                                  type="text"
                                  class="form-control theme_input"
                                  name="widget_title_color"
                                  id="widget_title_color"
                                  value="000"
                                  autocomplete="off"
                                />
                              </div>
                            </b-col>
                          </b-row>
                          <b-row class="form-group">
                            <b-col lg="6">
                              <h6 class="h6_title">Product Image</h6>
                              <label class="theme_label">Number of products</label>
                              <input
                                type="number"
                                class="form-control theme_input"
                                min="1"
                                max="8"
                                value="4"
                              />
                            </b-col>
                            <b-col lg="6" class="mobmargin_top">
                              <h6 class="h6_title">&nbsp;</h6>
                              <label class="theme_label">Size (px)</label>
                              <div class="selectwrap">
                                <select
                                  class="form-control theme_input"
                                  name="image_size"
                                  id="image_size"
                                >
                                  <option value="medium">Small (240 pixels)</option>
                                  <option value="320X320" selected>Medium (320 pixels)</option>
                                  <option value="large">Large (480 pixels)</option>
                                  <option value="640X640">Standard (640 pixels)</option>
                                </select>
                              </div>
                            </b-col>
                          </b-row>
                          <b-row class="form-group">
                            <b-col lg="6">
                              <h6 class="h6_title">Product Title</h6>
                              <label class="theme_label">Truncate product name after</label>
                              <input
                                type="number"
                                class="form-control theme_input"
                                min="1"
                                max="8"
                                value
                              />
                            </b-col>
                            <b-col lg="6" class="mobmargin_top">
                              <h6 class="h6_title">&nbsp;</h6>
                              <label class="theme_label">Size (px)</label>
                              <input
                                type="number"
                                class="form-control theme_input"
                                min="1"
                                max="8"
                                value="14"
                              />
                            </b-col>
                          </b-row>
                          <b-row class="form-group inputStyle">
                            <b-col lg="4">
                              <label class="theme_label">Text Style</label>
                              <div class="form-group inputStyle_wrapper">
                                <span class="inputStyle_font">
                                  <input
                                    type="checkbox"
                                    name="widget_title_bold"
                                    class="radio-custom widget_check theme_input"
                                    id="widget_style1"
                                  />
                                  <label for="widget_style1" class="radio-custom-label">
                                    <i class="fa fa-bold" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font">
                                  <input
                                    type="checkbox"
                                    class="radio-custom widget_check theme_input"
                                    name="widget_title_itelic"
                                    id="widget_style2"
                                  />
                                  <label for="widget_style2" class="radio-custom-label">
                                    <i class="fa fa-italic" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font">
                                  <input
                                    type="checkbox"
                                    class="radio-custom widget_check theme_input"
                                    name="widget_title_underline"
                                    id="widget_style3"
                                  />
                                  <label for="widget_style3" class="radio-custom-label">
                                    <i class="fa fa-underline" aria-hidden="true"></i>
                                  </label>
                                </span>
                              </div>
                            </b-col>
                            <b-col lg="4">
                              <label class="theme_label">Text Align</label>
                              <div class="form-group inputStyle_wrapper">
                                <span class="inputStyle_font">
                                  <input
                                    type="radio"
                                    name="widget_title_align"
                                    class="radio-custom"
                                    id="widget_align1"
                                    value="left"
                                  />
                                  <label for="widget_align1" class="radio-custom-label">
                                    <i class="fa fa-align-left" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font active">
                                  <input
                                    type="radio"
                                    name="widget_title_align"
                                    class="radio-custom"
                                    id="widget_align2"
                                    checked
                                    value="center"
                                  />
                                  <label for="widget_align2" class="radio-custom-label">
                                    <i class="fa fa-align-center" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font">
                                  <input
                                    type="radio"
                                    name="widget_title_align"
                                    class="radio-custom"
                                    id="widget_align3"
                                    value="right"
                                  />
                                  <label for="widget_align3" class="radio-custom-label">
                                    <i class="fa fa-align-right" aria-hidden="true"></i>
                                  </label>
                                </span>
                              </div>
                            </b-col>
                            <b-col lg="4">
                              <label class="theme_label">Color</label>
                              <div class="colorbox_wrapper">
                                <input
                                  type="text"
                                  class="form-control theme_input"
                                  name="widget_title_color"
                                  id="widget_title_color"
                                  value="000"
                                  autocomplete="off"
                                />
                              </div>
                            </b-col>
                          </b-row>
                        </div>
                      </b-col>
                      <b-col xl="6">
                        <div class="cont_left cont__rght">
                          <div class="form-group">
                            <h6 class="h6_title">Button Style</h6>
                            <label class="theme_label">Button Title</label>
                            <input type="text" class="form-control theme_input" value="500" />
                          </div>
                          <b-row class="form-group">
                            <b-col md="6">
                              <label class="theme_label">Size (px)</label>
                              <input
                                type="number"
                                class="form-control theme_input"
                                min="1"
                                max="8"
                                value="12"
                              />
                            </b-col>
                            <b-col md="6" class="mobmargin_top">
                              <label class="theme_label">Corner Radius</label>
                              <input
                                type="number"
                                class="form-control theme_input"
                                min="1"
                                max="8"
                                value="2"
                              />
                            </b-col>
                          </b-row>
                          <b-row class="form-group">
                            <b-col md="6">
                              <label class="theme_label">Color</label>
                              <input
                                type="color"
                                class="form-control theme_input"
                                min="1"
                                max="8"
                                value="FFFFFF"
                              />
                            </b-col>
                            <b-col md="6" class="mobmargin_top">
                              <label class="theme_label">Background Color</label>
                              <input type="color" class="form-control theme_input" value="000000" />
                            </b-col>
                          </b-row>
                          <b-row class="form-group">
                            <b-col md="12">
                              <h6 class="h6_title">Product Price</h6>
                              <label class="theme_label">Size (px)</label>
                              <input
                                type="number"
                                class="form-control theme_input"
                                placeholder="Truncate product name after"
                              />
                            </b-col>
                          </b-row>
                          <b-row class="form-group inputStyle">
                            <b-col lg="4">
                              <label class="theme_label">Text Style</label>
                              <div class="inputStyle_wrapper">
                                <span class="inputStyle_font">
                                  <input
                                    type="checkbox"
                                    name="widget_title_bold"
                                    class="radio-custom widget_check theme_input"
                                    id="widget_style1"
                                  />
                                  <label for="widget_style1" class="radio-custom-label">
                                    <i class="fa fa-bold" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font">
                                  <input
                                    type="checkbox"
                                    class="radio-custom widget_check theme_input"
                                    name="widget_title_itelic"
                                    id="widget_style2"
                                  />
                                  <label for="widget_style2" class="radio-custom-label">
                                    <i class="fa fa-italic" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font">
                                  <input
                                    type="checkbox"
                                    class="radio-custom widget_check theme_input"
                                    name="widget_title_underline"
                                    id="widget_style3"
                                  />
                                  <label for="widget_style3" class="radio-custom-label">
                                    <i class="fa fa-underline" aria-hidden="true"></i>
                                  </label>
                                </span>
                              </div>
                            </b-col>
                            <b-col lg="4">
                              <label class="theme_label">Text Align</label>
                              <div class="form-group inputStyle_wrapper">
                                <span class="inputStyle_font">
                                  <input
                                    type="radio"
                                    name="widget_title_align"
                                    class="radio-custom"
                                    id="widget_align1"
                                    value="left"
                                  />
                                  <label for="widget_align1" class="radio-custom-label">
                                    <i class="fa fa-align-left" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font active">
                                  <input
                                    type="radio"
                                    name="widget_title_align"
                                    class="radio-custom"
                                    id="widget_align2"
                                    checked
                                    value="center"
                                  />
                                  <label for="widget_align2" class="radio-custom-label">
                                    <i class="fa fa-align-center" aria-hidden="true"></i>
                                  </label>
                                </span>
                                <span class="inputStyle_font">
                                  <input
                                    type="radio"
                                    name="widget_title_align"
                                    class="radio-custom"
                                    id="widget_align3"
                                    value="right"
                                  />
                                  <label for="widget_align3" class="radio-custom-label">
                                    <i class="fa fa-align-right" aria-hidden="true"></i>
                                  </label>
                                </span>
                              </div>
                            </b-col>
                            <b-col lg="4">
                              <label class="theme_label">Color</label>
                              <div class="colorbox_wrapper">
                                <input
                                  type="text"
                                  class="form-control theme_input"
                                  name="widget_title_color"
                                  id="widget_title_color"
                                  value="000"
                                  autocomplete="off"
                                />
                              </div>
                            </b-col>
                          </b-row>
                        </div>
                      </b-col>
                    </b-row>
                    <div class="check_preview">
                      <h6 class="h6_title">Check Preview Here</h6>
                      <a href="JavaScript:void(0);" class="outline_btn">Preview</a>
                    </div>
                    <div class="emailWidgetsLayout">
                      <div class="panel">
                        <ul class="nav nav-tabs">
                          <li>
                            <a class="active" data-toggle="tab" href="#desktopView">
                              <i class="fa fa-desktop" aria-hidden="true"></i> Desktop
                            </a>
                          </li>
                          <li>
                            <a data-toggle="tab" href="#mobileView">
                              <i class="fa fa-mobile" aria-hidden="true"></i> Mobile
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content">
                          <!-- Deshktop View -->
                          <div id="desktopView" class="tab-pane fade in active">
                            <div class="panel solid_card">
                              <div class="title_block">
                                <h2 class="h2_title">New Arrivals</h2>
                              </div>
                              <div class="preview_in_con">
                                <b-row class="row">
                                  <b-col md="3">
                                    <div class="grid_con">
                                      <div class="ftb-image-section">
                                        <img
                                          :src="assetsURL +'app/images/thumbnails/moran.jpg'"
                                          alt="Image"
                                        />
                                      </div>
                                      <label class="cst_checkbox">
                                        Acoustic Guitar, 37 Inch Cutaway,
                                        025D
                                      </label>
                                      <div class="addtocart">
                                        <p class="alsobought-total">$80.00</p>
                                      </div>
                                      <div class="clearfix"></div>
                                      <button type="button" name="add" class="btn_dark">
                                        <span>
                                          Add
                                          to cart
                                        </span>
                                      </button>
                                    </div>
                                  </b-col>
                                  <b-col md="3">
                                    <div class="grid_con">
                                      <div class="ftb-image-section">
                                        <img
                                          :src="assetsURL +'app/images/thumbnails/steve-johnson.jpg'"
                                          alt="Image"
                                        />
                                      </div>
                                      <label class="cst_checkbox">
                                        Analog 18.36 cm X 36.83 cm Wall
                                        Clock
                                      </label>
                                      <div class="addtocart">
                                        <p class="alsobought-total">$60.00</p>
                                      </div>
                                      <div class="clearfix"></div>
                                      <button type="button" name="add" class="btn_dark">
                                        <span>
                                          Add
                                          to cart
                                        </span>
                                      </button>
                                    </div>
                                  </b-col>
                                  <b-col md="3">
                                    <div class="grid_con">
                                      <div class="ftb-image-section">
                                        <img
                                          :src="assetsURL +'app/images/thumbnails/francesca-tosolini.jpg'"
                                          alt="Image"
                                        />
                                      </div>
                                      <label class="cst_checkbox">Solid Wood Double Bed</label>
                                      <div class="addtocart">
                                        <p class="alsobought-total">$150.00</p>
                                      </div>
                                      <div class="clearfix"></div>
                                      <button type="button" name="add" class="btn_dark">
                                        <span>
                                          Add
                                          to cart
                                        </span>
                                      </button>
                                    </div>
                                  </b-col>
                                  <b-col md="3">
                                    <div class="grid_con">
                                      <div class="ftb-image-section">
                                        <img
                                          :src="assetsURL +'app/images/thumbnails/rich-smith.jpg'"
                                          alt="Image"
                                        />
                                      </div>
                                      <label class="cst_checkbox">Antique Light Bulb G28 TS43</label>
                                      <div class="addtocart">
                                        <p class="alsobought-total">$210.00</p>
                                      </div>
                                      <div class="clearfix"></div>
                                      <button type="button" name="add" class="btn_dark">
                                        <span>
                                          Add
                                          to cart
                                        </span>
                                      </button>
                                    </div>
                                  </b-col>
                                </b-row>
                              </div>
                            </div>
                          </div>
                          <!-- // Deshktop View -->
                          <!-- Mobile View -->
                          <div id="mobileView" class="tab-pane fade">
                            <div class="panel solid_card">
                              <div class="title_block">
                                <h2 class="h2_title">New Arrivals</h2>
                              </div>
                              <div class="preview_in_con">
                                <b-row>
                                  <b-col md="6">
                                    <div class="grid_con">
                                      <div class="ftb-image-section">
                                        <img
                                          :src="assetsURL +'app/images/thumbnails/moran.jpg'"
                                          alt="Image"
                                        />
                                      </div>
                                      <label class="cst_checkbox">
                                        Acoustic Guitar, 37 Inch Cutaway,
                                        025D
                                      </label>
                                      <div class="addtocart">
                                        <p class="alsobought-total">$80.00</p>
                                      </div>
                                      <div class="clearfix"></div>
                                      <button type="button" name="add" class="btn_dark">
                                        <span>
                                          Add
                                          to cart
                                        </span>
                                      </button>
                                    </div>
                                  </b-col>
                                  <b-col md="6">
                                    <div class="grid_con">
                                      <div class="ftb-image-section">
                                        <img
                                          :src="assetsURL +'app/images/thumbnails/steve-johnson.jpg'"
                                          alt="Image"
                                        />
                                      </div>
                                      <label class="cst_checkbox">
                                        Analog 18.36 cm X 36.83 cm Wall
                                        Clock
                                      </label>
                                      <div class="addtocart">
                                        <p class="alsobought-total">$60.00</p>
                                      </div>
                                      <div class="clearfix"></div>
                                      <button type="button" name="add" class="btn_dark">
                                        <span>
                                          Add
                                          to cart
                                        </span>
                                      </button>
                                    </div>
                                  </b-col>
                                  <b-col md="6">
                                    <div class="grid_con">
                                      <div class="ftb-image-section">
                                        <img
                                          :src="assetsURL +'app/images/thumbnails/francesca-tosolini.jpg'"
                                          alt="Image"
                                        />
                                      </div>
                                      <label class="cst_checkbox">Solid Wood Double Bed</label>
                                      <div class="addtocart">
                                        <p class="alsobought-total">$150.00</p>
                                      </div>
                                      <div class="clearfix"></div>
                                      <button type="button" name="add" class="btn_dark">
                                        <span>
                                          Add
                                          to cart
                                        </span>
                                      </button>
                                    </div>
                                  </b-col>
                                  <b-col md="6">
                                    <div class="grid_con">
                                      <div class="ftb-image-section">
                                        <img
                                          :src="assetsURL +'app/images/thumbnails/rich-smith.jpg'"
                                          alt="Image"
                                        />
                                      </div>
                                      <label class="cst_checkbox">Antique Light Bulb G28 TS43</label>
                                      <div class="addtocart">
                                        <p class="alsobought-total">$210.00</p>
                                      </div>
                                      <div class="clearfix"></div>
                                      <button type="button" name="add" class="btn_dark">
                                        <span>
                                          Add
                                          to cart
                                        </span>
                                      </button>
                                    </div>
                                  </b-col>
                                </b-row>
                              </div>
                            </div>
                          </div>
                          <!-- // Mobile View -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- //  Visual Settings -->
                  <!-- overview tab -->
                  <div id="overview" class="tab-pane fade">
                    <section class="setpflow-4">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="flow4-1">
                            <div class="form-group">
                              <h6 class="h6_title">Name for this Campaign</h6>
                              <input type="text" class="form-control theme_input" />
                            </div>
                            <div class="form-group">
                              <h6 class="h6_title">HTML Code</h6>
                              <textarea
                                class="form-control theme_input"
                                rows="15"
                                id="html_code"
                                placeholder
                              ></textarea>
                            </div>
                            <div class="flow4-1-btn">
                              <button type="text" class="btn_default_cst">Copy to Clipboardy</button>
                              <button type="text" class="btn_default_cst">Download HTML</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="flow4-2">
                            <div class="form-group">
                              <h5 class="h6_title">Summary</h5>
                              <ul class="code_btn">
                                <li>
                                  <a class="btn bn_star" href="#">Widget name</a>
                                </li>
                                <li>
                                  <a class="btn bn_star" href="#">NEW ARRIVALS</a>
                                </li>
                                <li>
                                  <a class="btn bn_star" href="#">Email type</a>
                                </li>
                                <li>
                                  <a class="btn bn_star" href="#">MAILCHIMP</a>
                                </li>
                              </ul>
                            </div>
                            <div class="form-group">
                              <h5 class="h6_title">What's next?</h5>
                              <p>
                                Copy the code snippet, save this campaign, and include the snippet into
                                your email template such as a newsletter.
                              </p>
                            </div>
                            <div class="btn_watch">
                              <button
                                type="text"
                                class="btn_default_cst"
                                data-toggle="modal"
                                data-target="#watchVideo"
                              >
                                <i class="fa fa-play" aria-hidden="true"></i> Watch an example video
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <!-- // overview tab -->
                </div>
              </div>
            </b-col>
          </b-row>
        </div>
      </div>
    </main>
    <section class="modal fade" id="watchVideo" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <iframe
              width="100%"
              height="315"
              src="https://www.youtube.com/embed/eeCsg_lMDJg?rel=0"
              frameborder="0"
              allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
              id="watch_use_frame"
            ></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="primary_btn" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </section>
  </div>
</template> 
<script>
import config from "../../../config";
export default {
  data() {
    return {
      assetsURL: "",
    };
  },
  created() {
    this.assetsURL = config.ASSET_URL_PREFIX;
  },
};
</script>

<style>
</style>