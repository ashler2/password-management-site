import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Home from '../views/Home.vue';
import Password from '../views/Password.vue';
import Login from '../views/Login.vue';
import Activity from '../views/Activity.vue';




const routes = [
    {
        path: '/',
        name: 'Login',
        component: Login
    },
    {
        path: '/home',
        name: 'Home',
        component: Home
    },
    {
        path: '/password/:password',
        name: 'Password',
        component: Password
    },
    {
        path: '/activity',
        name: 'Activity',
        component: Activity
    }

];

export default routes;