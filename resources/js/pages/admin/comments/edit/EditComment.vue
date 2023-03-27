<template>
  <div>
    <loading-ui v-if="pageLoading"></loading-ui>
    <edit-form
      v-else
      :errors="errors"
      :isLoading="isLoading"
      :oldBody="oldBody"
      @submitComment="submitComment"
    ></edit-form>
  </div>
</template>
<script>
import EditForm from "./EditForm.vue";

export default {
  components: {
    EditForm,
  }, //end of components

  data() {
    return {
      oldBody: null,
      pageLoading: true,
      errors: null,
      isLoading: false,
    };
  }, //end of data

  methods: {
    fillData(id) {
      axios
        .get(`/api/admin/comments/${id}/edit`)
        .then((response) => {
          this.oldBody = response.data.body;
        })
        .then(() => {
          this.pageLoading = false;
        })
        .catch((error) => {
          this.$route.push({ name: "admin.comments" });
        });
    }, //end of fill data

    submitComment(formData) {
      axios
        .post(`/api/admin/comments/${this.$route.query.id}`, formData)
        .then((response) => {
          if (response.status == 200) {
            this.$router.push({
              name: "admin.posts.details",
              query: { commentUpdated: true, id: this.$route.query.postId },
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
    if (this.$route.query.id == "undefined") {
      this.$router.push({ name: "admin.comments" });
    }
    this.fillData(this.$route.query.id);
  }, //end of created

  beforeRouteEnter(to, from, next) {
    if (from.name == "admin.comments") {
      next();
    } else if (from.name == "admin.posts.details") {
      next();
    } else {
      next({ name: "admin.comments" });
    }
  }, //end of bforeCreate
};
</script>