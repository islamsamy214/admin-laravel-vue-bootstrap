<template>
    <div>
        <loading-ui v-if="isLoading"></loading-ui>
        <create-form
            :errors="errors"
            :isLoading="isLoading"
            :teams="teams"
            @submitRound="submitRound"
            v-else
        ></create-form>
    </div>
</template>

<script>
import LoadingUi from "../../../../components/user-interface/LoadingUi.vue";
import CreateForm from "./CreateForm.vue";
export default {
    components: { CreateForm, LoadingUi },
    data() {
        return {
            errors: null,
            teams : null,
            isLoading: false,
        };
    }, //end of data

    methods: {
        submitRound(formData) {
            this.isLoading = true;
            axios
                .post("/api/admin/rounds", formData)
                .then((response) => {
                    if (response.status == 200) {
                        new Noty({
                            type: "success",
                            layout: "topRight",
                            timeout: "2000",
                            text: response.data,
                        }).show();
                        this.$router.push({
                            name: "admin.rounds",
                        });
                    }
                })
                .catch((errors) => {
                    this.errors = errors.response.data.errors;
                })
                .then(() => {
                    this.isLoading = false;
                });
        }, //end of submtting the form
    }, //end of mehtods

    created() {
        this.isLoading = true;
        axios
            .get("/api/admin/rounds/create")
            .then((response) => {
                this.teams = response.data.teams;


            })
            .then(() => {
                this.isLoading = false;
            });
    }, // end of created
};
</script>
