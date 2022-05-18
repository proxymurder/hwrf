<template>
	<div class="nav-link rounded" @click="redirect" v-if="guest">Login</div>
</template>

<script setup>
import crypto from 'crypto-js';
import { useOAuth } from '@/oauth.js';

const { guest } = useOAuth();

function redirect(e) {
	e.preventDefault();

	if (guest.value) {
		const route = 'https://oauth.reverse-proxy.local/authorize';
		const client = '964d71ff-b5a9-4012-85ec-d50edeb7beae';
		const redirect = 'https://reverse-proxy.local/callback';
		const scope = '';
		const state = strgen(40);
		const verifier = strgen(128);
		const challenge = encode(verifier);

		localStorage.setItem('state', state);
		localStorage.setItem('verifier', verifier);

		const url =
			`${route}?` +
			`client_id=${client}&` +
			`redirect_uri=${redirect}&` +
			`response_type=code&` +
			`scope=&` +
			`state=${state}&` +
			`code_challenge=${challenge}&` +
			`code_challenge_method=S256`;

		window.location = url;
	} else {
		console.log('Authenticated');
	}
}

function strgen(l = 128) {
	let str = '';
	let ascii;
	for (let i = 0; i < l; i++) {
		ascii = Math.floor(Math.random() * 25 + 97);
		str += String.fromCharCode(ascii);
	}
	return str;
}

function encode(str) {
	return crypto
		.SHA256(str)
		.toString(crypto.enc.Base64)
		.replace(/\+/g, '-')
		.replace(/\//g, '_')
		.replace(/=/g, '');
}
</script>

<style></style>
