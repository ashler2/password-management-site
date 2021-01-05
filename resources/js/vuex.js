import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        loggedIn: false,
        user: {},
        
    },
    mutations: {
        loggedIn (state) {
            state.loggedIn = true;
        },
        setUser (state, user) {
            state.user = user;
        }
    },
    getters: {
        isLoggedIn: state => {
            return state.loggedIn;
        },
        getRoles: state => {
            return state.user.roles;
        },
        isAdmin: (state) => {
            return state.user.roles ? state.user.roles.filter(item => item.id === 1).length > 0 : null;
        }
    }
});


export default store;