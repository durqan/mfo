<script>
import Contact_information from "@/components/loan-pages/steps/contact_information.vue";

export default {
    data() {
        return {
            currentTab: 0,
            tabs: [
                { title: 'Контактная информация', component: Contact_information },
                { title: 'Паспорт и адрес', component: 'PassportAddress' },
                { title: 'Общие сведения', component: 'GeneralInfo' }
            ]
        };
    }
};
</script>
<template>
    <div>
        <LoanPageHeader/>
        <div class="tabs">
            <div class="tabs-nav">
                <button
                    v-for="(tab, index) in tabs"
                    :key="index"
                    :class="{ active: currentTab === index }"
                    @click="currentTab = index">
                    {{ tab.title }}
                </button>
            </div>
            <div class="tabs-content">
                <component
                    :is="tabs[currentTab].component"
                    v-if="tabs[currentTab]"
                ></component>
            </div>
        </div>
        <LoanPageFooter/>
    </div>
</template>

<style scoped>
.tabs {
    width: 100%;
}

.tabs-nav {
    display: flex;
    border-bottom: 1px solid #ccc;
}

.tabs-nav button {
    padding: 10px 20px;
    border: none;
    background: transparent;
    cursor: pointer;
}

.tabs-nav button.active {
    color: #007bff;
    border-bottom: 2px solid #007bff;
}

.tabs-content {
    padding: 20px;
}
</style>
