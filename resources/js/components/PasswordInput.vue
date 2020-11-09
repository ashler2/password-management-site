<template>

<div class="">
    <input :type="type" :value="password" id="password">
    <button @click="showPassword">Show Password</button>
</div>

</template>

<script>
import axios from 'axios';
import {GET_DECRYPTED_PASSWORD} from '../endpoints/endpoints';
export default {
    props: {
        passwordLength: String,
        passwordId : Number
    },
    data() {
        return {
            type: "password",
            password: ''
        };
    },
    methods: {
        showPassword (){
            this.getPassword();
            console.log(this.type === 'password');
           this.type = this.type === 'password' ? 'text' : 'password';
        },
        getPassword() {
            axios.get(GET_DECRYPTED_PASSWORD(this.passwordId)).then(({data})=> {
                this.password = data;
            });
        }
    },
    mounted() {

    },
    watch: {
        passwordLength: function (newVal, oldVal) {
            this.password = this.passwordLength;
        }
    }
};
</script>