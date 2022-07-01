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
                                <label class="form-label">Vendor Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Vendor Name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Logo<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" placeholder="Select logo/Image">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddVendor",
    data() {
        return {
            name: null,
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
    },
    // beforeRouteEnter(to, from, next) {
    //     if (!window.Laravel.isLoggedin) {
    //         window.location.href = "/laravel-9-vue-3/public/login";
    //     }
    //     next();
    // }
}
</script>
