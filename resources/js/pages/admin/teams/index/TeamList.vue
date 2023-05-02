<template>
  <div>
    <loading-ui v-if="pageLoading"></loading-ui>
    <table class="table table-striped table-responsive-sm table-responsive-md" v-else>
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Members</th>
          <th scope="col">Roles</th>
          <th scope="col">OverAllRate</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="team in teams" :key="team.id">
          <td>
            <img :src="team.image_path" class="img-thumbnail" style="width: 40px; max-height: 40px" />
          </td>
          <td>{{ team.name }}</td>
          <td>{{ team.users_count }}</td>
          <td>{{ team.roles_count }}</td>
          <td>{{ team.rate }}</td>
          <td>
            <router-link class="btn btn-warning ml-1 mt-1"
              :to="{ name: 'admin.teams.edit', query: { id: team.id } }">Edit</router-link>
            <button class="btn btn-danger ml-1 mt-1" @click="deleteTeam(team.id)">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  props: ["teams", "pageLoading"],
  emits: ["teamDeleted"],
  methods: {
    deleteTeam(id) {
      let __this = this;
      var deleteConfirmation = new Noty({
        layout: "center",
        killer: true,
        progressBar: false,
        modal: true,
        text: "Confirm Delete ?",
        buttons: [
          Noty.button(
            "YES",
            "btn btn-danger",
            function () {
              deleteTeam(id);
            },
            { id: "yes", "data-status": "ok" }
          ),

          Noty.button("NO", "btn btn-error", function () {
            // console.log("button 2 clicked");
            deleteConfirmation.close();
          }),
        ],
      }).show(); //end of delete confirmation

      function deleteTeam(id) {
        axios
          .delete(`/api/admin/teams/${id}`)
          .then((response) => {
            if (response.status == 200) {
              __this.$emit("teamDeleted", id);
              deleteConfirmation.close();
              new Noty({
                layout: "topRight",
                text: "Team Deleted Successfully",
                type: "success",
                timeout: 2000,
              }).show();
            }
          })
          .catch((error) => {
            console.log(error);
          }); //end of api req
      } // end of deleteteam func
    }, //end of deleteteam Method
  },
};
</script>