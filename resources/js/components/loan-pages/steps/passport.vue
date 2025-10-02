<script lang="ts">
import {vMaska} from "maska/vue"
import axios from 'axios'
import { DaDataNext } from 'vue-dadata-3'
import "vue-dadata-3/index.css";
export default {
    props: [
        'user',
        'tab'
    ],
    components:{
        'dadata': DaDataNext
    },
    directives: {
        maska: vMaska
    },
    data() {
        return {
            passport_serial: '',
            passport_number: '',
            issue_date: '',
            unit_code: '',
            issue: '',
            birth_place: '',
            dadata_token: '92ed4d679acc57ce860c22cc777bafcd08ce3d81'
        }
    },
    methods:{
        dadata(response){
            this.unit_code = response.data.code;
            this.issue = response.value;
        },
        submit() {
            const form = new FormData();
            form.append('user_id', this.user.id);
            form.append('passport_serial', this.passport_serial);
            form.append('passport_number', this.passport_number);
            form.append('issue_date', this.issue_date);
            form.append('unit_code', this.unit_code);
            form.append('issue', this.issue);
            form.append('birth_place', this.birth_place);

            axios.post('/add_passport', form)
                .then(() => {
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
        <h4>Паспорт и адрес</h4>
        <div>
            <span style="color: red">* Обязательно для заполнения</span><br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Серия</span>
                <input type="text" v-maska="'####'" v-model="passport_serial" class="form-control"><span
                style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Номер</span>
                <input type="text" v-maska="'######'" v-model="passport_number" class="form-control" ><span
                style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Дата выдачи</span>
                <input type="text" v-maska="'##.##.####'" v-model="issue_date" class="form-control">
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Код подразделения</span>
                <dadata class="form-control" @onSelected="dadata" type="fms_unit" :token="dadata_token" v-maska="'###-###'" v-model="unit_code"></dadata>
                <span style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="input-group input-group-sm w-50">
                <span class="input-group-text">Кем выдан</span>
                <textarea class="form-control" v-model="issue"></textarea>
                <span style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="input-group input-group-sm w-50">
                <span class="input-group-text">Место рождения (как в паспорте)</span>
                <input v-model="birth_place" class="form-control">
            </div>
            <br><br>
            <div @click="submit" class="btn btn-success">Далее</div>
        </div>
    </div>
</template>

<style>
.dadata__input{
    height: auto!important;
    border: none!important;
}
.dadata__input:focus{
    box-shadow: none;
}
</style>
