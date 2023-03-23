require("./bootstrap");

import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes/router.js";
import store from "./store/index";

import PageHeader from './components/user-interface/admin-ui/PageHeader.vue'
import LoadingUi from './components/user-interface/LoadingUi.vue';

const app = createApp(App);
app.use(router);
app.use(store);

app.component("page-header", PageHeader);
app.component("loading-ui",LoadingUi);

app.mount("#app");

// //to solve pushing problem for vue router 3
// const originalPush = VueRouter.prototype.push;
// // Rewrite the push method on the prototype and handle the error message uniformly
// VueRouter.prototype.push = function push(location) {
//     return originalPush.call(this, location).catch(err => err);
// };