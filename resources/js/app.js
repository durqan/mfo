import './bootstrap';
import { createApp } from 'vue';

import MainPageView from './components/main-page/view.vue';
import MainPageSlider from './components/main-page/slider.vue';
import SendLoanButton from './components/main-page/send-loan-button.vue';
import MainPageCarousel from './components/main-page/carousel.vue';
import MainPageQuestions from './components/main-page/questions.vue';
import MainPageFooter from './components/main-page/footer.vue';

import LoanPageView from './components/loan-pages/view.vue';
import LoanPageHeader from './components/loan-pages/header.vue';
import LoanPageFooter from './components/loan-pages/footer.vue';
import StepContactInformation from './components/loan-pages/steps/contact_information.vue';
import Agreements from './components/loan-pages/steps/agreements.vue';

const app = createApp({});

app.component('main-page-view', MainPageView);
app.component('MainPageSlider', MainPageSlider);
app.component('SendLoanButton', SendLoanButton);
app.component('MainPageCarousel', MainPageCarousel);
app.component('MainPageQuestions', MainPageQuestions);
app.component('MainPageQuestions', MainPageQuestions);
app.component('MainPageFooter', MainPageFooter);

app.component('loan-page-view', LoanPageView);
app.component('LoanPageHeader', LoanPageHeader);
app.component('LoanPageFooter', LoanPageFooter);
app.component('StepContactInformation', StepContactInformation);
app.component('Agreements', Agreements);

app.mount('#app');
