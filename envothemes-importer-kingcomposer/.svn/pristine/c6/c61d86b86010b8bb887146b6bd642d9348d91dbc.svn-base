<?php
/*
  Plugin Name: EnvoThemes Demo Importer for KingComposer
  Plugin URL: https://envothemes.com/envo-business/
  Description: Quickly import KingComposer live demo layouts into Envo Business theme
  Version: 1.0.4
  Author: EnvoThemes
  Author URI: https://envothemes.com/
  License: GPL3
  License URI: http://www.gnu.org/licenses/gpl.html
  Text Domain: ebdi-kc
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'plugins_loaded', 'ebdi_kc_load_textdomain' );

function ebdi_kc_load_textdomain() {
	load_plugin_textdomain( 'ebdi-kc', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

function ebdi_kc_mega_menu_scripts( $hook ) {
  // Load styles and scripts only on theme info page
	if ( 'appearance_page_et-import' != $hook ) {
		return;
	}
	wp_enqueue_style( 'ebde-kc-mega-menu-css', plugin_dir_url( __FILE__ ) . '/css/style.css', array(), '0.1' );
}
add_action( 'admin_enqueue_scripts', 'ebdi_kc_mega_menu_scripts' );

add_action( 'plugins_loaded', 'ebdi_kc_templates' );

function ebdi_kc_templates() {

  if (function_exists('kc_prebuilt_template')) {
  	$xml_path = plugin_dir_path( __FILE__ ) . '/lib/envobusiness-free.xml';
  	kc_prebuilt_template('Envo Business Free Templates', $xml_path);
  }
  
}

/* Check if Envo Business theme is activated */

if ( !empty( $GLOBALS[ 'pagenow' ] ) && 'plugins.php' === $GLOBALS[ 'pagenow' ] ) {
	add_action( 'admin_notices', 'ebdi_kc_admin_notices', 0 );
}

function ebdi_kc_requirements() {

	$ebdi_kc_errors = array();
	$theme								 = wp_get_theme();

	if ( ( 'Envo Business' != $theme->name ) && ( 'Envo Business' != $theme->parent_theme ) ) {

		$ebdi_kc_errors[] = __( 'You need to have <a href="https://wordpress.org/themes/envo-business/" target="_blank">Envo Business</a> theme in order to use EnvoThemes Demo Importer for KingComposer plugin.', 'ebdi-kc' );
	
  }

	return $ebdi_kc_errors;
}

/* Add settings link */
add_filter( 'plugin_action_links', 'ebdi_kc_plugin_action_links', 10, 2 );

function ebdi_kc_plugin_action_links( $links, $file ) {
	if ( $file != plugin_basename( __FILE__ ) ) {
		return $links;
	}

	$settings_link = '<a href="' . admin_url( 'themes.php?page=et-import' ) . '">'. esc_html( __( 'Settings', 'ebdi-kc' ) ) . '</a>';
  
	array_unshift( $links, $settings_link );

	return $links;
}

/* Add docs link link */
add_filter( 'plugin_row_meta', 'ebdi_kc_plugin_row_meta', 10, 2 );

function ebdi_kc_plugin_row_meta( $links, $file ) {
		if ( plugin_basename( __FILE__ ) == $file ) {
			$row_meta = array(
				'apidocs' => '<a href="' . esc_url( 'https://envothemes.com/envo-business/envo-business-documentation/#importing-the-sample-data' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Documentation', 'ebdi-kc' ) . '">' . esc_html__( 'Plugin Documentation', 'ebdi-kc' ) . '</a>',
			);

			return array_merge( $links, $row_meta );
		}

		return (array) $links;
	}

function ebdi_kc_admin_notices() {

	$ebdi_kc_errors = ebdi_kc_requirements();

	if ( empty( $ebdi_kc_errors ) )
		return;

	/* Suppress "Plugin activated" notice. */
	unset( $_GET[ 'activate' ] );

	echo '<div class="notice error my-ebdi-kc-notice is-dismissible">';
	echo '<p>' . join( $ebdi_kc_errors ) . '</p>';
	echo '<p>' . __( '<i>EnvoThemes Demo Importer for KingComposer</i> plugin has been deactivated.', 'ebdi-kc' ) . '</p>';
	echo '</div>';

	deactivate_plugins( plugin_basename( __FILE__ ) );
}

// ensure is_plugin_active() exists (not on frontend)
if( !function_exists('is_plugin_active') ) {		
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
// Checks with Max Mega Menu is installed.
if ( ! is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
	add_action( 'admin_notices', 'ebdi_kc_missing_notice' );
} 

function ebdi_kc_missing_notice() {
	echo '<div class="notice error"><p>' . sprintf( __( 'EnvoThemes Demo Importer for KingComposer depends on the last version of %s to work!', 'ebdi-kc' ), '<a href="https://wordpress.org/plugins/kingcomposer/" target="_blank">' . __( 'KingComposer', 'ebdi-kc' ) . '</a>' ) . '</p></div>';
}

require_once(  dirname( __FILE__ ) . '/inc/admin-page.php' );
require_once(  dirname( __FILE__ ) . '/inc/welcome.php' );
