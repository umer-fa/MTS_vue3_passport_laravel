<template>
<!--    <h1>{{ title }}</h1>-->
    <router-link to="/">home</router-link>&nbsp;&nbsp;
    <router-link to="/about">About</router-link>
    <router-view></router-view>
</template>
<script>
export default {
    setup: () => ({
        // title: 'How To Install Vue 3 in Laravel 8 From Scratch'
    })
}
</script>
