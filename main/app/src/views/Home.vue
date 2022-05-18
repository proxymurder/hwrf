<template>
	<div class="home min-vh-100 mt-10">
		<HelloWorld :msg="msg" />
		<button class="btn btn-primary text-white" @click="change">
			Change message
		</button>
	</div>
</template>

<script setup>
import { ref } from 'vue';
import HelloWorld from '@/components/HelloWorld.vue';

const msg = ref('Welcome to your Vue js App');
function change() {
	msg.value = 'now this has changed';
}
</script>
<style lang="scss">
.home {
	margin: 10px;
	border-radius: 5px;
	background-color: $white-100;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
}
</style>
