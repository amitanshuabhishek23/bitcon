<template>
  <div>
    <!-- App Content Start -->
    <main class="app-content">
      <title-mob />
      <section class="integration_themes">
        <b-row>
          <b-col lg="12"></b-col>
          <b-col lg="12">
            <div class="themes_mod">
              <b-card no-body class="card__panel">
                <b-card-header>
                  <h5 class="h5_title">Contact Form</h5>
                </b-card-header>
                <b-card-body>
                  <form @submit.prevent="send">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label_mod">
                            Name
                            <sub>*</sub>
                          </label>
                          <input
                            type="text"
                            class="form-control input_cst"
                            v-model="name"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label_mod">
                            Email
                            <sub>*</sub>
                          </label>
                          <input
                            type="email"
                            class="form-control input_cst"
                            v-model="email"
                          />
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label_mod">
                            Subject
                            <sub>*</sub>
                          </label>
                          <input
                            type="text"
                            class="form-control input_cst"
                            v-model="subject"
                          />
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label_mod">
                            Message
                            <sub>*</sub>
                          </label>
                          <textarea
                            class="form-control input_cst"
                            rows="3"
                            v-model="message"
                          ></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="contact_btn btn_align_loader">
                          <button v-if="!isLoader" type="submit" class="primary_btn">
                            Submit
                          </button>
                          <button
                            v-if="isLoader"
                            class="primary_btn loader-btn"
                            disabled
                          >
                            <div
                              class="spinner-border spinner-border-sm btn-spinner"
                              role="status"
                            >
                              <span class="sr-only">Loading...</span>
                            </div>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </b-card-body>
              </b-card>
            </div></b-col
          ></b-row
        >
      </section>
    </main>
    <!-- // App Content Start -->
  </div>
</template>
<script>
import TitleMob from "../common/DynamicTitle.vue";
export default {
  components: {
    "title-mob": TitleMob,
  },
  data() {
    return {
      name: "",
      email: "",
      subject: "",
      message: "",
      isLoader: false,
      currentStore: "",
    };
  },
  created() {
    if (localStorage) {
      this.currentStore = JSON.parse(localStorage.getItem("pzs_current_Store"));
    }
  },
  methods: {
    send() {
      this.isLoader = true;
      let item = {
        store_id: +this.currentStore.store_id,
        name: this.name,
        email: this.email,
        subject: this.subject,
        message: this.message,
      };
      this.$store
        .dispatch("contactSupport", item)
        .then((res) => {
          this.isLoader = false;
          if (res && res.status === true) {
            this.$toastr.s(res.message, "Success");
            this.name = "";
            this.email = "";
            this.subject = "";
            this.message = "";
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
