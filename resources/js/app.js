import './bootstrap';
import { createApp } from 'vue';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import AppView from './components/view.vue';
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

const app = createApp({});

app.use(VueSweetalert2);

app.component('app-view', AppView);
app.component('MainPageView', MainPageView);
app.component('MainPageSlider', MainPageSlider);
app.component('SendLoanButton', SendLoanButton);
app.component('MainPageCarousel', MainPageCarousel);
app.component('MainPageQuestions', MainPageQuestions);
app.component('MainPageQuestions', MainPageQuestions);
app.component('MainPageFooter', MainPageFooter);

app.component('LoanPageView', LoanPageView);
app.component('LoanPageHeader', LoanPageHeader);
app.component('LoanPageFooter', LoanPageFooter);
app.component('StepContacts', StepContacts);
app.component('Agreements', Agreements);

app.component('AuthModal', AuthModal);

app.component('PersonalPageView', PersonalPageView);
app.component('PersonalOrderView', PersonalOrderView);

app.mount('#app');
