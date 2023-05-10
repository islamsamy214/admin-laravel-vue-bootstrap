<template>
    <div>
        <loading-ui v-if="isLoading"></loading-ui>
        <edit-form
            v-else
            :oldName="oldName"
            :oldEmail="oldEmail"
            :oldType="oldType"
            :oldRole="oldRole"
            :oldTeam="oldTeam"
            :teams="teams"
            :roles="roles"
            :errors="errors"
            :isLoading="isLoading"
            @submitUser="submitUser"
        ></edit-form>
    </div>
</template>
<script>
import EditForm from "./EditForm.vue";

export default {
    components: { EditForm },

    data() {
        return {
            oldName: null,
            oldEmail: null,
            oldType: null,
            oldRole: null,
            oldTeam: null,
            teams: null,
            roles: null,
            errors: null,
            isLoading: false,
        };
    }, //end of data

    methods: {
        fill(id) {
            this.isLoading = true;
            axios
                .get(`/api/admin/users/${id}/edit`)
                .then((response) => {
                    this.oldName = response.data.user.name;
                    this.oldEmail = response.data.user.email;
                    this.oldType = response.data.user.type;
                    this.oldRole = response.data.user.role_id;
                    this.oldTeam = response.data.user.team_id;
                    this.teams = response.data.teams;
                    this.roles = response.data.roles;
                })
                .then(() => {
                    this.isLoading = false;
                })
                .catch((error) => {
                    console.log(error);
                });
        }, //end of fill data

        submitUser(formData) {
            this.isLoading = true;
            axios
                .post(`/api/admin/users/${this.$route.query.id}`, formData)
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
        if (this.$route.query.id == undefined) {
            this.$router.push({ name: "admin.users" });
        }
        this.fill(this.$route.query.id);
    }, //end of created
};
</script>
