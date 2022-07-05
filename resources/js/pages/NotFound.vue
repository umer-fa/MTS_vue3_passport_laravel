<template>
    <div class="row">
        <h1>Page not found</h1>
    </div>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            name: null,
            data:[],
        }
    },
    created() {
        // if (window.Laravel.user) {
        //     this.name = window.Laravel.user.name
        // }
    },
    // beforeRouteEnter(to, from, next) {
    //     if (!window.Laravel.isLoggedin) {
    //         window.location.href = "/laravel-9-vue-3/public/login";
    //     }
    //     next();
    // },
    methods: {
        getData(e) {
            e.preventDefault()
            this.$axios.get('sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/umer')
                    .then(response => {
                        if(response.data) {
                            this.data = response.data;
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
}
</script>
