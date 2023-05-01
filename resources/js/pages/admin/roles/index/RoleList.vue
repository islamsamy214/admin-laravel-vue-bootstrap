<template>
    <div>
        <loading-ui v-if="pageLoading"></loading-ui>
        <table
            class="table table-striped table-responsive-sm table-responsive-md"
            v-else
        >
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Players Count</th>
                    <th scope="col">Team</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="role in roles" :key="role.id">
                    <td>{{ role.name }}</td>
                    <td>{{ role.users_count }}</td>
                    <td>{{ role.team.name }}</td>
                    <td>
                        <router-link
                            class="btn btn-warning ml-1 mt-1"
                            :to="{
                                name: 'admin.roles.edit',
                                query: { id: role.id },
                            }"
                            >Edit</router-link
                        >
                        <button
                            class="btn btn-danger ml-1 mt-1"
                            @click="deleteRole(role.id)"
                        >
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
    props: ["roles", "pageLoading"],
    emits: ["roleDeleted"],
    methods: {
        deleteRole(id) {
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
                            deleteRole(id);
                        },
                        { id: "yes", "data-status": "ok" }
                    ),

                    Noty.button("NO", "btn btn-error", function () {
                        // console.log("button 2 clicked");
                        deleteConfirmation.close();
                    }),
                ],
            }).show(); //end of delete confirmation

            function deleteRole(id) {
                axios
                    .delete(`/api/admin/roles/${id}`)
                    .then((response) => {
                        if (response.status == 200) {
                            __this.$emit("roleDeleted", id);
                            deleteConfirmation.close();
                            new Noty({
                                layout: "topRight",
                                text: "Role Deleted Successfully",
                                type: "success",
                                timeout: 2000,
                            }).show();
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    }); //end of api req
            } // end of deleterole func
        }, //end of deleterole Method
    },
};
</script>
