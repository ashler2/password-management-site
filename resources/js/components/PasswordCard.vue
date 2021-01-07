<template>

    <router-link 
    :to="{name: 'Password', 
    params: {
        password: password.id
    }}" class="password-card" >
        <div class="password-card-section password-card-section-first">
            <img :src="password.website_img" alt=""> 
            <div class="password-card-section-first__content">
                <span>{{password.name}}</span>
                <span>{{password.login}}</span>
            </div> 
        </div>
        <div class="password-card-section">
            Category TODO
        </div>
        <div class="password-card-section">
            <span>{{password.last_used !== undefined ? password.last_used.viewed_at : 'Never Viewed'  }}</span>
        </div>
    </router-link>


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