import './bootstrap';
import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3'

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import AppComponent from './components/app.vue';
import MainPageView from './components/main-page/view.vue';
import MainPageSlider from './components/main-page/slider.vue';
import SendLoanButton from './components/main-page/send-loan-button.vue';
import MainPageCarousel from './components/main-page/carousel.vue';
import MainPageQuestions from './components/main-page/questions.vue';
import MainPageFooter from './components/main-page/footer.vue';
import LoanPageView from './components/loan-pages/view.vue';
import LoanPageHeader from './components/loan-pages/header.vue';
import LoanPageFooter from './components/loan-pages/footer.vue';
import StepContacts from './components/loan-pages/steps/contacts.vue';
import Agreements from './components/loan-pages/steps/agreements.vue';
import AuthModal from './components/auth-modal.vue';
import PersonalPageView from './components/personal-pages/view.vue';
import PersonalOrderView from './components/personal-pages/order.vue';

import {InertiaProgress} from "@inertiajs/progress";

InertiaProgress.init();

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./components/**/*.vue', {eager: true})
        return pages[`./components/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(VueSweetalert2)
            .component('AppComponent', AppComponent)
            .component('MainPageView', MainPageView)
            .component('MainPageSlider', MainPageSlider)
            .component('SendLoanButton', SendLoanButton)
            .component('MainPageCarousel', MainPageCarousel)
            .component('MainPageQuestions', MainPageQuestions)
            .component('MainPageFooter', MainPageFooter)
            .component('LoanPageView', LoanPageView)
            .component('LoanPageHeader', LoanPageHeader)
            .component('LoanPageFooter', LoanPageFooter)
            .component('StepContacts', StepContacts)
            .component('Agreements', Agreements)
            .component('AuthModal', AuthModal)
            .component('PersonalPageView', PersonalPageView)
            .component('PersonalOrderView', PersonalOrderView)
            .mount(el)
    }
})
