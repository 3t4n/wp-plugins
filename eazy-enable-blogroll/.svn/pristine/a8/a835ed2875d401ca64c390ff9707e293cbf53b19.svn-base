<?php
/**
 * Plugin Name:       Eazy Enable Blogroll
 * Plugin URI:        http://wordpress.org/extend/plugins/eazy-enable-blogroll/
 * Description:       Enable the WordPress Blogroll for Versions greater than 3.5
 * Version:           1.0.2
 * Requires at least: 3.5.0
 * Author:            Tamás Kiss
 * Author URI:        http://tamas-kiss.com
 * Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QQMET2BDE8CJC&source=url
 * License:           GPL2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       eazy-enable-blogroll
 * Domain Path:       /languages
 *
 * @package eazy-enable-blogroll
 */

if ( get_bloginfo( 'version' ) >= 3.5 ) {
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}

function eazy_enable_blogroll_add_settings_link( $links ) {
	$links[] = sprintf(
		'<a href="%s">%s</a>',
		admin_url( 'link-manager.php' ),
		__( 'Blogroll' )
	);
	$links[] = sprintf(
		'<a href="%s" target="_blank" class="tk__donate-link" style="color: #ffb900; font-weight: 700">%s</a>',
		'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QQMET2BDE8CJC&source=url',
		__( 'Donate (PayPal)' )
	);

	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'eazy_enable_blogroll_add_settings_link' );
