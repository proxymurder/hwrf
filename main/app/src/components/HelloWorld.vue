<template>
	<div class="hello">
		<h1>{{ msg }}</h1>
	</div>
</template>
<script setup>
import { defineProps, inject } from 'vue';
const props = defineProps({
	msg: {
		type: String,
		required: true,
	},
});
const axios = inject('axios');
axios
	.get('https://api.reverse-proxy.local/test')
	.then((res) => {
		console.log(res);
	})
	.catch((err) => {
		console.log(err);
	});
</script>
<style scoped>
h3 {
	margin: 40px 0 0;
}
ul {
	list-style-type: none;
	padding: 0;
}
li {
	display: inline-block;
	margin: 0 10px;
}
a {
	color: #42b983;
}
</style>
