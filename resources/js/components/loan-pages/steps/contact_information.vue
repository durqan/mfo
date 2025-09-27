<script lang="ts">
import { vMaska } from "maska/vue"
export default{
    directives: {
        maska: vMaska
    },
    data() {
        return {
            show: false,
            check_agreements: false
        }
    },
}
</script>

<template>
    <div>
        <h4>Укажите ваши данные</h4>
        <div>
            <span style="color: red">* Обязательно для заполнения</span><br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Фамилия</span>
                <input type="text" class="form-control" name="lastname"><span style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Имя</span>
                <input type="text" class="form-control" name="firstname"><span style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Отчество</span>
                <input type="text" class="form-control" name="patronymic">
            </div>
            <br>
            <label>Выберите пол</label>
            <div style="display: flex">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sex" id="sex_male" value="male" checked>
                    <label class="form-check-label" for="sex_male">
                        Муж
                    </label>
                </div>
                <div class="form-check mx-3">
                    <input class="form-check-input" type="radio" name="sex" value="female" id="sex_female">
                    <label class="form-check-label" for="sex_female">
                        Жен
                    </label>
                </div>
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Email</span>
                <input type="text" class="form-control" name="email"><span style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="input-group input-group-sm w-25">
                <span class="input-group-text">Телефон</span>
                <input type="text" v-maska="'+7-9##-###-##-##'" class="form-control" name="phone"><span style="color: red; margin-left: 5px">*</span>
            </div>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" @click="check_agreements =!check_agreements" type="checkbox" id="agreement" :checked="check_agreements">
                <label class="form-check-label" for="agreement">Я ознакомлен и согласен с </label> <u style="cursor: pointer" @click="show = !show">Правилами</u>
            </div>
            <br><br>
            <Agreements v-if="show" :checked="check_agreements"/>
            <br>
            <div v-if="check_agreements" class="btn btn-success">Далее</div>
        </div>
    </div>
</template>

<style scoped>

</style>
