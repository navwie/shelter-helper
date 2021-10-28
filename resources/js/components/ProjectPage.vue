<template>
    <div class="d-flex flex-column col-8 project container justify-content-center align-content-center mt-5">
        <h2 class="text-center">{{ this.project.name }}</h2>
        <div class="d-flex info flex-row justify-content-around mt-4">
            <p><em class="text-success"><u><strong>Owner:</strong></u></em> {{ this.user.name }} {{ this.user.surname }} <em class="text-secondary"><u>{{ this.user.email }}</u></em></p>
            <p><em class="text-primary"><u><strong>Date:</strong></u></em> {{ this.project.created_at }}</p>
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>examle@exmale</td>
                    <td>admin</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>examle@exmale</td>
                    <td>developer</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>examle@exmale</td>
                    <td>QA</td>
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
        user: ""
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
