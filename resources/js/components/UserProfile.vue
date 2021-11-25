<template>
        <div class="UserProfile text-center">
            <div class="box">
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
                        <p class="dataTitle">Номер телефону</p>
                        <p class="dataInfo">{{userData.Phone}}</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Електронна пошта</p>
                        <p class="dataInfo">{{userData.Email}}</p>
                    </div>
                    <div class="data">
                        <p class="dataTitle">Пароль</p>
                        <p class="dataInfo">{{userData.Password}}</p>
                    </div>
                    <div class="text-center">
                        <a id="submitButton" href="/userChangeData" type="submit" class="btn btn-primary">Змінити
                            данні</a>
                    </div>
                </div >
            </div>
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

.box{
    background:#D1E8E2;
    margin: 40px auto;
    max-width: 950px;
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
.viewing{
    display: flex;
    justify-content: space-between;
    margin-top: 60px;
}
.infobox {
    background:#fff;
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
    font-family: 'Montserrat', sans-serif;
    font-size: 23px;
    font-weight: 500;
    width: 300px;
    margin-top:50px;
    border-radius: 20px;
}
.dataInfo h2{
    position: relative;
    font-family: 'Montserrat', sans-serif;
    text-align: center;
    margin-bottom: 50px;
}
.data{
    display: flex;
    justify-content: space-between;
    position: relative;
    padding: 5px 10px ;
    font-size: 22px;
    font-family: 'Montserrat', sans-serif;
}
.dataTitle{
    font-size: 22px;
    color: #7a7b7e;
    font-family: 'Montserrat', sans-serif;
}
.infobox h2{
    position: relative;
    top: 0px;
    font-family: 'Montserrat', sans-serif;
    text-align: center;
}
</style>
