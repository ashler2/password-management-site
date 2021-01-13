<template>
    <section>
        <div class="container">
            <h2>Create Password</h2>
            <form action="" @submit.prevent="createPassword">
                <div class="">
                    <label for="password_name">Name</label>
                    <input type="text" name="password_name" id="password_name" v-model="password.name">
                </div>
                <div class="">
                    <label for="name">Login Info</label>
                    <input type="text" name="" id="" v-model="password.login">
                </div>
                <div class="">
                    <label for="name">email</label>
                    <input type="email" name="" id="" v-model="password.email">
                </div>
                <div class="">
                    <!-- Maybe should be password? -->
                    <label for="password">Password</label>
                    <input type="text" name="" id="" v-model="password.password">
                </div>
                <div class="">
                    <label for="website">Website</label>
                    <input type="text" name="" id="" v-model="password.website">
                </div>
                <div class="">
                    <label for="notes">notes</label>
                    <textarea type="text" name="" id="" v-model="password.notes"></textarea>
                </div>
                <div class="">
                    <categories :currentCategory="1" v-model="password.category"></categories>

                </div>
                <button type="submit" class="btn">Create Password</button>
            </form>
        </div>
    </section>
</template>


<script>
import {POST_PASSWORD} from '../endpoints/endpoints';
import axios from 'axios';

export default {
    data(){
        return {
           password: {

           }
        };
    },
    methods: {
        createPassword() {
            axios.post(POST_PASSWORD, this.password).then(res => {
                console.log(res)
            })
        }
    },
};
</script>