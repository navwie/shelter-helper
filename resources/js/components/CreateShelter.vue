<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form action="/createShelterService" method="post">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Створити притулок</h1>
            <div class="form-group mt-4">
                <label for="Name">Назва</label>
                <input v-model="name" type="text" :class="'form-control ' + formErrors.name" id="name" name="name" placeholder="name">
            </div>
            <div class="form-group mt-4">
                <label for="address">Адреса</label>
                <input v-model="address" type="text" :class="'form-control ' + formErrors.address" id="address" name="address" placeholder="Адреса">
            </div>
            <div class="form-group mt-4">
                <label for="phone">Телефон</label>
                <input v-model="phone" type="phone" :class="'form-control ' + formErrors.phone" id="phone" name="phone" placeholder="Телефон">
            </div>
            <div class="form-group mt-4">
                <label for="email">Пошта</label>
                <input v-model="email" type="email" :class="'form-control ' + formErrors.email" id="email" name="email" placeholder="Пошта">
            </div>
            <div class="form-group text-center mt-4">
                <button class="btn btn-primary" type="submit" :disabled="active">Створити</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreateShelter",
    data: () => ({
        name: "",
        address: "",
        email: "",
        phone: "",
        formErrors: {
            name: "is-invalid",
            address: "is-invalid",
            email: "is-invalid",
            phone: "is-invalid",
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
        name() {
            this.formErrors.name = "is-valid";
            if (this.name.length < 3 || this.name.length > 32) {
                this.formErrors.name = "is-invalid";
            }
        },
        address() {
            this.formErrors.address = "is-valid";
            if (this.address.length < 3 || this.name.length > 32) {
                this.formErrors.address = "is-invalid";
            }
        },
        email() {
            this.formErrors.email = "is-valid";
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))) {
                this.formErrors.email = "is-invalid";
            }
        },
        phone(){
            this.formErrors.phone = "is-valid";
            if (!(/[+][0-9]{4,}/.test(this.phone))) {
                this.formErrors.phone = "is-invalid";
            }
        },
    },
}
</script>

<style scoped>

</style>
