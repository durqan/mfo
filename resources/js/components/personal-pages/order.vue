<script lang="ts">
export default {

}
</script>

<template>
    <div class="loan-info">
        <h5>Информация о займе</h5>
        <div class="input-group">
            <label for="amount">Сумма займа:</label>
        </div>
        <div class="input-group">
            <label for="term">Срок займа:</label>
        </div>
        <div class="results">
            <p>Сумма к возврату: руб.</p>
        </div>
    </div>
</template>

<style scoped>
.loan-info {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
}

.input-group {
    margin-bottom: 15px;
}

input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
</style>
