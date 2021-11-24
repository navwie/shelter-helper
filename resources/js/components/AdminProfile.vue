<template>
    <div class="AdminProfile text-center">
        <div class="dataInfo">
            <div class="viewing">
                <div class="infobox">
                    <h2>Дані про Вас</h2>
                    <div class="data">
                        <p class="dataTitle">Ім'я</p>
                        <p>sdf</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Прізвище</p>
                        <p>sdfs</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Номер мобільного телефону</p>
                        <p>sdfsdf</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Адреса електронної пошти</p>
                        <p>sdfsfs</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Пароль</p>
                        <p class="dataInfo">dfgdf</p>
                    </div>

                </div>
                <div class="infobox">
                    <h2>Дані про Ваш притулок</h2>
                    <div class="data">
                        <p class="dataTitle">Назва притулку</p>
                        <p>sdfsdf</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Адреса</p>
                        <p>sdfsdfsf</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Номер телефону</p>
                        <p>sdfsdf</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Електронна пошта</p>
                        <p>sdfsdfs</p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button id="submitButton" type="submit" class="btn btn-primary" >Змінити
                    данні</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminProfile",

}
</script>

<style scoped>

#submitButton{
    margin: 32px;
    width: 350px;
}

.viewing{
    display: flex;
    justify-content: space-between;
    margin-top: 60px;
}
.infobox {
    background:#D1E8E2;
    margin: 40px auto;
    max-width: 650px;
    color: #000;
    position: relative;
    text-shadow: none;
    box-shadow: 0 3px 5px 0 rgba(0,0,0,0.31);
    width: 550px; /* Ширина кнопки */
    height: 500px; /* Высота */
    border-radius: 40px;
    text-align: center;
    padding: 40px 20px;
    margin-bottom: 90px;

}

.btn{
    font-family: 'Titillium Web', sans-serif;
    font-size: 17px;
    font-weight: 500;
}

.dataInfo h2{
    position: relative;
    font-family: 'Titillium Web', sans-serif;
    text-align: center;
    margin-bottom: 50px;
}
.data{
    display: flex;
    justify-content: space-between;
    position: relative;
    padding: 5px 10px ;
    font-size: 22px;
    font-family: 'Titillium Web', sans-serif;
}
.dataTitle{
    font-size: 18px;
    color: #7a7b7e;
    font-family: 'Titillium Web', sans-serif;
}
.infobox h2{
    position: relative;
    top: 0px;
    font-family: 'Titillium Web', sans-serif;
    text-align: center;
}


</style>
