//dashboard imports
import DashboardPage from "./../pages/admin/dashboard/DashboardPage.vue";
//user imports
import UserPage from "./../pages/admin/users/index/UserPage.vue";
import CreateUser from "./../pages/admin/users/create/CreateUser.vue";
import EditUser from "./../pages/admin/users/edit/EditUser.vue";
// settings imports
import SettingPage from "./../pages/admin/settings/SettingPage.vue";

import TeamPage from "./../pages/admin/teams/index/TeamPage.vue";
import CreateTeam from "../pages/admin/teams/create/CreateTeam.vue";

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
    // teams
    {
        name: "admin.teams",
        path: "teams",
        component: TeamPage,
    },
    {
        name: "admin.teams.create",
        path: "teams/add",
        component: CreateTeam,
        props: true
    },
];

export default admin;
