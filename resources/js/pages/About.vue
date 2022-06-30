<template>
    <div>
        About me page display now
        <counter></counter>
    </div>
</template>

<script>
import counter from './counter.vue';
export default {
    name: "About",
    components:{
        counter,
    },
    data() {
        return {
            name: null,
        }
    },
    created() {
        this.$store.commit('INCREMENT_COUNT', 2)
    }
}
</script>
