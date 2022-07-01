<template>
    <div>
        Wellcome, this page will show to all user
        {{data}}
        <a class="nav-item nav-link" @click="getData">getdata</a>
    </div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            data:[],
        }
    },
    created() {
    },
    methods: {
        getData(e) {
            e.preventDefault()
            // this.$axios.get('sanctum/csrf-cookie').then(response => {
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
            // });
        }
    }, beforeRouteEnter(to, from, next) {
    next();
}
}
</script>
