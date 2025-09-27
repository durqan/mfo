<script lang="ts">
export default {
    props : [
        'checked'
    ],
    data(){
        return{
            agreements : [
            {
                name: 'Правила предоставления и обслуживания микрозаймов ООО МКК «СМСФИНАНС»',
                required: true
            },
            {
                name: 'Общие условия договора потребительского микрозайма ООО МКК «СМСФИНАНС»',
                required: true
            },
            {
                name: 'Договор принятия на обслуживание ООО МКК «СМСФИНАНС»',
                required: false
            }
        ]
        }
    }
}
</script>

<template>
    <div>
        <h6 style="width: 30%">В случае, если вы НЕ СОГЛАСНЫ на передачу данных одному или нескольким третьим лицам, отзовите свое согласие
            из списка ниже</h6>
        <div style="width: 30%" v-for="agreement in agreements">
            <div class="form-check form-check-inline">
                <input class="form-check-input" :checked="checked" type="checkbox" id="agreement">
                <label class="form-check-label" for="agreement">{{agreement.name}}</label>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
