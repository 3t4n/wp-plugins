<?php
/**
 * Plugin Name: Newsletter for Sendcloud
 * Plugin URI: https://wordpress.org/plugins/newsletter-for-sendcloud
 * Description: The integrated <code>sendcloud.net</code> newsletter management system provides the latest news and mailing channels.
 * Author: Shopeo
 * Version: 0.0.3
 * Author URI: https://shopeo.cn
 * License: GPL2+
 * Text Domain: newsletter-for-sendcloud
 * Domain Path: /languages
 * Requires at least: 5.9
 * Requires PHP: 5.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define NEWSLETTER_FOR_SENDCLOUD_PLUGIN_FILE.
if ( ! defined( 'NEWSLETTER_FOR_SENDCLOUD_PLUGIN_FILE' ) ) {
	define( 'NEWSLETTER_FOR_SENDCLOUD_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'NEWSLETTER_FOR_SENDCLOUD_PLUGIN_BASE' ) ) {
	define( 'NEWSLETTER_FOR_SENDCLOUD_PLUGIN_BASE', plugin_basename( NEWSLETTER_FOR_SENDCLOUD_PLUGIN_FILE ) );
}

if ( ! defined( 'NEWSLETTER_FOR_SENDCLOUD_PATH' ) ) {
	define( 'NEWSLETTER_FOR_SENDCLOUD_PATH', plugin_dir_path( NEWSLETTER_FOR_SENDCLOUD_PLUGIN_FILE ) );
}

if ( ! function_exists( 'newsletter_for_sendcloud_sanitize' ) ) {
	function newsletter_for_sendcloud_sanitize( $input ) {
		$sanitary_values = array();
		if ( isset( $input['newsletter_for_sendcloud_api_user'] ) ) {
			$sanitary_values['newsletter_for_sendcloud_api_user'] = sanitize_text_field( $input['newsletter_for_sendcloud_api_user'] );
		}

		if ( isset( $input['newsletter_for_sendcloud_api_key'] ) ) {
			$sanitary_values['newsletter_for_sendcloud_api_key'] = sanitize_text_field( $input['newsletter_for_sendcloud_api_key'] );
		}

		if ( isset( $input['newsletter_for_sendcloud_from'] ) ) {
			$sanitary_values['newsletter_for_sendcloud_from'] = sanitize_email( $input['newsletter_for_sendcloud_from'] );
		}

		if ( isset( $input['newsletter_for_sendcloud_from_name'] ) ) {
			$sanitary_values['newsletter_for_sendcloud_from_name'] = sanitize_text_field( $input['newsletter_for_sendcloud_from_name'] );
		}

		if ( isset( $input['newsletter_for_sendcloud_reply_to'] ) ) {
			$sanitary_values['newsletter_for_sendcloud_reply_to'] = sanitize_email( $input['newsletter_for_sendcloud_reply_to'] );
		}

		if ( isset( $input['newsletter_for_sendcloud_mail_list'] ) ) {
			$sanitary_values['newsletter_for_sendcloud_mail_list'] = sanitize_email( $input['newsletter_for_sendcloud_mail_list'] );
		}

		return $sanitary_values;
	}
}

if ( ! function_exists( 'newsletter_for_sendcloud_section_info' ) ) {
	function newsletter_for_sendcloud_section_info() {
		printf( __( 'Find the required setup information via <a target="_blank" href="%1$s">%2$s</a>', 'newsletter-for-sendcloud' ), 'https://www.sendcloud.net/', 'sendcloud.net' );
	}
}

if ( ! function_exists( 'newsletter_for_sendcloud_api_user_callback' ) ) {
	function newsletter_for_sendcloud_api_user_callback() {
		printf( '<input class="regular-text" type="text" name="newsletter_for_sendcloud_options[newsletter_for_sendcloud_api_user]" id="newsletter_for_sendcloud_api_user" value="%s">', isset( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_api_user'] ) ? esc_attr( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_api_user'] ) : '' );
	}
}

if ( ! function_exists( 'newsletter_for_sendcloud_api_key_callback' ) ) {
	function newsletter_for_sendcloud_api_key_callback() {
		printf( '<input class="regular-text" type="password" name="newsletter_for_sendcloud_options[newsletter_for_sendcloud_api_key]" id="newsletter_for_sendcloud_api_key" value="%s">', isset( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_api_key'] ) ? esc_attr( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_api_key'] ) : '' );
	}
}

if ( ! function_exists( 'newsletter_for_sendcloud_from_callback' ) ) {
	function newsletter_for_sendcloud_from_callback() {
		printf( '<input class="regular-text" type="email" name="newsletter_for_sendcloud_options[newsletter_for_sendcloud_from]" id="newsletter_for_sendcloud_from" value="%s">', isset( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_from'] ) ? esc_attr( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_from'] ) : '' );
	}
}

if ( ! function_exists( 'newsletter_for_sendcloud_from_name_callback' ) ) {
	function newsletter_for_sendcloud_from_name_callback() {
		printf( '<input class="regular-text" type="text" name="newsletter_for_sendcloud_options[newsletter_for_sendcloud_from_name]" id="newsletter_for_sendcloud_from_name" value="%s">', isset( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_from_name'] ) ? esc_attr( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_from_name'] ) : '' );
	}
}

if ( ! function_exists( 'newsletter_for_sendcloud_reply_to_callback' ) ) {
	function newsletter_for_sendcloud_reply_to_callback() {
		printf( '<input class="regular-text" type="email" name="newsletter_for_sendcloud_options[newsletter_for_sendcloud_reply_to]" id="newsletter_for_sendcloud_reply_to" value="%s">', isset( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_reply_to'] ) ? esc_attr( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_reply_to'] ) : '' );
	}
}

if ( ! function_exists( 'newsletter_for_sendcloud_mail_list_callback' ) ) {
	function newsletter_for_sendcloud_mail_list_callback() {
		printf( '<input class="regular-text" type="email" name="newsletter_for_sendcloud_options[newsletter_for_sendcloud_mail_list]" id="newsletter_for_sendcloud_mail_list" value="%s">', isset( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_mail_list'] ) ? esc_attr( get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_mail_list'] ) : '' );
	}
}

if ( ! function_exists( 'newsletter_for_sendcloud_page_init' ) ) {
	function newsletter_for_sendcloud_page_init() {
		register_setting( 'newsletter_for_sendcloud_option_group', 'newsletter_for_sendcloud_options', 'newsletter_for_sendcloud_sanitize' );

		add_settings_section( 'newsletter_for_sendcloud_setting_section', __( 'Settings', 'newsletter-for-sendcloud' ), 'newsletter_for_sendcloud_section_info', 'options_newsletter_for_sendcloud' );

		add_settings_field( 'newsletter_for_sendcloud_api_user', __( 'API User', 'newsletter-for-sendcloud' ), 'newsletter_for_sendcloud_api_user_callback', 'options_newsletter_for_sendcloud', 'newsletter_for_sendcloud_setting_section' );
		add_settings_field( 'newsletter_for_sendcloud_api_key', __( 'API Key', 'newsletter-for-sendcloud' ), 'newsletter_for_sendcloud_api_key_callback', 'options_newsletter_for_sendcloud', 'newsletter_for_sendcloud_setting_section' );
		add_settings_field( 'newsletter_for_sendcloud_from', __( 'From', 'newsletter-for-sendcloud' ), 'newsletter_for_sendcloud_from_callback', 'options_newsletter_for_sendcloud', 'newsletter_for_sendcloud_setting_section' );
		add_settings_field( 'newsletter_for_sendcloud_from_name', __( 'From Name', 'newsletter-for-sendcloud' ), 'newsletter_for_sendcloud_from_name_callback', 'options_newsletter_for_sendcloud', 'newsletter_for_sendcloud_setting_section' );
		add_settings_field( 'newsletter_for_sendcloud_reply_to', __( 'ReplyTo', 'newsletter-for-sendcloud' ), 'newsletter_for_sendcloud_reply_to_callback', 'options_newsletter_for_sendcloud', 'newsletter_for_sendcloud_setting_section' );
		add_settings_field( 'newsletter_for_sendcloud_mail_list', __( 'Mail List', 'newsletter-for-sendcloud' ), 'newsletter_for_sendcloud_mail_list_callback', 'options_newsletter_for_sendcloud', 'newsletter_for_sendcloud_setting_section' );
	}
}

add_action( 'admin_init', 'newsletter_for_sendcloud_page_init' );

if ( ! function_exists( 'newsletter_for_sendcloud_activate' ) ) {
	function newsletter_for_sendcloud_activate() {

	}
}

register_activation_hook( __FILE__, 'newsletter_for_sendcloud_activate' );

if ( ! function_exists( 'newsletter_for_sendcloud_deactivate' ) ) {
	function newsletter_for_sendcloud_deactivate() {
		delete_option( 'newsletter_for_sendcloud_options' );
	}
}

register_deactivation_hook( __FILE__, 'newsletter_for_sendcloud_deactivate' );

if ( ! function_exists( 'newsletter_for_sendcloud_load_textdomain' ) ) {
	function newsletter_for_sendcloud_load_textdomain() {
		load_plugin_textdomain( 'newsletter-for-sendcloud', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
}

add_action( 'init', 'newsletter_for_sendcloud_load_textdomain' );

if ( ! function_exists( 'newsletter_for_sendcloud_manage_options' ) ) {
	function newsletter_for_sendcloud_manage_options() {
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php
				settings_fields( 'newsletter_for_sendcloud_option_group' );
				do_settings_sections( 'options_newsletter_for_sendcloud' );
				submit_button( __( 'Save Settings', 'newsletter-for-sendcloud' ) );
				?>
			</form>
		</div>
		<?php
	}
}

if ( ! function_exists( 'newsletter_for_sendcloud_options_page' ) ) {
	function newsletter_for_sendcloud_options_page() {
		add_options_page( __( 'Newsletter for Sendcloud', 'newsletter-for-sendcloud' ), __( 'Newsletter for Sendcloud', 'newsletter-for-sendcloud' ), 'manage_options', 'options_newsletter_for_sendcloud', 'newsletter_for_sendcloud_manage_options', 10 );
	}
}

add_action( 'admin_menu', 'newsletter_for_sendcloud_options_page' );

require_once __DIR__ . "/includes/send-mail.php";
require_once __DIR__ . "/includes/SendCloud.class.php";
require_once __DIR__ . "/includes/SubscribeWidget.class.php";
require_once __DIR__ . "/includes/subscribe_shortcode.php";

if ( isset( $_POST['subscribe_newsletter_submit_widget'] ) || isset( $_POST['subscribe_newsletter_submit_shortcode'] ) ) {
	$sendCloud = new SendCloud();
	$sendCloud->addAddressMember( [ sanitize_email( $_POST['subscribe_newsletter_email'] ) ], [ sanitize_text_field( $_POST['subscribe_newsletter_name'] ) ] );
}
