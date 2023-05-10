<template>
    <loading-ui v-if="isLoading"></loading-ui>
    <div v-else>
        <create-form
            :errors="errors"
            :isLoading="isLoading"
            :teams="teams"
            :roles="roles"
            @submitUser="submitUser"
        ></create-form>
    </div>
</template>

<script>
import CreateForm from "./CreateForm.vue";
export default {
    components: { CreateForm },
    data() {
        return {
            errors: null,
            isLoading: false,
            teams: null,    
            roles: null,
        };
    }, //end of data

    methods: {
        submitUser(formData) {
            this.isLoading = true;
            axios
                .post("/api/admin/users", formData)
                .then((response) => {
                    if (response.status == 200) {
                        new Noty({
                            type: "success",
                            layout: "topRight",
                            timeout: "2000",
                            text: response.data,
                        }).show();
                        this.$router.push({
                            name: "admin.users",
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
            .get("/api/admin/users/create")
            .then((response) => {
                this.teams = response.data.teams;
                this.roles = response.data.roles;
            })
            .then(() => {
                this.isLoading = false;
            });
    }, //end of created
};
</script>
