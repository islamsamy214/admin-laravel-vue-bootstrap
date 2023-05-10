import { createRouter, createWebHistory } from "vue-router";

import WebLayout from "./../components/layouts/WebLayout.vue";
import AdminLayout from "./../components/layouts/AdminLayout.vue";
import LoginPage from "./../pages/admin/auth/LoginPage.vue";
import NotFound from "./../components/user-interface/NotFound.vue";

import web from "./web";
import admin from "./admin";

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: [
        {
            name: "web",
            path: "/",
            component: WebLayout,
            children: web,
<<<<<<< HEAD
            // redirect: { name: "admin.dashboard" }
            redirect: { name: "admin.teams" }
=======
            redirect: { name: "admin.dashboard" }
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
        },
        {
            name: "admin",
            path: "/admin",
            component: AdminLayout,
            children: admin,
<<<<<<< HEAD
            // redirect: { name: "admin.dashboard" }
            redirect: { name: "admin.teams" }
=======
            redirect: { name: "admin.dashboard" }
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
        },
        // admin auth
        {
            name: "admin.login",
            path: "/admin/login",
            component: LoginPage
        },
        //not founded pages
        {
            name: "notfound",
            path: "/:notfound(.*)",
            component:NotFound
        }
    ]
});

export default router;
