<template>
    <div class="d-flex flex-column col-8 project container justify-content-center align-content-center mt-5">
        <h2 class="text-center">{{ this.project.name }}</h2>
        <div class="d-flex info flex-row justify-content-around mt-4">
            <p>
                <em class="text-success"><u><strong>Owner:</strong></u></em>
                {{ this.owner.name }} {{ this.owner.surname }}
                <em class="text-secondary"><u>{{ this.owner.email }}</u></em></p>
            <p>
                <em class="text-primary"><u><strong>Date:</strong></u></em>
                {{ this.project.created_at }}
            </p>
        </div>
        <div class="mt-3 p-4">
            <h3 class="text-center">Users</h3>
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
export default {
    name: "ProjectInfo",
    props: {
        project: [],
        user: "",
        project_users: []
    },
    computed: {
        owner: function () {
            return this.project_users.filter(user => user.role === "Owner")[0];
        },
        projectUsers: function () {
            return this.project_users.filter(user => user.role !== "Owner");
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

</style>
