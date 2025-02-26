<?php
/**
 * Plugin Name:       Always Remember Me
 * Plugin URI:        http://planetozh.com/blog/my-projects/wordpress-plugin-always-remember-me-login-checkbox/
 * GitHub Plugin URI: https://github.com/ozh/always-remember-me
 * Description:       One year auth cookie and 'Remember Me' checkbox always checked. "Log in" less often.
 * Version:           1.0
 * Requires at least: 3.0
 * Requires PHP:      5.6
 * Author:            Ozh
 * Author URI:        https://ozh.org/
 */

// Hook stuff in
function wp_ozh_arm_init() {
	add_filter( 'login_footer',           'wp_ozh_arm_add_js' );
	add_filter( 'auth_cookie_expiration', 'wp_ozh_arm_cookie' );
}
add_action( 'init', 'wp_ozh_arm_init' );

// JS that checks the checkbox
function wp_ozh_arm_add_js() {
	echo <<<JS
	<script>
	document.getElementById('rememberme').checked = true;
	document.getElementById('user_login').focus();
	</script>
JS;
}

function wp_ozh_arm_cookie() {
	return 31536000; // one year: 60 * 60 * 24 * 365
}