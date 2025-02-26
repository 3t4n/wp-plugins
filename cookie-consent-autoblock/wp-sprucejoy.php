<?php
/*
Plugin Name: Cookie Consent & Autoblock
Plugin URI:  https://sprucejoy.com/resources/cookie-consent-gdpr/
Description: Easily set up cookie notice and get GDPR Cookie Consent as per EU GDPR/Cookie Law regulations. The plugin supports GDPR (DSGVO, RGPD), LGPD, CCPA Do Not Sell, and CNIL of France.
Version:     1.0.1
Author:      SpruceJoy
Author URI:  https://sprucejoy.com/
Text Domain: wp-sprucejoy
Domain Path: /i18n/languages/
License:     GPLv2
*/

/*  
	Copyright (c) 2020-2021  SpruceJoy

	The name WP-SpruceJoy(tm) is a trademark of sprucejoy.com

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

	You may also view the license here:
	http://www.gnu.org/licenses/gpl.html
*/

/*
	A NOTE ABOUT LICENSE:

	While this plugin is freely available and open-source under the GPL2
	license, that does not mean it is "public domain." You are free to modify
	and redistribute as long as you comply with the license. Any derivative 
	work MUST be GPL licensed and available as open source.  You also MUST give 
	proper attribution to the original author, copyright holder, and trademark
	owner.  This means you cannot change two lines of code and claim copyright 
	of the entire work as your own.  The GPL2 license requires that if you
	modify this code, you must clearly indicate what section(s) you have
	modified and you may only claim copyright of your modifications and not
	the body of work.  If you are unsure or have questions about how a 
	derivative work you are developing complies with the license, copyright, 
	trademark, or if you do not understand the difference between
	open source and public domain, contact the original author at:
	https://sprucejoy.com/contact/.


	INSTALLATION PROCEDURE:
	
	For complete installation and usage instructions,
	visit https://sprucejoy.com
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

// Initialize constants.
define( 'WPSJRUCEJOY_VERSION',    '1.0.1' );
define( 'WPSJRUCEJOY_DB_VERSION', '1.0.1' );
define( 'WPSJRUCEJOY_PATH', plugin_dir_path( __FILE__ ) );

// Initialize the plugin.
add_action( 'after_setup_theme', 'wpsprucejoy_init', 10 );

// Install the plugin.
register_activation_hook( __FILE__, 'wpsprucejoy_install' );

/**
 * Initialize WP-SpruceJoy.
 *
 * The initialization function contains much of what was previously just
 * loaded in the main plugin file. It has been moved into this function
 * in order to allow action hooks for loading the plugin and initializing
 * its features and options.
 *
 *
 * @global object $wpsj The WP-SpruceJoy object class.
 */
function wpsprucejoy_init() {

	// Set the object as global.
	global $wpsj;

	/**
	 * Fires before initialization of plugin options.
	 *
	 */
	do_action( 'wpsprucejoy_pre_init' );

	/**
	 * Load the WP_Sprucejoy class.
	 */
	require_once( 'includes/class-wp-sprucejoy.php' );
	
	// Invoke the WP_Sprucejoy class.
	$wpsj = new WP_Sprucejoy();

	/**
	 * Fires after initialization of plugin options.
	 *
	 */
	do_action( 'wpsprucejoy_after_init' );

	$options = [
		'wpsprucejoy_enable_cookie_bar',
		// 'wpsprucejoy_compliance_status_notice',
		// 'wpsprucejoy_compliance_status_autoblocking',
		'wpsprucejoy_success_add_scripts',
		'wpsprucejoy_bar_color',
		'wpsprucejoy_text_color',
		'wpsprucejoy_button_color',
		'wpsprucejoy_buttontext_color',
		'wpsprucejoy_accept_button_text',				
		'wpsprucejoy_message',				
		'wpsprucejoy_reject_button_text'];

	foreach ($options as $key => $val) {
		$wpsj->{$val} = get_option($val);
	}

	if($wpsj->wpsprucejoy_enable_cookie_bar){
		add_action('wp_enqueue_scripts', 'wpsprucejoy_init_scripts');
	}	
}

function wpsprucejoy_init_scripts() {
	global $wpsj;
	$domains = json_encode(explode(',',$wpsj->wpsprucejoy_success_add_scripts));
	?>
    <script>
      window.__SJ_TRACKING_DOMAINS__ = <?php echo $domains; ?>;
      window.__SJ_MESSAGE__ = "<?php echo $wpsj->wpsprucejoy_message; ?>";
      window.__SJ_ACCEPT_BTN_TEXT__ = "<?php echo $wpsj->wpsprucejoy_accept_button_text; ?>";
      window.__SJ_REJECT_BTN_TEXT__ = "<?php echo $wpsj->wpsprucejoy_reject_button_text; ?>";

      window.__SJ_BAR_CLR__ = "<?php echo $wpsj->wpsprucejoy_bar_color; ?>";
      window.__SJ_MSG_CLR__ = "<?php echo $wpsj->wpsprucejoy_text_color; ?>";

      window.__SJ_ACCEPT_BTN_CLR__ = "<?php echo $wpsj->wpsprucejoy_button_color; ?>";
      window.__SJ_ACCEPT_BTN_TEXT_CLR__ = "<?php echo $wpsj->wpsprucejoy_buttontext_color; ?>";

      window.__SJ_REJECT_BTN_CLR__ = "<?php echo $wpsj->wpsprucejoy_button_color; ?>";
      window.__SJ_REJECT_BTN_TEXT_CLR__ = "<?php echo $wpsj->wpsprucejoy_buttontext_color; ?>";

      window.__SJ_INFO_ICON_CLR__ = "<?php echo $wpsj->wpsprucejoy_buttontext_color; ?>";
    </script>
	<?php	
	wp_enqueue_script( 'script', $wpsj->url ."assets/js/cookie-consent.js",'', $wpsj->version);
}

/**
 * Adds the plugin options page and JavaScript.
 *
 */
function wpsprucejoy_admin_options() {
	global $wpsj;
	if ( ! is_multisite() || ( is_multisite() && current_user_can( 'edit_theme_options' ) ) ) {
		$plugin_page = add_options_page ( 'WP-SpruceJoy', 'Cookie Consent & Autoblock', 'manage_options', 'wpsj-settings', 'wpsprucejoy_admin' );
	}
}


/**
 * Install the plugin options.
 *
 * @param 
 */
function wpsprucejoy_install() {

	/**
	 * Load the install file.
	 */
	require_once( 'includes/install.php' );
	wpsprucejoy_do_install();
}

// End of file.