<template>
	<div class="nav-link rounded" @click="redirect" v-if="auth.check">Logout</div>
</template>

<script setup>
import { inject } from 'vue';
const axios = inject('axios');
const auth = inject('auth');
const { routes } = inject('env');

function redirect() {
	axios
		.post(routes.api.logout)
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
