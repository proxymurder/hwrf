<template>
	<div class="nav-link rounded" @click="redirect" v-if="isAuthenticated">
		Logout
	</div>
</template>

<script setup>
import { useOAuth } from '@/oauth.js';

const { isAuthenticated } = useOAuth();
</script>

<style></style>
