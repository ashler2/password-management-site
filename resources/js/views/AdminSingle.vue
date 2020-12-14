<template>
    <div>
        <div class="form-group row">
            <label for="user_name" class="col-md-4 col-form-label text-md-right">Name</label>
            <div class="col-md-6">
                <input id="user_name" type="email" class="form-control" name="user_name"  autocomplete="user_name" v-model="user.name">
            </div>
        </div>
        <div class="form-group row">
            <label for="user_name" class="col-md-4 col-form-label text-md-right">Email</label>
            <div class="col-md-6">
                <input id="user_name" type="email" class="form-control" name="user_name"  autocomplete="user_name" v-model="user.email">
            </div>
        </div>
        <div class="form-group row">
            <label for="user_name" class="col-md-12 col-form-label text-md-right">Passwords</label>
            <div class="col-md-12">
                <table style="width: 100%;">
                    <tr>
                        <th>Id</th>
                        <th>Password Account Name</th>
                    </tr>
                    <tr v-for="(password, index) in user.passwords" :key="index">
                        <td>{{password.id}}</td>
                        <td>{{password.name}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <select> 
                    <option v-for="(password, index) in allPasswords" :key="index">{{password.name}}</option>
                </select>
            </div>
        </div>


        
    </div>
</template>


<script>
import axios from "axios";
import {GET_USER, GET_ALLPASSWORDS} from '../endpoints/endpoints';
export default {
    props:{
        userId: Number
    },
    data() {
        return {
            user :{

            },
            allPasswords: []
        };
    },
    methods: {
        getUser () {
            axios.get(GET_USER(this.$route.params.user)).then(({data: {data}}) => {
                this.user = data;
            });
        },
        getPasswords () {
            axios.get(GET_ALLPASSWORDS).then(({data: {data}}) => {
                this.allPasswords = data;
            }) ;
        }
        
    },
    computed: {
        allPasswordsExcludingActive () {
            
            
        }
    },
    created() {
        this.getUser();
        this.getPasswords();
    },
};
</script>