<script lang="ts">
import axios from 'axios'
import AddressForm from "./address-form.vue";

export default {
    components: {AddressForm},
    props: [
        'user',
        'tab'
    ],
    data() {
        return {
            address_same: true,
            reg_address: {
                full: '',
                region: '',
                city: '',
                street: '',
                house: '',
                room: ''
            },
            fakt_address: {
                full: '',
                region: '',
                city: '',
                street: '',
                house: '',
                room: ''
            }
        }
    },
    methods: {
        submit() {
            const form = new FormData();

            form.append('user_id', this.user.id);
            form.append('reg_full', this.reg_address.full);
            form.append('reg_region', this.reg_address.region);
            form.append('reg_city', this.reg_address.city);
            form.append('reg_street', this.reg_address.street);
            form.append('reg_house', this.reg_address.house);
            form.append('reg_room', this.reg_address.room);

            if(this.address_same)
                this.fakt_address = this.reg_address;

            form.append('fakt_full', this.fakt_address.full);
            form.append('fakt_region', this.fakt_address.region);
            form.append('fakt_city', this.fakt_address.city);
            form.append('fakt_street', this.fakt_address.street);
            form.append('fakt_house', this.fakt_address.house);
            form.append('fakt_room', this.fakt_address.room);

            axios.post('/add_addresses', form)
                .then((response) => {
                    this.user.id = response.data;
                    this.tab.current++;
                })
                .catch(error => {
                    if (error.response.data.message.length > 0)
                        this.$swal('Ошибка сервера');
                    else
                        this.$swal(error.response.data);
                });
        }
    }
}
</script>

<template>
    <div>
        <h4>Адрес проживания</h4>
        <br>
        <span style="color: red">* Обязательно для заполнения</span>
        <address-form :address="reg_address"/>
        <br>
        <div class="form-check form-check-inline">
            <input @change="address_same = !address_same" class="form-check-input" type="checkbox"
                   id="live_in_registration" checked>
            <label class="form-check-label" for="live_in_registration">Проживаю по адресу регистрации</label>
        </div>
        <address-form v-if="!address_same" :address="fakt_address"/>
        <br><br>
        <div @click="submit" class="btn btn-success">Далее</div>
    </div>
</template>

<style scoped>

</style>
