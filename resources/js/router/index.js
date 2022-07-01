import * as VueRouter from "vue-router";
import axios from 'axios';

import Home from '../pages/Home';
import About from '../pages/About';
import Register from "../pages/Register";
import Login from "../pages/Login";
import Dashboard from "../pages/Dashboard";



export const routes = [

    {name: 'Home', path: '/', component: Home},
    {name: 'ali', path: '/about', component: About},
    {name: 'Register', path: '/register', component: Register},
    {name: 'Login', path: '/login', component: Login},
    {name: 'Dashboard', path: '/dashboard', component: Dashboard,beforeEnter:authfunction},

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
    if (to.matched.some(record => record.meta.requiresAuth) ) {
        if (Auth.check()) {
            next();
            return;
        } else {
            router.push('/login');
        }
    } else {
        next();
    }
});

export default router;
