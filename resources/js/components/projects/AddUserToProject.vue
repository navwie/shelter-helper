<template>
    <div class="d-flex col-12 add-user container justify-content-center align-content-center mt-5">
        <form action="/addUserToProjectService" method="post">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-5 fw-normal text-center">Add new user to your project</h1>
            <div class="form-group mt-4">
                <label for="email"><h5>Email address</h5></label>
                <input  type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="form-group mt-4">
                <label for="role"><h5>Role</h5></label>
                <select name="role" id="role" class="form-select">
                    <option selected value="Developer">Developer</option>
                    <option value="Designer">Designer</option>
                    <option value="QA">QA</option>
                    <option value="Project manager">Project manager</option>
                    <option value="Project manager">Tech lead</option>
                </select>
            </div>
            <div class="form-group text-center mt-4">
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "AddUserToProject",
    computed: {
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    }
}
</script>

<style scoped>
    form
    {
        margin-top: 3em;
    }
</style>
