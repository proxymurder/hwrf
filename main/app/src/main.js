import bootstrap from 'bootstrap';
import '@/assets/scss/app.scss';

import axios from 'axios';
import { useOAuth } from '@/oauth.js';

const { accessToken, isAuthenticated } = useOAuth();
axios.interceptors.request.use(
	(config) => {
		if (isAuthenticated.value) {
			config.headers['Authorization'] = `Bearer ${accessToken.value}`;
		}
		return config;
	},
	(error) => {
		return Promise.reject(error);
	}
);

import { createApp } from 'vue';
import App from '@/App.vue';
import router from './router';

const app = createApp(App);
app.provide('axios', axios);
app.use(router);
app.directive('scroll', {
	mounted: function (el, binding) {
		let f = function (e) {
			if (binding.value(e, el)) {
				window.removeEventListener('scroll', f);
			}
		};
		window.addEventListener('scroll', f);
	},
});
app.mount('#app');
