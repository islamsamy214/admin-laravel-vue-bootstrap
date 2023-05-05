<template>
    <form class="row" @submit.prevent="submitSearchData">
        <div class="form-group col-md-6 col-sm-12">
            <input
                type="text"
                class="form-control"
                name="search"
                v-model="search"
                aria-describedby="searchHelp"
                placeholder="Search"
            />
            <small
                id="searchHelp"
                v-if="isEmpty"
                class="form-text text-muted alert alert-danger"
                >There is no data you can search for empty to back to home or
                search for something could be really here</small
            >
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <button type="submit" class="btn btn-primary mr-1">Submit</button>
            <router-link
                :to="{ name: 'admin.roles.create' }"
                class="btn btn-success mr-1"
                >Add Role</router-link
            >
            <button class="btn btn-dark" @click.prevent="flushAll">
                Flush All Rates
            </button>
        </div>
    </form>
</template>

<script>
export default {
    props: ["isEmpty"],
    emits: ["submitSearch"],
    data() {
        return {
            searchError: false,
            search: null,
        };
    },
    methods: {
        submitSearchData() {
            this.$emit("submitSearch", this.search);
        },
        flushAll() {
            let __this = this;
            var flushConfirmation = new Noty({
                layout: "center",
                killer: true,
                progressBar: false,
                modal: true,
                text: "Confirm Flush ?",
                buttons: [
                    Noty.button(
                        "YES",
                        "btn btn-danger",
                        function () {
                            flushRole();
                        },
                        { id: "yes", "data-status": "ok" }
                    ),

                    Noty.button("NO", "btn btn-error", function () {
                        flushConfirmation.close();
                    }),
                ],
            }).show(); //end of delete confirmation

            function flushRole() {
                axios
                    .get(`/api/admin/roles/flush`)
                    .then((response) => {
                        if (response.status == 200) {
                            flushConfirmation.close();
                            new Noty({
                                layout: "topRight",
                                text: "Roles Flushed Successfully",
                                type: "success",
                                timeout: 2000,
                            }).show();
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    }); //end of api req
            } // end of flushrole func
        },
    },
};
</script>
