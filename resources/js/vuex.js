import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        loggedIn: false
    },
    mutations: {
        loggedIn (state) {
            state.loggedIn = true;
        }
    },
    getters: {
        isLoggedIn: state => {
            return state.loggedIn;
        }
    }
});


export default store;