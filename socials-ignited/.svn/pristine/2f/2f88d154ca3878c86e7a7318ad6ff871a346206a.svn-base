<?php
/**
 * Plugin Name: Socials Ignited
 * Plugin URI: https://www.cssigniter.com/socials-ignited/
 * Description: Easily create links to all your social profiles with Socials Ignited
 * Author: The CSSIgniter Team
 * Author URI: https://www.cssigniter.com/
 * Version: 2.0.0
 * Text Domain: socials-ignited
 * Domain Path: languages
 *
 * Socials Ignited is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Socials Ignited is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Socials Ignited. If not, see <http://www.gnu.org/licenses/>.
 *
 */

if ( ! defined( 'CISIW_VERSION' ) ) {
	define( 'CISIW_VERSION', '2.0.0' );
}

// plugin folder url.
if ( ! defined( 'CISIW_PLUGIN_URL' ) ) {
	define( 'CISIW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// plugin folder path.
if ( ! defined( 'CISIW_PLUGIN_PATH' ) ) {
	define( 'CISIW_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

// plugin root file.
if ( ! defined( 'CISIW_PLUGIN_FILE' ) ) {
	define( 'CISIW_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'CISIW_BASENAME' ) ) {
	define( 'CISIW_BASENAME', plugin_basename( __FILE__ ) );
}


add_action( 'init', 'cisiw_init' );
function cisiw_init() {
	load_plugin_textdomain( 'socials-ignited', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	add_action( 'customize_register', 'cisiw_customize_register' );
}

add_action( 'widgets_init', 'cisiw_register_widgets' );
function cisiw_register_widgets() {
	require_once untrailingslashit( CISIW_PLUGIN_PATH ) . '/includes/widget.php';

	register_widget( 'Socials_Ignited_Widget' );
}

add_action( 'wp_enqueue_scripts', 'cisiw_widget_scripts' );
function cisiw_widget_scripts() {
	if ( is_active_widget( '', '', 'socials-ignited' ) ) {
		wp_deregister_style( 'font-awesome' );
		wp_enqueue_style( 'font-awesome', untrailingslashit( CISIW_PLUGIN_URL ) . '/includes/assets/vendor/fontawesome/css/all.min.css', array(), '5.15.3' );
	}

	wp_enqueue_style( 'socials-ignited', untrailingslashit( CISIW_PLUGIN_URL ) . '/includes/assets/css/style.min.css', array(), CISIW_VERSION );
}

add_action( 'admin_enqueue_scripts', 'cisiw_widget_admin_scripts' );
function cisiw_widget_admin_scripts() {
	global $pagenow;

	if ( in_array( $pagenow, array( 'widgets.php', 'customize.php' ), true ) ) {
		wp_enqueue_script( 'cisiw-repeating-fields', untrailingslashit( CISIW_PLUGIN_URL ) . '/includes/assets/vendor/repeating-fields/repeating-fields.js', array(
			'jquery',
			'wp-color-picker',
		), CISIW_VERSION, true );
		wp_enqueue_style( 'cisiw-repeating-fields', untrailingslashit( CISIW_PLUGIN_URL ) . '/includes/assets/vendor/repeating-fields/repeating-fields.css', array( 'wp-color-picker' ), CISIW_VERSION );
		wp_enqueue_script( 'cisiw-widget-admin', untrailingslashit( CISIW_PLUGIN_URL ) . '/includes/assets/js/admin/admin_widget.js', array( 'wp-color-picker' ), CISIW_VERSION, true );
		wp_enqueue_style( 'cisiw-widget-admin', untrailingslashit( CISIW_PLUGIN_URL ) . '/includes/assets/css/admin/admin_widget.css', array( 'wp-color-picker' ), CISIW_VERSION );
	}
}

add_filter( 'kses_allowed_protocols', 'cisiw_kses_allowed_protocols' );
function cisiw_kses_allowed_protocols( $protocols ) {
	if ( ! in_array( 'skype', $protocols, true ) ) {
		$protocols[] = 'skype';
	}

	return $protocols;
}

add_filter( 'plugin_action_links_' . CISIW_BASENAME, 'cisiw_plugin_action_links' );
if ( ! function_exists( 'cisiw_plugin_action_links' ) ) :
	function cisiw_plugin_action_links( $links ) {
		array_unshift( $links, sprintf( '<a href="%s">%s</a>',
			esc_url( admin_url( 'options-general.php?page=cisiw-options' ) ),
			esc_html__( 'Settings', 'socials-ignited' )
		) );

		return $links;
	}
endif;

if ( ! function_exists( 'cisiw_get_social_networks' ) ) {
	/**
	 * Returns an array of the supported social networks and their properties.
	 *
	 * @return array
	 */
	function cisiw_get_social_networks() {
		return apply_filters( 'socials_ignited_social_networks', array(
			array(
				'name'  => 'facebook',
				'label' => esc_html__( 'Facebook', 'socials-ignited' ),
				'icon'  => 'fab fa-facebook',
			),
			array(
				'name'  => 'twitter',
				'label' => esc_html__( 'Twitter', 'socials-ignited' ),
				'icon'  => 'fab fa-twitter',
			),
			array(
				'name'  => 'instagram',
				'label' => esc_html__( 'Instagram', 'socials-ignited' ),
				'icon'  => 'fab fa-instagram',
			),
			array(
				'name'  => 'whatsapp',
				'label' => esc_html__( 'WhatsApp', 'socials-ignited' ),
				'icon'  => 'fab fa-whatsapp',
			),
			array(
				'name'  => 'messenger',
				'label' => esc_html__( 'Facebook Messenger', 'socials-ignited' ),
				'icon'  => 'fab fa-facebook-messenger',
			),
			array(
				'name'  => 'tiktok',
				'label' => esc_html__( 'TikTok', 'socials-ignited' ),
				'icon'  => 'fab fa-tiktok',
			),
			array(
				'name'  => 'pinterest',
				'label' => esc_html__( 'Pinterest', 'socials-ignited' ),
				'icon'  => 'fab fa-pinterest',
			),
			array(
				'name'  => 'snapchat',
				'label' => esc_html__( 'Snapchat', 'socials-ignited' ),
				'icon'  => 'fab fa-snapchat',
			),
			array(
				'name'  => 'reddit',
				'label' => esc_html__( 'Reddit', 'socials-ignited' ),
				'icon'  => 'fab fa-reddit',
			),
			array(
				'name'  => 'youtube',
				'label' => esc_html__( 'YouTube', 'socials-ignited' ),
				'icon'  => 'fab fa-youtube',
			),
			array(
				'name'  => 'flickr',
				'label' => esc_html__( 'Flickr', 'socials-ignited' ),
				'icon'  => 'fab fa-flickr',
			),
			array(
				'name'  => 'wechat',
				'label' => esc_html__( 'WeChat', 'socials-ignited' ),
				'icon'  => 'fab fa-weixin',
			),
			array(
				'name'  => 'github',
				'label' => esc_html__( 'GitHub', 'socials-ignited' ),
				'icon'  => 'fab fa-github',
			),
			array(
				'name'  => 'linkedin',
				'label' => esc_html__( 'LinkedIn', 'socials-ignited' ),
				'icon'  => 'fab fa-linkedin',
			),
			array(
				'name'  => 'medium',
				'label' => esc_html__( 'Medium', 'socials-ignited' ),
				'icon'  => 'fab fa-medium',
			),
			array(
				'name'  => 'quora',
				'label' => esc_html__( 'Quora', 'socials-ignited' ),
				'icon'  => 'fab fa-quora',
			),
			array(
				'name'  => 'mixcloud',
				'label' => esc_html__( 'Mixcloud', 'socials-ignited' ),
				'icon'  => 'fab fa-mixcloud',
			),
			array(
				'name'  => 'paypal',
				'label' => esc_html__( 'PayPal', 'socials-ignited' ),
				'icon'  => 'fab fa-paypal',
			),
			array(
				'name'  => 'skype',
				'label' => esc_html__( 'Skype', 'socials-ignited' ),
				'icon'  => 'fab fa-skype',
			),
			array(
				'name'  => 'slack',
				'label' => esc_html__( 'Slack', 'socials-ignited' ),
				'icon'  => 'fab fa-slack',
			),
			array(
				'name'  => 'soundcloud',
				'label' => esc_html__( 'Soundcloud', 'socials-ignited' ),
				'icon'  => 'fab fa-soundcloud',
			),
			array(
				'name'  => 'spotify',
				'label' => esc_html__( 'Spotify', 'socials-ignited' ),
				'icon'  => 'fab fa-spotify',
			),
			array(
				'name'  => 'vimeo',
				'label' => esc_html__( 'Vimeo', 'socials-ignited' ),
				'icon'  => 'fab fa-vimeo',
			),
			array(
				'name'  => 'wordpress',
				'label' => esc_html__( 'WordPress', 'socials-ignited' ),
				'icon'  => 'fab fa-wordpress',
			),
			array(
				'name'  => 'xbox',
				'label' => esc_html__( 'Xbox Live', 'socials-ignited' ),
				'icon'  => 'fab fa-xbox',
			),
			array(
				'name'  => 'playstation',
				'label' => esc_html__( 'PlayStation Network', 'socials-ignited' ),
				'icon'  => 'fab fa-playstation',
			),
			array(
				'name'  => 'bloglovin',
				'label' => esc_html__( 'Bloglovin', 'socials-ignited' ),
				'icon'  => 'fas fa-heart',
			),
			array(
				'name'  => 'tumblr',
				'label' => esc_html__( 'Tumblr', 'socials-ignited' ),
				'icon'  => 'fab fa-tumblr',
			),
			array(
				'name'  => '500px',
				'label' => esc_html__( '500px', 'socials-ignited' ),
				'icon'  => 'fab fa-500px',
			),
			array(
				'name'  => 'tripadvisor',
				'label' => esc_html__( 'Trip Advisor', 'socials-ignited' ),
				'icon'  => 'fab fa-tripadvisor',
			),
			array(
				'name'  => 'telegram',
				'label' => esc_html__( 'Telegram', 'socials-ignited' ),
				'icon'  => 'fab fa-telegram',
			),
			array(
				'name'  => 'etsy',
				'label' => esc_html__( 'Etsy', 'socials-ignited' ),
				'icon'  => 'fab fa-etsy',
			),
			array(
				'name'  => 'behance',
				'label' => esc_html__( 'Behance', 'socials-ignited' ),
				'icon'  => 'fab fa-behance',
			),
			array(
				'name'  => 'dribbble',
				'label' => esc_html__( 'Dribbble', 'socials-ignited' ),
				'icon'  => 'fab fa-dribbble',
			),
		) );
	}
}

require_once untrailingslashit( CISIW_PLUGIN_PATH ) . '/includes/customizer.php';
require_once untrailingslashit( CISIW_PLUGIN_PATH ) . '/includes/sanitization.php';
require_once untrailingslashit( CISIW_PLUGIN_PATH ) . '/includes/admin-page.php';
require_once untrailingslashit( CISIW_PLUGIN_PATH ) . '/includes/class-fontawesome-convert-4-to-5.php';
