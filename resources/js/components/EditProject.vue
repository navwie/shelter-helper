<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <div class="form">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Edit project</h1>
            <div class="form-group mt-4">
                <label for="name"><h5>Name</h5></label>
                <input v-model="name" type="text" :class="'form-control ' + formErrors.name" id="name" name="name">
            </div>
            <div class="form-group mt-4">
                <h5>Description</h5>
                <textarea v-model="description" :class="'form-control ' + formErrors.description" name="description" id="description" cols="40" rows="5"></textarea>
            </div>
            <div class="form-group text-center mt-3">
                <a class="btn btn-danger" :href=this.projectPage>Back</a>
                <button :class="[{ disabled: this.active}, 'btn btn-primary']" @click="editProject">Edit</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditProject",
    props: {
        project: []
    },
    data() {
        return {
            projectData: this.project,
            name: this.project.name,
            description: this.project.description,
            formErrors: {},
            active: false
        }
    },
    methods: {
        editProject: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });

            $.ajax({
                url: '/editProjectService',
                method: 'PUT',
                data: {
                    'id': this.projectData.id,
                    'name': this.name,
                    'description': this.description
                },
                success: function () {
                    window.location.replace('http://docker.scrum-dashboard/projectPage/' + this.projectsData.id);
                }
            });
        }
    },
    updated() {
        let errors = Object.values(this.formErrors);
        this.active = errors.includes("is-invalid")
    },
    computed: {
        projectPage: function () {
            return '/projectPage/' + this.projectData.id;
        },
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
        description() {
            this.formErrors.description = 'is-valid';

            if (this.description.length < 1) {
                this.formErrors.description = 'is-invalid'
            }
        }
    }
}
</script>

<style scoped>
    .form {
        margin-top: 4em;
    }
</style>
