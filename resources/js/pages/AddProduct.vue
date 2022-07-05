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
                                <label class="form-label">Product Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Product Name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Product Category<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Product Category">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Price<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" placeholder="Price">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label>City<span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 mb-0">
                                <label>Category<span class="text-danger">*</span></label><br>
                                <label class="radio-inline me-3"><input type="radio" name="optradio"> Option 1</label>
                                <label class="radio-inline me-3"><input type="radio" name="optradio"> Option 2</label>
                                <label class="radio-inline me-3"><input type="radio" name="optradio"> Option 3</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Category<span class="text-danger">*</span></label>
                                <select class="default-select form-control wide">
                                    <option selected>Choose...</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Category<span class="text-danger">*</span></label>
                                <select class="default-select form-control wide">
                                    <option selected>Choose...</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-2">
                                <label class="form-label">Zip<span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Add Product",
    data() {
        return {
            name: null,
        }
    },
    // created() {
    //     if (window.Laravel.user) {
    //         this.name = window.Laravel.user.name
    //     }
    // },
    // beforeRouteEnter(to, from, next) {
    //     if (!window.Laravel.isLoggedin) {
    //         window.location.href = "/laravel-9-vue-3/public/login";
    //     }
    //     next();
    // }
}
</script>
