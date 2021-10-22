<template>
    <div>

        <div class="notification">
            <notify-create-document
                v-for="notification in this.create_document_notifications"
                :key="notification.id"
                :id="notification.id"
                :data="notification.data"
            />
            <notify-delete-document
                v-for="notification in this.delete_document_notifications"
                :key="notification.id"
                :id="notification.id"
                :data="notification.data"
            />
        </div>

        <div class="container d-flex list-group align-items-center flex-row">
            <div class="row col-12 justify-content-center">
                <document
                    v-for="document in this.userDocuments"
                    :key="document.index"
                    :id="document.id"
                    :name="document.name"
                    :description="document.description"
                    :url="document.url"
                    :lastUserOpened="document.last_user_opened"
                    :lastOpenedTime="document.last_opened_time"
                />

                <not-such-projects-documents v-if="computedProjects === 'null'"/>
                <not-such-documents v-else-if="userDocuments.length === 0"/>
            </div>
        </div>

            <div  v-if="computedProjects !== 'null'">
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
        documents: [],
        user: "",
        project: "",
        create_document_notifications: [],
        delete_document_notifications: [],
    },
    computed: {
        userDocuments: function () {
            return this.documents.filter(document => document.author_id === this.user);
        },
        computedProjects: function () {
            return this.project;
        }
    }
}
</script>

<style scoped>

    .notification {
        position: fixed;
        top: 80px;
        right: 16px;
        z-index: 15;
        font-size: large;
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
