<template>
<div class="MainLayout">
    <Navbar/>
    <main>
        <slot/>
    </main>
</div>
</template>

<script>
export default {
    components: {
        Navbar: () => import('../widgets/Navbar.vue')
    }
}
</script>

<style>

</style>
