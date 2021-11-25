<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form action="/createAnnouncementService" method="post">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Створити анннаунсмент</h1>
            <div class="form-group mt-4">
                <label for="topic">Заголовок</label>
                <input v-model="topic" type="text" :class="'form-control ' + formErrors.topic" id="topic" name="topic" placeholder="topic">
            </div>
            <div class="form-group mt-4">
                <label for="description">Опис</label>
                <textarea v-model="description" type="text" :class="'form-control ' + formErrors.description" id="description" name="description" placeholder="description" />
            </div>
            <div class="form-group text-center mt-4">
                <button class="btn btn-primary" type="submit" :disabled="active">Створити</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreateAnnouncement",
    data: () => ({
        topic: "",
        description: "",
        formErrors: {
            topic: "",
            description: "",
        },
        active: true
    }),
    updated() {
        let errors = Object.values(this.formErrors);
        this.active = errors.includes("is-invalid")
    },
    computed: {
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },
    watch: {
        topic() {
            this.formErrors.topic = "is-valid";
            if (this.topic.length < 3 || this.topic.length > 32) {
                this.formErrors.topic = "is-invalid";
            }
        },
        description() {
            this.formErrors.description = "is-valid";
            if (this.description.length < 3 || this.description.length > 32) {
                this.formErrors.description = "is-invalid";
            }
        },
    },
}
</script>

<style scoped>

</style>
