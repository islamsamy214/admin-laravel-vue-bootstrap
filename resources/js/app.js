require("./bootstrap");

import { createApp } from "vue";
import App from "./App.vue";
// router imports
import router from "./routes/router.js";
// vuex imports
import store from "./store/index";
// iconify imports
import { Icon } from "@iconify/vue";
// locale imports
import { createI18n } from "vue-i18n";
import messages from "./lang/locale.js";
// PrimeVue imports 
import PrimeVue from 'primevue/config';
import Editor from 'primevue/editor';
// custom components
import PageHeader from "./components/user-interface/admin-ui/PageHeader.vue";
import LoadingUi from "./components/user-interface/LoadingUi.vue";
import SectionHeader from "./components/user-interface/admin-ui/SectionHeader.vue";

const app = createApp(App);
// router setup
app.use(router);
// veux setup
app.use(store);
// locale setup
const i18n = createI18n({
    locale: store.state.locale,
    messages: messages,
});
app.use(i18n);
// PrimeVue setup
app.use(PrimeVue, { ripple: true });
// Iconify components
app.component("Icon", Icon);
// PrimeVue components
app.component("Editor", Editor);
// custom components
app.component("page-header", PageHeader);
app.component("loading-ui", LoadingUi);
app.component("section-header", SectionHeader);

// styles-imports
import "./assets/styles-imports.js";

// mount app
app.mount("#app");