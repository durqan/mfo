<script lang="ts">
export default {
    props: [
        'component'
    ]
}
</script>

<template>
    <div>
        <MainPageView v-if="component == 'main'"/>
        <LoanPageView v-if="component == 'loan'"/>
        <PersonalPageView v-if="component == 'personal'"/>
    </div>
</template>

<style scoped>

</style>
