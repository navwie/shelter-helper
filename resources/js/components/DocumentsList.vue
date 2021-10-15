<template>
    <div class="row col-12 justify-content-center">
        <document
            v-for="document in this.documents"
            :key="document.index"
            :name="document.name"
            :description="document.description"
            :url="document.url"
            :lastUserOpened="document.last_user_opened"
            :lastOpenedTime="document.last_opened_time"

        />
        <div>
            <a class="btn btn-outline-dark" href="/createDocument">
                Create document
            </a>
        </div>
    </div>


</template>

<script>
export default {
    name: "Documents",
    props: {
        documents: []
    }
}
</script>

<style scoped>
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
