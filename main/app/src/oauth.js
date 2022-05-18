import { computed } from 'vue';

export function useOAuth() {
	const oauth = JSON.parse(localStorage.getItem('oauth'));

	const accessToken = computed(() => {
		return isAuthenticated ? oauth.access_token : null;
	});
	const isAuthenticated = computed(() => {
		return !!oauth;
	});
	const guest = computed(() => {
		return !isAuthenticated;
	});

	return { accessToken, isAuthenticated, guest };
}
