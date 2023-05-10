//dashboard imports
import DashboardPage from "./../pages/admin/dashboard/DashboardPage.vue";
//user imports
import UserPage from "./../pages/admin/users/index/UserPage.vue";
import CreateUser from "./../pages/admin/users/create/CreateUser.vue";
import EditUser from "./../pages/admin/users/edit/EditUser.vue";
// settings imports
import SettingPage from "./../pages/admin/settings/SettingPage.vue";
<<<<<<< HEAD
// team imports
import TeamPage from "./../pages/admin/teams/index/TeamPage.vue";
import CreateTeam from "./../pages/admin/teams/create/CreateTeam.vue";
import EditTeam from "./../pages/admin/teams/edit/EditTeam.vue";
// role imports
import RolePage from "./../pages/admin/roles/index/RolePage.vue";
import CreateRole from "./../pages/admin/roles/create/CreateRole.vue";
import EditRole from "./../pages/admin/roles/edit/EditRole.vue";
// round imports
import RoundPage from "./../pages/admin/rounds/index/RoundPage.vue";
import CreateRound from "./../pages/admin/rounds/create/CreateRound.vue";
import EditRound from "./../pages/admin/rounds/edit/EditRound.vue";


=======
// home page imports
import HomePage from "./../pages/admin/home/HomePage.vue";
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

const admin = [
    ////////////////////////////////// admin routes ////////////////////////////
    //dashboard
    {
        name: "admin.dashboard",
        path: "dashboard",
<<<<<<< HEAD
        component: DashboardPage,
=======
        component: DashboardPage
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
    },
    // users
    {
        name: "admin.users",
        path: "users",
        component: UserPage,
<<<<<<< HEAD
        props: true,
=======
        props: true
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
    },
    {
        name: "admin.users.create",
        path: "users/add",
        component: CreateUser,
<<<<<<< HEAD
        props: true,
=======
        props: true
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
    },
    {
        name: "admin.users.edit",
        path: "users/edit",
        component: EditUser,
<<<<<<< HEAD
        props: true,
=======
        props: true
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
    },
    //settings
    {
        name: "admin.settings",
        path: "settings",
        component: SettingPage,
    },
<<<<<<< HEAD
    // teams
    {
        name: "admin.teams",
        path: "teams",
        component: TeamPage,
        props: true,
    },
    {
        name: "admin.teams.create",
        path: "teams/add",
        component: CreateTeam,
        props: true,
    },
    {
        name: "admin.teams.edit",
        path: "teams/edit",
        component: EditTeam,
        props: true,
    },
    // roles
    {
        name: "admin.roles",
        path: "roles",
        component: RolePage,
        props: true,
    },
    {
        name: "admin.roles.create",
        path: "roles/add",
        component: CreateRole,
        props: true,
    },
    {
        name: "admin.roles.edit",
        path: "roles/edit",
        component: EditRole,
        props: true,
    },
    //rounds
    {
        name: "admin.rounds",
        path: "rounds",
        component: RoundPage,
        props: true,
    },
    {
        name: "admin.rounds.create",
        path: "rounds/add",
        component: CreateRound,
        props: true,
    },
    {
        name: "admin.rounds.edit",
        path: "rounds/edit",
        component: EditRound,
        props: true,
    },


=======
    //home page
    {
        name: "admin.home",
        path: "home",
        component: HomePage,
    }
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
];

export default admin;
