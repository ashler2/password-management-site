import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Home from '../views/Home.vue';
import Password from '../views/Password.vue';
import Login from '../views/Login.vue';
import Activity from '../views/Activity.vue';
import Admin from '../views/Admin.vue';
import AdminSingle from '../views/AdminSingle';




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
    },
    {
        path: '/admin',
        name: 'Admin',
        component: Admin
    },
    {
        path: '/admin/:user',
        name: 'Admin-Single',
        component: AdminSingle
    },
    
    

];

export default routes;