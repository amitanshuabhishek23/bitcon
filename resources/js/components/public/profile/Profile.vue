<template>
  <div>
    <main class="app-content">
      <section class="profile_block">
        <div class="row">
          <div class="col-md-12">
            <div class="card__panel profile_content rp_profile_box_wrapper">
              <div class="card-header">
                <h5 class="h5_title">Profile</h5>
              </div>
              <b-card-body>
                <div v-if="!isLoader" class="rp_profile_cont_main">
                  <div class="rp_profile_name_circle">
                    <p>{{ initials(profileData.store_name) }}</p>
                  </div>
                  <div class="rp_profile_ele">
                    <b-row>
                      <b-col lg="6">
                        <div class="rp_profile_cont">
                          <label>Shop Owner</label>
                          <p>{{ profileData.shop_owner }}</p>
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="rp_profile_cont">
                          <label>Store Name</label>
                          <p>{{ profileData.store_name }}</p>
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="rp_profile_cont">
                          <label>Store Url</label>
                          <p>{{ profileData.store_url }}</p>
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="rp_profile_cont">
                          <label>Email</label>
                          <p>{{ profileData.email }}</p>
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="rp_profile_cont">
                          <label>Country Name</label>
                          <p>{{ profileData.country_name }}</p>
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="rp_profile_cont">
                          <label>Province</label>
                          <p>{{ profileData.province }}</p>
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="rp_profile_cont margin-rp">
                          <label>City</label>
                          <p>{{ profileData.city }}</p>
                        </div>
                      </b-col>
                      <b-col lg="6">
                        <div class="rp_profile_cont margin-rp">
                          <label>zip</label>
                          <p>{{ profileData.zip }}</p>
                        </div>
                      </b-col>
                    </b-row>
                  </div>
                </div>
                <div v-if="isLoader" class="prof_chart_loader">
                  <div class="d-flex justify-content-center mb-3">
                    <b-spinner label="Loading..."></b-spinner>
                  </div>
                </div>
              </b-card-body>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- // App Content Start -->
  </div>
</template>
<script>
export default {
  components: {},
  data() {
    return {
      currentStore: "",
      profileData: "",
      isLoader: "",
    };
  },
  mounted() {
    if (localStorage) {
      this.currentStore = JSON.parse(localStorage.getItem("pzs_current_Store"));
      // this.profileData = JSON.parse(localStorage.getItem("pzs_current_Store"));
    }
    this.getProfileData();
  },
  methods: {
    getProfileData() {
      this.isLoader = true;
      // let item = {
      //   storeAccessToken: this.currentStore.storeAccessToken,
      // };
      this.$store
        .dispatch("getStore", this.currentStore.store_id)
        .then((res) => {
          this.isLoader = false;
          if (res && res.status === true) {
            this.profileData = res.data;
          }
        })
        .catch((e) => {
          this.isLoader = false;
          console.log(e);
        });
    },
    initials(fullName) {
      try {
        let iniName = fullName.charAt(0);
        return iniName;
      } catch (e) {}
    },
  },
};
</script>
