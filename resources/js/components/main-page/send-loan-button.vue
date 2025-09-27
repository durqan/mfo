<script lang="ts">
export default {
    methods: {
        navigateTo() {
            window.location = 'loan'
        }
    }
}
</script>

<template>
    <div @click="navigateTo()" class="give_money">
        Подать заявку
    </div>
</template>

<style scoped>

</style>
