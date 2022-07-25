<template>
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <router-link to=""><img src="fillow/images/logo-full.png" alt=""></router-link>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <img src="fillow/images/circle-hunt.png" style="width: 100%; height: 70%;margin-top: 27px;" />
                                        </div>
                                        <div class="col-xl-6">
                                            <form>
                                                <div class="row">{{report}}</div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="mb-1"><strong>Name
                                                                <label class="text text-danger">*</label>
                                                                <small class="text-xs text-danger" v-if="name_error">{{name_error}}</small>
                                                            </strong></label>
                                                            <input type="text" class="form-control" v-model="form.name" placeholder="User Name">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="mb-1"><strong>User Name
                                                                <label class="text text-danger">*</label>
                                                                <small class="text text-danger" v-if="error && form.username==null || form.username ==''">Required</small>
                                                                <small class="text-xs text-danger" v-if="username_error">{{username_error}}</small>
                                                            </strong></label>
                                                            <input type="text" class="form-control" v-model="form.username" placeholder="User Name" v-on:keypress="username($event)">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="mb-1"><strong>Phone Number
                                                                <label class="text text-danger">*</label>
                                                                <small class="text text-danger" v-if="error && form.phone==null || form.phone==''">Required</small>
                                                                <small class="text-xs text-danger" v-if="phone_error">{{phone_error}}</small>
                                                            </strong></label>
                                                            <input type="number" class="form-control" id="phone" v-model="form.phone" >
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="mb-1"><strong>Email
                                                                <label class="text text-danger">*</label>
                                                                <small class="text-xs text-danger" v-if="error && form.email==null || form.email=='' ">Required</small>
                                                                <small class="text-xs text-danger" v-if="email_error">{{email_error}}</small>
                                                            </strong></label>
                                                            <input type="email" class="form-control" v-model="form.email" placeholder="hello@example.com">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="mb-1"><strong>Password
                                                                <label class="text text-danger">*</label>
                                                                <small v-if="password_require" style="font-size: 13px;" class="text-danger m-2">{{pass_msg}}</small>
                                                                <small class="text-xs text-danger" v-if="pass_error">{{pass_error}}</small>
                                                            </strong></label>
                                                            <input type="password" class="form-control" v-model="form.password" >
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="mb-1"><strong>Confirm Password
                                                                <label class="text text-danger">*</label>
                                                                <small v-if="password_require" style="font-size: 13px;" class="text-danger m-2">{{pass_msg}}</small>
                                                                <small class="text-xs text-danger" v-if="password_confirm_error">{{password_confirm_error}}</small>
                                                            </strong></label>
                                                            <input type="password" class="form-control" v-model="form.password_confirmation" >
                                                        </div>
                                                    </div>
<!--                                                    <div class="row">-->

                                                        <!--<div class="mb-3 col-md-6">-->
                                                            <!--<label class="mb-1"><strong>Store Name-->
                                                                <!--<label class="text text-danger">*</label>-->
                                                                <!--<small class="text text-danger" v-if="error && form.store_name==null || form.store_name==''">Required</small>-->
                                                            <!--</strong></label>-->
                                                            <!--<input type="text" class="form-control" id="store_name" v-model="form.store_name">-->
                                                        <!--</div>-->
<!--                                                    </div>-->
                                                    <!--<div class="row">-->
                                                        <!--<div class="mb-3 col-md-6">-->
                                                            <!--<label class="mb-1"><strong>Estimated Monthly sales <label class="text text-danger">*</label></strong></label>-->
                                                            <!--&lt;!&ndash;<input type="text" class="form-control" />&ndash;&gt;-->
                                                            <!--<select id="estimated_monthly_sales" v-model="form.estimated_monthly_sale" class="form-control" required="">-->
                                                                <!--<option value="">Estimated monthly sales?</option>-->
                                                                <!--<option value="Under $5,000">Under $5,000</option>-->
                                                                <!--<option value="$5,000 to $10,000">$5,000 to $10,000</option>-->
                                                                <!--<option value="$10,000 - $15,000">$10,000 - $15,000</option>-->
                                                                <!--<option value="$15,000 - $20,000">$15,000 - $20,000</option>-->
                                                                <!--<option value="Over $20,000">Over $20,000</option>-->
                                                            <!--</select>-->
                                                        <!--</div>-->
                                                        <!--<div class="mb-3 col-md-6">-->
                                                            <!--<label class="mb-1"><strong>Store Location <label class="text text-danger">*</label></strong></label>-->
                                                            <!--&lt;!&ndash;<input type="text" class="form-control" />&ndash;&gt;-->
                                                            <!--<select id="store_locations" v-model="form.store_locations" class="form-control" required="">-->
                                                                <!--<option value="">Store Locations</option>-->
                                                                <!--<option value="1">1</option>-->
                                                                <!--<option value="2">2</option>-->
                                                                <!--<option value="3">3</option>-->
                                                                <!--<option value="4">4</option>-->
                                                                <!--<option value="5+">5+</option>-->
                                                            <!--</select>-->
                                                        <!--</div>-->

                                                    <!--</div>-->
                                                    <!--<div class="row">-->
                                                    <!--<div class="mb-3 col-md-6">-->
                                                        <!--<label class="mb-1"><strong>Country <label class="text text-danger">*</label></strong></label>-->
                                                        <!--<select id="country" v-model="form.country" class="form-control" required="">-->
                                                            <!--<option value="">Select a Country</option>-->
                                                        <!--</select>-->
                                                    <!--</div>-->
                                                <!--</div>-->
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6"></div>
                                                        <div class="mb-3 col-md-6">
                                                            <div class="text-center mt-4">
                                                                <button type="submit" @click="handleSubmit" class="btn btn-primary btn-block">Sign Me Up</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
                                            <div class="new-account text-center mt-4">
                                                <p>Already have an account? <router-link to="login" class="text-primary">Sign in</router-link></p>
                                            </div>
                                        </div>
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
                step:1,
                form: {
                    name: null,
                    username: null,
                    email: null,
                    password: null,
                    password_confirmation: null,
                    phone: null,
                },
                error: null,
                email_error: '',
                username_error: '',
                name_error: '',
                report: null,
                password_require: false,
                pass_msg: '',
                pass_error:'',
                password_confirm_error:'',
                phone_error:'',
            }
        },
        methods: {
            username(e) {
                let char = String.fromCharCode(e.keyCode);
                const message = this.form.user_name;
                if(!message) {
                    if (/^[A-Za-z]+$/.test(char)) return true;
                    else e.preventDefault();
                }else{
                    if (/^[A-Za-z_0-9-]+$/.test(char)) return true;
                    else e.preventDefault();
                }
            },
            handleSubmit(e) {
                e.preventDefault()
                if(this.form.username==null || this.form.username=='' || this.form.email==null || this.form.email==''){
                    this.error = true;
                }else {
                    // if (this.form.password === this.form.password_confirm && (this.form.password !='' ||
                    //     this.form.password !=null || this.form.password_confirm!='' || this.form.password_confirm!=null )) {
                        this.pass_msg = '';
                        this.password_require = false;
                        // this.$axios.get('sanctum/csrf-cookie').then(response => {
                            this.$axios.post('api/register', this.form)
                                .then(response => {
                                    if (response.data.success) {
                                        console.log(response.data);
                                        this.save_token(response.data.access_token);
                                        this.save_user(response.data.user);
                                        this.save_profile(response.data.user.profile_done);
                                        this.$router.push('/dashboard');
                                        window.location.reload();
                                    } else {
                                        this.error = response.data
                                    }
                                }).catch(error => {
                                    if(error.response.status==422){
                                        this.email_error = error.response.data.errors.email;
                                        this.username_error = error.response.data.errors.username;
                                        this.name_error = error.response.data.errors.name;
                                        this.pass_error = error.response.data.errors.password;
                                        this.password_confirm_error = error.response.data.errors.password_confirm;
                                        this.phone_error = error.response.data.errors.phone;
                                    }
                                // this.error_email = error.response.data.error.email

                            });
                        // });
                    // } else {
                    //     this.pass_msg = 'Check Password Fields';
                    //     this.password_require = true;
                    // }
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

        beforeRouteEnter(to, from, next) {
            next();
        }
    }
</script>
