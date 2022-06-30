<template>
	<div class="nav-link rounded" @click="redirect" v-if="auth.check">Logout</div>
</template>

<script setup>
import { inject } from 'vue';
import { auth } from '@/auth.js';

const axios = inject('axios');
const { routes } = inject('env');

function redirect() {
	console.log('logout', routes.accounts.logout);
	axios
		.post(routes.accounts.logout)
		.then((res) => {
			console.log(res);
			auth.jwt = null;
		})
		.catch((err) => {
			console.log(err);
		});
}
</script>

<style></style>
