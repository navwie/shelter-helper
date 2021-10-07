<template>
    <div class="container">
        <div class="row mt-5">
            <div class="d-flex flex-column col-md bg-secondary text-white p-3 justify-content-between">
                <div>
                    <h3>Product backlog</h3>
                    <p>Description</p>
                </div>
                <div>
                    <p>Last updated 3 mins ago by Artem</p>
                </div>
            </div>
            <div class="d-flex flex-column col-md bg-sprint mx-5 p-3 justify-content-between">
                <div>
                    <h3>Sprint #1</h3>
                    <p>Description</p>
                </div>
                <div>
                    <p>Last updated 3 mins ago by Artem</p>
                </div>
            </div>
            <div class="d-flex flex-column col-md bg-sprint p-3 justify-content-between">
                <div>
                    <h3>Sprint #2</h3>
                    <p>Description</p>
                </div>
                <div>
                    <p>Last updated 3 mins ago by Artem</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Documents"
}
</script>

<style scoped>
    .col-md {
        height: 12em;
        border-radius: 15px;
    }
    .bg-sprint {
        background-color: #adacac;
    }
    p {
        margin-top: 1em;
    }
</style>
