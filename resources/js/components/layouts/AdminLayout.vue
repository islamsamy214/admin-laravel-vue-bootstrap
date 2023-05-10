<template>
<<<<<<< HEAD
    <div>
        <!-- <admin-navbar></admin-navbar> -->
        <div class="container-fluid">
            <div class="row" id="main">
                <nav
                    id="sidebarMenu"
                    class="col-md-3 col-lg-2 d-md-block sidebar collapse"
                >
                    <side-bar></side-bar>
                </nav>
                <main
                    role="main"
                    class="col-md-9 ml-sm-auto col-lg-10 px-md-4 d-flex flex-column justify-content-between"
                >
                    <router-view></router-view>
                    <admin-footer></admin-footer>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
// import AdminNavbar from "./../navbars/AdminNavbar.vue";
=======
  <div>
    <admin-navbar></admin-navbar>
    <div class="container-fluid">
      <div class="row">
        <nav
          id="sidebarMenu"
          class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
        >
          <side-bar></side-bar>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <router-view></router-view>
        </main>
      </div>
    </div>
    <admin-footer></admin-footer>
  </div>
</template>

<script>
import AdminNavbar from "./../navbars/AdminNavbar.vue";
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
import AdminFooter from "../user-interface/admin-ui/AdminFooter.vue";
import SideBar from "../user-interface/admin-ui/SideBar.vue";
import store from "../../store";

export default {
<<<<<<< HEAD
    components: {
        // AdminNavbar,
        AdminFooter,
        SideBar,
    }, //end of components

    async beforeRouteEnter(to, from, next) {
        // check if authnticated
        try {
            const user = (await axios.get("/api/admin/user")).data;
            store.commit("adminAuth/login", user);
            next();
        } catch (error) {
            if (error.response.status == 401) {
                next({ name: "admin.login" });
                // this.$router.push({ name: "admin-login" });
            }
        }
    },
};
</script>

<style scoped>
#sidebarMenu {
    background-color: #f2f2f2;
}
#main {
    min-height: 100vh;
}
</style>
=======
  components: {
    AdminNavbar,
    AdminFooter,
    SideBar,
  }, //end of components

  async beforeRouteEnter(to, from, next) {
    // check if authnticated
    try {
      const user = (await axios.get("/api/admin/user")).data;
      store.commit("adminAuth/login", user);
      next();
    } catch (error) {
      if (error.response.status == 401) {
        next({ name: "admin.login" });
        // this.$router.push({ name: "admin-login" });
      }
    }
  },
};
</script>
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
