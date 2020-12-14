/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import routes from './router/router.js';
import App from './views/App.vue';
import VueRouter from 'vue-router';
import store from './vuex';

window.Vue = require('vue');

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

router.beforeEach((to,from, next) => {
    if(to.path !== '/'){
        store.state.loggedIn ? next() : next({
            path: '/',

        });
    }
    else {
        next();
    }

});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));



const app = new Vue({
    el: '#app',
    router,
    render: h => h(App),
    store: store

});
