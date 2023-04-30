<template>
  <div>
    <create-form
      :errors="errors"
      :isLoading="isLoading"
      @submitTeam="submitTeam"
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
    };
  }, //end of data

  methods: {
    submitTeam(formData) {
      this.isLoading = true;
      axios
        .post("/api/admin/teams", formData)
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
};
</script>