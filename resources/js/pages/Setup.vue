<template>
    <div class="container ">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="card-title" style="font-size: 45px;">{{title}}</h2>
<!--                {{this.$store.state.profile_done}}-->
            </div>
            <div class="col-lg-6">
                <h2 class="steps">Step {{step}} - 2</h2>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card card1" v-if="step==0">
                <div class="card-body">
                    <div class="basic-form">
                        <form>
                            <div class="row">
                                <div class="mb-3 col-md-4"></div>
                                <div class="mb-3 col-md-4">
                                    <p class="text-center">
                                        <input type="file" accept="image/*" ref="file" v-on:change="onFileChange" style="display: none;">
                                        <img @click="$refs.file.click()" height="200" width="200" :src="url" class="img-thumbnail center-block" style="cursor: pointer; height: 200px !important; width: 200px !important; ;border-radius: 40%" />
                                        <small class="text-xs text-danger" v-if="image">{{image}}</small>
                                    </p>
                                </div>
                                <div class="mb-3 col-md-4"></div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Address<span class="text-danger">*</span></label>
                                    <small class="text-xs text-danger" v-if="address">{{address}}</small>
                                    <input type="text" class="form-control" v-model="form.address" placeholder="Address"/>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Mobile</label>
                                    <small class="text-xs text-danger" v-if="mobile">{{mobile}}</small>
                                    <input type="number" class="form-control" v-model="form.mobile" placeholder="Mobile">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">ZIP</label>
                                    <small class="text-xs text-danger" v-if="zip">{{zip}}</small>
                                    <input type="number" class="form-control" v-model="form.zip" placeholder="Zip">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Country<span class="text-danger">*</span></label>
                                    <select id="country" v-model="form.country" class="form-control">
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burma">Burma</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo, Democratic Republic">Congo, Democratic Republic</option>
                                        <option value="Congo, Republic of the">Congo, Republic of the</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, North">Korea, North</option>
                                        <option value="Korea, South">Korea, South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan" selected="selected">Pakistan</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome">Sao Tome</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">State/Province</label>
                                    <small class="text-xs text-danger" v-if="state">{{state}}</small>
                                    <input type="text" class="form-control" v-model="form.state" placeholder="State/Province">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">City</label>
                                    <small class="text-xs text-danger" v-if="city">{{city}}</small>
                                    <input type="text" class="form-control" v-model="form.city" placeholder="City">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Language</label>
                                    <select class="form-control" v-model="form.language">
                                        <option>Urdu</option>
                                        <option>English</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-12">
                                    <button type="button" @click="Save_personal" class="btn btn-primary float-end ">Next</button>
                                    <button type="button" class="btn btn-secondary float-start">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--business setup inputs--->
            <div class="card card1" v-else-if="step==1">
                <div class="card-body">
                    <div class="basic-form">
                        <form>
                            <div class="row">
                                <h3 class="text-xs text-danger" v-if="user_id">Please Refresh the page You can't add New business, Contact to Support Team</h3>
                                <div class="mb-3 col-md-4"></div>
                                <div class="mb-3 col-md-4">
                                    <p class="text-center">
                                        <input type="file" accept="image/*" ref="file" v-on:change="onFileChange" style="display: none;">
                                        <img @click="$refs.file.click()" height="200" width="200" :src="url" class="img-thumbnail center-block" style="cursor: pointer; height: 200px !important; width: 200px !important; ;border-radius: 40%" />
                                    </p>
                                </div>
                                <div class="mb-3 col-md-4"></div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Business Name<span class="text-danger">*</span></label>
                                    <small class="text-xs text-danger" v-if="bus_name">{{bus_name}}</small>
                                    <input type="text" class="form-control" v-model="biz_form.bus_name" placeholder="Business Name"/>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Package</label>
                                    <small class="text-xs text-danger" v-if="package">{{package}}</small>
                                    <input type="number" class="form-control" v-model="biz_form.package" placeholder="Package">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">billing Cycle</label>
                                    <small class="text-xs text-danger" v-if="billing_cycle">{{billing_cycle}}</small>
                                    <input type="number" class="form-control" v-model="biz_form.billing_cycle" placeholder="billing Cycle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Time Zone</label>
                                    <small class="text-xs text-danger" v-if="timezone">{{timezone}}</small>
                                    <input type="number" class="form-control" v-model="biz_form.timezone" placeholder="Time Zone">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Business Category</label>
                                    <small class="text-xs text-danger" v-if="category">{{category}}</small>
                                    <select class="form-control" v-model="biz_form.category">
                                        <option label="">Select a Category</option>
                                        <option>Hajam ki shop</option>
                                        <option>karakri Shop</option>
                                        <option>Pansar Shop</option>
                                        <option>Casmatics Shop</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">No of Shops</label>
                                    <small class="text-xs text-danger" v-if="noofshop">{{noofshop}}</small>
                                    <select class="form-control" v-model="biz_form.noofshop">
                                        <option label="">Select No of Shops</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-12">
                                    <button type="button" @click="check_biz" class="btn btn-primary float-end">Save</button>
<!--                                    <button type="button" @click="back" class="btn btn-secondary float-start">Back</button>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card card1" v-else="">
                <div class="card-body">
                    <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <img src="images/GwStPmg.png" class="fit-image">
                        </div>
                    </div>
                    <br><br>
                    <div class="row justify-content-center">
                        <div class="col-7 text-center">
                            <h5 class="purple-text text-center">You Have Successfully SetUp Your Business</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <ul id="progressbar">
                    <li v-bind:class="(step==0)?'active':''" id="personal"><strong>Personal</strong></li>
                    <li v-bind:class="(step==1)?'active':''" id="account"><strong>Business</strong></li>
                    <!--                <li id="payment"><strong>Image</strong></li>-->
                    <li v-bind:class="(step==2)?'active':''" id="confirm"><strong>Finish</strong></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Setup",
    data() {
        return {
            url:'images/profile.png',
            name: null,
            data:[],
            title:'Personal Info',
            step:this.$store.state.profile_done,
            form: {
                address:null,
                mobile:null,
                image:null,
                zip:null,
                country: "Pakistan",
                state:null,
                city:null,
                language:'English',
            },
            biz_form:{
                user_id:0,
                bus_name:null,
                package:null,
                billing_cycle:null,
                timezone:null,
                category:null,
                noofshop:null,
            },
            success_msg:'',
            error_msg:'',
            //show error variables
            address:'',
            city:'',
            image:'',
            mobile:'',
            state:'',
            zip:'',
            //biz error fields
            billing_cycle:'',
            bus_name:'',
            category:'',
            noofshop:'',
            package:'',
            timezone:'',
            user_id:null,
        }
    },
    created() {
        // if(window.Laravel.user.profile_done==1){
        //     this.step=2;
        //     this.title = 'Business Info';
        // }
        // if (window.Laravel.user) {
        //     this.name = window.Laravel.user.name
        //     if(window.Laravel.user.profile_done==2){
        //         this.$router.push('/dashboard');
        //     }
        //     else if(this.$route.name!='setup'){
        //         this.$router.push('/setup');
        //     }
        // }
    },
    methods:{
        check_biz(){
            this.$axios.post("api/biz_validate", this.biz_form).then(response => {
                if(response.data.success){
                    this.title = '';
                    ++this.step;
                    setTimeout(function () {
                        window.location.reload();
                    }, 2000);
                    // this.$router.push('/dashboard');
                    this.save_profile(2);
                    this.success_msg = response.data.message;
                    this.error_msg =null;
                }
                else{
                    this.error_msg = response.data.message;
                    this.success_msg = null;
                }
            }).catch(error => {
                if(error.response.status==422){
                    this.billing_cycle = error.response.data.errors.billing_cycle;
                    this.bus_name = error.response.data.errors.bus_name;
                    this.category = error.response.data.errors.category;
                    this.noofshop = error.response.data.errors.noofshop;
                    this.package = error.response.data.errors.package;
                    this.timezone = error.response.data.errors.timezone;
                    this.user_id = error.response.data.errors.user_id;
                }
                // this.error_email = error.response.data.error.email

            });
        },
        Save_personal(){
            this.title = '';
            let formData = new FormData();
            formData.append('address', this.form.address);
            formData.append('mobile', this.form.mobile);
            formData.append('image', this.form.image);
            formData.append('country', this.form.country);
            formData.append('zip', this.form.zip);
            formData.append('state', this.form.state);
            formData.append('city', this.form.city);
            formData.append('language', this.form.language);
            this.$axios.post("api/setup", formData,{'content-type': 'multipart/form-data'}).then(response => {
                if(response.data.success){
                    this.title = 'Business Info';
                    ++this.step;
                    // window.location.reload();
                    // this.$router.push('/dashboard');
                    this.success_msg = response.data.message;
                    this.save_profile(1);
                    this.error_msg =null;
                }
                else{
                    this.error_msg = response.data.message;
                    this.success_msg = null;
                }
            }).catch(error => {
                if(error.response.status==422){
                    this.address = error.response.data.errors.address;
                    this.city = error.response.data.errors.city;
                    this.image = error.response.data.errors.image;
                    this.mobile = error.response.data.errors.mobile;
                    this.state = error.response.data.errors.state;
                    this.zip = error.response.data.errors.zip;
                }
                // this.error_email = error.response.data.error.email

            });
        },
        save_profile(profile){
            this.$store.dispatch('addProfile',profile)
        },
        onFileChange(e) {
            this.form.filename = "Selected File: " + e.target.files[0].name;
            this.form.image = e.target.files[0];
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        }
    },
}
</script>
<style>
* {
    margin: 0;
    padding: 0;
}

.card1 {
    min-height: 580px;
}

html {
    height: 100%;
}

p {
    color: grey;
}

#heading {
    text-transform: uppercase;
    color: #673AB7;
    font-weight: normal;
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;

    /*stacking fieldsets above each other*/
    position: relative;
}

.form-card {
    text-align: left;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}

#msform input, #msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px;
}

#msform input:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #673AB7;
    outline-width: 0;
}

/*Next Buttons*/
#msform .action-button {
    width: 100px;
    background: #673AB7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right;
}

#msform .action-button:hover, #msform .action-button:focus {
    background-color: #311B92;
}

/*Previous Buttons*/
#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    background-color: #000000;
}

/*The background card*/
.card {
    z-index: 0;
    border: none;
    position: relative;
}

/*FieldSet headings*/
.fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left;
}

.purple-text {
    color: #673AB7;
    font-weight: normal;
}

/*Step Count*/
.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right;
}

/*Field names*/
.fieldlabels {
    color: gray;
    text-align: left;
}

/*Icon progressbar*/
#progressbar {
    text-align: center;
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
}

#progressbar .active {
    color: #673AB7;
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 33%;
    float: left;
    position: relative;
    font-weight: 400;
}

/*Icons in the ProgressBar*/
#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f064";
    text-align: center;
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007";
    text-align: center;
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030";
    text-align: center;
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c";
    text-align: center;
}

/*Icon ProgressBar before any progress*/
#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px;
}

/*ProgressBar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1;
}

/*Color number of the step and the connector before it*/
#progressbar li.active:before, #progressbar li.active:after {
    background: #673AB7;
}

/*Animated Progress Bar*/
.progress {
    height: 20px;
}

.progress-bar {
    background-color: #673AB7;
}

/*Fit image in bootstrap div*/
.fit-image{
    width: 100%;
    object-fit: cover;
}
</style>
