<template>
    <a :href="url" target="_blank" class="col-3 document">
        <div>
            <div>
                <h3>{{ name }}</h3>
                <p>{{ description }}</p>
            </div>
            <div>
                <p v-if="lastUserOpened === null">Created by Artem</p>
                <p v-else>Last updated 3 mins ago by Artem</p>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    name: "Document",
    props: {
        name: "",
        description: "",
        url: "",
        lastUserOpened: "",
        lastOpenedTime: ""
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
</style>
