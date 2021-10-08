<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form>
            <h1 class="h3 mb-3 fw-normal text-center">Create report</h1>
            <div class="form-group mt-4">
                <label for="name"><h5>Name</h5></label>
                <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="form-group mt-4">
                <h5>Description</h5>
                <textarea name="description" id="description" cols="40" rows="5"></textarea>
            </div>
            <div class="form-group mt-4">
                <label for="type"><h5>Type</h5></label>
                <select class="form-select" aria-label="type" id="type">
                    <option value="1" selected>Task by executors</option>
                    <option value="2" selected>Task by projects</option>
                    <option value="3" selected>Table report</option>
                    <option value="4" selected>Time report</option>
                    <option value="5" selected>Estimate report</option>
                </select>
            </div>
            <div class="form-group text-center mt-3">
                <a class="btn btn-danger" href="/reports">Back</a>
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreateReport"
}
</script>

<style scoped>
    form {
        margin-top: 4em;
    }
</style>
