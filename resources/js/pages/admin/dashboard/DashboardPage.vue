<template>
  <div>
    <page-header>Dashboard</page-header>
    <loading-ui v-if="pageLoading"></loading-ui>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pageLoading: true,
    };
  }, //end of data
  methods: {
    getCounts() {
      axios
        .get("/api/admin/dashboard")
        .then((response) => {
          console.log(response.data);
        })
        .then(() => {
          this.pageLoading = false;
        })
        .catch((error) => {
          console.log(error.response);
        });
    }, //end of get the counts
  }, //end of methods
  created() {
    this.getCounts();
  }, //end of created
};
</script>