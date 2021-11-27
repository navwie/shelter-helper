<template>
    <div class="userPage ">
        <div class="PageItems">
            <div class="items">
                <h1 class="text-center">{{$t("user.h1")}}</h1>
                <p class="text-center">{{$t("user.p")}}</p>
                <ul class="rounded">
                    <li>{{$t("user.li1")}}</li>
                    <li>{{$t("user.li2")}}</li>
                    <li>{{$t("user.li3")}}</li>
                    <li>{{$t("user.li4")}}</li>
                </ul>
            </div>
            <div class="items">
                <img  src="https://scontent.fhrk2-1.fna.fbcdn.net/v/t39.30808-6/256148075_3061445684183319_1094536608817383091_n.jpg?_nc_cat=102&ccb=1-5&_nc_sid=8bfeb9&_nc_ohc=K0-H6jBTk5UAX8pnBxp&tn=LOty3kmthzo0ldSh&_nc_ht=scontent.fhrk2-1.fna&oh=6ce6f56b277f089177fc6a6b30bc4168&oe=61A3DB7D" alt="">
            </div>
        </div>
        <h2 class="text-center">{{$t("user.h2")}}</h2>
    </div>
</template>

<script>
export default {
    name:"UserPage"
}
</script>

<style scoped>
.userPage{
    margin: 40px auto;
    max-width: 1000px;
    padding: 40px 20px;
    background:#D1E8E2;
    border-radius: 40px;
    position: relative;
    text-shadow: none;
    box-shadow: 0 3px 5px 0 rgba(0,0,0,0.31);
    margin-bottom: 90px;
}
.PageItems{
    display: flex;
    justify-content: space-between;
}
.userPage img{
    max-width: 100%;
    border-radius: 30px;
    margin-right: 180px;
}
h1{
    font-family: 'Titillium Web', sans-serif;
    font-size: 24px;
    margin-bottom: 30px;
    font-weight:700;
    font-style:italic;
}
h2{
    font-family: 'Titillium Web', sans-serif;;
    font-size: 24px;
    margin-top: 50px;
    line-height: 1.5;
    margin-bottom: 30px;
    font-weight:700;
    color:red;
}
p{
    font-family: 'Titillium Web', sans-serif;
    font-size: 22px;
    font-weight: 400;
    margin-bottom: 30px;
}
.rounded {
    padding:0;
    list-style: none;
}
.rounded li{
    padding:6px;
    margin-left: 20px;
    color: #ffa500;
    font-weight: 500;
    font-size: 22px;
    font-style:italic;
    font-family: 'Titillium Web', sans-serif;
}
.rounded li:before {
    padding-right:10px;
    font-weight: bold;
    color: #ffa500;
    content: "\2606";
    transition-duration: 0.5s;
}
.rounded li:hover:before {
    color: #ffa500;
    content: "\2605";
}
</style>
