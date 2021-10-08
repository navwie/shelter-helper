<template>
    <div class="container d-flex list-group col-md-12 align-items-md-center">
        <div class="row mt-5">
            <div class="d-flex flex-column col document p-3 justify-content-between">
                <div>
                    <h3>Product backlog</h3>
                    <p>Description</p>
                </div>
                <div>
                    <p>Last updated 3 mins ago by Artem</p>
                </div>
            </div>
            <div class="d-flex flex-column col document mx-5 p-3 justify-content-between">
                <div>
                    <h3>Sprint #1</h3>
                    <p>Description</p>
                </div>
                <div>
                    <p>Last updated 3 mins ago by Artem</p>
                </div>
            </div>
            <div class="d-flex flex-column col document p-3 justify-content-between">
                <div>
                    <h3>Sprint #2</h3>
                    <p>Description</p>
                </div>
                <div>
                    <p>Last updated 3 mins ago by Artem</p>
                </div>
            </div>
        </div>
        <div>
            <a class="btn btn-outline-dark" href="/createDocument">
                Create document
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Documents"
}
</script>

<style scoped>
    .col {
        height: 12em;
        border-radius: 15px;
    }

    .document {
        border-radius: 7px;
        border: 2px solid #74787e;
        box-shadow: 5px 5px 0 0 #adacac;

    }

    p {
        margin-top: 1em;
    }

    .btn-outline-dark {
        position: fixed;
        padding-top: 10px;
        bottom: 15%;
        right: 20%;
        height: 3em;
        border-radius: 25px;
        font-weight: 500;
    }
</style>
