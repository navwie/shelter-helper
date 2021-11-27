<template>
    <div class="sign-page">
        <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
            <form :action=editLink method="post">
                <input type="hidden" name="_token" :value="this.csrfToken">
                <h1 class="h3 mb-3 fw-normal text-center">{{$t("shelter.changeTitle")}}</h1>
                <div class="form-group mt-4">
                    <label for="Name">{{$t("form.nameAnimal")}}</label>
                    <input v-model="name" type="text" :class="'form-control ' + formErrors.name" id="name" name="name" placeholder="name">
                </div>
                <div class="form-group mt-4">
                    <label for="address">{{$t("form.address")}}</label>
                    <input v-model="address" type="text" :class="'form-control ' + formErrors.address" id="address" name="address" placeholder="Адреса">
                </div>
                <div class="form-group mt-4">
                    <label for="phone">{{$t("form.phone")}}</label>
                    <input v-model="phone" type="phone" :class="'form-control ' + formErrors.phone" id="phone" name="phone" placeholder="Телефон">
                </div>
                <div class="form-group mt-4">
                    <label for="email">{{$t("form.email")}}</label>
                    <input v-model="email" type="email" :class="'form-control ' + formErrors.email" id="email" name="email" placeholder="Пошта">
                </div>
                <div class="form-group text-center mt-4">
                    <button class="btn btn-primary" type="submit" :disabled="active">{{$t("form.changeBtn")}}</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditShelter",
    props: {
        shelter: ""
    },
    data() {
        return {
            shelterData: JSON.parse(this.shelter),
            name: "",
            address: "",
            email: "",
            phone: "",
            formErrors: {
                name: "is-valid",
                address: "is-valid",
                email: "is-valid",
                phone: "is-valid",
            },
            active: true
        }
    },
    mounted() {
        this.name = this.shelterData.Name;
        this.address = this.shelterData.Address;
        this.email = this.shelterData.Email;
        this.phone= this.shelterData.Phone;
    },
    updated() {
        let errors = Object.values(this.formErrors);
        this.active = errors.includes("is-invalid")
    },
    computed: {
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
        editLink: function () {
            return `/editShelterService/${this.shelterData.id}`;
        }
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

h3{
    margin-top:20px;
    color:#000;
    font-size: 30px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 500;
    font-style: italic;
}

.sign-page{
    margin: 40px auto;
    max-width: 650px;
    padding: 10px 20px 40px;
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
    margin-left:140px;
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
    border-radius: 10px;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
}

</style>
