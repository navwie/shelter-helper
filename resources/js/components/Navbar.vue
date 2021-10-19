<template>
    <header>
        <nav class="py-2 bg-light border-bottom">
            <div class="container">
                <ul class="nav col-12 mb-2 text-center justify-content-center mb-md-0">
                    <li class="nav-item"><a href="/documents" class="nav-link link-dark px-2 active" aria-current="page">Documents</a></li>
                    <li class="nav-item"><a href="/board" class="nav-link link-dark px-2">Board</a></li>
                    <li class="nav-item"><a href="/projects" class="nav-link link-dark px-2">Projects</a></li>
                    <li class="nav-item"><a href="/reports" class="nav-link link-dark px-2">Reports</a></li>
                    <li>
                        <div class="dropdown show">
                            <a class="nav-link link-dark dropdown-toggle" href="#" id="dropdownSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Settings
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownSettings">
                            </div>
                        </div>
                    </li>
                    <li><a type="button" href="/signIn" v-if="name.length === 0" class="nav-link active">Sign in</a></li>
                    <li><a type="button" href="/signUp" v-if="name.length === 0" class="btn btn-primary me-2">Sign up</a></li>
                    <li class="nav-item">
                        <div>
                            <a href="#" class="nav-link link-dark px-2">{{name}} {{surname}}</a>
                        </div>
                    </li>
                    <li><a type="button" href="/logOut" v-if="name.length !== 0" class="btn btn-primary me-2">Log Out</a></li>
                    <li v-if="project.length !== 0" class="nav-item">
                        <a href="/unselectProject" class="nav-link link-dark px-2">Project: {{project}}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Navbar",
    props: {
        name: "",
        surname: "",
        project: ""
    },
}
</script>

<style scoped>
    .nav-item {
        margin: 0 10px 0 10px;
    }

    .button {
        margin-left: 50px;
    }

</style>
