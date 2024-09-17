<template>
    <div class="page">
        <div class="SignPage">
            <div class="d-flex col-12 form-signin container justify-content-center">
                <form action="/createAnimalService" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" :value="this.csrfToken">
                    <h1 class="title text-center">{{$t("animal.animalTitle")}}</h1>
                    <div class="form-group mt-4">
                        <label class="form-group-label" for="Name">
                            {{$t("form.nameAnimal")}}
                        </label>
                        <input v-model="name"  type="text" :class="'form-control ' + formErrors.name" id="name" name="name" placeholder="Введіть ім'я">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-group-label" for="age">{{$t("form.ageAnimal")}}</label>
                        <input v-model="age"  type="text" :class="'form-control ' + formErrors.age" id="age" name="age" placeholder="Введіть вік">
                    </div>

                   <div class="form-group mt-4">
                        <label class="form-group-label" for="sex">{{$t("form.sexAnimal")}}</label>
                        <div class="sex-choice">
                            <div class="form-check">
                                <input v-model="sex" class="form-check-input" type="radio" value="чол" name="sex" id="sexAnimal1" checked>
                                <label class="form-check-label" for="sexAnimal1">
                                    Чол
                                </label>
                            </div>
                            <div class="form-check">
                                <input v-model="sex" class="form-check-input" type="radio"  value="жін"  name="sex" id="sexAnimal2" >
                                <label class="form-check-label" for="sexAnimal2">
                                    Жін
                                </label>
                            </div>
                        </div>
                       <!-- <input v-model="sex" type="email" :class="'form-control ' + formErrors.email" id="sex" name="sex" placeholder="name@example.com">-->
                    </div>
                     <div class="form-group mt-4">
                        <label class="form-group-label" for="type">{{$t("form.typeAnimal")}}</label>
                        <div class="sex-choice">
                            <div class="custom-control custom-radio">
                                <input v-model="type" class="form-check-input" type="radio" value="Пес" name="type" id="typeAnimal1" checked>
                                <label class="form-check-label" for="typeAnimal1">
                                    Пес
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input v-model="type" class="form-check-input" type="radio" value="Кіт" name="type" id="typeAnimal2" >
                                <label class="form-check-label" for="typeAnimal2">
                                    Кіт
                                </label>
                            </div>
                        </div>
                         <!-- <input v-model="type" type="text" :class="'form-control ' + formErrors.password" id="type" name="type" placeholder="Введіть пароль">-->
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-group-label" for="weight">{{$t("form.weightAnimal")}}</label>
                        <input v-model="weight"  type="text" :class="'form-control ' + formErrors.weight" id="weight" name="weight" placeholder="Введіть вагу тварини">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-group-label" for="img">{{$t("animal.animalImg")}}</label>
                        <input class="ng-hide" name="img" id="img" multiple type="file" />
                    </div>
                    <div class="form-group text-center mt-4">
                        <button class="btn btn-primary" type="submit" :disabled="active">{{$t("form.btnReg")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateAnimal",
    data: () => ({
        name: "",
        age: "",
        sex: "",
        img_url: "",
        type: "",
        weight: "",
        formErrors: {
            name: "is-invalid",
            age: "is-invalid",
            weight: "is-invalid",
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
        age() {
            this.formErrors.age = "is-valid";
            if (this.age.length < 0 || this.age.length > 32) {
                this.formErrors.age = "is-invalid";
            }
        },
        weight() {
            this.formErrors.weight = "is-valid";
            if (this.weight().length < 0 || this.weight().length > 32) {
                this.formErrors.weight = "is-invalid";
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
.title{
    margin-bottom: 40px;
    font-family: 'Montserrat', sans-serif;
    font-size: 40px;
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
.form-group-label{
    color:#2C3531;
    top:5px;
    position: relative;
    right: 10px;
    font-family: 'Montserrat', sans-serif;
    font-size: 22px;
}
.form-group button{
    position:relative;
    margin-left:120px;
    width: 280px;
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
.form-check-input{
    width:21px;
    top: 5px;
    border-radius: 100px;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    position: relative;
    margin-right: 61px;
}
.sex-choice{
    display: flex;
    justify-content: space-between;
}
.form-check-label{
    color:#2C3531;
    position: relative;
    right: 27px;
    font-family: 'Montserrat', sans-serif;
    font-size: 22px;
}


</style>
