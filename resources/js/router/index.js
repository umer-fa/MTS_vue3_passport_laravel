import * as VueRouter from "vue-router";
import axios from 'axios';

import Home from '../pages/Home';
import About from '../pages/About';



export const routes = [

    {name: 'Home', path: '/', component: Home},
    {name: 'ali', path: '/about', component: About},

];

const router = VueRouter.createRouter({
    history:VueRouter.createWebHistory('/vue3_jwt_laravel/public/'),
    routes: routes,
});

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
