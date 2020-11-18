<template>
     <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="position: relative;">
                    Admin Area
                </div>

                <div class="card-body">
                    <users-admin :users="users"></users-admin>
                </div>

                <div class="">Create Permissions</div>

                <div class="">Assign role fast area</div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import {GET_USERS} from '../endpoints/endpoints.js'
export default {

    methods: {
        getUsers(){
            axios.get(GET_USERS).then(({data:{data}}) => {
                this.users  = data;
            });
        }
    },
    mounted() {
        this.getUsers();
    },
    data() {
        return {
            users: []
        }
    },
    
};
</script>