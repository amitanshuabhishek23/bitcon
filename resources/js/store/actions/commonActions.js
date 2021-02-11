import Vue from "vue";
import axios from "axios";
// Vue.use(axios);

import config from "../../config";
import { post } from "jquery";

export default {
    login({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "login", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    logout({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "logout")
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    getWidgetsPageList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getWidgetsPageList", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getWidgetsList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getWidgetsList?store_id=" + payload.store_id + "&page_list_id=" + payload.page_list_id)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    updateWidgets({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "updateWidgets/" + payload.id, payload.data)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    getRelatedProductList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getRelatedProductList/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    addRelatedProductConditions({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "addRelatedProductConditions", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    getPreviewLink({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getPreviewLink/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getProductDropdownList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getProductDropdownList/" + payload.store_id + "?offset=" + payload.offset + "&search=" + payload.search)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getProductExcludedList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getProductExcludedList/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    addProductExcluded({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "addProductExcluded", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    deleteProductExcluded({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .delete(config.API_URL + "deleteProductExcluded/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    getManualMainProductDropdownList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getManualMainProductDropdownList/" + payload.store_id + "?offset=" + payload.offset + "&search=" + payload.search)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getManualProductDropdownList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getManualProductDropdownList/" + payload.store_id + "?offset=" + payload.offset + "&search=" + payload.search)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getManualMainProductList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getManualMainProductList/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getManualMainProduct({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getManualMainProduct/" + payload.product_id + '/' + payload.store_id)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    deleteManualProduct({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .delete(config.API_URL + "deleteManualProduct/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    deleteManualMainProduct({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .delete(config.API_URL + "deleteManualMainProduct/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    addManualMainProduct({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "addManualMainProduct", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    addManualMainProductList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "addManualMainProductList/" + payload.id, payload.data)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    getCustomeWidgetSettingList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getCustomeWidgetSettingList/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    updateCustomeWidgetSettingList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "updateCustomeWidgetSettingList/" + payload.store_id, payload.data)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getAppPublishTheme({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getAppPublishTheme/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    updateAppPublishTheme({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "updateAppPublishTheme", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    updateThemeStatus({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "updateThemeStatus", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getActiveWidgetsList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getActiveWidgetsList/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getAnalyticData({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getAnalyticData/" + payload.id + '?start_date=' + payload.startDate + '&end_date=' + payload.endDate)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getOrderList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getOrderList/" + payload.id + '?start_date=' + payload.startDate + '&end_date=' + payload.endDate + '&offset=' + payload.offset)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getOrder({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getOrder/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    topPerformingProducts({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "topPerformingProducts/" + payload.id + '?start_date=' + payload.startDate + '&end_date=' + payload.endDate)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    generatedSales({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "generatedSales/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    generatedSales({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "generatedSales/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    // getCountAddToCart({ commit, state }, payload) {
    //     return new Promise(function (resolve, reject) {
    //         axios
    //             .get(config.API_URL + "getCountAddToCart/" + payload.id + '?start_date=' + payload.startDate + '&end_date=' + payload.endDate)
    //             .then(function (response) {
    //                 return resolve(response.data);
    //             })
    //             .catch(function (error) {
    //                 return resolve(error.response);
    //             });
    //     });
    // },
    getSalesByPageWidgets({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getSalesByPageWidgets/" + payload.id + '?start_date=' + payload.startDate + '&end_date=' + payload.endDate)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getPublishTheme({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getPublishTheme/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    updateAppTheme({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "updateAppTheme", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    updateStep({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "updateStep", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getProductFromStore({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "getProductFromStore", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getStore({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getStore/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getPricePlansList({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getPricePlansList/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    getActivePricePlan({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getActivePricePlan/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    customeProductPreview({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "customeProductPreview", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    contactSupport({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "contactSupport", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });

    },
    getProfileDetails({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getProfileDetails/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    },
    appCodeCleanUp({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "appCodeCleanUp/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return resolve(error.response);
                });
        });
    }, 
    getRecommendedApps({commit, state}){
        return new Promise(function (resolve,reject){
           axios
           .get(config.API_URL + "recommendedapps?appNotShow=ZMF") 
           .then(function (response){
               return resolve(response.data);
           })
           .catch(function (error){
               return reject(error.response);
           });
        });
    },
    appStatusReview({commit, state},payload){
        return new Promise(function (resolve,reject){
           axios
           .get(config.API_URL + "appStatusReview/"+payload) 
           .then(function (response){
               return resolve(response.data);
           })
           .catch(function (error){
               return reject(error.response);
           });
        });
    },
};