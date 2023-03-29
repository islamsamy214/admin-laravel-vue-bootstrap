//dashboard imports
import DashboardPage from "./../pages/admin/dashboard/DashboardPage.vue";
//user imports
import UserPage from "./../pages/admin/users/index/UserPage.vue";
import CreateUser from "./../pages/admin/users/create/CreateUser.vue";
import EditUser from "./../pages/admin/users/edit/EditUser.vue";
// settings imports
import SettingPage from "./../pages/admin/settings/SettingPage.vue";
// home page imports
import HomePage from "./../pages/admin/home/HomePage.vue";

const admin = [
    ////////////////////////////////// admin routes ////////////////////////////
    //dashboard
    {
        name: "admin.dashboard",
        path: "dashboard",
        component: DashboardPage
    },
    // users
    {
        name: "admin.users",
        path: "users",
        component: UserPage,
        props: true
    },
    {
        name: "admin.users.create",
        path: "users/add",
        component: CreateUser,
        props: true
    },
    {
        name: "admin.users.edit",
        path: "users/edit",
        component: EditUser,
        props: true
    },
    //settings
    {
        name: "admin.settings",
        path: "settings",
        component: SettingPage,
    },
    //home page
    {
        name: "admin.home",
        path: "home",
        component: HomePage,
    }
];

export default admin;
