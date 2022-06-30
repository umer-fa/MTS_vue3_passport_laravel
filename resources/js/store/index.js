import { createStore } from 'vuex';
const store = createStore({
    state() {
        return {
            count: JSON.parse(localStorage.getItem('counter')),
        };
    },
    getters: {},
    mutations: {
        INCREASE_COUNT(state, payload) {
            state.count += Number(payload)
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
        }
    },
});

export default store;
