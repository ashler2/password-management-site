<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="position: relative;">
                    Login
                </div>

                <div class="card-body">
                    <form action="" @submit.prevent="handleLogin">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" v-model="formData.email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" v-model="formData.password" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row" v-if="message.length">
                            <div class="alert alert-danger">
                                {{message}}

                            </div>
                        </div>

                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
            message: ''
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
        }

    }
};
</script>