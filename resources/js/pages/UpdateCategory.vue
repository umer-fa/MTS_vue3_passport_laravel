<template>
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{this.$route.name}} Form</h2>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="hidden" v-model="form.id"/>
                                <label class="form-label">Category Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="form.name" placeholder="Category Name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Parent Category<span class="text-danger">*</span></label>
                                <select type="text" class="form-control" v-model="form.parent_id">
                                    <option value="0" selected>Parent Category</option>
                                    <option v-for='parnt in parent' v-bind:value='parnt.id'>{{parnt.cat_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Category Image</label>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <input type="file" accept="image/png, image/jpeg" class="form-control" v-on:change="onFileChange" placeholder="Image">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div id="preview">
                                            <img v-if="url" :src="url" v-bind:width="200" height="100" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6 text-right">
                                <label class="text-success m-2">{{success_msg}}</label>
                                <label class="text-danger m-2">{{error_msg}}</label>
                                <button type="button" @click="Save" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UpdateCategory",
    setup(){

    },
    data() {
        return {
            url: null,
            success_msg:"",
            error_msg:"",
            parent:[],
            form:{
                id: 0,
                name:'',
                parent_id:0,
                file: '',
                filename:'',
            }
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.getParent();
        const params = (new URL(document.location)).searchParams;
        if(params.get('id')){
            this.form.id = params.get('id');
            this.$axios.get('sanctum/csrf-cookie').then(response => {
                this.$axios.post("api/getcategory", {"id":this.form.id},{'content-type': 'multipart/form-data'}).then(response => {
                    if(response.data.success){
                        this.success_msg = response.data.message;
                        this.form.name = response.data.data.cat_name;
                        this.form.parent_id = response.data.data.parent_id;
                        this.url = response.data.data.image;
                        this.error_msg =null;
                    }
                    else{
                        this.error_msg = response.data.message;
                        this.success_msg = null;
                    }
                });
            });
        }else{
            this.form.id =0;
        }
    },
    methods:{
        getParent(){
            this.$axios.get('sanctum/csrf-cookie').then(response => {
                this.$axios.post("api/parentcategory").then(response => {
                    if(response.data.success){
                        this.parent =  response.data.data;
                    }
                    else{
                        this.error_msg = response.data.message;
                        this.success_msg = null;
                    }
                });
            })
        },
        Back(){
            this.$router.back();
        },
        Save(){
            if(this.form.name!=''){
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                    }
                };
                let formData = new FormData();
                formData.append('name', this.form.name);
                formData.append('file', this.form.file);
                formData.append('id', this.form.id);
                formData.append('parent_id', this.form.parent_id);
                this.$axios.get('sanctum/csrf-cookie').then(response => {
                    this.$axios.post("api/updatecategory", formData,{'content-type': 'multipart/form-data'}).then(response => {
                        if(response.data.success){
                            this.success_msg = response.data.message;
                            this.error_msg =null;
                            this.$router.back();
                        }
                        else{
                            this.error_msg = response.data.message;
                            this.success_msg = null;
                        }
                    });
                })
            }else{
                this.error_msg = "Category field required";
                this.success_msg = null;
            }
        },
        onFileChange(e) {
            this.form.filename = "Selected File: " + e.target.files[0].name;
            this.form.file = e.target.files[0];
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        }
    },
}
</script>
<style>
    #preview {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #preview img {
        max-width: 100%;
        max-height: 500px;
        border-radius: 100%;
    }
</style>
