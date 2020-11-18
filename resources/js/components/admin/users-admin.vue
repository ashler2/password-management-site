<template>
    <div>

        <table style="width:100%;">
            <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
            <tr v-for="(user,index) in users" :key="index">
                <td>{{user.id}}</td>
                <td>{{user.name}}</td>
                <td><span v-for="(roles,index) in user.roles" :key="index">{{roles.screen_name}}</span></td>
                <td>
                    <a href="" class="btn btn-default">Edit</a>
                    <a href="" class="btn ">Ban</a>
                    <button href="" class="btn " @click="deleteUser(user.id)">Delete</button>
                </td>
            </tr>

        </table>
    </div>
</template>

<script>
import axios from 'axios';
import {DELETE_USER} from '../../endpoints/endpoints.js'

export default {
    props: {
        users: Array
    },
    methods:{
        deleteUser(userId){
            axios.delete(DELETE_USER(userId)).then(res => {
                console.log(res);

            });
        },
        banUser(userId){
            axios.post()
        }
    }
    
};
</script>