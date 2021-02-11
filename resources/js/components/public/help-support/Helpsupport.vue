<template>
  <div>
    <main class="app-content">
      <title-mob />
      <section class="helpsupports">
        <b-row>
          <b-col xl="12">
            <b-card no-body class="card__panel">
              <b-card-header class="card__header">
                <h5 class="h5_title">How To Setup</h5>
              </b-card-header>
              <b-card-body>
                <b-row>
                  <b-col xl="6">
                    <div class="help_content">
                      <p>
                        The app automatically set up on your store, you don't need to do
                        any extra coding part.
                      </p>
                      <p>You just need to enable or disable them according to you.</p>
                      <p>
                        If you have changed the theme then you have to install snippet in
                        your new theme, Go to more section from the app >> Install >>
                        Choose your new theme and submit.
                      </p>
                    </div>
                    <div class="help_content">
                      <h6 class="h6_title">How to move the widgets?</h6>
                      <p>
                        hubifyapps has different snippet for each widget, you can change
                        the place of the widget on your site by moving the snippet in the
                        respective file.
                      </p>
                      <p>
                        Below are the snippet of each widget which will help you to
                        identify it in the file.
                      </p>
                      <!-- <div class="helpsup_tbl table-resposnive">
                                    <table class="table border table-hover">
                                        <tbody>
                                            <tr>
                                                <td>Trending Products Snippet</td>
                                                <td>{% include 'wiser_trending' %}</td>
                                            </tr>
                                            <tr>
                                                <td>Recently Viewed Snippet</td>
                                                <td>{% include 'wiser_recentview' %}</td>
                                            </tr>
                                            <tr>
                                                <td>New Arrivals Snippet</td>
                                                <td>{% include 'wiser_newarrivals' %}</td>
                                            </tr>
                                            <tr>
                                                <td>Featured Products Snippet</td>
                                                <td>{% include 'wiser_featured' %}</td>
                                            </tr>
                                            <tr>
                                                <td>Top Selling Product Snippet</td>
                                                <td>{% include 'wiser_topselling' %}</td>
                                            </tr>
                                            <tr>
                                                <td>Related Product Snippet </td>
                                                <td>{% include 'wiser_related' %}</td>
                                            </tr>
                                            <tr>
                                                <td>Recommended Product Snippett</td>
                                                <td>{% include 'wiser_recommended' %}</td>
                                            </tr>
                                            <tr>
                                                <td>Also Bought Snippet</td>
                                                <td>{% include 'wiser_alsobought' %}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->
                    </div>
                  </b-col>
                  <b-col xl="6">
                    <div class="help_content">
                      <h6 class="h6_title">
                        Install Widgets on any other pages or blog post of your site.
                      </h6>
                      <p>
                        Just copy the below snippets of the widgets which you want to show
                        and paste it on the respective page.
                      </p>
                      <!-- <div class="helpsup_tbl table-resposnive">
                                    <table class="table border table-hover">
                                        <tbody>
                                            <tr>
                                                <td>Trending Products Snippet</td>
                                                <td>{% include 'wiser_trending' %}</td>
                                            </tr>
                                            <tr>
                                                <td>Recently Viewed Snippet</td>
                                                <td>{% include 'wiser_recentview' %}</td>
                                            </tr>
                                            <tr>
                                                <td>New Arrivals Snippet</td>
                                                <td>{% include 'wiser_newarrivals' %}</td>
                                            </tr>
                                            <tr>
                                                <td>Featured Products Snippet</td>
                                                <td>{% include 'wiser_featured' %}</td>
                                            </tr>
                                            <tr>
                                                <td>Top Selling Product Snippet</td>
                                                <td>{% include 'wiser_topselling' %}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->
                    </div>
                  </b-col>
                </b-row>
              </b-card-body>
            </b-card>
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
};
</script>
