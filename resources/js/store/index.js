import { createStore } from 'vuex';
const store = createStore({
    state() {
        return {
            count: JSON.parse(localStorage.getItem('counter')),
            access_token: localStorage.getItem('access_token'),
            user: localStorage.getItem('access_user'),
            profile_done:localStorage.getItem('profile_done'),
        };
    },
    getters: {},
    mutations: {
        DELETE_TOKEN(state) {
            state.access_token = null;
            localStorage.removeItem('access_token');
        },
        SAVE_TOKEN(state, payload) {
            state.access_token = payload;
            localStorage.setItem('access_token', payload);
        },
        SAVE_PROFILE(state, payload) {
            state.profile_done = payload;
            localStorage.setItem('profile_done', payload);
        },
        SAVE_USER(state, payload) {
            state.User = payload;
            localStorage.setItem('access_user', payload);
        },
        INCREASE_COUNT(state, payload) {
            state.count += Number(payload);
            localStorage.setItem('counter', JSON.stringify(state.count));
        },
        DECRESE_COUNT(state, payload){
            state.count -= Number(payload)
            localStorage.setItem('counter', JSON.stringify(state.count));
        }
    },
    actions: {
        addCount({ commit }, amount) {
            commit('INCREASE_COUNT', amount)
        },
        subCount({ commit }, amount) {
            commit('DECRESE_COUNT', amount)
        },
        addProfile({ commit },value){
            commit('SAVE_PROFILE',value)
        },
        addToken({ commit },value){
            commit('SAVE_TOKEN',value)
        },
        addUser({ commit },value){
            commit('SAVE_USER',value)
        },
        deleteToken({ commit },value){
            commit('DELETE_TOKEN',value)
        }
    },
});

export default store;
