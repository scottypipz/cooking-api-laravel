<template>
<MainLayout>
    <router-view></router-view>
</MainLayout>
</template>
<script>
    export default {
        components: {
            MainLayout: () => import('./HOC/MainLayout.vue')
        }
    }
</script>