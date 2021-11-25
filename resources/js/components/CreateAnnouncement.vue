<template>
    <div class="SignPage">
        <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
            <form action="/createAnnouncementService" method="post">
                <input type="hidden" name="_token" :value="this.csrfToken">
                <h1 class="h3 mb-3 fw-normal text-center">Створити об'яву</h1>
                <div class="form-items">
                    <div class="form-group mt-4">
                        <label for="topic">Тема:</label>
                        <select v-model="topic" name="topic" >
                            <option value="Їжа">Їжа</option>
                            <option value="Посуд">Посуд</option>
                            <option value="Іграшки">Іграшки</option>
                            <option selected value="Медичні препарати">Медичні препарати</option>
                        </select>
                        <!--<input v-model="topic" type="text" :class="'form-control ' + formErrors.topic" id="topic" name="topic" placeholder="topic"> -->
                    </div>
                    <div class="form-group mt-4">
                        <label for="description">Опис:</label>
                        <textarea v-model="description" type="text" :class="'form-control ' + formErrors.description" id="description" name="description" placeholder="Опишіть потребу" />
                    </div>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-primary" type="submit" :disabled="active">Створити</button>
                </div>
            </form>
        </div>
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
        description() {
            this.formErrors.description = "is-valid";
            if (this.description.length < 3 || this.description.length > 200) {
                this.formErrors.description = "is-invalid";
            }
        },
    },
}
</script>

<style scoped>

h1{
    color:#000;
    font-size: 30px;
    font-family: 'Titillium Web', sans-serif;
    font-weight: 700;
}

.SignPage{
    margin: 40px auto;
    max-width: 650px;
    padding: 5px 20px 40px 20px;
    background:#D1E8E2;
    border-radius: 40px;
    position: relative;
    text-shadow: none;
    box-shadow: 0 3px 5px 0 rgba(0,0,0,0.31);
    margin-bottom: 90px;
}
.form-group{
    display:flex;
    flex-direction:column;
}
.form-group label{
    color:#2C3531;
    position: relative;
    right: 15px;
    bottom: 10px;
    font-weight: 400;
    font-family: 'Montserrat', sans-serif;
    font-size: 26px;
}
.form-group button{
    position:relative;
    margin-left:10px;
    width: 40%;
    font-family: 'Montserrat', sans-serif;
    font-size: 24px;
    border-radius:10px;
}
textarea{
    height : 160px;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    width:550px;
    padding: 5px 5px 5px 15px;
    border-color:#ccc;
    border-radius: 20px;
    position: relative;
}
select{
    width:550px;
    padding: 5px 5px 5px 15px;
    border-color:#ccc;
    border-radius: 20px;
    position: relative;
    background-color: #fff;
    font-family: 'Montserrat', sans-serif;
    font-size: 24px;
}
</style>
