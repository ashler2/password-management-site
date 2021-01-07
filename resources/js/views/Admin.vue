<template>
     <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="position: relative;">
                    Admin Area
                </div>

                <div class="card-body">
                    <users-admin :users="users"></users-admin>
                </div>
                <div class="">
                    <button @click="toggleCreateUser">Create User</button>
                    <div class="" v-if="addUser">
                        Create User

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
                        <button @click="createUser">Create</button>
                    </div>
                </div>

                <div class="">Create Permissions</div>

                <div class="">Assign role fast area</div>
            </div>
        </div>
    </div>
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