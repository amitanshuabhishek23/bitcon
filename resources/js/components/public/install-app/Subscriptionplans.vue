<template>
<div>
    <main class="app-content">
        <title-mob />
        <section class="subplans_mod">
            <b-row>
                <b-col lg="12">
                    <div class="sub_plans text-center">
                        <h5 class="h3_title">Subscription Plans</h5>
                    </div>
                </b-col>
                <b-col lg="12" xl="4">
                    <b-card no-body class="subplan_item">
                        <div class="subplan_header">
                            <div class="subplan_img">
                                <b-img src="app/images/icons/subscription_icn.svg" alt="Plain"></b-img>
                            </div>
                        </div>
                        <div class="subplan_title">
                            <h5 class="h5_title">Basic</h5>
                        </div>
                        <div class="subplan_price">
                            <div class="subplan_doller">
                                <sup>$</sup> 15
                            </div>
                        </div>
                        <ul>
                            <li>Plan Validity - 1 Month</li>
                            <li>Monthly Downloads</li>
                            <li>Streaming - Unlimited</li>
                        </ul>
                        <div class="btn_subPlan">
                            <button class="primary_btn">Buy Now</button>
                        </div>
                    </b-card>
                </b-col>
                <b-col lg="12" xl="4">
                    <b-card no-body class="subplan_item plan_Isactive">
                        <div class="subplan_header">
                            <div class="subplan_img">
                                <b-img src="app/images/icons/subscription_icn.svg" alt="Plain"></b-img>
                            </div>
                        </div>
                        <div class="subplan_title">
                            <h5 class="h5_title">Professional</h5>
                        </div>
                        <div class="subplan_price">
                            <div class="subplan_doller">
                                <sup>$</sup> 50
                            </div>
                        </div>
                        <ul>
                            <li>Plan Validity - 1 Month</li>
                            <li>Monthly Downloads</li>
                            <li>Streaming - Unlimited</li>
                        </ul>
                        <div class="btn_subPlan">
                            <button class="primary_btn">Buy Now</button>
                        </div>
                    </b-card>
                </b-col>
                <b-col lg="12" xl="4">
                    <b-card no-body class="subplan_item">
                        <div class="subplan_header">
                            <div class="subplan_img">
                                <b-img src="app/images/icons/subscription_icn.svg" alt="Plain"></b-img>
                            </div>
                        </div>
                        <div class="subplan_title">
                            <h5 class="h5_title">Standard</h5>
                        </div>
                        <div class="subplan_price">
                            <div class="subplan_doller">
                                <sup>$</sup> 80
                            </div>
                        </div>
                        <ul>
                            <li>Plan Validity - 1 Month</li>
                            <li>Monthly Downloads</li>
                            <li>Streaming - Unlimited</li>
                        </ul>
                        <div class="btn_subPlan">
                            <button class="primary_btn">Buy Now</button>
                        </div>
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
