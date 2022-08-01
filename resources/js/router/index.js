import * as VueRouter from "vue-router";
import axios from 'axios';

import Home from '../pages/Home';
import About from '../pages/About';
import Register from "../pages/Register";
import Login from "../pages/Login";
import Dashboard from "../pages/Dashboard";
import NotFound from "../pages/NotFound";
import Setup from "../pages/Setup";
import AddSale from "../pages/AddSale";
import SaleList from "../pages/SaleList";
import AddCustomer from "../pages/AddCustomer";
import Customer from "../pages/Customer";
import AddProduct from "../pages/AddProduct";
import Product from "../pages/Product";
import AddCategory from "../pages/AddCategory";
import UpdateCategory from "../pages/UpdateCategory";
import Category from "../pages/Category";
import AddVendor from "../pages/AddVendor";
import Vendor from "../pages/Vendor";
import AddPurchase from "../pages/AddPurchase";
import Purchase from "../pages/Purchase";
import AddCompany from "../pages/AddCompany";
import Company from "../pages/Company";



export const routes = [

    {name: 'Home', path: '/', component: Home},
    {name: 'About', path: '/about', component: About},
    {name: 'Register', path: '/register', component: Register},
    {name: 'Login', path: '/login', component: Login},
    {name: 'Dashboard', path: '/dashboard', component: Dashboard,beforeEnter:authfunction},

    {name: 'Setup', path: '/setup', component: Setup,beforeEnter:authfunction},
    {name: 'Add Sale', path: '/addsale', component: AddSale,beforeEnter:authfunction},
    {name: 'Sales', path: '/sale', component: SaleList,beforeEnter:authfunction},

    {name: 'Add Customer', path: '/addcustomer', component: AddCustomer,beforeEnter:authfunction},
    {name: 'Customers', path: '/customer', component: Customer,beforeEnter:authfunction},

    {name: 'Add Product', path: '/addproduct', component: AddProduct,beforeEnter:authfunction},
    {name: 'Products', path: '/product', component: Product,beforeEnter:authfunction},

    {name: 'Add Category', path: '/addcategory', component: AddCategory,beforeEnter:authfunction},
    {name: 'Update Category', path: '/updatecategory', component: UpdateCategory,beforeEnter:authfunction},
    {name: 'Category', path: '/category', component: Category,beforeEnter:authfunction},

    {name: 'Add Vendor', path: '/addvendor', component: AddVendor,beforeEnter:authfunction},
    {name: 'Vendors', path: '/vendor', component: Vendor,beforeEnter:authfunction},

    {name: 'Add Purchase', path: '/addpurchase', component: AddPurchase,beforeEnter:authfunction},
    {name: 'Purchase', path: '/purchase', component: Purchase,beforeEnter:authfunction},

    {name: 'Add Company', path: '/addcompany', component: AddCompany,beforeEnter:authfunction},
    {name: 'Company', path: '/company', component: Company,beforeEnter:authfunction},

    {name:'NotFound',path:'/:pathMatch(.*)*',component:NotFound , meta:{title:"Page Not Found"},beforeEnter:authfunction}
];

const router = VueRouter.createRouter({
    history:VueRouter.createWebHistory('/vue3_jwt_laravel/public/'),
    routes: routes,
});

function authfunction(to, from, next) {
    // window.document.title = to.meta && to.meta.title ? to.meta.title : 'Home';
    if (!localStorage.getItem('access_token')) {
        // window.location.href = "/vue3_jwt_laravel/public/login";
        router.push('/login');
    }
    next();
}

router.beforeEach((to, from, next) => {
    if (localStorage.getItem('access_token')) {
        if(to.path == "/login" || to.path=="/register" || to.path=="/" || to.path=="/about"){
            router.push('/dashboard');
        }else{
            next();
        }
    } else {
        next();
    }
});

export default router;
