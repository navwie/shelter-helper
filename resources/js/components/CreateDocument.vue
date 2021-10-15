<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form action="/createDocumentService" method="get">
            <h1 class="h3 mb-3 fw-normal text-center">Create document</h1>
            <div class="form-group mt-4">
                <label for="name"><h5>Name</h5></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group mt-4">
                <h5>Description</h5>
                <textarea name="description" id="description" cols="40" rows="5"></textarea>
            </div>
            <div class="form-group mt-4">
                <label for="url"><h5>Link</h5></label>
                <input type="text" class="form-control" id="url" name="url" placeholder="Link">
            </div>
            <div class="form-group text-center mt-3">
                <a class="btn btn-danger" href="/">Back</a>
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreateDocument"
}
</script>

<style scoped>
    form {
        margin-top: 4em;
    }
</style>
