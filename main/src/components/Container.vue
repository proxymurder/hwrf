<template>
	<main class="w-100 p-2 pt-1 position-absolute" v-scroll="scroll" ref="main">
		<slot></slot>
	</main>
</template>

<script setup>
import { computed, reactive, ref, watchEffect } from 'vue';

const emit = defineEmits(['background']);

const props = defineProps({
	container: {
		type: Object,
		required: false,
	},
});

const main = ref(null);
const container = reactive(props.container);

watchEffect(() => {
	if (main.value) {
		main.value.style.top = container.height;
	}
});

const { background } = reactive({
	background: reactive({
		isSet: ref(false),
		color: ref(null),
	}),
});

function scroll(e, el) {
	const y = window.scrollY;
	const thresh = 30;
	const set = computed(() => y >= thresh && !background.isSet);
	const unset = computed(() => y < thresh && background.isSet);
	if (set.value) {
		background.isSet = true;
		background.color = '#181818';
		emit('background', background.color);
	}
	if (unset.value) {
		background.isSet = false;
		background.color = 'unset';
		emit('background', background.color);
	}
}
</script>

<style></style>
