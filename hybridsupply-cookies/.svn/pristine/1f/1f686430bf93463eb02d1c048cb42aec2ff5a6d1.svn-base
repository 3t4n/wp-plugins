<?php
/**
 * Plugin Name: Display Cookies Shortcode
 * Plugin URI:  https://wordpress.org/plugins/hybridsupply-cookies
 * Description: List all existing cookies comma seperated for the visitor by using the shortcode [hs_cookies].
 * Version: 0.2.3.8
 * Author: Jay
 * Author URI: https://profiles.wordpress.org/jayhybrid
 * Contributors: jayhybrid
 * Text Domain: hybridsupply-cookies
 * Domain Path: /languages
*/

function hs_cookies_shortcode($attributes = []) {		
	wp_enqueue_style( 'hybridsupply-cookies-css', plugin_dir_url(__FILE__) . 'css/style.css', FALSE, '1.0.1' );

	$iteration = 0;
	$use_more = FALSE;
	$use_classes = array();
	$output = '';

	if ( count($_COOKIE) <= 0) {
		return '<br> &mdash; ' . __('Currently, no cookies exist.', 'hybridsupply-cookies');
	}

	foreach ($_COOKIE as $cookie_key => $cookie_value) {
		if ($iteration == 5 && count($_COOKIE) >= 8) {
			$use_more = TRUE;
			//$use_classes = array('hs-more');
			$output .= '<details class="hs-more"><summary>' .  __('More', 'hybridsupply-cookies') . '</summary>';
		}

		$output .= count($use_classes) > 0 ? '<details class="' . implode(' ', $use_classes) . '">' : '<details>';
		$output .= '<summary>' .  $cookie_key . '</summary>' . $cookie_value . '</details>';

		$iteration++;
	}

	if ( $use_more ) {
		$output .= '</details>';
	}

	/*$output .= '<p>' .  sprintf(
		__('Go to %s.', 'hybridsupply-cookies'),
		'<a class="link" href="' .  get_privacy_policy_url() . '">' . __('Privacy policy', 'hybridsupply-cookies') . '</a>'
	) . '</p>';*/
	
	return $output;
}
add_shortcode('hs_cookies', 'hs_cookies_shortcode');



function hs_cookies_load_plugin_textdomain() {
    load_plugin_textdomain( 'hybridsupply-cookies', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'hs_cookies_load_plugin_textdomain' );