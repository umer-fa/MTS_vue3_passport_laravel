<template>

    <div v-if="this.$store.state.access_token && this.$store.state.profile_done==2">
        <div id="main-wrapper">
            <!--**********************************
                Nav header start
            ***********************************-->
            <Header></Header>
            <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

            <!--**********************************
                Sidebar start
            ***********************************-->
            <Sidebar></Sidebar>
            <!--**********************************
                Sidebar end
            ***********************************-->

            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <!-- row -->
                <div class="container-fluid">
                    <router-view></router-view>
                </div>
            </div>
            <!--**********************************
                Content body end
            ***********************************-->

            <!--**********************************
                Footer start
            ***********************************-->
            <Footer></Footer>
            <!--**********************************
                Footer end
            ***********************************-->
        </div>
    </div>
    <div v-else-if="this.$store.state.access_token && this.$store.state.profile_done <= 1">
        <setup></setup>
    </div>
    <div v-else>
        <nav class="navbar navbar-expand-sm navbar-dark bg-purpel mb-1">
            <a class="navbar-brand" href="#">OOPs</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="navbar-nav">
                <router-link to="/" class="nav-item nav-link">Home</router-link>
                <router-link to="/login" class="nav-item nav-link">Login</router-link>
                <router-link to="/register" class="nav-item nav-link">Register</router-link>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>
<script>
import Header from './pages/theme/Header';
import Sidebar from './pages/theme/Sidebar';
import Footer from './pages/theme/Footer';
import setup from './pages/Setup';
export default {
    name: "App",
    components: {
        Header,Sidebar,Footer,setup,
    },
    data() {
        return {
            // isLoggedIn: false,
            user: [],
        }
    },
    created() {
        // if (window.Laravel.isLoggedin) {
        //     this.isLoggedIn = true,
        //         this.user = window.Laravel.user
        // }
    },
}
</script>
