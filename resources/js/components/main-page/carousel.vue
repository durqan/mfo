<script setup>
import 'vue3-carousel/carousel.css'
import {Carousel, Slide, Navigation} from 'vue3-carousel'

const carouselConfig = {
    itemsToShow: 3,
    wrapAround: false,
    height: 200,
    itemsToScroll: 3
}

const reviews = [
    {
        text: 'Благодарю. Быстро взять, легко отдать.',
        name: 'Алина',
        city: 'г. Бердск'
    },
    {
        text: 'Всё чётко, прекрасная оператор Мария подробно всё рассказала',
        name: 'ЛогуновИЧ',
        city: 'г. Самара'
    },
    {
        text: 'Порядочные ребята, судя по разговору операторов. Спасибо',
        name: 'Пётр',
        city: 'г. Культурная столица страны'
    },
    {
        text: 'Взяла заём и часть получилось закрыть с выигранных денег. А можно меня чаще выбирать в победители? Мне понравилось :)',
        name: 'Оля',
        city: 'г. Болохово'
    },
    {
        text: 'Выручили и всё в рамках договора сделали, без накруток. Респект вам',
        name: 'Тимур',
        city: 'г. Батайск'
    },
    {
        text: 'Очень удобный сервис, быстрое оформление. Для постоянных клиентов есть приятные акции, в виде беспроцентного периода. Спасибо вам)',
        name: 'Марина',
        city: 'г. Бийск'
    },
    {
        text: 'Спасибо большое что вы есть.Отличный сервис .С деньгами бывают иногда нехватает,захожу сюда и выдают быстро и без проблем.Консультанты грамотно и доступно по всем вопросам всё объяснят.',
        name: 'Юрий',
        city: 'г. -'
    },
    {
        text: 'Благодарю вас. Финансовые ситуации бывают разные. Спасибо, что вы есть. Всего вам самого доброго. Операторы вежливы и напоминают о дате платежа очень человечно. Только лучшие впечатления.',
        name: 'Богданова Елена Анатольевна',
        city: 'г. Кореновск'
    },
    {
        text: 'Огромное СПАСИБО за предоставленный сервис! Все очень быстро и грамотно. Отзывчивые сотрудники.',
        name: 'Чалая Надежда Ивановна',
        city: 'г. г Ставрополь'
    }
];
</script>
<template>
    <Carousel v-bind="carouselConfig">
        <Slide v-for="review in reviews">
                <div class="slide py-3 px-3">
                    <span style="text-align: left">{{review.text}}</span>
                    <strong class="mt-3">{{review.name}}</strong>
                    <em>{{review.city}}</em>
                </div>
        </Slide>
        <template #addons>
            <Navigation/>
        </template>
    </Carousel>
</template>
<style>
.slide{
    display: flex;
    flex-direction: column;
    width: 80%;
    height: 90%;
    background-color: white;
    border-radius: 15px;
    box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.2);
    text-align: left;
    font-size: 13px
}
</style>
