<template>
	<div class="hello">
		<h1>{{ msg }}</h1>
	</div>
</template>
<script setup>
import { inject } from 'vue';
const props = defineProps({
	msg: {
		type: String,
		required: true,
	},
});
const axios = inject('axios');
const oauth = JSON.parse(localStorage.getItem('oauth'));
axios
	.get('https://api.reverse-proxy.local/tests/foo')
	.then((res) => {
		console.log(res);
	})
	.catch((err) => {
		console.log(err);
	});
</script>
<style lang="scss"></style>
