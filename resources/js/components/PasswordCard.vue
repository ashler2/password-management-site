<template>

<div class="">
    <router-link 
    :to="{name: 'Password', 
    params: {
        password: password.id
    }}" class="" >
        <h4 class="">{{password.website}}</h4>
        <h5>{{password.login}}</h5>
    </router-link>
</div>

</template>

<script>
import axios from 'axios';
import {GET_PASSWORDS} from '../endpoints/endpoints';
export default {
    props: {
        password: Object
    }
};
</script>