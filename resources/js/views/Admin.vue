<template>

<section class="admin-page">
    <div class="container">
        <h2>Admin Area</h2>
        <div class="">
            <users-admin :users="users"></users-admin>
        </div>

        <div class="">
            <div class="">
                <h2>Create User</h2>
                <button class="btn" @click="toggleCreateUser">Create User</button>
            </div>
            <div class="" v-if="addUser">
                <div class="">
                    <label for="">Name</label>
                    <input type="text" name="" id="" v-model="newUser.name">
                </div>
                <div class="">
                    <label for="">email</label>
                    <input type="email" name="" id="" v-model="newUser.email">
                </div>
                <div class="">
                    <label for="">Password</label>
                    <input type="password" name="" id="" v-model="newUser.password">
                </div>
                <button class="btn" @click="createUser">Create</button>
            </div>
        </div>
        <div class="">Create Permissions </div>
        <div class="">Assign role fast area</div>
    </div>
</section>
     
</template>

<script>
import axios from 'axios';
import {GET_USERS,CREATE_USER} from '../endpoints/endpoints.js';
export default {

    methods: {
        getUsers(){
            axios.get(GET_USERS).then(({data:{data}}) => {
                this.users  = data;
            });
        },
        getRoles() {
            axios.get()
        },
        toggleCreateUser() {
            this.addUser = !this.addUser;
        },
        createUser(){
            axios.post(CREATE_USER, {
                user: this.newUser
            }).then(({data: {user}}) => {
                this.users.push(user);
                this.newUser = {};
            })
        }
    },
    mounted() {
        this.getUsers();
    },
    data() {
        return {
            users: [],
            addUser: false,
            newUser: {

            }
        };
    },
    
};
</script>