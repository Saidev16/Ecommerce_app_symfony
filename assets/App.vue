<template lang="">
    <div>
        <h2>welcome to vue</h2>
        <button @click='counter++' >click me  </button> {{ counter }}
    </div>
</template>
<script>
export default {
    data() {
        return {
            counter: 0
        }
    },
    
}
</script>
<style lang="">
    
</style>