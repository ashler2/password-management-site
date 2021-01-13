<template>


<section class="activity-page">
    <div class="container ">
        <div class="activity-header">
            <h3 class="activity-header__title">Actvity</h3>
            <select v-model="selectedUser" @change="getAcivityByUser">
                <option value="">All Activity</option>
                <option v-for="(user,index ) in users" :key="index" :value="user.id">{{user.name}}</option>
            </select>
        </div>

        <div class="activity-content">
            <div class="" v-if="!activities.length">
                No Activity found for the current user.
            </div>
            <table style="width:100%;" v-else>

                <tr>
                    <th>User</th>
                    <th>Password ID</th>
                    <th>Viewed At</th>
                </tr>
                <tr v-for="(activity, index) in activities" :key="index">
                    <td>
                        <router-link 
                            :to="{name: 'Admin-Single', params: { user:activity.user.id}}"  >
                            {{activity.user.name}}
                        </router-link>
                    </td>
                    <td>
                        <router-link 
                        :to="{name: 'Password', params: { password: activity.password.id}}"  >
                            {{activity.password.name}}
                        </router-link>
                    </td>
                    <td>{{activity.viewed_at}}</td>
                </tr>  


            </table>
        </div>
    </div>

</section>

</template>

<script>
import axios from 'axios';


import {GET_USERS, GET_ACTIVITIES, GET_ACTIVITY} from '../endpoints/endpoints';
export default {
    data () {
        return {
            activities: [],
            users: [],
            selectedUser: ''
        };
    }, 
    mounted () {
        this.getUsers();
        this.getActivies();
    },
    methods: {
        getUsers() {
            axios.get(GET_USERS).then(({data:{ data }}) => {
                this.users = data;
            });
        },
        getActivies(){
            axios.get(GET_ACTIVITIES).then(({data:{data}}) => {
                this.activities = data;
            });
        },
        getAcivityByUser(){
            axios.get(GET_ACTIVITY(this.selectedUser)).then(({data: {data}}) => {
                this.activities = data;
            });
        }

    }
};
</script>