<template>
  <div>
    <main class="app-content">
      <section class="email_page">
        <b-row class="row">
          <b-col md="12">
            <div class="alert_blue">
              <div class="alert alert-info">
                <i class="fa fa-comments" aria-hidden="true"></i>Maximum 10 campaigns allowed.
              </div>
            </div>
          </b-col>
          <b-col md="12">
            <div class="create_campaign">
              <a href="/create-email" class="primary_btn">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>Create a Campaign
              </a>
            </div>
          </b-col>
          <b-col md="12">
            <div class="email_tbl">
              <b-card no-body class="card__panel">
                <div class="table-responsive">
                  <table id="emailTbl" class="table">
                    <thead>
                      <tr>
                        <th>S.no.</th>
                        <th>Campaign name</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Campaign 1</td>
                        <td>13,Oct 2020</td>
                        <td>
                          <div class="toggle_switch">
                            <div class="cst_switch_btn">
                              <input type="checkbox" hidden="hidden" id="relatedProducts" checked />
                              <label class="switch" for="relatedProducts"></label>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="btn_tbl">
                            <a href="#">
                              <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                            </a>
                            <a href="#">
                              <i class="fa fa-line-chart" aria-hidden="true"></i> Analytics
                            </a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="pagination_cst">
                  <ul class="pagination">
                    <div class="previous_stp disabled">
                      <a href="#">Prevoius</a>
                    </div>
                    <li class="active">
                      <a href="#">1</a>
                    </li>
                    <li>
                      <a href="#">2</a>
                    </li>
                    <li>
                      <a href="#">3</a>
                    </li>
                    <div class="next_stp disabled">
                      <a href="#">Next</a>
                    </div>
                  </ul>
                </div>
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