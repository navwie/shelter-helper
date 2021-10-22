<template>
    <a :href="url" target="_blank" class="col-3 document">
        <div class="d-flex flex-row justify-content-between">
            <div class="flex-grow-1 flex-shrink-0">
                <h3>{{ name }}</h3>
                <p>{{ description }}</p>
                <div>
                    <p v-if="lastUserOpened === null">Created by Artem</p>
                    <p v-else>Last updated 3 mins ago by Artem</p>
                </div>
            </div>
            <div class="remove align-items-end align-self-end remove">
                <a :href="deleteUrlId" class="btn btn-outline-danger">Remove</a>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    name: "Document",
    props: {
        id: "",
        name: "",
        description: "",
        url: "",
        lastUserOpened: "",
        lastOpenedTime: ""
    },
    data() {
        return {
            deleteUrl: "/deleteDocumentService/"
        }
    },
    computed: {
        deleteUrlId: function () {
            return this.deleteUrl + this.id;
        }
    }
}
</script>

<style scoped>
    .col {
        height: 12em;
        border-radius: 15px;
        margin-right: 100px;
    }

    .document {
        border-radius: 7px;
        border: 2px solid #74787e;
        box-shadow: 5px 5px 0 0 #adacac;

    }


    a {
        display: block;
        text-decoration: none;
        color: #1b1e21;
        margin-top: 3.5em;
        margin-left: 3em;
        margin-right: 3em;
        padding: 12px;
    }

    .remove {
        z-index: 100;
    }
</style>
