require("./bootstrap");

import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes/router.js";
import store from "./store/index";
<<<<<<< HEAD
import { Icon } from '@iconify/vue';
=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

import PageHeader from "./components/user-interface/admin-ui/PageHeader.vue";
import LoadingUi from "./components/user-interface/LoadingUi.vue";
import SectionHeader from "./components/user-interface/admin-ui/SectionHeader.vue";

const app = createApp(App);
app.use(router);
app.use(store);

app.component("page-header", PageHeader);
app.component("loading-ui", LoadingUi);
app.component("section-header", SectionHeader);
<<<<<<< HEAD
app.component('Icon', Icon);
=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

app.mount("#app");

// //to solve pushing problem for vue router 3
// const originalPush = VueRouter.prototype.push;
// // Rewrite the push method on the prototype and handle the error message uniformly
// VueRouter.prototype.push = function push(location) {
//     return originalPush.call(this, location).catch(err => err);
// };
