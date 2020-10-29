<template>
    <div class="container">
        <router-view></router-view>
    </div>

</template>
<script>
    export default {
        props:{
            userId: Object
        },

    };
</script>