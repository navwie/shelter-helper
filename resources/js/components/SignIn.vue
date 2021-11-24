<template>
    <div class="page">
        <h2 class="banner text-center">Раді вітати Вас у нашій системі допомоги тваринам "ShelterHelper"</h2>
        <h3 class="text-center">Зареєструйтесь, будь-ласка, щоб користуватися нашою системою</h3>
        <div class="SignPage">
            <div class="d-flex col-12 form-signin container justify-content-center">
                <form action="/signInService" method="post">
                    <input type="hidden" name="_token" :value="this.csrfToken">
                    <h1 class="title text-center">Зареєструватися</h1>
                    <div class="form-group mt-4">
                        <label for="Name">
                            Ім'я
                        </label>
                        <input v-model="name" type="text" :class="'form-control ' + formErrors.name" id="name" name="name" placeholder="Введіть ім'я">
                    </div>
                    <div class="form-group mt-4">
                        <label for="surname">Прізвище</label>
                        <input v-model="surname" type="text" :class="'form-control ' + formErrors.surname" id="surname" name="surname" placeholder="Введіть прізвище">
                    </div>
                    <div class="form-group mt-4">
                        <label for="email">Електронна пошта</label>
                        <input v-model="email" type="email" :class="'form-control ' + formErrors.email" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group mt-4">
                        <label for="phone">Номер телефону</label>
                        <input v-model="phone" type="phone" :class="'form-control ' + formErrors.phone" id="phone" name="phone" placeholder="Введіть номер телефону">
                    </div>
                    <div class="form-group mt-4">
                        <label for="password">Пароль</label>
                        <input v-model="password" type="password" :class="'form-control ' + formErrors.password" id="password" name="password" placeholder="Введіть пароль">
                    </div>
                    <div class="form-group mt-4">
                        <label>Ви адмін чи користувач?</label>
                        <select name="role" id="role" class="form-select">
                            <option value="1" selected>Адмін</option>
                            <option value="0">Користувач</option>
                        </select>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button class="btn btn-primary" type="submit" :disabled="active">Зареєструватись</button>
                    </div>
                </form>
            </div>
        </div>
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
<style>
    html ,body{
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Titillium+Web:ital,wght@0,400;0,600;0,700;1,600&display=swap');
        background-color: #faf0e6;
        height: 100vh;
        margin: 0;
        background-attachment: fixed;

    }
</style>

<style scoped>
    h3{
        margin-top:20px;
        color:#000;
        font-size: 30px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        font-style: italic;
    }
    .title{

        margin-bottom: 40px;
        font-family: 'Montserrat', sans-serif;
        font-size: 40px;
    }
    .banner{
        margin-top:30px;
        color:#000;
        font-size: 38px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        font-style: italic;
    }
    .SignPage{
        margin: 40px auto;
        max-width: 650px;
        padding: 40px 20px;
        background:#D1E8E2;
        border-radius: 40px;
        position: relative;
        text-shadow: none;
        box-shadow: 0 3px 5px 0 rgba(0,0,0,0.31);
        margin-bottom: 90px;
    }
    .form-group{
        display: flex;
        justify-content: space-between;
    }
    .form-group label{
        color:#2C3531;
        top:5px;
        position: relative;
        right: 10px;
        font-family: 'Montserrat', sans-serif;
        font-size: 22px;

    }
    .form-group button{
        position:relative;
        margin-left:180px;
        width: 40%;
        font-family: 'Montserrat', sans-serif;
        font-size: 24px;
        border-radius:10px;
    }
    input{
        margin-bottom: 18px;
        width:300px;
        position: relative;
        left: 20px;
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;
    }
    .form-select{
        position: relative;
        left: 20px;
        width:300px;
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;
        margin-bottom: 10px;
    }

</style>
