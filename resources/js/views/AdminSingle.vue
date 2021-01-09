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
            <label for="user_name" class="col-md-12 col-form-label text-md-right">Current Password Access</label>
            <div class="col-md-12">
                <table style="width: 100%;">
                    <tr>
                        <th>Id</th>
                        <th>Password Account Name</th>
                        <th>Actions</th>
                    </tr>
                    <tr v-for="(password, index) in user.passwords" :key="index">
                        <td>{{password.id}}</td>
                        <td>{{password.name}}</td>
                        <td><button @click="removePassword(password.id)">Remove Password</button></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                Add Account to User
                <select v-model="passwordToAdd"> 
                    <option v-for="(password, index) in allPasswordsExcludingActive" :key="index" :value="password.id">{{password.name}}</option>
                </select>
                <button @click="addPassword">Add Password</button>
            </div>
        </div>


        
    </div>
</template>


<script>
import axios from "axios";
import {GET_USER, GET_ALLPASSWORDS, ADD_PASSWORD_TO_USER, REMOVE_PASSWORD_FROM_USER} from '../endpoints/endpoints';
export default {
    props:{

    },
    data() {
        return {
            user :{
                passwords: []
            },
            allPasswords: [],
            passwordToAdd: ''
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
        },
        addPassword () {
            axios.post(ADD_PASSWORD_TO_USER, {
                user: this.user.id,
                password: this.passwordToAdd
            }).then(res => { 

                if(res.status === 201){
                    this.user.passwords.push(res.data.password)
                } 
                else {
                    alert(res.data.status)
                }
            })
        },
        removePassword(passwordId){
            axios.post(REMOVE_PASSWORD_FROM_USER, {
                user: this.user.id,
                password: passwordId
            }).then(res => {
                this.removePasswordFromUser(passwordId);
            }) 
        },
        removePasswordFromUser(passwordId){
            let indexToRemove;
            this.user.passwords.forEach((password, index) => {
                if(password.id === passwordId){
                    indexToRemove = index;
                }
            })
            this.user.passwords.splice(indexToRemove, 1)
        }
        
    },
    computed: {
        allPasswordsExcludingActive () {

            let passwords =  this.user.passwords.map(password => password.id);
            return this.allPasswords.filter((el) => {
               return passwords.indexOf(el.id) < 0 ;
            })            
        }
    },
    created() {
        this.getUser();
        this.getPasswords();
    },
};
</script>