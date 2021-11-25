<template>
    <div class="Support">
        <div class="infobox">
            <h2>Напишіть нам</h2>
            <p>Напишіть або наберіть нам за нижче вказаними контактами</p>
            <div class="box">
                <div class="infobox-info">
                    <div class="profile__info">
                        <h3>Ім'я</h3>
                        <input class="input__name" type="text" maxlength="30" placeholder="Введіть ім'я">
                    </div>
                    <div class="profile__info">
                        <h3>Прізвище</h3>
                        <input class="input__name" type="text" maxlength="30" placeholder="Введіть прізвище">
                    </div>
                    <div class="profile__info">
                        <h3>E-mail</h3>
                        <input class="input__name" type="text" maxlength="30" placeholder="Введіть пошту">
                    </div>
                    <div class="profile__info">
                        <h3>Повідомлення</h3>
                        <textarea class="massage" placeholder="Напишіть щось"></textarea>
                    </div>
                </div>
                <div class="infobox-info line">
                    <div class="phone-info">
                        <p class="title-phone">Телефон:</p>
                        <p class="info-phone">+380958300692</p>
                    </div>
                    <div class="phone-info">
                        <p class="title-phone">Почта:</p>
                        <p class="info-phone">ShelterHelper@gmail.com</p>
                    </div>
                    <div class="phone-info">
                        <p class="title-phone">Скайп:</p>
                        <p class="info-phone">shelterHelper</p>
                    </div>
                    <div class="phone-info">
                        <p class="title-phone">Телеграм:</p>
                        <p class="info-phone">@shelterHelper</p>
                    </div>
                </div>
            </div>
            <div class="">
                <a id="submitButton" href="#" type="submit" class="btn">Відправити</a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Contacts"
}
</script>

<style scoped>
p{
    text-align: center;
    margin-top: 15px;
}
h2{
    text-align: center;
    font-family: 'Montserrat', sans-serif;
}
.input__name{
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    width:400px;
    padding: 5px 5px 5px 15px;
    border-color:#f5f5f5;
    border-radius: 20px;
    color: #f5f5f5;
}
.massage{
    height : 160px;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    width:400px;
    padding: 5px 5px 5px 15px;
    border-color:#ccc;
    border-radius: 20px;
}
.profile__info{
    margin-top: 28px;
}
h3{
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
}
.box{
    display: flex;
    justify-content: space-between;
}
.infobox{
    margin: 40px auto;
    width: 1000px;
    padding: 40px 20px;
    background:#D1E8E2;
    border-radius: 35px;
    position: relative;
    text-shadow: none;
}
.infobox-info{
    margin-left: 20px;
}
#submitButton{
    position:relative;
    width: 250px;
    border-radius: 20px;
    font-family: 'Montserrat', sans-serif;
    font-size: 21px;
    margin-left: 80px;
    color:#fff;
    outline: none;
    background-color: #4b9123;
}
.line {
    height:520px;
    margin-top:40px;
    border-left: 2px solid #ccc; /* Параметры линии */
    margin-left: 20px; /* Отступ слева */
    padding-left: 40px; /* Расстояние от линии до текста */
}
.phone-info{
    margin-top: 30px;
    display: flex;
    justify-content: space-between;
}
.info-phone{
    margin-left: 30px;
    color: #828282;
    font-size: 20px;
    text-decoration:underline;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
}
.title-phone{
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    font-weight: 700;
}
</style>
