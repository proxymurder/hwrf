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
const query = new URLSearchParams(window.location.search);
const state = {
	local: localStorage.getItem('state'),
	remote: query.get('state'),
};
const matches = computed(() => {
	return state.local && state.local === state.remote;
});

onMounted(() => {
	const route = 'https://oauth.reverse-proxy.local/token';
	const grant = 'authorization_code';
	const client = '964d71ff-b5a9-4012-85ec-d50edeb7beae';
	const redirect = 'https://reverse-proxy.local/callback';
	const code = query.get('code');
	const verifier = localStorage.getItem('verifier');
	if (!matches.value) {
		router.push('/');
	}
	axios
		.post(route, {
			grant_type: grant,
			client_id: client,
			redirect_uri: redirect,
			code: code,
			code_verifier: verifier,
		})
		.then((res) => {
			localStorage.setItem('oauth', JSON.stringify(res.data));
			localStorage.removeItem('state');
			localStorage.removeItem('verifier');

			router.replace('/');
		})
		.catch((err) => {
			console.log('err: ', err);
		});
});
</script>

<style lang="scss"></style>
