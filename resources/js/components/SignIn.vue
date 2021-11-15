<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form action="/signInService" method="post">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Sign in</h1>
            <div class="form-group mt-4">
                <label for="Name">Name</label>
                <input v-model="name" type="text" :class="'form-control ' + formErrors.name" id="name" name="name" placeholder="name">
            </div>
            <div class="form-group mt-4">
                <label for="surname">Surname</label>
                <input v-model="surname" type="text" :class="'form-control ' + formErrors.surname" id="surname" name="surname" placeholder="surname">
            </div>
            <div class="form-group mt-4">
                <label for="email">Email address</label>
                <input v-model="email" type="email" :class="'form-control ' + formErrors.email" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="form-group mt-4">
                <label for="phone">Phone</label>
                <input v-model="phone" type="phone" :class="'form-control ' + formErrors.phone" id="phone" name="phone" placeholder="phone">
            </div>
            <div class="form-group mt-4">
                <label for="password">Password</label>
                <input v-model="password" type="password" :class="'form-control ' + formErrors.password" id="password" name="password" placeholder="password">
            </div>
            <div class="form-group mt-4">
                <label><h5>Role</h5></label>
                <select name="role" id="role" class="form-select">
                    <option value="1" selected>Адмін</option>
                    <option value="0">Користувач</option>
                </select>
            </div>
            <div class="form-group text-center mt-4">
                <button class="btn btn-primary" type="submit" :disabled="active">Sign in</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "SignIn",
    data: () => ({
        name: "",
        surname: "",
        email: "",
        phone: "",
        password: "",
        role: "",
        formErrors: {
            name: "is-invalid",
            surname: "is-invalid",
            email: "is-invalid",
            phone: "is-invalid",
            password: "is-invalid"
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
        surname() {
            this.formErrors.surname = "is-valid";
            if (this.surname.length < 4 || this.surname.length > 32) {
                this.formErrors.surname = "is-invalid";
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
        password() {
            this.formErrors.password = "is-valid";
            if ((this.password.length < 5) || !(/[a-zA-Z0-9]/.test(this.password))) {
                this.formErrors.password = "is-invalid";
            }
        },
    },
}
</script>

<style scoped>
    form {
        margin-top: 3em;
    }
</style>
