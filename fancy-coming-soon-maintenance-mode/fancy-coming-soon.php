<?php
/*
  Plugin Name: Fancy Coming Plugin for WordPress
  Plugin URI: https://wordpress.org/plugins/fancy-coming-soon-maintenance-mode/
  Description: Fancy Coming soon is a responsive coming soon WordPress plugin that comes with well designed coming soon page and lots of useful features including customization via Live Customizer, MailChimp integration, custom forms, and more.
  Version: 1.4.4
  Author: WPKube
  Author URI: https://www.wpkube.com/
  License: GPL V3
  Text Domain: fancy-coming-soon
  Domain Path: /languages
*/


// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Translation/localization
 */
function fancy_coming_soon_load_plugin_textdomain() {
	
	load_plugin_textdomain( 'fancy-coming-soon', FALSE, basename( dirname( __FILE__ ) ) . '/lang/' );

} add_action( 'plugins_loaded', 'fancy_coming_soon_load_plugin_textdomain' );

/**
 * Call redirect if not on login page
 * 
 * @since 1.0.0
 */
function fancy_coming_soon_skip_redirect_on_login () {
	
	global $pagenow;
	
	if ('wp-login.php' == $pagenow) {
		return;
	} else {
		add_action( 'template_redirect', 'fancy_coming_soon_template_redirect' );								
	}

} add_action('init','fancy_coming_soon_skip_redirect_on_login');

/**
 * Redirect to template
 *
 * @since 1.0.0
 */
function fancy_coming_soon_template_redirect() {
	
	global $wp_customize;
	
	// vars
	$show_coming_soon = false;

	// if user not logged in, show coming soon
	if ( ! is_user_logged_in() ) {
		$show_coming_soon = true;
	}

	// if user logged in but not of big enough role, show coming soon
	if ( is_user_logged_in() && ! current_user_can( 'edit_posts' ) ) {
		$show_coming_soon = true;
	}

	// if user logged in and customizer active, show coming soon
	if ( is_user_logged_in() && get_option('fancy_coming_soon_preview', '1') == 1 && is_customize_preview() ) {
		$show_coming_soon = true;
	}

	// Checks for if user is logged in OR if customizer is open and customizer preview option is checked
	if ( $show_coming_soon ) {
		
		$file = plugin_dir_path(__FILE__).'templates/fancy-template.php';
		include($file);

		exit(); 
	}

}
 
/**
 * Add link to coming soon settings page
 * 
 * @since 1.0.0
 */
function fancy_coming_soon_settings_link() {

	global $submenu;
	
	if ( ! empty( $submenu['options-general.php'] ) ) {
		$url = admin_url( 'customize.php' );
		$submenu['options-general.php'][] = array('Fancy Coming Soon Settings', 'manage_options', $url);
	}
	
} add_action('admin_menu', 'fancy_coming_soon_settings_link');

/**
 * Plugins row action links
 *
 * @since 1.0.4
 */
function fancy_coming_soon_plugin_action_links( $links, $file ) {
	
	if ( $file == 'fancy-coming-soon-maintenance-mode/fancy-coming-soon.php' ) {
		$settings_link = '<a href="' . admin_url( 'customize.php' ) . '">' . esc_html__( 'Settings', 'fancy-coming-soon' ) . '</a>';
		array_unshift( $links, $settings_link );
	}

	return $links;

} add_filter( 'plugin_action_links', 'fancy_coming_soon_plugin_action_links', 10, 2 );

/**
 * Transfer settings from theme mod to option
 * 
 * @since 1.0.4
 */
function fancy_coming_soon_transfer_theme_mod_to_option() {

	// if not altery handled
	if ( ! get_option( 'fancy_coming_soon_uses_option', false ) ) {

		// all the option ids
		$option_ids = array(
			'fancy_coming_soon_preview',
			'fancy_coming_soon_page_custom_css',
			'fancy_coming_soon_background_color',
			'fancy_coming_soon_background_image',
			'fancy_coming_soon_background_repeat',
			'fancy_coming_soon_background_position',
			'fancy_coming_soon_background_cover',
			'fancy_coming_soon_plugin_logo',
			'fancy_coming_soon_content_color',
			'fancy_coming_soon_percentage_completed',
			'fancy_coming_soon_page_heading',
			'fancy_coming_soon_page_content',
			'fancy_coming_soon_page_footer',
			'fancy_coming_soon_mailchimp_form',
			'fancy_coming_soon_mailchimp_form_url',
			'fancy_coming_soon_social_twitter',
			'fancy_coming_soon_social_facebook',
			'fancy_coming_soon_social_email',
		);

		// go through each of the options
		foreach ( $option_ids as $option_id ) {

			// if there is a value for it in theme_mod transfer it to option
			if ( get_theme_mod( $option_id, false ) !== false ) {
				update_option( $option_id, get_theme_mod( $option_id, false ) );
			}

		}

		// do not do it again
		update_option( 'fancy_coming_soon_uses_option', 'yes' );

	}

} add_action( 'init', 'fancy_coming_soon_transfer_theme_mod_to_option' );

/**
 * Init for admin notice 
 * 
 * @since 1.0.4
 */
register_activation_hook( __FILE__, 'fancy_coming_soon_activation_notice_init' );
function fancy_coming_soon_activation_notice_init() {    
    set_transient( 'fancy_coming_soon_admin_notice', true, 5 );
}

/**
 * Display admin notice
 * 
 * @since 1.0.4
 */
function fancy_coming_soon_activation_notice() {
	
	// if it wasn't already shown
    if ( get_transient( 'fancy_coming_soon_admin_notice' ) ) {
		
		// show the notice
		?>
        <div class="notice notice-warning is-dismissible">
            <p><?php _e( '<strong>Note for Fancy Coming Soon</strong>. If you are using a caching plugin, you should clear the cache now in order for the coming soon page to be shown to the visitors. Also, make sure to clear it once again after you disable this plugin.', 'fancy-coming-soon' ); ?></p>
        </div>
        <?php
	
		// do not show it again
		delete_transient( 'fancy_coming_soon_admin_notice' );
		
	}
	
} add_action( 'admin_notices', 'fancy_coming_soon_activation_notice' );

// load plugin customizer
require_once( 'templates/fancy-customizer.php' );