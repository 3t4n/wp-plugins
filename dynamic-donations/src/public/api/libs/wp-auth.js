import WPRequest from './wp-request';

const request = new WPRequest();

function WPAuth() {
}

WPAuth.prototype.login = async function (creds) {
	return await request.hook('wp_login', creds);
}

WPAuth.prototype.register = async function (creds) {
	return await request.hook('wp_register', creds);
}

WPAuth.prototype.isAuthenticated = async function () {
	return await request.hook('wp_is_authenticated');
}

WPAuth.prototype.getCurrentUser = async function () {
	return await request.hook('wp_get_current_user');
}

export default WPAuth;