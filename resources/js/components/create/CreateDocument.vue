<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form action="/createDocumentService" method="post">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Create document</h1>
            <div class="form-group mt-4">
                <label for="name"><h5>Name</h5></label>
                <input v-model="name" type="text" :class="'form-control ' + this.formErrors.name" id="name" name="name">            </div>
            <div class="form-group mt-4">
                <h5>Description</h5>
                <textarea v-model="description" name="description" class="form-control is-valid" id="description" cols="40" rows="5"></textarea>
            </div>
            <div class="form-group mt-4">
                <label for="url"><h5>Link</h5></label>
                <input v-model="url" type="url" :class="'form-control ' + this.formErrors.url" id="url" name="url">
            </div>
            <div class="form-group text-center mt-3">
                <a class="btn btn-danger" href="/">Back</a>
                <button class="btn btn-primary" type="submit" :disabled="active">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreateDocument",
    data() {
        return {
            name: "",
            description: "",
            url: "",
            formErrors: {
                name: 'is-invalid',
                url: 'is-invalid'
            },
            active: true
        }
    },
    updated() {
        let errors = Object.values(this.formErrors);
        this.active = errors.includes("is-invalid")
    },
    computed: {
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },
    watch: {
        name() {
            this.formErrors.name = 'is-valid';

            if (this.name.length < 5) {
                this.formErrors.name = 'is-invalid';
            }
        },
        url() {
            this.formErrors.url = 'is-valid';

            if (!/(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/.test(this.url)) {
                this.formErrors.url = 'is-invalid';
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
