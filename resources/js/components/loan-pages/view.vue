<script>
import Contacts from "./steps/contacts.vue";
import Passport from "./steps/passport.vue";
import Address from "./steps/address.vue";
import Final from "./steps/final.vue";

export default {
    data() {
        return {
            tab: {
                current: 0
            },
            tabs: [
                {title: 'Контактная информация', component: Contacts},
                {title: 'Паспорт', component: Passport},
                {title: 'Адрес', component: Address},
                {title: 'Общие сведения', component: Final}
            ],
            user: {
                id: null
            }
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
                    v-for="(curTab, index) in tabs"
                    :key="index"
                    :class="{ active: tab.current === index }">
                    {{ curTab.title }}
                </button>
            </div>
            <div class="tabs-content">
                <component
                    :user="user"
                    :is="tabs[tab.current].component"
                    :tab="tab"
                    v-if="tabs[tab.current]"
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
    cursor: default !important;
}

.tabs-nav button.active {
    color: #007bff;
    border-bottom: 2px solid #007bff;
}

.tabs-content {
    padding: 20px;
}
</style>
