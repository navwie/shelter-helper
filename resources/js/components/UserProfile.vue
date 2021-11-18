<template>
    <div class="UserProfile text-center">
        <div class="infobox">
            <h2>Дані про Вас</h2>
                <div class="data">
                    <p class="dataTitle">Ім'я</p>
                    <p class="dataInfo">{{userData.Name}}</p>
                </div>
                <div class="data">
                    <p class="dataTitle">Прізвище</p>
                    <p class="dataInfo"> {{userData.Surname}}</p>
                </div>
                <div class="data">
                    <p class="dataTitle">Номер мобільного телефону</p>
                    <p class="dataInfo">{{userData.Phone}}</p>
                </div>
                <div class="data">
                    <p class="dataTitle">Адреса електронної пошти</p>
                    <p class="dataInfo">{{userData.Email}}</p>
                </div>
                <div class="data">
                    <p class="dataTitle">Пароль</p>
                    <p class="dataInfo">{{userData.Password}}</p>
                </div>
                <div class="text-center">
                    <a id="submitButton" href="/UserChangeData" type="submit" class="btn btn-primary">Змінити
                        данні</a>
                </div>
            </div >
        </div>
</template>

<script>
export default {
    name: "UserProfile",
    props: {
        user:{}
    },
    data(){
        return{
            userData: JSON.parse(this.user),
        }
    }
}
</script>

<style scoped>

.UserProfile{
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
.infobox h2{
    position: relative;
    top: 0px;
    font-family: 'Titillium Web', sans-serif;
    text-align: center;
}
.data{
    display: flex;
    justify-content: space-between;
    position: relative;
    top: 0px;
    padding: 5px 10px ;

}
.dataInfo{
    font-size: 24px;
    font-family: 'Titillium Web', sans-serif;
}
.dataTitle{
    font-size: 22px;
    color: #7a7b7e;
    font-family: 'Titillium Web', sans-serif;
}
#submitButton{
    margin-top: 20px;
    position:relative;
    width: 35%;
    font-family: 'Titillium Web', sans-serif;
    font-size: 22px;
    border-radius:10px;
}
</style>
