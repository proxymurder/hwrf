<template>
	<div
		class="w-100 h-100 d-flex flex-column align-items-center justify-content-center"
	>
		<svg
			ref="loading"
			xmlns="http://www.w3.org/2000/svg"
			width="500"
			viewBox="0 0 32 32"
		>
			<path
				stroke="white"
				stroke-width="0.5"
				fill="none"
				d="M 5 16 C 5 32, 27 32, 27 16"
			></path>
			<path
				stroke="red"
				stroke-width="0.1"
				stroke-dasharray="2 1"
				stroke-dashoffset="0"
				opacity="0.5"
				fill="none"
				d="M 0 16 H 32"
			></path>
			<path
				stroke="red"
				stroke-width="0.1"
				stroke-dasharray="2 1"
				opacity="0.5"
				fill="none"
				d="M 16 0 V 32"
			></path>
			<rect
				stroke="red"
				stroke-width="0.1"
				opacity="0.5"
				fill="none"
				width="32"
				height="32"
			></rect>
			<!-- <circle cx="16" cy="16" r="0.2" fill="red"></circle> -->
		</svg>
	</div>
</template>

<script setup></script>

<style></style>
