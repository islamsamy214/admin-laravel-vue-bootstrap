<template>
  <div>
    <loading-ui v-if="isLoading"></loading-ui>
    <edit-form
      v-else
      :oldName="oldName"
      :oldTeamId="oldTeamId"
      :teams="teams"
      :errors="errors"
      :isLoading="isLoading"
      @submitRound="submitRound"
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
      oldTeamId: null,
      teams: null,
      errors: null,
      isLoading: false,
    };
  }, //end of data

  methods: {
    fill(id) {
      this.isLoading = true;
      axios
        .get(`/api/admin/rounds/${id}/edit`)
        .then((response) => {
          this.oldName = response.data.round.name;
          this.oldTeamId = response.data.round.team_id;
          this.teams = response.data.teams;
        })
        .then(() => {
          this.isLoading = false;
        })
        .catch((error) => {
          console.log(error);
        });
    }, //end of fill data

    submitRound(formData) {
      this.isLoading = true;
      axios
        .post(`/api/admin/rounds/${this.$route.query.id}`, formData)
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
    if (this.$route.query.id == undefined) {
      this.$router.push({ name: "admin.rounds" });
    }
    this.fill(this.$route.query.id);
  }, //end of created
};
</script>