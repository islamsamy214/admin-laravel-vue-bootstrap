<template>
    <loading-ui v-if="pageLoading"></loading-ui>
    <div v-else>
        <page-header>Roles</page-header>
        <div class="row">
            <role-search
                @submitSearch="submitSearch"
                :isEmpty="isEmpty"
                class="col-md-6 col-sm-12"
            ></role-search>
            <role-paginator
                :pages="pages"
                :currentPage="currentPage"
                :total="total"
                @fill="fill"
                class="col-md-6 col-sm-12"
            ></role-paginator>
        </div>
        <role-list
            :roles="roles"
            :pageLoading="pageLoading"
            @roleDeleted="roleDeleted"
        ></role-list>
    </div>
</template>

<script>
import RoleList from "./RoleList.vue";
import RolePaginator from "./RolePaginator.vue";
import RoleSearch from "./RoleSearch.vue";

export default {
    components: { RoleList, RolePaginator, RoleSearch },
    data() {
        return {
            roles: [],
            isEmpty: false,
            pageLoading: true,
            error: null,
            //pagination
            currentPage: null,
            pages: [],
            total: 0,
        };
    },
    methods: {
        // start of filling the roles
        fillRoles(response) {
            this.roles = response.data.data;
        },
        //pagination
        fillPaginator(response) {
            this.pages = [];
            for (
                let resPage = 1;
                resPage <= response.data.last_page;
                resPage++
            ) {
                this.pages.push(resPage);
            }
            this.currentPage = response.data.current_page;
        },
        //end of filling the roles

        //start of search
        submitSearch(search) {
            this.search = search;
            this.fill();
        },
        fillSearch(URL) {
            return URL + "&search=" + this.search;
        },
        //end of search

        getUrl(page) {
            typeof page === "undefined" ? (page = 1) : page;
            let URL = "/api/admin/roles?page=" + page;

            //search section
            if (this.search) {
                URL = this.fillSearch(URL);
            }

            return URL;
        }, //end of stablish the URL

        fill(page) {
            this.pageLoading = true;

            let URL = this.getUrl(page);
            axios
                .get(URL)
                .then((response) => {
                    response.data.total == 0
                        ? (this.isEmpty = true)
                        : (this.isEmpty = false);
                    this.total = response.data.total;
                    this.fillRoles(response);
                    this.fillPaginator(response);
                })
                .then(() => {
                    this.pageLoading = false;
                })
                .catch((errors) => {
                    this.error = errors.response.data;
                }); //end of axios request
        }, //end of fill function

        //delete role
        roleDeleted(id) {
            this.roles = this.roles.filter((role) => role.id != id);
            this.total--;
        },
    },
    created() {
        this.fill();
    },
};
</script>
