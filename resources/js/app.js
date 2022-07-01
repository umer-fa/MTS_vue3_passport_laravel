import {createApp} from 'vue/dist/vue.cjs';
import { createStore } from "vuex";

require('./bootstrap');


import App from './App.vue';
import router from './router';
import axios from 'axios';
import store from "./store";

const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.use(router);
app.use(store);
app.mount('#app');

