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
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label><h3>Category</h3></label><br>
                                        <div class="row">
                                            <div class="mb-3 col-md-3"><button type="button" class="btn btn-lg btn-secondary pl-1">Category 1</button></div>
                                            <div class="mb-3 col-md-3"><button type="button" class="btn btn-lg btn-secondary pl-1">Cate 2</button></div>
                                            <div class="mb-3 col-md-3"><button type="button" class="btn btn-lg btn-secondary pl-1">Cate 3</button></div>
                                            <div class="mb-3 col-md-3"><button type="button" class="btn btn-lg btn-secondary pl-1">Cate 4</button></div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">category Wise data show</h4>
                                            </div>
                                            <div class="card-body pb-1">
                                                <div id="lightgallery" class="row">
                                                    <a href="#" data-exthumbimage="fillow/images/big/img1.jpg" data-src="images/big/img1.jpg" class="col-lg-3 col-md-6 mb-4">
                                                        <img src="fillow/images/big/img1.jpg" alt="" style="width:100%;">
                                                    </a>
                                                    <a href="#" data-exthumbimage="images/big/img2.jpg" data-src="images/big/img2.jpg" class="col-lg-3 col-md-6 mb-4">
                                                        <img src="fillow/images/big/img2.jpg" alt="" style="width:100%;">
                                                    </a>
                                                    <a href="#" data-exthumbimage="images/big/img3.jpg" data-src="fillow/images/big/img3.jpg" class="col-lg-3 col-md-6 mb-4">
                                                        <img src="fillow/images/big/img3.jpg" alt="" style="width:100%;">
                                                    </a>
                                                    <a href="#" data-exthumbimage="images/big/img4.jpg" data-src="fillow/images/big/img4.jpg" class="col-lg-3 col-md-6 mb-4">
                                                        <img src="fillow/images/big/img4.jpg" alt="" style="width:100%;">
                                                    </a>
                                                    <a href="#" data-exthumbimage="images/big/img5.jpg" data-src="fillow/images/big/img5.jpg" class="col-lg-3 col-md-6 mb-4">
                                                        <img src="fillow/images/big/img5.jpg" alt="" style="width:100%;">
                                                    </a>
                                                    <a href="#" data-exthumbimage="images/big/img6.jpg" data-src="fillow/images/big/img6.jpg" class="col-lg-3 col-md-6 mb-4">
                                                        <img src="fillow/images/big/img6.jpg" alt="" style="width:100%;">
                                                    </a>
                                                    <a href="#" data-exthumbimage="images/big/img7.jpg" data-src="fillow/images/big/img7.jpg" class="col-lg-3 col-md-6 mb-4">
                                                        <img src="fillow/images/big/img7.jpg" alt="" style="width:100%;">
                                                    </a>
                                                    <a href="#" data-exthumbimage="images/big/img8.jpg" data-src="fillow/images/big/img8.jpg" class="col-lg-3 col-md-6 mb-4">
                                                        <img src="fillow/images/big/img8.jpg" alt="" style="width:100%;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                            <div class="mb-3 col-md-6">
                                <div class="row">
                                    <label><h3>Customer</h3></label><br>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Customer Type<span class="text-danger">*</span></label>
                                        <select class="form-control" @change="onChange($event)" v-model="customer_type">
                                            <option value="1">Take In</option>
                                            <option value="2">Take Away</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Customer Name<span class="text-danger">*</span></label>
                                        <input type="text" v-model="customer_name" class="form-control" placeholder="Customer name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12" v-if="customer_type==1">
                                        <label><h3>Tables</h3></label><br>
                                        <div class="row">
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table 1</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table 2</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table 3</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table 4</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table 5</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table 6</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table 7</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table 8</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table 9</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table10</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table11</button></div>
                                            <div class="mb-3 col-md-2"><button type="button" class="btn btn-lg btn-primary pl-1">Table12</button></div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <table class="table table-striped caption-top">
                                            <caption class="text-center"><h1>Cart <i class="fa fa-shopping-basket me-2"></i></h1></caption>
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="4"></th>
                                            </tr>
                                            <tr>
                                                <th colspan="4"></th>
                                            </tr>
                                            <tr>
                                                <th colspan="4">
                                                    <div class="mb-3 col-md-12 text-center bg-purpel text-white"> Grand Total {{total}}</div>
                                                </th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-fotter">
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="mb-3 col-md-2">
                                    <button type="button" class="btn btn-rounded btn-info"><span class="btn-icon-start text-primary"><i class="fa fa-drafting-compass"></i></span>Draft</button>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <button type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-credit-card"></i></span>Card</button>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <button type="button" class="btn btn-rounded btn-success"><span class="btn-icon-start text-primary"><i class="fa fa-cash-register"></i></span>Cash</button>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <button type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-cc-paypal"></i></span>Paypal</button>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <button type="button" class="btn btn-rounded btn-danger"><span class="btn-icon-start text-primary"><i class="fa fa-crosshairs"></i></span>Cancle</button>
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
    name: "Add Sale",
    data() {
        return {
            name: null,
            customer_type:1,
            customer_name:'',
            search_pro:'',
            total: 0.00,
        }
    },
    created() {
        // if (window.Laravel.user) {
        //     this.name = window.Laravel.user.name
        // }
    },
    // beforeRouteEnter(to, from, next) {
    //     if (!window.Laravel.isLoggedin) {
    //         window.location.href = "/laravel-9-vue-3/public/login";
    //     }
    //     next();
    // },
    methods: {
        onChange(event) {
            console.log(event.target.value, this.customer_type);
        },
        searchpro(event){
            // console.log(this.search_pro);
        },
    }
}
</script>
