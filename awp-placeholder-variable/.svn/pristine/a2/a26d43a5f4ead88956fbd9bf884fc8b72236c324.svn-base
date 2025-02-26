<?php
/**
 * Plugin Name: Affiliate WP - Placeholder Variable
 * Description: Replace Placeholder Variable with tracking affiliate id
 * Version: 1.0.0
 * Author: qfnetwork, rahilwazir
 * Author URI: https://www.qfnetwork.org
 * Text Domain: affiliatewp-placeholder-variable
 */

if ( ! function_exists( 'affiliate_wp' ) ) {
	return;
}

add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_script(
			'affiliatewp-placeholder-variable',
			plugins_url( 'assets/js/affiliatewp-placeholder-variable.js', __FILE__ ),
			[ 'jquery' ],
			false,
			true
		);

		wp_localize_script(
			'affiliatewp-placeholder-variable',
			'AWP_TMPL_STRINGS',
			[
				'affiliate_id' => affiliate_wp()->tracking->get_affiliate_id(),
				'ajax_url'     => admin_url( 'admin-ajax.php' ),
			]
		);
	},
	999
);

function awp_tmpl_string_get_affiliate_id() {
	wp_send_json( [ 'affiliate_id' => affiliate_wp()->tracking->get_affiliate_id() ] );
}
add_action( 'wp_ajax_get_affiliate_id', 'awp_tmpl_string_get_affiliate_id' );
add_action( 'wp_ajax_nopriv_get_affiliate_id', 'awp_tmpl_string_get_affiliate_id' );
