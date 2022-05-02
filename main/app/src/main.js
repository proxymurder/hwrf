import { createApp } from 'vue';
import App from '@/App.vue';
const app = createApp(App);

import axios from 'axios';
app.provide('axios', axios);

import router from './router';
app.use(router);

import '@/assets/scss/app.scss';

app.mount('#app');
