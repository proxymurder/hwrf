<template>
	<div>
		<NavBar :nav="nav" @height="setHeight" />
		<Container :container="container" @background="setBackground">
			<router-view />
		</Container>
	</div>
</template>
<script setup>
import { inject, onMounted, reactive, ref } from 'vue';
import axios from 'axios';
import NavBar from '@/components/NavBar.vue';
import Container from '@/components/Container.vue';

const { routes } = inject('env');

const container = reactive({
	height: ref(null),
});
const nav = reactive({
	background: ref(null),
});
function setHeight(value) {
	container.height = `${value}px`;
}
function setBackground(value) {
	nav.background = value;
}

onMounted(() => {
	// axios
	// 	.get(api.location)
	// 	.then((res) => {
	// 		console.log(res);
	// 	})
	// 	.catch((err) => {
	// 		console.log(err);
	// 	});
});
</script>
<style lang="scss">
body {
	margin: 0;
	// color: $gray-200;
}
</style>
