<script lang="ts">
import axios from "axios";
export default {
    async created(){
        axios.get('/loan_reasons/gets').then(response => {
            this.reasons = response.data;
        });
    },
    props: [
        'user'
    ],
    data() {
        return {
            sum: '',
            days: '',
            password: '',
            reasons: {},
            reason_id: 1
        }
    },
    methods: {
        submit(){
            const form = new FormData();
            form.append('user_id', this.user.id);
            form.append('reason_id', this.reason_id);
            form.append('sum', this.sum);
            form.append('days', this.days);
            form.append('password', this.password);

            axios.post('/add_loan', form)
                .then(() => {
                    this.tab.current++;
                })
                .catch(error => {
                    if (error.response.data.message)
                        this.$swal('Ошибка сервера');
                    else
                        this.$swal(error.response.data);
                });
        },
    }
}
</script>

<template>
    <div>
        <h4>Адрес проживания</h4>
        <br>
        <span style="color: red">* Обязательно для заполнения</span>
        <br><br>
        <select class="form-select w-25">
            <option v-for="reason in reasons" @click="reason_id = reason.id" :value="reason.id">{{ reason.title }}</option>
        </select>
        <br>
        <div class="input-group input-group-sm w-25">
            <span class="input-group-text">Сумма займа</span>
            <input type="text" v-model="sum" class="form-control" placeholder="от 1000 до 30000">
            <span style="color: red; margin-left: 5px">*</span>
        </div>
        <br>
        <div class="input-group input-group-sm w-25">
            <span class="input-group-text">Срок займа</span>
            <input type="text" v-model="days" class="form-control" placeholder="от 1 до 21 дней">
            <span style="color: red; margin-left: 5px">*</span>
        </div>
        <br>
        <h4>Пароль для входа в личный кабинет</h4>
        <div class="input-group input-group-sm w-25">
            <input type="password" placeholder="Придумайте пароль" v-model="password" class="form-control">
            <span style="color: red; margin-left: 5px">*</span>
        </div>
        <br>
        <div @click="submit" class="btn btn-success">Получить деньги</div>
    </div>
</template>

<style scoped>

</style>
