<script>
export default {
    data() {
        return {
            hoverIndex: null,
            links: [
                {title: 'Займ', path: 'order'},
                {title: 'Контакты', path: 'contacts'},
                {title: 'История', path: 'history'},
                {title: 'Документы', path: 'documents'}
            ],
            active_component: 'order'
        };
    },
    methods:{
        logout(){
            axios.post('/logout')
                .then(() => {
                    window.location.href = '/';
                })
                .catch(error => {
                    if (error.response.data.message)
                        this.$swal('Ошибка сервера');
                    else
                        this.$swal(error.response.data);
                });
        }
    }
};
</script>
<template>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo">
                <span class="logo-text">Название компании</span>
            </div>
            <ul class="nav-links">
                <li v-for="(link, index) in links" :key="index" @mouseenter="hoverIndex = index"
                    @mouseleave="hoverIndex = null">
                    <div @click="active_component = link.path" class="nav-link" :class="`color-${index + 1}`">
                        {{ link.title }}
                        <span class="underline"
                              :style="{ transform: hoverIndex === index ? 'scaleX(1)' : 'scaleX(0)' }"></span>
                    </div>
                </li>
            </ul>
            <div class="btn btn-success logout" @click="logout">Выйти</div>
        </div>
    </nav>
    <PersonalOrderView v-if="active_component === 'order'"/>
    <LoanPageFooter/>
</template>
<style scoped>
.navbar {
    background-color: white;
    padding: 1.5rem 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
    padding: 0 20px;
}

.logo {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo-text {
    font-size: 24px;
    font-weight: bold;
    color: #4CAF50;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 30px;
}

.nav-link {
    position: relative;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s ease, transform 0.2s ease;
}

.color-1 {
    color: #4CAF50;
}

.color-2 {
    color: #FF9800;
}

.color-3 {
    color: #9C27B0;
}

.color-4 {
    color: #00796B;
}

.nav-link:hover {
    transform: translateY(-2px);
    cursor: pointer;
}

.underline {
    display: block;
    width: 100%;
    height: 2px;
    background-color: #4CAF50;
    transform-origin: left;
    transition: transform 0.3s ease, background-color 0.3s ease;
}

.nav-link:hover .underline {
    background-color: #259B24;
}

.btn {
    color: white;
}

.logout:hover {
    background-color: darkred;
}
</style>
