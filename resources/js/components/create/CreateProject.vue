<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form action="/createProjectService">
            <h1 class="h3 mb-3 fw-normal text-center">Create project</h1>
            <div class="form-group mt-4">
                <label for="name"><h5>Name</h5></label>
                <input v-model="name" type="text" :class="'form-control ' + this.formErrors.name" id="name" name="name">
            </div>
            <div class="form-group mt-4">
                <h5>Description</h5>
                <textarea v-model="description" name="description" :class="'form-control ' + this.formErrors.description" id="description" cols="40" rows="5"></textarea>
            </div>
            <div class="form-group text-center mt-3">
                <a class="btn btn-danger" href="/projects">Back</a>
                <button class="btn btn-primary" type="submit" :disabled="active">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreateProject",
    data() {
        return {
            name: "",
            description: "",
            formErrors: {
                name: 'is-invalid',
                description: 'is-invalid'
            },
            active: true
        }
    },
    updated() {
        let errors = Object.values(this.formErrors);
        this.active = errors.includes("is-invalid")
    },
    watch: {
        name() {
            this.formErrors.name = 'is-valid';

            if (this.name.length < 4) {
                this.formErrors.name = 'is-invalid';
            }
        },
        description() {
            this.formErrors.description = 'is-valid';

            if (this.description.length < 4) {
                this.formErrors.description = 'is-invalid';
            }
        }
    }
}
</script>

<style scoped>
    form {
        margin-top: 4em;
    }
</style>
