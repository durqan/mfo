<script>
export default {
    data() {
        return {
            rangeDayValue: {
                type: 'срок',
                count: ' дней',
                min: 1,
                max: 21,
                step: 1,
                val: 7
            },
            rangeSumValue: {
                type: 'сумму',
                count: '₽',
                min: 1000,
                max: 30000,
                step: 500,
                val: 5000,
                finalVal: 5000
            },
            isModalVisible: false
        }
    },
    methods: {
        count() {
            this.rangeSumValue.finalVal = this.rangeSumValue.val;

            if (this.rangeDayValue.val > 7) {
                let percent_per_day = (this.rangeSumValue.val * 0.8) / 100;
                this.rangeSumValue.finalVal = (percent_per_day * this.rangeDayValue.val) + +this.rangeSumValue.val;
            }

            return this.rangeSumValue.finalVal;
        }
    }
}
</script>
<template>
    <div style="background-color: #cb51ff">
        <div class="main">
            <div style="display: flex; justify-content: space-between; text-align: center; width: 80%">
                <span style="color: white">Иконка</span>
                <span style="color: white">+7(495) 669-70-15<br>8-800-505-64-93</span>
                <div><a href="">Как получить деньги</a></div>
                <div><a href="">Преимущества</a></div>
                <div><a href="">Отзывы</a></div>
            </div>
            <div style="width: 20%">
                <div class="btn btn-light">Оплатить</div>
                <div class="btn btn-light ms-3" @click="isModalVisible = true">Войти</div>
                <AuthModal :visible="isModalVisible" @close="isModalVisible = false"/>
            </div>
        </div>
        <div class="main">
            <div style="display: flex; flex-direction: column">
                <div style="height: 50%"></div>
                <div class="loan_discount">
                    <span style="font-size: 38px">7 дней без процентов!</span><br>
                    <span style="font-size: 26px">Простые условия – займы без процентов по акции<br>«Беспроцентный период 7 дней»</span>
                </div>
            </div>
            <div class="loan_settings">
                <MainPageSlider :settings="this.rangeSumValue"/>
                <br><br>
                <MainPageSlider :settings="this.rangeDayValue"/>
                <br><br>
                <span style="font-weight: bold;">Через <span
                    class="final_days">{{ rangeDayValue.val }}{{ rangeDayValue.count }}</span> вы возвращаете <span
                    class="final_sum">{{ count() }}</span>{{ rangeSumValue.count }}</span>
                <br><br>
                <SendLoanButton/>
            </div>
        </div>
        <br><br><br>
        <div class="main" style="flex-direction: column; background-color: #a6ce39; padding-top: 3em">
            <h2><span style="color: #ffffff; font-size: 48px;">Как получить деньги</span></h2>
            <div style="margin-top: 20px"></div>
            <div style="display: flex; justify-content: space-between; padding: 50px 100px">
                <div style="width: 33%">
                    <img :src="'/img/main/punkt1.svg'" style="margin-left: 125px">
                    <br><br>
                    <h4 style="margin-bottom: 1.5rem">1. Заполните анкету на сайте</h4>
                    <p>Вам понадобятся паспорт, мобильный телефон и адрес email.</p>
                </div>
                <div style="width: 33%">
                    <img :src="'/img/main/punkt2.svg'" style="margin-left: 125px">
                    <br><br>
                    <h4 style="margin-bottom: 1.5rem">2. Решение об одобрении онлайн</h4>
                    <p>Решение отобразится на сайте и также уйдет на указанный номер телефона по SMS .</p>
                </div>
                <div style="width: 33%">
                    <img :src="'/img/main/punkt3.svg'" style="margin-left: 125px">
                    <br><br>
                    <h4 style="margin-bottom: 1.5rem">3. Получение online</h4>
                    <p>Одобренная сумма будет перечислена на зарегистрированную вами карту или банковский счет. </p>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 33%"></div>
                <SendLoanButton/>
                <div style="width: 33%"></div>
            </div>
        </div>
        <div class="main" style="flex-direction: column; background-color: white; padding-top: 3em">
            <h2 style="font-weight: bold;font-size: 30px;color: #46484b;margin-bottom: 3rem;">Преимущества</h2>
            <div style="display: flex; flex-direction: column; margin-left: 230px; margin-right: 230px">
                <div
                    style="border-bottom: 1px solid #edeaf8;padding: 15px 0; display: flex; justify-content: space-between">
                    <h4 style="color: #333;">100% онлайн подача заявки</h4>
                    <img :src="'/img/main/accept_ic.png'">
                </div>
                <div
                    style="border-bottom: 1px solid #edeaf8;padding: 15px 0; display: flex; justify-content: space-between">
                    <h4 style="color: #333;">Одобрение и выдача микрокредита менее чем за 10 минут</h4>
                    <img :src="'/img/main/accept_ic.png'">
                </div>
                <div
                    style="border-bottom: 1px solid #edeaf8;padding: 15px 0; display: flex; justify-content: space-between">
                    <h4 style="color: #333;">Без залога и поручителей</h4>
                    <img :src="'/img/main/accept_ic.png'">
                </div>
                <div
                    style="border-bottom: 1px solid #edeaf8;padding: 15px 0; display: flex; justify-content: space-between">
                    <h4 style="color: #333;">Нет скрытых комиссий</h4>
                    <img :src="'/img/main/accept_ic.png'">
                </div>
                <div
                    style="border-bottom: 1px solid #edeaf8;padding: 15px 0; display: flex; justify-content: space-between">
                    <h4 style="color: #333;">Без лишних справок</h4>
                    <img :src="'/img/main/accept_ic.png'">
                </div>
            </div>
            <br>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 33%"></div>
                <SendLoanButton/>
                <div style="width: 33%"></div>
            </div>
        </div>
        <div class="main" style="flex-direction: column; background-color: #f2f2f2; padding-top: 3em">
            <h2 style="font-size: 48px;color: rgb(70, 72, 75);margin-bottom: 2rem;">Отзывы</h2>
            <MainPageCarousel />
            <br><br>
        </div>
        <div class="main" style="flex-direction: column; background-color: white; padding-top: 3em">
            <h2 style="font-size: 48px;color: rgb(70, 72, 75); margin-bottom: 3rem;">Часто задаваемые вопросы</h2>
            <MainPageQuestions />
            <br><br>
        </div>
        <div class="main" style="flex-direction: column; background-color: #a6ce39; padding-top: 3em">
            <h3 style="font-size: 32px; color: #ffffff">Заполните анкету и получите деньги</h3>
            <br><br>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 33%"></div>
                <SendLoanButton/>
                <div style="width: 33%"></div>
            </div>
        </div>
        <MainPageFooter/>
    </div>
</template>

<style scoped>
a {
    color: white;
    text-decoration: none
}

a:hover {
    text-decoration: underline;
}

.main {
    display: flex;
    justify-content: space-between;
    text-align: center;
    padding: 10px 50px
}

.give_money {
    padding: 20px 20px;
    color: black;
    background-color: #a6ce39;
    border-radius: 15px;
    text-align: center;
    font-weight: bold
}

.give_money:hover {
    cursor: pointer;
    color: white;
    background-color: #005e00;
}

.loan_settings {
    display: flex;
    flex-direction: column;
    background-color: white;
    border-radius: 5px;
    padding: 30px 20px;
    width: 400px;
    box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.3);
}

.loan_discount {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    height: 50%;
    border-radius: 5px;
    padding: 30px 30px;
    text-align: left !important;
}
</style>
