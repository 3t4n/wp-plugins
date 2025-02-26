<?php 

if (!defined( "ABSPATH" )) exit;

function awal_custom_login() { 
	wp_enqueue_style( "awal_style", plugin_dir_url(__FILE__) . "public/style.css" );
}

add_action('login_head', 'awal_custom_login');

function awal_btn() {
	?>
	<a class="awal_verification awal_mid" id="sender" style="display: none;">Senden</a>
	<a class="awal_verification awal_mid" id="verificator"><?php esc_html_e( __("Verification per E-Mail", "aw_admin-login"), "aw_admin-login"); ?></a>
	<?php
}

add_action('login_form', 'awal_btn');

function awal_js() {
	require_once "texts.php";
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'awal_verification', plugin_dir_url(__FILE__) . "public/verification.js");
}

add_action("login_enqueue_scripts", "awal_js");

function awal_loginheader($in) {
    return $in . '
    <p id="info" class="login message">
		' . esc_html__( __("Use your E-Mail as verification instead of your password in order to login to your page", "aw_admin-login"), "aw_admin-login") . '
	</p> 

	';
}

add_filter("login_message", 'awal_loginheader');