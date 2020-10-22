import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Home from '../views/Home.vue';

const routes = [
    {
        path: '/home',
        name: 'Home',
        component: Home
    },
    {
        path: '/password/:password',
        name: 'Password',
        component: () => import('@/components/Password.vue')
    }

];

export default routes;