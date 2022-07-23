import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
	server: {
		host: '0.0.0.0',
		port: 80,
		proxy: {
			'/socket.io': {
				target: 'ws://localhost',
				ws: true,
			},
		},
		hmr: {
			path: '/socket.io',
			port: 443,
		},
	},
	plugins: [vue()],
	resolve: {
		alias: {
			'@': path.resolve(__dirname, './src'),
		},
	},
	css: {
		preprocessorOptions: {
			scss: {
				additionalData: `@import 'bootstrap/scss/_functions.scss';@import 'bootstrap/scss/_variables.scss';@import '@/assets/scss/_variables.scss';@import 'bootstrap/scss/_mixins.scss';`,
			},
		},
	},
});
