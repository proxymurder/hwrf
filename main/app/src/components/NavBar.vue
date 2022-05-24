<template>
	<div
		class="w-100 p-2 pb-1 gradient-fade position-fixed d-flex align-items-center z-10"
		ref="navBar"
	>
		<div class="w-20 d-flex align-content-center justify-content-around">
			<Logo />
		</div>
		<nav class="w-60 nav d-flex align-content-center">
			<router-link class="nav-link me-3 rounded" to="/">Home</router-link>
			<router-link class="nav-link me-3 rounded" to="/about">About</router-link>
		</nav>
		<div class="w-20 d-flex align-content-center justify-content-around">
			<Login />
			<Logout />
		</div>
	</div>
</template>

<script setup>
import Logo from '@/components/Logo.vue';
import Login from '@/components/Login.vue';
import Logout from '@/components/Logout.vue';
import { onMounted, reactive, ref, watchEffect } from 'vue';

const emit = defineEmits(['height']);
const props = defineProps({
	nav: {
		type: Object,
		required: false,
	},
});
const navBar = ref(null);

onMounted(() => {
	emit('height', navBar.value.clientHeight);
});

const nav = reactive(props.nav);
watchEffect(() => {
	if (navBar.value) {
		navBar.value.style.backgroundColor = nav.background;
	}
});
</script>

<style lang="scss">
nav > .nav-link {
	color: $gray-200;
}

nav > .nav-link:hover {
	color: $gray-600;
}

nav > .nav-link.router-link-exact-active {
	color: $gray-900;
	background-image: linear-gradient(180deg, $pink-200, $teal-200);
}
nav > .nav-link.router-link-exact-active:hover {
	color: $gray-900;
}

div > .nav-link {
	color: $gray-900;
	background-image: linear-gradient(125deg, $pink-200, $teal-200);
	cursor: pointer;
	transition: all 500ms;
}

div > .nav-link:hover {
	color: $gray-800;
	animation: gradient-animation 2000ms;
	animation-fill-mode: both;
}

.gradient-fade {
	@include gradient-y-three-colors($black-600, $black-300, 50%, $black-00);
	transition: background 1000ms;
}

@keyframes gradient-animation {
	@each $key, $value in $range-100 {
		#{$value} {
			background-image: linear-gradient(
				#{(125 + 4 * ($key)/10) + 'deg'},
				$pink-200,
				$teal-200
			);
		}
	}
}
</style>
