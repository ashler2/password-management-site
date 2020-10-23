import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Home from '../views/Home.vue';
import Password from '../components/Password.vue';

const routes = [
    {
        path: '/home',
        name: 'Home',
        component: Home
    },
    {
        path: '/password/:password',
        name: 'Password',
        component: Password
    }

];

export default routes;