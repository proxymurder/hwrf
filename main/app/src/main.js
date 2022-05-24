import bootstrap from 'bootstrap';
import '@/assets/scss/app.scss';

import axios from 'axios';
import { useAuth } from '@/auth.js';

const { auth } = useAuth();

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

app.provide('axios', axios);
app.provide('auth', auth);
app.provide('env', {
	routes: {
		oauth: {
			authorize: process.env.VUE_APP_OAUTH_URL + '/authorize',
			token: process.env.VUE_APP_OAUTH_URL + '/token',
		},
		api: {
			url: process.env.VUE_APP_API_URL,
			redirect: process.env.VUE_APP_URL + '/callback',
			location: process.env.VUE_APP_API_URL + '/location',
			logout: process.env.VUE_APP_API_URL + '/logout',
		},
	},
	clients: {
		api: {
			id: process.env.VUE_APP_OAUTH_CLIENT,
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
