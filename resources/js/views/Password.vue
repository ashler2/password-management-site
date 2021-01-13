<template>

<section class="password-single">
    <div class="container">
        <h3>Edit Password</h3>
        <form method="POST" action="" @submit.prevent="updatePassword">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"  autocomplete="password" v-model="password.name">
                </div>
            </div>

            <div class="form-group row">
                <label for="password_email" class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                    <input id="password_email" type="email" class="form-control" name="password_email"  autocomplete="Password_email" v-model="password.email">
                </div>
            </div>

            <div class="form-group row">
                <label for="password_login" class="col-md-4 col-form-label text-md-right">Login</label>
                <div class="col-md-6">
                    <input id="password_login" type="text" class="form-control" name="password_login"  autocomplete="new-password" v-model="password.login">
                </div>
            </div>

            <div class="form-group row">
                <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
                <div class="col-md-6">
                    <input id="website" type="text" class="form-control" name="website"  v-model="password.website">
                </div>
            </div>
    
            <categories :currentCategory="password.category.id"></categories>

            <div class="form-group row">
                <label for="notes" class="col-md-4 col-form-label text-md-right">Notes</label>
                <div class="col-md-6">
                    <input id="notes" type="text" class="form-control" name="notes"  autocomplete="password" v-model="password.notes">
                </div>
            </div>
            <button type="submit">Update/save</button>
        </form>
        <h1>Password</h1>
        <form action="" @submit.prevent>
            <password-input :passwordLength="password.password_length" :passwordId="password.id"></password-input>

        </form>

    </div>
</section>

</template>

<script>
    import {GET_PASSWORD, UPDATE_PASSWORD} from '../endpoints/endpoints.js';


    export default {
        components: {

        },
         methods: {
            getPassword(){
                axios.get(GET_PASSWORD(this.passwordID)).then(({data: {data}}) => {
                    this.password = data;
                    this.password.password_length = this.generatePassword(this.password.password_length);
                });
            },
            updatePassword() {
                axios.put(UPDATE_PASSWORD(this.passwordID), this.password).then(res =>{
                    console.log(res);
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
