<?php
/**
 * Plugin Name: Glamour
 * Plugin URI:  https://www.cantothemes.com/item/glamour-pro-visual-styling-wordpress-plugin/
 * Description: Style any WordPress post, page, home page, category page, etc. visually with this ultimate visual CSS editor WordPress plugin.
 * Author:      CantoThemes
 * Author URI:  https://www.cantothemes.com/
 * Version:     1.0.0
 * Text Domain: glamour
 * Domain Path: /languages/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( defined( 'GLMR_PRO' ) && GLMR_PRO ) {
	return;
}

if ( ! defined( 'GLMR_PATH' ) ) {
	define( 'GLMR_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'GLMR_URL' ) ) {
	define( 'GLMR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'GLMR_VERSION' ) ) {
	define( 'GLMR_VERSION', '1.0.0' );
}

if ( ! defined( 'GLMR_FREE' ) ) {
	define( 'GLMR_FREE', true );
}

include_once GLMR_PATH . '/includes/plugin.php';

add_filter('plugin_action_links', 'glamour_action_links', 10, 2);

function glamour_action_links( $links, $file ){
	
	if ($file == plugin_basename(dirname(__FILE__) . '/glamour.php')) {
		$links["go_pro"] = '<a style="color: #39b54a;font-weight: 700;" target="_blank" href="' . esc_url('https://www.cantothemes.com/item/glamour-pro-visual-styling-wordpress-plugin/') . '">Go Pro</a>';
	}
	return $links;
}