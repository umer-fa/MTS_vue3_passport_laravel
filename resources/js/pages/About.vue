<template>
    <div>
        About me page display now
    </div>
</template>

<script>
export default {
    name: "About",
    data() {
        return {
            name: null,
        }
    },
    created() {
        // if (window.Laravel.user) {
        //     this.name = window.Laravel.user.name
        // }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            this.router.push('/');
        }
        next();
    }
}
</script>
