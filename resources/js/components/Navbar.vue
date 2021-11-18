<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" >
            <div class="container-fluid">

                <a class="navbar-brand" href="#">ShelterHelper</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-flex">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav col-12 mb-2 text-center justify-content-center mb-md-0">
                            <li v-if="role === ''"><div class="enter">
                                <a type="button" href="/signIn" class="nav-link link-dark px-2">Реєстрація</a>
                                <a type="button" href="/" class="nav-link link-dark px-2">Увійти</a>
                            </div></li>
                            <li v-if="user !== ''"><div class="profileElem">
                                <a type="button"  :href="profileUrlId" class="nav-link link-dark px-2">Профіль</a>
                                <a type="button" href="/logOut" class="nav-link link-dark px-2">Вийти</a>
                            </div></li>
                            <li><a type="button" href="/Contacts" class="nav-link link-dark px-2">Контакти</a></li>
                            <li><a type="button" href="/" class="nav-link link-dark px-2">Ua</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Navbar",
    props:{
        user:"",
        role:"",
    },
    computed:{
        profileUrlId: function (){
            return '/profile/'+ this.user;
        }
    }
}
</script>
<style>
header{
    background-color: #D1E8E2;
    font-size: 22px;
    font-weight: 400;
    font-family: 'Montserrat', sans-serif;
}
</style>
<style scoped>
    .navbar-brand{
        font-family: 'Montserrat Alternates', sans-serif;
        font-size: 38px;
        font-weight: 700;
        font-style:italic;
        margin-left:20px;
    }
    .enter{
        display: flex;
        justify-content: space-between;
    }
    .profileElem{
        display: flex;
        justify-content: space-between;
    }
    ul li a:hover{
        color:blue;
        text-decoration: underline;
    }
    .d-flex a{
        font-family: 'Montserrat Alternates', sans-serif;
        font-size: 28px;
        font-weight: 400;
        margin-right:20px;
    }
</style>
