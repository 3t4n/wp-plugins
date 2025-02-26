<?php
/**
 * Accountable Press Toolkit
 * 
 * @copyright 2021 Accountable Press
 * 
 * Plugin Name: Accountable Press Toolkit
 * Plugin URI: https://accountable.press
 * Description: Toolkit for Certified Accountable Press Publishers.
 * Version: 1.0.1
 * Author: Accountable Press
 * Author URI: https://accountable.press
 * Text Domain: accountable-press
 * Domain Path: /languages
 * License: GPL v3 or later
 * 
 * Accountable Press is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Accountable Press is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Accountable Press. If not, see <http://www.gnu.org/licenses/>.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Bootstrap the plugin.
 * Define constants, include dependencies and set hooks.
 * 
 * @since 1.0.0
 */
function accountable_press_bootstrap() {
	if ( defined( 'ACCOUNTABLE_PRESS_VERSION' ) ) {
		// The plugin is already loaded.
		return;
	}

	define( 'ACCOUNTABLE_PRESS_VERSION', '1.0.1' );
	define( 'ACCOUNTABLE_PRESS_PATH', plugin_dir_path( __FILE__ ) );
	define( 'ACCOUNTABLE_PRESS_URL', plugins_url( '', __FILE__ ) );
	define( 'ACCOUNTABLE_PRESS_FILE', __FILE__ );

	if ( is_admin() ) {
		require_once ACCOUNTABLE_PRESS_PATH . 'admin/admin.php';
	}

	add_action( 'init', 'accountable_press_add_shortcode' );
	add_action( 'widgets_init', 'accountable_press_add_widget' );
}

/**
 * Adds the accountable_press_seal shortcode.
 * 
 * @since 1.0.0
 */
function accountable_press_add_shortcode() {
	add_shortcode( 'accountable_press_seal', 'accountable_press_do_shortcode' );
}

/**
 * Adds the Accountable Press widget.
 * 
 * @since 1.0.0
 */
function accountable_press_add_widget() {
	require_once ACCOUNTABLE_PRESS_PATH . 'class-accountable-press-widget.php';

	register_widget( new Accountable_Press_Widget() );
}

/**
 * Renders the accountable_press_seal shortcode.
 * 
 * @since 1.0.0
 * 
 * @param array $atts Attributes for the shortcode
 * 
 * @return string
 */
function accountable_press_do_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'size'	=> 'medium'
	), $atts, 'accountable_press_seal' );

	$account_id = get_option( 'accountable_press_account_id', '0' );

	return accountable_press_render_seal( $account_id, $atts['size'] );
}

/**
 * Returns the markup (HTML) for the Accountable Press seal.
 * 
 * @since 1.0.0
 * 
 * @param int $account_id The account ID of the Accountable Press publication.
 * @param string|int $seal_size The size (in pixels) of the seal.
 * 
 * @return string
 */
function accountable_press_render_seal( $account_id, $seal_size = 'medium' ) {
	$template = file_get_contents( apply_filters( 'accountable_press_seal_template', ACCOUNTABLE_PRESS_PATH . 'assets/seal-template.html' ) );

	$seal_sizes = accountable_press_get_seal_sizes();

	if ( is_numeric( $seal_size ) ) {
		$pixel_size = (int) $seal_size;
	} elseif ( array_key_exists( $seal_size, $seal_sizes ) ) {
		$pixel_size = $seal_sizes[$seal_size];
	} else {
		$pixel_size = $seal_sizes['medium'];
	}

	$substitutions = array(
		'{ACCOUNT_URL}'		=> sprintf( 'https://accountable.press/ap/profile/%d/', $account_id ),
		'{SEAL_SIZE}'		=> $pixel_size,
		'{SEAL_IMAGE_URL}'	=> ACCOUNTABLE_PRESS_URL . '/assets/accountable-press-seal.svg'
	);

	$seal = str_replace( array_keys( $substitutions ), array_values( $substitutions ), $template );

	return $seal;
}

/**
 * Get the array of named seal image sizes.
 * 
 * @since 1.0.0
 * 
 * @return array
 */
function accountable_press_get_seal_sizes() {
	return apply_filters( 'accountable_press_seal_sizes', array(
		'small'		=> 80,
		'medium'	=> 120,
		'large'		=> 160
	) );
}

/**
 * Print the meta tag.
 * 
 * @since 1.0.0
 */
function accountable_press_print_meta_tag() {
	$account_id = get_option( 'accountable_press_account_id', '0' );
	?>
	<link rel="ap-certified" href="<?php printf( 'https://accountable.press/ap/profile/%d/', $account_id ); ?>" />
	<?php
}

add_action( 'wp_head', 'accountable_press_print_meta_tag' );

accountable_press_bootstrap();