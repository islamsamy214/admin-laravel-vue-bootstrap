<template>
  <div>
    <loading-ui v-if="pageLoading"></loading-ui>
    <edit-form
      v-else
      :oldName="oldName"
      :oldEmail="oldEmail"
      :errors="errors"
      :isLoading="isLoading"
      @submitTeam="submitTeam"
    ></edit-form>
  </div>
</template>
<script>
import EditForm from "./EditForm.vue";

export default {
  components: { EditForm },

  data() {
    return {
      pageLoading: true,
      oldName: null,
      oldEmail: null,
      errors: null,
      isLoading: false,
    };
  }, //end of data

  methods: {
    fill(id) {
      axios
        .get(`/api/admin/teams/${id}/edit`)
        .then((response) => {
          this.oldName = response.data.name;
          this.oldEmail = response.data.email;
        })
        .then(() => {
          this.pageLoading = false;
        })
        .catch((error) => {
          console.log(error);
        });
    }, //end of fill data

    submitTeam(formData) {
      this.isLoading = true;
      axios
        .post(`/api/admin/teams/${this.$route.query.id}`, formData)
        .then((response) => {
          if (response.status == 200) {
            new Noty({
              type: "success",
              layout: "topRight",
              timeout: "2000",
              text: response.data,
            }).show();
            this.$router.push({
              name: "admin.teams",
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
      this.$router.push({ name: "admin.teams" });
    }
    this.fill(this.$route.query.id);
  }, //end of created
};
</script>