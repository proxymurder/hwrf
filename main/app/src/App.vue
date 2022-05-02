<template>
	<div>
		<nav class="nav align-items-center">
			<div class="p-2">
				<img :src="logo" :alt="logo" />
			</div>
			<router-link class="nav-link" to="/">Home</router-link>
			<router-link class="nav-link" to="/about">About</router-link>
		</nav>
		<router-view />
	</div>
</template>
<script setup>
import logo from '@/assets/reverse_proxy_logo.png';
</script>
<style lang="scss">
nav {
	background-color: gray('100');
}
nav img {
	width: 50px;
}

body {
	margin: 0;
}

a {
	text-decoration: none;
}

// #app {
// 	font-family: Avenir, Helvetica, Arial, sans-serif;
// 	-webkit-font-smoothing: antialiased;
// 	-moz-osx-font-smoothing: grayscale;
// 	color: #2c3e50;
// }

// nav a {
// 	font-weight: bold;
// 	color: $black;
// 	padding: 0 10px;
// }
nav a.router-link-exact-active {
	color: $gray-800;
}
</style>
