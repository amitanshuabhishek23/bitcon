<template>
  <div>
    <div class="pre_loader">
      <div class="spinner-border spinner-border-sm btn-spinner">
        <span class="sr-only">Loading...</span>
        <!-- Please wait.. -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentStore: "",
    };
  },
  mounted() {
    if (
      localStorage.getItem("pzs_current_Store") &&
      localStorage.getItem("pzs_access_token")
    ) {
      const currentStore = JSON.parse(
        window.localStorage.getItem("pzs_current_Store")
      );
      if (currentStore.shop_domain == this.$route.query.store_url) {
        this.$router.push("/dashboard");
      } else {
        localStorage.removeItem("pzs_current_Store");
        localStorage.removeItem("pzs_access_token");
        this.verifyShop();
      }
    } else {
      this.verifyShop();
    }
  },

  methods: {
    verifyShop() {
      let item = {
        password: this.$route.query.store_id,
        email: this.$route.query.store_url,
        super_admin: this.$route.query.super_admin,
      };
      this.$store
        .dispatch("login", item)
        .then((res) => {
          if (res.status === true) {
            localStorage.setItem("pzs_current_Store", JSON.stringify(res.data));
            localStorage.setItem("pzs_access_token", JSON.stringify(res.token));
            document.body.classList.remove("dark-themes");
            document.body.classList.remove("light-themes");
            document.body.classList.add(res.data.app_theme + "-themes");
            console.log(res.data);
            if (res.data.current_step === 1) {
              this.$router.push("/welcome");
            } else if (res.data.current_step === 2) {
              this.$router.push("/dashboard");
            } /*else if (res.data.current_step === 3) {
              this.$router.push("/getready");
            } else if (res.data.current_step === 4) {
              this.$router.push("/dashboard");
            }*/
          }
        })
        .catch((e) => console.log(e));
    },
  },
};
</script>

<style></style>
