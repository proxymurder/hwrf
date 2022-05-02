<template>
	<div class="home">
		<img alt="Vue logo" src="@/assets/logo.png" />
		<HelloWorld :msg="state.msg" />
		<button class="btn btn-primary text-white" @click="change">
			Change message
		</button>
	</div>
</template>

<script setup>
import { reactive } from 'vue';
import HelloWorld from '@/components/HelloWorld.vue';

const state = reactive({
	msg: 'Welcome to your Vue js App',
});
function change() {
	state.msg = 'now this has changed';
}
</script>
<style scoped>
.home {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	height: 100vh;
}
</style>
