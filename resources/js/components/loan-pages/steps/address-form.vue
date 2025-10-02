<script lang="ts">
import {DaDataNext} from 'vue-dadata-3'
import "vue-dadata-3/index.css";

export default {
    props:[
      'address'
    ],
    components: {
        'dadata': DaDataNext
    },
    data() {
        return {
            dadata_token: '92ed4d679acc57ce860c22cc777bafcd08ce3d81'
        }
    },
    methods: {
        dadata(response) {
            this.address.full = response.value;
            this.address.region = response.data.region_with_type;
            this.address.city = response.data.settlement_with_type ?? response.data.city_with_type;
            this.address.street = response.data.street_with_type;
            this.address.house = response.data.house;
            this.address.room = response.data.flat;
        }
    }
}
</script>

<template>
    <div>
        <br>
        <div class="input-group input-group-sm w-50">
            <span class="input-group-text">Регион</span>
            <dadata class="form-control" @onSelected="dadata" :token="dadata_token" v-model="this.address.region"></dadata>
            <span style="color: red; margin-left: 5px">*</span>
        </div>
        <br>
        <div class="input-group input-group-sm w-50">
            <span class="input-group-text">Населенный пункт</span>
            <dadata class="form-control" @onSelected="dadata" :token="dadata_token" v-model="this.address.city"></dadata>
            <span style="color: red; margin-left: 5px">*</span>
        </div>
        <br>
        <div class="input-group input-group-sm w-50">
            <span class="input-group-text">Улица</span>
            <dadata class="form-control" @onSelected="dadata" :token="dadata_token" v-model="this.address.street"></dadata>
            <span style="color: red; margin-left: 5px">*</span>
        </div>
        <br>
        <div style="display: flex">
            <div class="input-group input-group-sm" style="width: 150px">
                <span class="input-group-text">Дом</span>
                <dadata class="form-control" @onSelected="dadata" :token="dadata_token" v-model="this.address.house"></dadata>
                <span style="color: red; margin-left: 5px">*</span>
            </div>
            <div class="input-group input-group-sm" style="width: 170px; margin-left: 10px">
                <span class="input-group-text">Квартира</span>
                <input class="form-control" v-model="this.address.room">
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
