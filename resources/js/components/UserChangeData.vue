<template>
    <div class="adminRegister">
        <h2>Дані про Вас</h2>
        <div class="register">
            <div class="container-fluid">
                <div class="row">
                    <div id="CardStyle" class="card justify-content-center">
                        <div class="card-body">
                            <form action="/signInService" method="post">
                                <input type="hidden" name="_token" :value="this.csrfToken">
                                <div class="form-group mt-4">
                                    <label for="Name">
                                        Ім'я
                                    </label>
                                    <input v-model="name" type="text" :class="'form-control ' + formErrors.name" id="name" name="name" >
                                </div>
                                <div class="form-group mt-4">
                                    <label for="surname">Прізвище</label>
                                    <input v-model="surname" type="text" :class="'form-control ' + formErrors.surname" id="surname" name="surname" >
                                </div>
                                <div class="form-group mt-4">
                                    <label for="email">Електронна пошта</label>
                                    <input v-model="email" type="email" :class="'form-control ' + formErrors.email" id="email" name="email" >
                                </div>
                                <div class="form-group mt-4">
                                    <label for="phone">Номер телефону</label>
                                    <input v-model="phone" type="phone" :class="'form-control ' + formErrors.phone" id="phone" name="phone" >
                                </div>
                                <div class="form-group mt-4">
                                    <label for="password">Пароль</label>
                                    <input v-model="password" type="password" :class="'form-control ' + formErrors.password" id="password" name="password" >
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
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserChangeData",
    props:{
        user:{}
    },
    data(){
        return{
            userData: JSON.parse(this.user),
            name: this.userData.Name,
            surname: this.userData.Surname,
            email: this.userData.Email,
            phone: this.userData.Phone,
            password: this.userData.Password,
            role: "",
            formErrors: {
                name: "is-invalid",
                surname: "is-invalid",
                email: "is-invalid",
                phone: "is-invalid",
                password: "is-invalid"
            },
            active: true
        }
    },
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
input{
    border: none;
    background-color: rgba(255,255,255,0);
    border-bottom: solid black;
    size: 3px;
    margin-left: 10px;
    width: 85%;
    font-family: 'Montserrat Alternates', sans-serif;
    font-size: 16px;
    font-weight: 300;

}
label{
    color:grey;

}
.form-group{
    margin-top: 30px;

}
form{
    padding: 12px;
}
.form-check-input:checked + .form-check-label{
    color: red;
}
.register{

    margin: 60px auto;
    max-width: 600px;
    /* padding: 90px 70px;
    background:#fff; */
    color: #000;
    position: relative;
    text-shadow: none;
    box-shadow: 0 3px 5px 0 rgba(0,0,0,0.31);
}
#CardStyle{
    /* background-color: rgb(255, 255, 255,0.4); */
    box-shadow: 5px 3px 5px 5px gray;
}
.btn{
    font-family: 'Montserrat Alternates', sans-serif;
    font-size: 17px;
    font-weight: 500;
}

.adminRegister h2{
    margin-top: 30px;
    font-family: 'Montserrat Alternates', sans-serif;
    font-size: 35px;
    font-weight: 500;
    text-align: center;
}

</style>
