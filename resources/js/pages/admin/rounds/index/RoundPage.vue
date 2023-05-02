<template>
    <loading-ui v-if="pageLoading"></loading-ui>
    <div v-else>
        <page-header>Rounds</page-header>
        <div class="row">
            <round-search
                @submitSearch="submitSearch"
                :isEmpty="isEmpty"
                class="col-md-6 col-sm-12"
            ></round-search>
            <round-paginator
                :pages="pages"
                :currentPage="currentPage"
                :total="total"
                @fill="fill"
                class="col-md-6 col-sm-12"
            ></round-paginator>
        </div>
        <round-list
            :rounds="rounds"
            :pageLoading="pageLoading"
            @roundDeleted="roundDeleted"
        ></round-list>
    </div>
</template>

<script>
import RoundList from "./RoundList.vue";
import RoundPaginator from "./RoundPaginator.vue";
import RoundSearch from "./RoundSearch.vue";

export default {
    components: { RoundList, RoundPaginator, RoundSearch },
    data() {
        return {
            rounds: [],
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
        // start of filling the rounds
        fillRounds(response) {
            this.rounds = response.data.data;
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
        //end of filling the rounds

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
            let URL = "/api/admin/rounds?page=" + page;

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
                    this.fillRounds(response);
                    this.fillPaginator(response);
                })
                .then(() => {
                    this.pageLoading = false;
                })
                .catch((errors) => {
                    this.error = errors.response.data;
                }); //end of axios request
        }, //end of fill function

        //delete round
        roundDeleted(id) {
            this.rounds = this.rounds.filter((round) => round.id != id);
            this.total--;
        },
    },
    created() {
        this.fill();
    },
};
</script>
