<template>
    <div>
        <div class="row justify-content-left m-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Team</div>
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
                                    for="image"
                                    class="col-md-2 col-form-label text-md-right"
                                    >Image</label
                                >

                                <div class="col-md-9">
                                    <input
                                        id="image"
                                        type="file"
                                        class="form-control"
                                        name="Image"
                                        @change="uploadImage"
                                    />
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
                                        :disabled="isLoading || sameValue"
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
export default {
    props: ["isLoading", "errors", "oldName"],

    emits: ["submitTeam"],

    data() {
        return {
            name: this.oldName,
            image: null,
            sameValue: true,
        };
    }, //end of data

    watch: {
        name(newName) {
            if (newName == this.oldName) {
                this.sameValue = true;
            } else {
                this.sameValue = false;
            }
        }, //end of name

        image(newImage) {
            if (newImage == null) {
                this.sameValue = true;
            } else {
                this.sameValue = false;
            }
        }, //end of password
    }, //end of watch

    methods: {
        uploadImage(event) {
            this.image = event.currentTarget.files[0];
        }, //end of image upload

        fillForm() {
            let formData = new FormData();
            formData.append("name", this.name);
            formData.append("_method", "PUT");
            if (this.image) {
                formData.append("image", this.image);
            }

            this.$emit("submitTeam", formData);
        }, //end of filling form
    }, //end of methods
};
</script>
