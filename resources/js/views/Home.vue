<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Passwords</h4>
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