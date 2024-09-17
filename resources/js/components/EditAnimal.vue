<template>
    <div class="page">
        <div class="SignPage">
            <div class="d-flex col-12 form-signin container justify-content-center">
                <form :action=editLink method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" :value="this.csrfToken">
                    <h1 class="title text-center">Змінити дані про тварину</h1>
                    <div class="form-group mt-4">
                        <label class="form-group-label" for="Name">
                            Ім'я тварини
                        </label>
                        <input v-model="name"  type="text" :class="'form-control ' + formErrors.name" id="name" name="name" placeholder="Введіть ім'я">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-group-label" for="age">Вік</label>
                        <input v-model="age"  type="text" :class="'form-control ' + formErrors.age" id="age" name="age" placeholder="Введіть вік">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-group-label" for="weight">Вага</label>
                        <input v-model="weight"  type="text" :class="'form-control ' + formErrors.weight" id="weight" name="weight" placeholder="Введіть вагу тварини">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-group-label" for="img">Фото тварини</label>
                        <input class="ng-hide" id="img" name="img" multiple type="file" />
                    </div>
                    <div class="form-group text-center mt-4">
                        <button class="btn btn-primary" type="submit" :disabled="active">Змінити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditAnimal",
    props: {
        animal: ""
    },
    data() {
        return {
            animalData: JSON.parse(this.animal),
            name: "",
            age: "",
            img_url: "",
            weight: "",
            formErrors: {
                name: "is-invalid",
                age: "is-invalid",
                weight: "is-invalid",
            },
            active: true
        }
    },
    mounted() {
        this.name = this.animalData.Name;
        this.age = this.animalData.Age;
        this.weight = this.animalData.Weight;
        this.img_url = this.animalData.Img_URL;
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
            return `/editAnimalService/${this.animalData.id}`;
        }
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
    border-radius: 10px;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
}


</style>
