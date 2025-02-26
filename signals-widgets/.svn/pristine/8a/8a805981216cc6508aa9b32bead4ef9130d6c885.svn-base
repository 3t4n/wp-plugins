<?php

/**
 * WordPress management panel.
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Widgets
 */

function widgets_meta_links( $links, $file ) {

	if ( strpos( $file, 'signals-widgets.php' ) !== false ) {
		$new_links = array(
			'<a href="http://www.69signals.com/support/" target="_blank">' . __( 'Support', 'signals' ) . '</a>',
			'<a href="http://www.69signals.com/hire-us.php" target="_blank">' . __( 'Hire Us', 'signals' ) . '</a>'
		);

		$links = array_merge( $links, $new_links );
	}

	return $links;

}
add_filter( 'plugin_row_meta', 'widgets_meta_links', 10, 2 ); // Add plugin meta links



// Menu for the support and about panel
function widgets_add_menu() {

	if ( is_admin() && current_user_can( 'manage_options' ) ) {
		// Main menu for the plugin along with a sub-menu
		$signals_widgets_about 	= add_menu_page(
			__( 'Widgets by 69signals', 'signals' ),
			__( 'Widgets', 'signals' ),
			'manage_options',
			'widgets_about',
			'widgets_admin_about',
			SIGNALS_WIDGETS_URL . '/framework/admin/img/icon.png'
		);

		// Support panel
		$signals_widgets_support = add_submenu_page(
			'widgets_about',
			__( 'Support by 69signals', 'signals' ),
			__( 'Support', 'signals' ),
			'manage_options',
			'widgets_support',
			'widgets_admin_support'
		);

		// Custom css
		$signals_widgets_css 	= add_submenu_page(
			'widgets_about',
			__( 'Custom CSS', 'signals' ),
			__( 'Custom CSS', 'signals' ),
			'manage_options',
			'widgets_css',
			'widgets_admin_css'
		);

		// Loading the js conditionally
		add_action( 'load-' . $signals_widgets_about, 'widgets_load_styles' );
		add_action( 'load-' . $signals_widgets_support, 'widgets_load_scripts' );
		add_action( 'load-' . $signals_widgets_css, 'widgets_load_editor' );
	}

}
add_action( 'admin_menu', 'widgets_add_menu' );



// Including important files for the management panel
require SIGNALS_WIDGETS_PATH . 'framework/admin/about.php';
require SIGNALS_WIDGETS_PATH . 'framework/admin/support.php';
require SIGNALS_WIDGETS_PATH . 'framework/admin/css.php';



// Registering and enqueueing js files over here
function widgets_admin_scripts() {

	wp_register_script( 'widgets-admin-base', SIGNALS_WIDGETS_URL . '/framework/admin/js/admin.js', 'jquery', '0.1', true );
	wp_enqueue_script( 'widgets-admin-base' );

}



// Scripts & styles for the support page
function widgets_load_scripts() {

	add_action( 'admin_enqueue_scripts', 'widgets_admin_styles' );
	add_action( 'admin_enqueue_scripts', 'widgets_admin_scripts' );

}



// Only for the styles
function widgets_admin_styles() {

	wp_register_style( 'widgets-admin-base', SIGNALS_WIDGETS_URL . '/framework/admin/css/admin.css', false, '0.1' );
	wp_enqueue_style( 'widgets-admin-base' );

}



function widgets_load_styles() {

	add_action( 'admin_enqueue_scripts', 'widgets_admin_styles' );

}



// For the custom css editor
function widgets_admin_editor() {

	wp_register_script( 'widgets-admin-editor', SIGNALS_WIDGETS_URL . '/framework/admin/js/editor/ace.js', 'jquery', '0.1', true );
	wp_register_script( 'widgets-admin-base', SIGNALS_WIDGETS_URL . '/framework/admin/js/admin.js', 'jquery', '0.1', true );

	wp_enqueue_script( 'widgets-admin-editor' );
	wp_enqueue_script( 'widgets-admin-base' );

}



function widgets_load_editor() {

	add_action( 'admin_enqueue_scripts', 'widgets_admin_styles' );
	add_action( 'admin_enqueue_scripts', 'widgets_admin_editor' );

}



// For adding custom styling to the widgets panel
function signals_widgets_scripts() {

	$screen = get_current_screen();

	// Adding .css and .js files for the widgets page
	if ( 'widgets' == $screen->id ) {
		wp_register_script( 'signals-js-widgets', SIGNALS_WIDGETS_URL . '/framework/admin/js/widgets.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'signals-js-widgets' );

		wp_enqueue_style( 'signals-css-widgets', SIGNALS_WIDGETS_URL . '/framework/admin/css/widgets.css' );

		// Enqueue the WordPress media uploader
		wp_enqueue_media();
	} // $screen->id

}
add_action( 'admin_enqueue_scripts', 'signals_widgets_scripts' );