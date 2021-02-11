import axios from "axios";
import config from "./config";

axios.baseURL = config.API_URL;

const isHandlerEnabled = (config = {}) => {
    return config.hasOwnProperty("handlerEnabled") && !config.handlerEnabled
        ? false
        : true;
};

const requestHandler = request => {
    const currentStoreToken = JSON.parse(localStorage.getItem("pzs_access_token"));
    if (currentStoreToken) {
        if (isHandlerEnabled(request)) {
            request.headers["Authorization"] =
                "Bearer " + currentStoreToken;
        }
    }
    return request;
};

axios.interceptors.request.use(request => requestHandler(request));

axios.interceptors.response.use(
    response => successHandler(response),
    error => errorHandler(error)
);

const successHandler = response => {
    if (isHandlerEnabled(response)) {
        if (response.data.type === "success") {
            if (response.data.message) {
            }
        } else {
            if (response.data.message) {
            }
        }
    }
    return response;
};

const errorHandler = error => {
    if (isHandlerEnabled(error)) {
        if (typeof error.response !== "undefined") {
            if (error.response.status === 401) {
                // var url = "https://" + this.currentStore.StoreName + "/admin";
                // localStorage.clear();
                // window.location.href = url;
                localStorage.removeItem("pzs_current_Store")
                localStorage.removeItem("pzs_access_token")
                this.$router.push("/login");
            }
            // else if (error.response.status === 403) {
            //     var url = "https://" + this.currentStore.StoreName + "/admin";
            //     localStorage.clear();
            //     window.location.href = url;
            // }
        }
    }
};
