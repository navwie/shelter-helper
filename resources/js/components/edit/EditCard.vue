<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <div class="form">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Edit task</h1>
            <div class="form-group mt-4">
                <label for="name"><h5>Name</h5></label>
                <input v-model="name" :class="'form-control ' + this.formErrors.name" type="text" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group mt-4">
                <h5>Description</h5>
                <textarea v-model="description" :class="'form-control ' + this.formErrors.description" name="description" id="description" cols="40" rows="5"></textarea>
            </div>
            <div class="form-group mt-4">
                <label for="category"><h5>Category</h5></label>
                <select v-model="category" name="category" id="category" class="form-select">
                    <option :selected="card.category === 'backlog'" value="backlog">Product backlog</option>
                    <option :selected="card.category === 'toDo'" value="toDo">To do</option>
                    <option :selected="card.category === 'inProgress'" value="inProgress">In progress</option>
                    <option :selected="card.category === 'testing'" value="testing">Testing</option>
                    <option :selected="card.category === 'done'" value="done">Done</option>
                </select>
            </div>
            <div class="form-group mt-4">
                <label for="deadline"><h5>Deadline</h5></label>
                <input v-model="deadline" class="form-control" type="datetime-local" id="deadline" name="deadline">
            </div>
            <div class="form-group text-center mt-3">
                <a class="btn btn-danger" href="/board">Back</a>
                <a class="btn btn-primary" @click="editCard" :disabled="active">Edit</a>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment/moment";

export default {
    name: "EditCard",
    props: {
        card: {}
    },
    data: function ()  {
        return {
            name: this.card.name,
            description: this.card.description,
            deadline: moment(this.card.deadline).format("YYYY-MM-DDTHH:mm"),
            category: this.card.category,
            active: false,
            formErrors: {

            }
        }
    },
    methods: {
        editCard: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });

            $.ajax({
                url: '/editCardService',
                method: 'PUT',
                data: {
                    'id': this.card.id,
                    'name': this.name,
                    'description': this.description,
                    'category': this.category,
                    'deadline': this.deadline
                },
                success: function () {
                    window.location.replace('http://docker.scrum-dashboard/board');
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
        description() {
            this.formErrors.description = 'is-valid';

            if (this.description.length < 4) {
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
