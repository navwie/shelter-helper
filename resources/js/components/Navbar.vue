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
                                <a type="button" href="/signIn" class="nav-link link-dark px-2">{{ $t("navbar.registration") }}</a>
                                <a type="button" href="/" class="nav-link link-dark px-2">{{ $t("navbar.enter") }}</a>
                            </div></li>
                            <li v-if="user !== ''"><div class="profileElem">
                                <a type="button" :href="mainUrlId" class="nav-link link-dark px-2">{{ $t("navbar.main") }}</a>
                                <a type="button"  :href="profileUrlId" class="nav-link link-dark px-2">{{ $t("navbar.profile") }}</a>
                                <a type="button" href="/logOut" class="nav-link link-dark px-2">{{ $t("navbar.exit") }}</a>
                            </div></li>
                            <li><a type="button" href="/contacts" class="nav-link link-dark px-2">{{ $t("navbar.contacts") }}</a></li>
                            <li><a class="nav-link link-dark px-2 dropdown-toggle " href="#" role="button" id="dropdownMenuLinkLan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ua</a>
                                <div class="dropdown-menu" id = "lang" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item"  @click="setLocale('en')" href="#">En</a>
                                    <a class="dropdown-item" @click="setLocale('ua')" href="#">Ua</a>
                                </div>
                            </li>
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
    methods: {
        setLocale: function (locale) {
            localStorage.setItem('locale', locale);
            window.location.reload();
        }
    },
    computed:{
        profileUrlId: function (){
            return '/profile/'+ this.user;
        },
        mainUrlId:function (){
            return '/mainPage/'+ this.user;
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
