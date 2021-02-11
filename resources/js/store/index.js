import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
// Vue.use(axios);

// axios.interceptors.response.use(
//     function (response) {
//         return response;
//     },
//     function (err) {
//         if (typeof err.response !== "undefined") {
//             if (
//                 typeof err.response.status !== "undefined" &&
//                 err.response.status == 401 &&
//                 err.response.data.message == "Unauthenticated."
//             ) {
//                 var url = "https://" + this.currentStore.StoreName + "/admin";
//                 localStorage.clear();
//                 window.location.href = url;
//                 // alert("Your session has been expired please login..");
//                 // window.location.href = "/godoexp_laravel_vuejs/";
//             }
//         }
//     }
// );

//All Mutations
import * as commosMutations from "./mutations/commonMutations";
const mutations = Object.assign({}, commosMutations.default);

//All Actions
import * as commonActions from "./actions/commonActions";
const actions = Object.assign({}, commonActions.default);

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        data: {
            currentCustomSpend: [],
        }
    },
    mutations,
    actions
});

export default store;
