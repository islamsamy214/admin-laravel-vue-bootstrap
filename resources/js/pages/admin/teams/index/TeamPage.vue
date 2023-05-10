<template>
    <loading-ui v-if="pageLoading"></loading-ui>
    <div v-else>
        <page-header>Teams</page-header>
        <div class="row">
            <team-search
                @submitSearch="submitSearch"
                :isEmpty="isEmpty"
                class="col-md-6 col-sm-12"
            ></team-search>
            <team-paginator
                :pages="pages"
                :currentPage="currentPage"
                :total="total"
                @fill="fill"
                class="col-md-6 col-sm-12"
            ></team-paginator>
        </div>
        <team-list
            :teams="teams"
            :pageLoading="pageLoading"
            @teamDeleted="teamDeleted"
        ></team-list>
    </div>
</template>

<script>
import TeamList from "./TeamList.vue";
import TeamPaginator from "./TeamPaginator.vue";
import TeamSearch from "./TeamSearch.vue";

export default {
    components: { TeamList, TeamPaginator, TeamSearch },
    data() {
        return {
            teams: [],
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
        // start of filling the teams
        fillTeams(response) {
            this.teams = response.data.data;
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
        //end of filling the teams

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
            let URL = "/api/admin/teams?page=" + page;

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
                    this.fillTeams(response);
                    this.fillPaginator(response);
                })
                .then(() => {
                    this.pageLoading = false;
                })
                .catch((errors) => {
                    this.error = errors.response.data;
                }); //end of axios request
        }, //end of fill function

        //delete team
        teamDeleted(id) {
            this.teams = this.teams.filter((team) => team.id != id);
            this.total--;
        },
    },
    created() {
        this.fill();
    },
};
</script>
