<script lang="ts">
import {vMaska} from "maska/vue"
import axios from "axios";

export default {
    directives: {
        maska: vMaska
    },
    props: {
        visible: {
            type: Boolean,
            required: true
        }
    },
    data(){
        return{
            login: '',
            pass: ''
        }
    },
    methods: {
        close() {
            this.$emit('close');
        },
        handleOverlayClick() {
            this.close();
        },
        auth() {
            axios.post('/auth', {login: this.login.replace(/[^0-9]/g, ""), pass: this.pass})
                .then(() => {
                    window.location.href = '/personal';
                })
                .catch(error => {
                    if (error.response.data.message)
                        this.$swal('Ошибка сервера');
                    else
                        this.$swal(error.response.data);
                });
        }
    }
}
</script>
<template>
    <div v-if="visible" class="modal-overlay" @click.self="handleOverlayClick">
        <div class="modal-content" style="display: flex; flex-direction: column; justify-content: center">
            <h5>Входите, будьте как дома</h5><br>
            <input v-model="login" class="form-control w-100" placeholder="Ваш телефон" v-maska="'+7(###)###-##-##'">
            <br>
            <input v-model="pass" class="form-control w-100" placeholder="Пароль">
            <br>
            <div @click="auth" class="btn btn-success">Войти</div>
            <br>
            <a href="/forgot_password" style="color: green">Забыли пароль?</a>
            <br>
        </div>
    </div>
</template>
<style scoped>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.modal-content {
    background: #fff;
    padding: 2rem;
    border-radius: 4px;
    min-width: 300px;
    width: auto;
}

a {
    color: green;
}

a:hover {
    text-decoration: none;
}
</style>
