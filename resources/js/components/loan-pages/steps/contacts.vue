<script lang="ts">
import {vMaska} from "maska/vue"
import axios from 'axios'

export default {
    directives: {
        maska: vMaska
    },
    props: [
        'user',
        'tab'
    ],
    data() {
        return {
            show: false,
            check_agreements: false,
            firstname: '',
            lastname: '',
            patronymic: '',
            birth_date: '',
            sex: 'male',
            email: '',
            phone: ''
        }
    },
    methods: {
        submit() {
            const form = new FormData();
            form.append('firstname', this.firstname);
            form.append('lastname', this.lastname);
            form.append('patronymic', this.patronymic);
            form.append('birth_date', this.birth_date);
            form.append('sex', this.sex);
            form.append('email', this.email);
            form.append('phone', this.phone.replace(/[^0-9]/g, ""));

            axios.post('/add_contacts', form)
                .then((response) => {
                    this.user.id = response.data;
                    this.tab.current++;
                })
                .catch(error => {
                    if (error.response.data.message)
                        this.$swal('Ошибка сервера');
                    else
                        this.$swal(error.response.data);
                });
        }
    }
}
</script>

<template>
    <div>
        <h4>Укажите ваши данные</h4>
        <div>
            <span style="color: red">* Обязательно для заполнения</span><br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Фамилия</span>
                <input type="text" v-model="lastname" class="form-control" name="lastname"><span
                style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Имя</span>
                <input type="text" v-model="firstname" class="form-control" name="firstname"><span
                style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Отчество</span>
                <input type="text" v-model="patronymic" class="form-control" name="patronymic">
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Дата рождения</span>
                <input type="text" v-maska="'##.##.####'" v-model="birth_date" class="form-control">
            </div>
            <br>
            <label>Выберите пол</label>
            <div style="display: flex">
                <div class="form-check">
                    <input v-model="sex" class="form-check-input" type="radio" name="sex" id="sex_male" value="male"
                           checked>
                    <label class="form-check-label" for="sex_male">
                        Муж
                    </label>
                </div>
                <div class="form-check mx-3">
                    <input v-model="sex" class="form-check-input" type="radio" name="sex" value="female"
                           id="sex_female">
                    <label class="form-check-label" for="sex_female">
                        Жен
                    </label>
                </div>
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Email</span>
                <input type="text" v-model="email" class="form-control" name="email"><span
                style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Телефон</span>
                <input type="text" v-model="phone" v-maska="'+7-9##-###-##-##'" class="form-control" name="phone"><span
                style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" @click="check_agreements =!check_agreements" type="checkbox"
                       id="agreement" :checked="check_agreements">
                <label class="form-check-label" for="agreement">Я ознакомлен и согласен с </label> <u
                style="cursor: pointer" @click="show = !show">Правилами</u>
            </div>
            <br><br>
            <Agreements v-if="show" :checked="check_agreements"/>
            <br>
            <div v-if="check_agreements" @click="submit()" class="btn btn-success">Далее</div>
        </div>
    </div>
</template>

<style scoped>

</style>
