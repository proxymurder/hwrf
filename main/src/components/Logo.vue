<template>
	<svg ref="logo" xmlns="http://www.w3.org/2000/svg" :viewBox="viewBox" :width="width"></svg>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 5" class="w-80">
		<defs>
			<linearGradient id="logo-gradient" x1="100%" y1="0%" x2="0%" y2="100%">
				<stop offset="0%" stop-color="#efadce" />
				<stop offset="100%" stop-color="#a6e9d5" />
			</linearGradient>
		</defs>
		<text x="14" y="5" class="logo-font" font-family="Gubblebum Blocky" font-size="0.5rem" fill="url(#logo-gradient)" xml:space="preserve">
			<tspan>es</tspan>
			<tspan>&nbsp</tspan>
		</text>
	</svg>
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
	const { svg, mask, rect, path, defs, gradient, colors, body } = reactive({
		svg: logo,
		mask: document.createElementNS(ns, 'mask'),
		rect: document.createElementNS(ns, 'rect'),
		path: document.createElementNS(ns, 'path'),
		defs: document.createElementNS(ns, 'defs'),
		gradient: document.createElementNS(ns, 'linearGradient'),
		colors: {
			start: document.createElementNS(ns, 'stop'),
			end: document.createElementNS(ns, 'stop'),
		},
		body: document.createElementNS(ns, 'circle'),
	});

	rect.setAttributeNS(null, 'width', '32');
	rect.setAttributeNS(null, 'height', '32');
	rect.setAttributeNS(null, 'fill', '#ffffff');

	path.setAttributeNS(null, 'fill', 'none');
	path.setAttributeNS(null, 'stroke', '#000000');
	path.setAttributeNS(null, 'stroke-linecap', 'round');
	path.setAttributeNS(null, 'stroke-width', '2');
	path.setAttributeNS(null, 'd', 'M 6 19 C 8 30,24 30, 26 19');

	mask.setAttributeNS(null, 'id', 'logo-mask');
	mask.appendChild(rect);
	mask.appendChild(path);

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
	body.setAttributeNS(null, 'mask', 'url(#logo-mask)');
	body.setAttributeNS(null, 'cx', '16');
	body.setAttributeNS(null, 'cy', '16');
	body.setAttributeNS(null, 'r', '15');

	svg.appendChild(defs);
	svg.appendChild(mask);
	svg.appendChild(body);
});
</script>

<style lang="scss">
.logo-body {
	fill: url('#logo-gradient');
	@include color-scheme('light') {
		fill: $gray-900;
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
