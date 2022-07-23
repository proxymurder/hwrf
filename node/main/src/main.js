import 'bootstrap';
import '@/assets/scss/app.scss';

import axios from 'axios';
import { auth } from '@/auth.js';

axios.interceptors.request.use(
	(config) => {
		if (auth.check) {
			config.headers['Authorization'] = auth.header;
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
const title = import.meta.env.VITE_TITLE;

app.provide('axios', axios);
app.provide('env', {
	routes: {
		accounts: {
			authorize: 'https://accounts.e-stubb.local/oauth/authorize',
			token: 'https://accounts.e-stubb.local/oauth/token',
			logout: 'https://accounts.e-stubb.local/api/logout',
		},
		api: {
			url: 'https://api.e-stubb.local',
			location: 'https://api.e-stubb.local/location',
		},
		redirect: import.meta.BASE_URL + '/auth/callback',
	},
	clients: {
		api: {
			id: import.meta.VITE_OAUTH_CLIENT,
		},
	},
});

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
