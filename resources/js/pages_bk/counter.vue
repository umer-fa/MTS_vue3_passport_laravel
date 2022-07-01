<template>
    <div>
        {{$store.state.count}}
    </div>
</template>

<script>
export default {
    name: "counter",
    data() {
        return {
            counter:0,
        }
    }
}
</script>
