<template>
    <div class="AdminProfile text-center">
        <div class="dataInfo">
            <div class="viewing">
                <div class="box">
                    <div class="infobox">
                        <h2>{{$t("adminProfile.aboutPerson")}}</h2>
                        <div class="data">
                            <p class="dataTitle">{{$t("form.name")}}</p>
                            <p>{{userData.Name}}</p>
                        </div>
                        <div class="data">
                            <p class="dataTitle">{{$t("form.surname")}}</p>
                            <p>{{userData.Surname}}</p>
                        </div>
                        <div class="data">
                            <p class="dataTitle">{{$t("form.phone")}}</p>
                            <p>{{userData.Phone}}</p>
                        </div>
                        <div class="data">
                            <p class="dataTitle"> {{$t("form.email")}}</p>
                            <p>{{userData.Email}}</p>
                        </div>
                        <div class="data">
                            <p class="dataTitle">{{$t("form.password")}}</p>
                            <p class="dataInfo">{{userData.Password}}</p>
                        </div>
                        <a id="submitButton1" href="/userChangeData" class="btn btn-primary">{{$t("adminProfile.changePerson")}}</a>
                    </div>
                </div>
                <div class="box">
                    <div class="infobox">
                        <h2>{{$t("adminProfile.aboutShelter")}}</h2>
                        <div class="data">
                            <p class="dataTitle">{{$t("form.shelterName")}}</p>
                            <p>{{ this.shelterData.Name }}</p>
                        </div>
                        <div class="data">
                            <p class="dataTitle">{{$t("form.address")}}</p>
                            <p>{{ this.shelterData.Address }}</p>
                        </div>
                        <div class="data">
                            <p class="dataTitle">{{$t("form.phone")}}</p>
                            <p>{{ this.shelterData.Phone }}</p>
                        </div>
                        <div class="data">
                            <p class="dataTitle">{{$t("form.email")}}</p>
                            <p>{{ this.shelterData.Email }}</p>
                        </div>
                        <a id="submitButton" href="/editShelter" type="submit" class="btn btn-primary" >{{$t("adminProfile.changeShelter")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminProfile",
    props: {
        user:{},
        shelter: {},
    },
    data() {
        return{
            userData: JSON.parse(this.user),
            shelterData: JSON.parse(this.shelter)
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
    margin-top:68px;
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
    position: relative;
    justify-content: space-between;
    padding: 5px 10px ;
    font-size: 22px;
    font-family: 'Montserrat', sans-serif;
}
.dataTitle{
    margin-top: 8px;
    font-size: 16px;
    color: #7a7b7e;
    font-family: 'Montserrat', sans-serif;
}


.infobox h2{
    position: relative;
    top: 0px;
    font-family: 'Montserrat', sans-serif;
    text-align: center;
}
#submitButton1{
    width: 350px;
    font-size: 18px;
    margin-top:10px;

}
#submitButton{
    width: 350px;
    font-size: 19px;

}
</style>
