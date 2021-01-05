
<template>
<header>
    <nav class="navbar">
        <div class="container">
            <div class="navbar__logo">
                <router-link :to="{name: 'Login'}">
                    <span>Ashlane</span>
                </router-link>
            </div>
            <div class="navbar" :class="{'navbar--active': navActive }">
                <div class="navbar-trigger" id="navbar-trigger" @click="this.toggleNav">
                    <span class="navbar-trigger__lines">
                    </span>
                </div>
                <div class="navbar-wrapper">
                    <router-link v-if="!this.isLoggedIn()" @click="this.closeNav"
                    :to="{name: 'Login'}">
                    <span @click="this.closeNav">Login</span>
                    </router-link>
                    <div class="" v-if="this.isLoggedIn()">

                        <router-link 
                        :to="{name: 'Home'}">
                            <span @click="this.closeNav">Home</span>
                        </router-link>
                        <router-link @click="this.closeNav"
                        :to="{name: 'Activity'}">
                            <span @click="this.closeNav"> Actvity</span>
                        </router-link>

                        <router-link v-if="" @click="this.closeNav"
                        :to="{name: 'Admin'}">
                            <span @click="this.closeNav"> Admin</span>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

</template>

<script>
import { mapGetters,mapState } from 'vuex';

export default {
   data () {
        return {
           navActive: false
        };
    }, 
    methods: {
        ...mapGetters(['isAdmin', 'isLoggedIn']),
        toggleNav () {
            this.navActive = !this.navActive;
        },
        closeNav () {
            this.navActive = false;
            console.log(this.navActive);
        }

    },
    mounted() {


    },
    computed: {


    }
};
</script>