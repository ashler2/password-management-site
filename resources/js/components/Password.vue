<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                     <form method="POST" action="">

                        <div class="form-group row">
                            <label for="password_email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="password_email" type="text" class="form-control" name="password_email" required autocomplete="Password_email" v-model="password.email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_login" class="col-md-4 col-form-label text-md-right">Login</label>
                            <div class="col-md-6">
                                <input id="password_login" type="text" class="form-control" name="password_login" required autocomplete="new-password" v-model="password.login">
                            </div>
                        </div>
                        <!--  Password change to component   -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="password" v-model="password.password_length">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" required autocomplete="password" v-model="password.website">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="password" v-model="password.name">
                            </div>
                        </div>
                        <categories :currentCategory="password.category_id"></categories>

                        <div class="form-group row">
                            <label for="notes" class="col-md-4 col-form-label text-md-right">Notes</label>
                            <div class="col-md-6">
                                <input id="notes" type="text" class="form-control" name="notes" required autocomplete="password" v-model="password.notes">
                            </div>
                        </div>

                        
                        <button type="submit" class="btn btn-primary">
                            Create Password
                        </button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {GET_PASSWORD} from '../endpoints/endpoints.js';

    export default {
         methods: {
            getPassword(){
                axios.get(GET_PASSWORD(this.passwordID)).then(({data: {data}}) => {
                    this.password = data;
                    this.password.password_length = this.generatePassword(this.password.password_length);
                });
            },
            generatePassword(length){
                return `*`.repeat(length);
            } 
        },
        mounted() {
            this.passwordID = this.$route.params.password;
            this.getPassword();
        },
        data(){
            return {
                passwordID: null,
                password: {},
                categories: []
            };
        },
        props: {

        },
       
    };
</script>
