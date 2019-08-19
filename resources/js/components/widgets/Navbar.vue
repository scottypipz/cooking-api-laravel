<template>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <ul class="navbar-nav">
            <router-link :to="{ name: 'Dashboard' }" class="nav-link">Home</router-link>
            <router-link :to="{ name: 'Recipe' }" class="nav-link">Recipe</router-link>
        </ul>
    </div>
</nav>
</template>

<script>
export default {

}
</script>

<style>

</style>
