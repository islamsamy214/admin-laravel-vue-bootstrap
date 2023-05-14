require("./bootstrap");

import { createApp } from "vue";
import { createI18n } from "vue-i18n";
import App from "./App.vue";
import router from "./routes/router.js";
import store from "./store/index";
import { Icon } from "@iconify/vue";
import messages from "./lang/locale.js";

import PageHeader from "./components/user-interface/admin-ui/PageHeader.vue";
import LoadingUi from "./components/user-interface/LoadingUi.vue";
import SectionHeader from "./components/user-interface/admin-ui/SectionHeader.vue";
const app = createApp(App);
const i18n = createI18n({
    locale: store.state.locale,
    messages: messages,
});

app.use(router);
app.use(store);
app.use(i18n);

app.component("page-header", PageHeader);
app.component("loading-ui", LoadingUi);
app.component("section-header", SectionHeader);
app.component("Icon", Icon);

app.mount("#app");
