<template>
    <div>
        <div class="form-group row">
            <label for="user_name" class="col-md-4 col-form-label text-md-right">Name</label>
            <div class="col-md-6">
                <input id="user_name" type="email" class="form-control" name="user_name"  autocomplete="user_name" v-model="user.name">
            </div>
        </div>


        
    </div>
</template>


<script>
import axios from "axios";
import {GET_USER} from '../endpoints/endpoints';
export default {
    props:{
        userId: Number
    },
    data() {
        return {
            user :{

            }
        };
    },
    methods: {
        getUser () {
            axios.get(GET_USER(this.$route.params.user)).then(res => {
                console.log(res);
            });
        }
    },
    mounted() {
        this.getUser();
    },
};
</script>