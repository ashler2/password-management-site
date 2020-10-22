<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Passwords</h4>
                </div>

                <div class="card-body">

                    <router-link herf="" class="" v-for="(password, index) in passwords" :key="index">
                        <h4 class="">{{password.website}}</h4>
                        <h5>{{password.login}}</h5>
                    </router-link>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import {GET_PASSWORDS} from '../endpoints/endpoints';
export default {
    data () {
        return {
            passwords: []
        };
    }, 
    mounted () {
        this.getPasswords();
    },
    methods: {
        getPasswords () {
            axios.get(GET_PASSWORDS).then(({data: {data}}) => {
                this.passwords = data;
            });
        }
    }
};
</script>