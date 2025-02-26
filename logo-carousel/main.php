<?php
/*
Plugin Name: Logo Carousel
Description: This plugin will enable Logo Carousel in your WordPress site.
Plugin URI: http://shapedplugin.com/plugin/logo-carousel-pro
Author: ShapedPlugin
Author URI: http://shapedplugin.com
Version: 1.0
*/


/* Define */
define( 'SP_LOGO_CAROUSEL_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'SP_LOGO_CAROUSEL_PATH', plugin_dir_path( __FILE__ ) );


/* Including files */
if ( file_exists( SP_LOGO_CAROUSEL_PATH . 'inc/scripts.php' ) ) {
	require_once( SP_LOGO_CAROUSEL_PATH . "inc/scripts.php" );
}
if ( file_exists( SP_LOGO_CAROUSEL_PATH . 'inc/functions.php' ) ) {
	require_once( SP_LOGO_CAROUSEL_PATH . "inc/functions.php" );
}
if ( file_exists( SP_LOGO_CAROUSEL_PATH . 'inc/shortcodes.php' ) ) {
	require_once( SP_LOGO_CAROUSEL_PATH . "inc/shortcodes.php" );
}


/* Plugin Action Links */
function sp_logo_carousel_action_links( $links ) {
	$links[] = '<a href="http://shapedplugin.com/plugin/logo-carousel-pro/" style="color: red; font-weight: bold;" target="_blank">Go Pro!</a>';
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'sp_logo_carousel_action_links' );



// Redirect after active
function shaped_plugin_lc_active_redirect( $plugin ) {
	if ( $plugin == plugin_basename( __FILE__ ) ) {
		exit( wp_redirect( admin_url( 'options-general.php' ) ) );
	}
}

add_action( 'activated_plugin', 'shaped_plugin_lc_active_redirect' );


// admin menu
function add_shaped_plugin_lc_options_framwrork() {
	add_options_page( 'Woo Product Slider Help', '', 'manage_options', 'lc-pro-features', 'lc_options_framwrork' );
}

add_action( 'admin_menu', 'add_shaped_plugin_lc_options_framwrork' );


if ( is_admin() ) : // Load only if we are viewing an admin page

	function shaped_plugin_lc_register_settings() {
		// Register settings and call sanitation functions
		register_setting( 'lc_p_options', 'lc_options', 'lc_validate_options' );
	}

	add_action( 'admin_init', 'shaped_plugin_lc_register_settings' );


// Function to generate options page
	function lc_options_framwrork() {

		if ( ! isset( $_REQUEST['updated'] ) ) {
			$_REQUEST['updated'] = false;
		} // This checks whether the form has just been submitted. ?>


		<div class="wrap about-wrap">
			<h1>Welcome to Logo Carousel 1.0</h1>

			<div class="about-text">Thank you for using our Logo Carousel free plugin.</div>

			<hr>

			<h3>Want some cool features of this plugin?</h3>

			<p>We've added many extra features in our <a href="http://shapedplugin.com/plugin/logo-carousel-pro/" target="_blank">premium version</a> of this
				plugin. Let see some amazing features. <a href="http://shapedplugin.com/plugin/logo-carousel-pro/" target="_blank">Buy Premium Version Now.</a></p>
			<br>

			<hr>

			<div class="feature-section two-col">
				<h2>Pro Version Advanced Features & Benefits</h2>
				<div class="col">
					<ul>
						<li><span class="dashicons dashicons-yes"></span> Unlimited carousel anywhere</li>
						<li><span class="dashicons dashicons-yes"></span> Logo Title Hover effect</li>
						<li><span class="dashicons dashicons-yes"></span> Logo carousel from specific categories</li>
						<li><span class="dashicons dashicons-yes"></span> Set Number of Columns you want to show</li>
						<li><span class="dashicons dashicons-yes"></span> Unlimited Custom color (Brand Color)</li>
						<li><span class="dashicons dashicons-yes"></span> Carousel AutoPlay on/off</li>
						<li><span class="dashicons dashicons-yes"></span> Carousel Stop on Hover</li>
						<li><span class="dashicons dashicons-yes"></span> External link opening with new tab option</li>
						<li><span class="dashicons dashicons-yes"></span> Custom logo size</li>
					</ul>
				</div>
				<div class="col">
					<ul>
						<li><span class="dashicons dashicons-yes"></span> Stylish navigation arrows</li>
						<li><span class="dashicons dashicons-yes"></span> Carousel slide time option</li>
						<li><span class="dashicons dashicons-yes"></span> Navigation show/hide options</li>
						<li><span class="dashicons dashicons-yes"></span> Navigation position</li>
						<li><span class="dashicons dashicons-yes"></span> Pagination show/hide options</li>
						<li><span class="dashicons dashicons-yes"></span> Filter style</li>
						<li><span class="dashicons dashicons-yes"></span> Grid style</li>
						<li><span class="dashicons dashicons-yes"></span> 24 Hours Instant Support from expert people</li>
						<li><span class="dashicons dashicons-yes"></span> And Many More</li>
					</ul>
				</div>
			</div>

			<h2><a href="http://shapedplugin.com/plugin/logo-carousel-pro/" class="button button-primary button-hero" target="_blank">Buy Premium Version Now.</a>
			</h2>
			<br>
			<br>
			<br>
			<br>

		</div>

		<?php
	}


endif;  // EndIf is_admin()


register_activation_hook( __FILE__, 'shaped_plugin_lc_activate' );
add_action( 'admin_init', 'shaped_plugin_lc_redirect' );

function shaped_plugin_lc_activate() {
	add_option( 'shaped_plugin_lc_activation_redirect', true );
}

function shaped_plugin_lc_redirect() {
	if ( get_option( 'shaped_plugin_lc_activation_redirect', false ) ) {
		delete_option( 'shaped_plugin_lc_activation_redirect' );
		if ( ! isset( $_GET['activate-multi'] ) ) {
			wp_redirect( "options-general.php?page=lc-pro-features" );
		}
	}
}