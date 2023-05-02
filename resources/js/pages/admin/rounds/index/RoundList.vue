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
                    <th scope="col">Team</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="round in rounds" :key="round.id">
                    <td>{{ round.name }}</td>
                    <td>{{ round.team.name }}</td>
                    <td>
                        <router-link
                            class="btn btn-warning ml-1 mt-1"
                            :to="{
                                name: 'admin.rounds.edit',
                                query: { id: round.id },
                            }"
                            >Edit</router-link
                        >
                        <button
                            class="btn btn-danger ml-1 mt-1"
                            @click="deleteRound(round.id)"
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
    props: ["rounds", "pageLoading"],
    emits: ["roundDeleted"],
    methods: {
        deleteRound(id) {
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
                            deleteRound(id);
                        },
                        { id: "yes", "data-status": "ok" }
                    ),

                    Noty.button("NO", "btn btn-error", function () {
                        // console.log("button 2 clicked");
                        deleteConfirmation.close();
                    }),
                ],
            }).show(); //end of delete confirmation

            function deleteRound(id) {
                axios
                    .delete(`/api/admin/rounds/${id}`)
                    .then((response) => {
                        if (response.status == 200) {
                            __this.$emit("roundDeleted", id);
                            deleteConfirmation.close();
                            new Noty({
                                layout: "topRight",
                                text: "Round Deleted Successfully",
                                type: "success",
                                timeout: 2000,
                            }).show();
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    }); //end of api req
            } // end of deleteround func
        }, //end of deleteround Method
    },
};
</script>
