<template>
    <div class="my-4 mx-4" style="display: flex; justify-content: space-between">
        <div>Иконка</div>
        <div class="btn btn-success" @click="isModalVisible = true">Войти</div>
        <AuthModal :visible="isModalVisible" @close="isModalVisible = false"/>
    </div>
</template>
<script lang="ts">
export default {
    data() {
        return {
            isModalVisible: false
        };
    }
}
</script>
