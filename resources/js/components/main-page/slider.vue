<script lang="ts">
export default {
    props: [
        'settings'
    ],
    methods: {
        countType() {
            if(this.settings.type == 'срок'){
                if (this.settings.val > 10 && [11, 12, 13, 14].includes(this.settings.val % 100))
                    return this.settings.count = ' дней';

                let last_num = this.settings.val % 10;

                if (last_num == 1) return this.settings.count = ' день';
                if ([2, 3, 4].includes(last_num)) return this.settings.count = ' дня';
                if ([5, 6, 7, 8, 9, 0].includes(last_num)) return this.settings.count = ' дней';
            }else{
                return this.settings.count = '₽';
            }
        }
    }
}
</script>

<template>
    <div>
        <div style="display: flex; justify-content: space-between">
            <label class="form-label">Выберите {{settings.type}}</label>
            <output aria-hidden="true" style="font-weight: bold; font-size: 20px">{{settings.val}}{{countType()}}</output>
        </div>
        <input type="range" class="form-range" :min="settings.min" :max="settings.max" :step="settings.step" v-model="settings.val" />
        <div style="display: flex; justify-content: space-between">
            <span>{{settings.min}}</span>
            <span>{{settings.max}}</span>
        </div>
    </div>
</template>
