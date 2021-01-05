<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="position: relative;">
                    <h4>Passwords</h4>
                    <button @click="toggleCreatePassword" v-if="this.isAdmin()">
                        Create Password
                    </button>
                        <password-create :currentDisplay="createPassword"></password-create>
                </div>

                <div class="card-body">

                    <password-card v-for="(password, index) in passwords" :password="password" :key="index"></password-card>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
axios.defaults.withCredentials = true;
import {mapGetters} from 'vuex';
import {GET_PASSWORDS, GET_SANCTUM} from '../endpoints/endpoints';

export default {
    data () {
        return {
            passwords: [],
            createPassword: false,
            user: null
        };
    }, 
    mounted () {
        this.getPasswords();
    },
    methods: {
        ...mapGetters(['isAdmin']),
        getPasswords () {
            axios.get(GET_PASSWORDS).then(({data: {data}}) => {
                this.passwords = data;
            });

        },
        toggleCreatePassword () {
            this.createPassword = !this.createPassword;
        }
    }
};
</script>