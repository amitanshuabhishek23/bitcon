<template>
  <div>
    <main class="app-content">
      <section class="uninstall">
        <b-row>
          <b-col xl="10" offset-xl="1">
            <div class="unstall_content">
              <b-card no-body class="card__panel">
                <b-card-header class="card__header">
                  <h5
                    class="h5_title"
                  >Install Snippet File In Your New Theme, If You Have Changed The Theme.</h5>
                </b-card-header>
                <b-card-body>
                  <b-card-text>Please be sure to choose the new Updated theme in the dropdown to automatically insert a snippet file in to the new theme.</b-card-text>
                  <b-form>
                    <div class="offer_group">
                      <select class="form-control">
                        <option value>Choose one</option>
                        <option value>Debut</option>
                        <option value>Debut_backinstock</option>
                        <option value>Debut_1</option>
                        <option value>Debut_wiser</option>
                      </select>
                      <button class="install_btn primary_btn">Submit</button>
                    </div>
                  </b-form>
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
export default {};
</script>

<style>
</style>