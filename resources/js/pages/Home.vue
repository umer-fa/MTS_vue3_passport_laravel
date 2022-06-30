<template>
    <div>
        Wellcome, this page will show to all user
        {{data}}
        <a class="nav-item nav-link" @click="getData">getdata</a>
        <counter></counter>

        <button @click="sendUpdateCountAction">Increment</button>
        <button @click="sendUpdateCountAction1">decreemnet</button>
    </div>
</template>

<script>
import counter from './counter.vue';
export default {
    name: "Home",
    components:{
        counter,
    },
    data() {
        return {
            data:[],
        }
    },
    computed: {
        // ...mapState(['count'])
    },
    methods: {
        sendUpdateCountAction() {
            this.$store.dispatch('addCount',1)
        },sendUpdateCountAction1() {
            this.$store.dispatch('subCount',1)
        },
    }
}
</script>
