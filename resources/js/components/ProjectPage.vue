<template>
    <div class="d-flex flex-column col-8 project container justify-content-center align-content-center mt-5">
        <input type="hidden" name="_token" :value="this.csrfToken">

        <div class="text-center mt-2">
            <h2>{{ this.project.name }}</h2>
            <h4 class="mt-4 text-decoration-underline">Description</h4>
            <p class="mt-3 fst-italic fs-4">{{ this.project.description }}</p>
        </div>

        <div class="d-flex info flex-row justify-content-around mt-4">
            <p>
                <em class="text-success"><u><strong>Owner:</strong></u></em>
                {{ this.owner.name }} {{ this.owner.surname }}
                <em class="text-secondary"><u>{{ this.owner.email }}</u></em></p>
            <p>
                <em class="text-primary"><u><strong>Create date:</strong></u></em>
                {{ this.createdAt }}
            </p>
        </div>

        <a :href='this.editProject' class="btn-outline-secondary text-center edit-project mt-3">Edit project</a>

        <div class="mt-3 p-4">
            <h3 class="text-center text-decoration-underline">Users</h3>
            <table class="table mt-4">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(user, index) in this.projectUsers">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ user.name }}</td>
                    <td>{{ user.surname }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.role }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <a href="/addUserToProject" class="btn btn-primary">Add new user</a>
    </div>

</template>

<script>
import moment from "moment/moment";

export default {
    name: "ProjectInfo",
    props: {
        project: [],
        user: "",
        project_users: []
    },
    data() {
        return {
            editUrl: '/editProject/',
        }
    },
    computed: {
        owner: function () {
            return this.project_users.filter(user => user.role === "Owner")[0];
        },
        projectUsers: function () {
            return this.project_users.filter(user => user.role !== "Owner");
        },
        createdAt: function () {
            let create = this.project_users[0].created_at;
            return moment(create).format("MMMM Do YYYY, h:mm:a");
        },
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
        editProject: function () {
            return this.editUrl + this.project.id;
        }
    }

}
</script>

<style scoped>
    .project {
        height: auto;
        padding: 6px 6px 6px 15px;
        border-radius: 7px;
        border: 2px solid #74787e;
        box-shadow: 5px 5px 0 0 #74787e;
        text-decoration: none;
        color: #1b1e21;
    }

    p {
        font-size: 19px;
    }

    .edit-project {
        text-decoration: none;
        font-size: 18px;
    }

</style>
