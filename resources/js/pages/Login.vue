<template>
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center" style="margin-top: 50px">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                    <strong>{{error}}</strong>
                                </div>
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <router-link to="login"><img src="fillow/images/logo-full.png" alt=""></router-link>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" v-model="email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <small v-if="password_require" style="font-size: 13px;" class="text-danger m-2">{{pass_msg}}</small>
                                            <input type="password" class="form-control" v-model="password">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" @click="handleSubmit">
                                                Sign Me In
                                            </button>
                                            <br>
                                            <button type="button" @click="show">Show</button>
                                        </div>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <router-link class="text-primary" to="/register">Sign up</router-link></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: "hetro@gmail.com",
                password: "admin123",
                pass_msg:"Password Is Required",
                password_require:false,
                error: null
            }
        },
        methods: {
            show(){
                console.log(this.$store.state.access_token);
                localStorage.clear();
            },
            handleSubmit(e) {
                e.preventDefault();
                if(this.password.length > 0) {
                    this.password_require = false;
                    this.$axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    })
                    .then(response => {
                        if (response.data.success) {
                            console.log(response.data.user);
                            this.save_token(response.data.access_token);
                            this.save_user(response.data.user);
                            this.save_profile(response.data.user.profile_done);
                            this.$router.push('/dashboard');
                            window.location.reload();
                        } else {
                            this.error = response.data
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                }else {
                    this.password_require = true;
                }
            },
            save_profile(profile){
                this.$store.dispatch('addProfile',profile)
            },
            save_user(user){
                this.$store.dispatch('addUser',user)
            },
            save_token(token){
                this.$store.dispatch('addToken',token)
            },
            delete_token(){
                this.$store.dispatch('deleteToken')
            }
        },
        created() {
            if(this.$store.state.access_token){
                this.$router.push('/dashboard');
            }
        },
        beforeRouteEnter(to, from, next) {
            // if(this.$store.state.access_token){
            //     this.$router.push('/dashboard');
            // }
            next();
            // localStorage.clear();
        }
    }
</script>
