<template>
    <div class="d-flex col-12 justify-content-center mt-5 text-center">
        <div class="mt-5">
            <h4>To continue, please <a href="/signUp">sign up</a></h4>
            <p>If you don`t have account, please <a href="/signIn">sign in</a></p>
        </div>
    </div>
</template>

<script>
export default {
    name: "NotAuth"
}
</script>

<style scoped>
    h4 {
        margin-top: 5em;
    }

    a {
        text-decoration: none;
    }
</style>
