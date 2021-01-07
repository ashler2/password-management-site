<template>
    <div>

        <table style="width:100%;">
            <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Roles</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <tr v-for="(user,index) in usersArr" :key="index">
                <td>{{user.id}}</td>
                <td>{{user.name}}</td>
                <td><span v-for="(roles,index) in user.roles" :key="index">{{roles.screen_name}}</span></td>
                <td>{{ user.banned ? 'banned' : 'active' }}</td>
                <td>

                    <router-link  :to="{name: 'Admin-Single', params: { user:user.id}}" class="btn btn-default">Edit</router-link>

                    <button href="" class="btn" @click="banUser(user.id)" v-if="!user.banned">Ban</button>
                    <button href="" class="btn" @click="unbanUser(user.id)" v-if="user.banned">unban</button>

                    <button href="" class="btn " @click="deleteUser(user.id, index)">Delete</button>
                </td>
            </tr>

        </table>
    </div>
</template>

<script>
import axios from 'axios';
import {DELETE_USER, BAN_USER, UNBAN_USER} from '../../endpoints/endpoints.js';

export default {
    props: {
        users: Array
    },
    data() {
        return {

        };
    },
    computed:{
        usersArr: {
            get() {
                return this.users;
            }   ,
            set(v){
                this.$emit('input',v);
            }
        }
    },
    methods:{
        deleteUser(userId, index){
            axios.delete(DELETE_USER(userId)).then(({data}) => {
                if(data === 1) {
                    this.usersArr.splice(index, 1);
                }

            });
        },
        banUser(userId){
            axios.post(BAN_USER(userId)).then(res => {
                this.usersArr.map(user => {
                    if(user.id === userId){
                        user.banned = true;
                    };
                    return user;
                });
            });
        },
        unbanUser(userId) {
            axios.post(UNBAN_USER(userId)).then(res => {
                this.usersArr.map(user => {
                    if(user.id === userId){
                        user.banned = false;
                    };
                    return user;
                });
            });
        }
    }
    
};
</script>