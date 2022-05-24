<template>
	<div
		class="min-vh-100 d-flex col align-items-center justify-content-center border-box"
	>
		<h4>Authorizing...</h4>
	</div>
</template>

<script setup>
import { computed, inject, onMounted, reactive, ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const axios = inject('axios');
const auth = inject('auth');
const { routes, clients } = inject('env');

const query = new URLSearchParams(window.location.search);
const code = query.get('code');
const state = query.get('state');
const matches = computed(() => {
	return auth.pending && auth.state === state;
});

onMounted(() => {
	if (!matches.value || !code) {
		router.push('/');
	}
	axios
		.post(routes.oauth.token, {
			grant_type: 'authorization_code',
			client_id: clients.api.id,
			redirect_uri: routes.api.redirect,
			code: code,
			code_verifier: auth.verifier,
		})
		.then((res) => {
			console.log(res);
			auth.state = null;
			auth.verifier = null;
			auth.jwt = res.data;
			router.replace('/');
		})
		.catch((err) => {
			console.log('err: ', err);
		});
});
</script>

<style lang="scss"></style>
