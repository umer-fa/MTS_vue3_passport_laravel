import { createStore } from 'vuex';
const store = createStore({
    state() {
        return {
            count: JSON.parse(localStorage.getItem('counter')),
            access_token: localStorage.getItem('access_token'),
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
        addToken({ commit },value){
            commit('SAVE_TOKEN',value)
        },
        deleteToken({ commit },value){
            commit('DELETE_TOKEN',value)
        }
    },
});

export default store;
