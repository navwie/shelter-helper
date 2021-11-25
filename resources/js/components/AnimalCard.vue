<template>
    <div class="page">
        <div class="infobox">
                <div class="elements">
                    <div class="data">
                        <p class="dataTitle">Ім'я тварини:</p>
                        <p>{{ name }}</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Вік тварини:</p>
                        <p>{{ age }}</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Стать тварини:</p>
                        <p>{{ sex }}</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Вид тварини:</p>
                        <p>{{ type }}</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Вага тварини:</p>
                        <p>{{ weight }}</p>
                    </div>
                </div>
                <div class="elements">
                    <div class="data">
                        <!-- <p>{{ img_url }}</p> -->
                        <img :src=img_url alt="">
                    </div>
                </div>
        </div>
        <div class="button">
            <a id="submitButton1" :href=editUrl class="btn btn-primary">Змінити дані </a>
            <a id="submitButton2" :href=deleteUrl  class="btn btn-primary">Видалити</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "AnimalCard",
    props: {
        id: "",
        name: "",
        age: "",
        sex: "",
        img_url: "",
        type: "",
        weight: ""
    },
    computed: {
        editUrl: function () {
            return `/editAnimal/${this.id}`;
        },
        deleteUrl: function () {
            return `/deleteAnimal/${this.id}`;
        }
    }
}
</script>

<style scoped>
.page{
    margin: 40px auto;
    width: 550px;
    padding: 40px 20px 40px 20px;
    background:#D1E8E2;
    border-radius: 40px;
    position: relative;
    text-shadow: none;
    box-shadow: 0 3px 5px 0 rgba(0,0,0,0.31);
    margin-bottom: 90px;
}
h1{
    color:#000;
    font-size: 30px;
    font-family: 'Titillium Web', sans-serif;
    font-weight: 700;
}
.data{
    margin-top: 7px;
    font-family: 'Montserrat', sans-serif;
    font-size: 24px;

}
.infobox{
    display: flex;
    justify-content: space-between;
}
.dataTitle{
    font-size: 20px;
    color:#7a7b7e;
}
h2{
    font-family: 'Montserrat', sans-serif;
    font-size:40px;
    margin: 40px 0 30px;
}
.btn{
    width:200px;
    font-family: 'Montserrat', sans-serif;
    font-size:18px;
    border-radius: 10px;
}
.button{
    display: flex;
    justify-content: space-between;
}
.data img{
    width: 320px;
    height: 320px;
    margin-top: 30px;
    border-radius: 40px;
}
</style>
