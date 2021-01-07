<template>

    <section class="login-page">
        <div class="container login-page-container">
            <div class=" login">
                <h3 class="login__title">Log in to Ashlane</h3>
                <form action="" @submit.prevent="handleLogin">
                    <div class="form-section">
                        <label for="email" class="">Log in with your email.</label>
                        <input id="email" type="email" class="" name="email" v-model="formData.email" required autocomplete="email" placeholder="Enter your email address..." autofocus>
                    </div>
                    <div class="form-section">
                        <label for="password" class="">Enter your password</label>
                        <input id="password" type="password" class="" name="password" v-model="formData.password" required placeholder="Enter your password..." autocomplete="current-password">
                    </div>
                    <div class="" v-if="message.length">
                        <div class="alert alert-danger">
                            {{message}}

                        </div>
                    </div>

                    <button type="submit" class="btn btn--full" >Submit</button>
                    <!-- <button class="btn btn--full" v-if="this.nextButton" @click="nextInput">Next</button> -->
                </form>
                
            </div>
        </div>

    </section>

</template>

<script>
import axios from 'axios';
axios.defaults.withCredentials = true;
import {mapMutations} from 'vuex';
import {GET_SANCTUM, POST_LOGIN, GET_LOGGED_IN_USER} from '../endpoints/endpoints';
export default {
    data () {
        return {
            formData: {
                email:'',
                password:''
            },
            message: '',
            nextButton: true,


        };
    }, 
    mounted () {
    },
    methods: {
        ...mapMutations(['loggedIn', 'setUser']),
        handleLogin(){
            axios.get(GET_SANCTUM).then(res => {
                axios.post(POST_LOGIN, this.formData).then(res => {
                    if(res.status === 204 || res.status === 200) {
                        axios.get(GET_LOGGED_IN_USER).then(res => {
                            this.setUser(res.data.data);
                        })
                        this.loggedIn();
                        this.$router.push({path: 'home'});
                    };

                }).catch(error => {
                    this.message = error.response.data.message;

                });
            });
        },
        nextInput () {

        }

    }
};
</script>