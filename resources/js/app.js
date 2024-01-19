import './bootstrap';
import App from './App.vue';
import { createApp } from 'vue';
import VueAxios from 'vue-axios';
import { createRouter,createWebHistory } from 'vue-router'
import { routes } from './routes';

const router = createRouter({
    history:createWebHistory(),
    routes:routes
})

const app = createApp(App)
app.use(router)
app.use(VueAxios, axios);
app.mount('#app')