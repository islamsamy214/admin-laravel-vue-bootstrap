import { createStore } from "vuex";

import actions from "./actions";
import getters from "./getters";
import mutations from "./mutations";
import adminAuth from "./auth/admin/index";
import webAuth from "./auth/web/index";

const store = createStore({
    namespaced: true,

    state() {
        return {};
    },
    modules: {
        adminAuth,
        webAuth,
    },
    mutations: mutations,
    actions: actions,
    getters: getters,
});

export default store;
