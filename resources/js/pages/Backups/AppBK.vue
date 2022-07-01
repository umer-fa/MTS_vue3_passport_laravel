<template>

    <div  v-if="isLoggedIn">
        <nav class="navbar navbar-expand-sm navbar-dark bg-black mb-1">
            <a class="navbar-brand" href="#">Laravel Vue 3</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="navbar-nav" v-if="isLoggedIn">
                <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                <router-link to="/about" class="nav-item nav-link">About</router-link>
                <a class="nav-item nav-link" @click="logout">Logout</a>
            </div>
        </nav>
    </div>
    <div v-else>
        <nav class="navbar navbar-expand-sm navbar-dark bg-black mb-1">
            <a class="navbar-brand" href="#">Laravel Vue 3</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="navbar-nav">
                <router-link to="/" class="nav-item nav-link">Home</router-link>
                <router-link to="/login" class="nav-item nav-link">Login</router-link>
                <router-link to="/register" class="nav-item nav-link">Register</router-link>
            </div>
        </nav>

    </div>
    <router-view></router-view>
</template>
<script>
    export default {
        name: "App",
        data() {
            return {
                isLoggedIn: false,
            }
        },
        created() {
            if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
        },
        methods: {
            logout(e) {
                e.preventDefault()
                this.$axios.get('sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/logout')
                    .then(response => {
                        if(response.data.success) {
                            window.location.href = "/laravel-9-vue-3/public/login"
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                })
            }
        },
    }


</script>
