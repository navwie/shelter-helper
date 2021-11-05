<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <div class="form">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Edit document</h1>
            <div class="form-group mt-4">
                <label for="name"><h5>Name</h5></label>
                <input v-model="name" type="text" :class="'form-control ' + this.formErrors.name" id="name" name="name">
            </div>
            <div class="form-group mt-4">
                <h5>Description</h5>
                <textarea v-model="description" class="form-control is-valid" name="description" id="description" cols="40" rows="5"></textarea>
            </div>
            <div class="form-group mt-4">
                <label for="url"><h5>Link</h5></label>
                <input v-model="url" type="url" :class="'form-control ' + this.formErrors.url" id="url" name="url">
            </div>
            <div class="form-group text-center mt-3">
                <a class="btn btn-danger" href="/documents">Back</a>
                <a :class="[{ disabled: this.active}, 'btn btn-primary']" @click="editDocument">Edit</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditDocument",
    props: {
        document: []
    },
    data() {
        return {
            documentData: this.document,
            name: this.document.name,
            description: this.document.description,
            url: this.document.url,
            formErrors: {},
            active: false
        }
    },
    methods: {
        editDocument: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });

            $.ajax({
                url: '/editDocumentService',
                method: 'PUT',
                data: {
                    'id': this.documentData.id,
                    'name': this.name,
                    'description': this.description,
                    'url': this.url
                },
                success: function () {
                    window.location.replace('http://docker.scrum-dashboard/documents');
                }
            });
        }
    },
    computed: {
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }
    },
    updated() {
        let errors = Object.values(this.formErrors);
        this.active = errors.includes("is-invalid")
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
    .form {
        margin-top: 3em;
    }
</style>
