<template>
	<svg
		ref="logo"
		xmlns="http://www.w3.org/2000/svg"
		:viewBox="viewBox"
		:width="width"
	></svg>
</template>

<script setup>
import { onMounted, reactive, ref } from 'vue';
const props = defineProps({
	width: {
		type: String,
		required: false,
		default: '50',
	},
	viewBox: {
		type: String,
		required: false,
		default: '0 0 32 32',
	},
});
const logo = ref();
onMounted(() => {
	const ns = 'http://www.w3.org/2000/svg';
	const { svg, defs, gradient, colors, body, path } = reactive({
		svg: logo,
		defs: document.createElementNS(ns, 'defs'),
		gradient: document.createElementNS(ns, 'linearGradient'),
		colors: {
			start: document.createElementNS(ns, 'stop'),
			end: document.createElementNS(ns, 'stop'),
		},
		body: document.createElementNS(ns, 'circle'),
		path: document.createElementNS(ns, 'path'),
	});

	colors.start.setAttributeNS(null, 'offset', '0%');
	colors.start.classList.add('start-color');

	colors.end.setAttributeNS(null, 'offset', '100%');
	colors.end.classList.add('end-color');

	gradient.setAttribute('id', 'logo-gradient');
	gradient.setAttribute('x1', '100%');
	gradient.setAttribute('y1', '0%');
	gradient.setAttribute('x2', '0%');
	gradient.setAttribute('y2', '100%');

	gradient.appendChild(colors.start);
	gradient.appendChild(colors.end);

	defs.appendChild(gradient);

	body.classList.add('logo-body');
	body.setAttributeNS(null, 'cx', '16');
	body.setAttributeNS(null, 'cy', '16');
	body.setAttributeNS(null, 'r', '15');

	path.classList.add('logo-path');
	path.setAttributeNS(null, 'd', 'M 6 19 C 8 30,24 30, 26 19');

	svg.appendChild(defs);
	svg.appendChild(body);
	svg.appendChild(path);
});
</script>

<style lang="scss">
.logo-body {
	fill: url('#logo-gradient');
	@include color-scheme('light') {
		fill: $gray-900;
	}
}

.logo-path {
	stroke-width: 2;
	stroke-linecap: round;
	fill: none;
	stroke: $gray-900;
	@include color-scheme('light') {
		stroke: url('#logo-gradient');
	}
}

.start-color {
	stop-color: $pink-200;
	stop-opacity: 1;
}

.end-color {
	stop-color: $teal-200;
	stop-opacity: 1;
}
</style>
