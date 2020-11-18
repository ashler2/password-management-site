
<template>
<header>
    <nav>
        <router-link 
        :to="{name: 'Login'}">
        Login
        </router-link>
        <router-link 
        :to="{name: 'Home'}">
        Home
        </router-link>
        <router-link 
        :to="{name: 'Activity'}">
        Actvity
        </router-link>
        <router-link 
        :to="{name: 'Admin'}">
        Admin
        </router-link>
    </nav>
</header>

</template>

<script>

export default {
 
};
</script>