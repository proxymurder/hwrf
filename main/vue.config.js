const { defineConfig } = require('@vue/cli-service');
module.exports = defineConfig({
	transpileDependencies: true,
	css: {
		loaderOptions: {
			sass: {
				implementation: require('sass'),
				additionalData: `@import 'bootstrap/scss/_functions.scss';@import 'bootstrap/scss/_variables.scss';@import '@/assets/scss/_variables.scss';@import 'bootstrap/scss/_mixins.scss';`,
			},
		},
	},
});
