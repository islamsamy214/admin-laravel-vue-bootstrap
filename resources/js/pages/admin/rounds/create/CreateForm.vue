<template>
    <div>
        <div class="row justify-content-left m-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Round</div>
                    <div class="card-body">
                        <form
                            @submit.prevent="fillForm"
                            enctype="multipart/form-data"
                        >
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-md-2 col-form-label text-md-right"
                                    >Name</label
                                >
                                <div class="col-md-9">
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        required
                                        autocomplete="name"
                                        autofocus
                                        v-model="name"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-md-2 col-form-label text-md-right"
                                    >Team</label
                                >
                                <div class="col-md-9">
                                    <select
                                        class="form-control"
                                        v-model="teamId"
                                    >
                                        <option value="null">
                                            Select Team
                                        </option>
                                        <option
                                            :value="team.id"
                                            v-for="team in teams"
                                            :key="team.id"
                                        >
                                            {{ team.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- start of error section -->
                            <div
                                class="card w-75 mx-auto mb-3 alert alert-danger"
                                v-if="errors"
                            >
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item"
                                        v-if="errors.name"
                                    >
                                        <div
                                            v-for="error in errors.name"
                                            :key="error"
                                        >
                                            {{ error }}
                                        </div>
                                    </li>

                                    <li
                                        class="list-group-item"
                                        v-if="errors.team_id"
                                    >
                                        <div
                                            v-for="error in errors.team_id"
                                            :key="error"
                                        >
                                            {{ error }}
                                        </div>
                                    </li>

                                    <li
                                        class="list-group-item"
                                        v-if="errors.image"
                                    >
                                        <div
                                            v-for="error in errors.image"
                                            :key="error"
                                        >
                                            {{ error }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- end of error section -->

                            <div class="form-group row mb-0 text-right">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                        :disabled="isLoading"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Multiselect from "@vueform/multiselect";

export default {
    components: {
        Multiselect,
    },
    props: ["errors", "isLoading", "teams"],

    emits: ["submitRound"],

    data() {
        return {
            name: null,
            teamId: null,
            image: null,
        };
    }, //end of data

    methods: {
        fillForm() {
            let formData = new FormData();
            formData.append("name", this.name);
            formData.append("team_id", this.teamId);
            this.$emit("submitRound", formData);
        }, //end of filling form
    }, //end of methods
};
</script>
