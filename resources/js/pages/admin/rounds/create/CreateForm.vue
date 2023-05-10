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

                            <!-- <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-md-2 col-form-label text-md-right"
                                    >Teams</label
                                >
                                <div class="col-md-9">
                                    <Multiselect
                                        v-model="value"
                                        mode="multiple"
                                        placeholder="Select your characters"
                                        :close-on-select="false"
                                        :options="options"
                                    />
                                </div>
                            </div> -->

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
                                        v-if="errors.team_ids"
                                    >
                                        <div
                                            v-for="error in errors.team_ids"
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
            options: [],
            value: null,
            image: null,
        };
    }, //end of data

    methods: {
        fillForm() {
            let formData = new FormData();
            formData.append("name", this.name);
            if (this.value) {
                formData.append("team_ids", JSON.stringify(this.value));
            }
            this.$emit("submitRound", formData);
        }, //end of filling form
    }, //end of methods

    mounted() {
        this.options = this.teams.map((team) => {
            return {
                value: team.id,
                label: team.name,
            };
        });
    }, //end of mounted
};
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
