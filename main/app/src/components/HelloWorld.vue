<template>
	<div class="hello">
		<h1>{{ msg }}</h1>
	</div>
</template>
<script setup>
import { inject, onMounted } from 'vue';
const props = defineProps({
	msg: {
		type: String,
		required: true,
	},
});
const axios = inject('axios');
const { routes } = inject('env');
axios
	.get(`${routes.api.url}/tests/foo`)
	.then((res) => {
		console.log(res);
	})
	.catch((err) => {
		console.log(err);
	});
</script>
<style lang="scss"></style>
