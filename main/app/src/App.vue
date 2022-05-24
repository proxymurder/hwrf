<template>
	<div>
		<NavBar :background="nav.background" @height="setHeight" />
		<main class="w-100 p-2 pt-1 position-absolute" v-scroll="scroll" ref="main">
			<router-view />
		</main>
	</div>
</template>
<script setup>
import { computed, inject, onMounted, reactive, ref, watchEffect } from 'vue';
import NavBar from '@/components/NavBar.vue';
import axios from 'axios';

const { routes } = inject('env');
const nav = reactive({
	background: reactive({
		isSet: ref(false),
		color: ref(null),
	}),
	height: ref(null),
});
const main = ref(null);
function setHeight(v) {
	main.value.style.top = `${v}px`;
}

function scroll(e, el) {
	const { background } = nav;
	const y = window.scrollY;
	const thresh = 30;
	const set = computed(() => y >= thresh && !background.isSet);
	const unset = computed(() => y < thresh && background.isSet);
	if (set.value) {
		background.isSet = true;
		background.color = '#181818';
	}
	if (unset.value) {
		background.isSet = false;
		background.color = 'unset';
	}
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
	color: $gray-200;
}
</style>
