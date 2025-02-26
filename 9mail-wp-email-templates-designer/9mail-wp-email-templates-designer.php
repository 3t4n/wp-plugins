<?php
/**
 * Plugin Name: 9MAIL - WordPress Email Templates Designer
 * Plugin URI: https://villatheme.com/extensions/9mail-wordpress-email-templates-designer/
 * Description: Design and customize WordPress emails effortlessly with Email Templates Designer. No coding needed. Drag, drop, and personalize layouts easily.
 * Version: 1.0.17
 * Author: VillaTheme
 * Author URI: https://villatheme.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 9mail-wp-email-templates-designer
 * Domain Path: /languages
 * Copyright 2022 - 2025 VillaTheme.com. All rights reserved.
 * Requires at least: 5.0
 * Tested up to: 6.7
 * Requires PHP: 7.0
 **/

namespace EmTmplF;

use EmTmplF\Inc\Email_Builder;
use EmTmplF\Inc\Email_Samples;
use EmTmplF\Inc\Email_Trigger;
use EmTmplF\Inc\Enqueue;

defined( 'ABSPATH' ) || exit;

define( 'EMTMPL_CONST', [
	'version'     => '1.0.17',
	'plugin_name' => '9MAIL - WP Email Templates Designer',
	'slug'        => 'em-tmpl',
	'assets_slug' => 'em-tmpl-',
	'file'        => __FILE__,
	'basename'    => plugin_basename( __FILE__ ),
	'plugin_dir'  => plugin_dir_path( __FILE__ ),
	'dist_url'    => plugins_url( 'assets/dist/', __FILE__ ),
	'libs_url'    => plugins_url( 'assets/libs/', __FILE__ ),
	'img_url'     => plugins_url( 'assets/img/', __FILE__ ),
] );

require_once EMTMPL_CONST['plugin_dir'] . 'autoload.php';

if ( ! class_exists( 'WP_Email_Templates_Designer' ) ) {
	class WP_Email_Templates_Designer {
		public function __construct() {
			add_action( 'plugins_loaded', [ $this, 'init' ], 20 );
			register_activation_hook( __FILE__, array( $this, 'emtmpl_activate' ) );
		}

		public function init() {
			if ( class_exists( '\EmTmpl\EMTMPL_Email_Templates_Designer' ) ) {
				return;
			}

			if ( ! class_exists( 'VillaTheme_Require_Environment' ) ) {
				include_once EMTMPL_CONST['plugin_dir'] . 'support/support.php';
			}

			$environment = new \VillaTheme_Require_Environment( [
					'plugin_name' => EMTMPL_CONST['plugin_name'],
					'php_version' => '7.0',
					'wp_version'  => '5.0',
				]
			);

			if ( $environment->has_error() ) {
				return;
			}

			add_filter( 'plugin_action_links_' . EMTMPL_CONST['basename'], [ $this, 'setting_link' ] );
			$this->load_text_domain();
			$this->load_classes();
		}

		public function load_text_domain() {
			$locale   = determine_locale();
			$locale   = apply_filters( 'plugin_locale', $locale, '9mail-wp-email-templates-designer' );
			$basename = plugin_basename( dirname( __FILE__ ) );

			unload_textdomain( '9mail-wp-email-templates-designer' );

			load_textdomain( '9mail-wp-email-templates-designer', WP_LANG_DIR . "/{$basename}/{$basename}-{$locale}.mo" );
			load_plugin_textdomain( '9mail-wp-email-templates-designer', false, $basename . '/languages' );
		}

		public function load_classes() {
			require_once EMTMPL_CONST['plugin_dir'] . 'inc/functions.php';
			require_once EMTMPL_CONST['plugin_dir'] . 'support/support.php';

			Enqueue::instance();
			Email_Builder::instance();
			Email_Trigger::instance();

			if ( is_admin() && ! wp_doing_ajax() ) {
				$this->support();
			}
		}

		public function support() {
			if ( class_exists( 'VillaTheme_Support' ) ) {
				new \VillaTheme_Support(
					array(
						'support'    => 'https://wordpress.org/support/plugin/9mail-wp-email-templates-designer/',
						'docs'       => 'http://docs.villatheme.com/?item=9mail',
						'review'     => 'https://wordpress.org/support/plugin/9mail-wp-email-templates-designer/reviews/?rate=5#rate-response',
						'pro_url'    => 'https://1.envato.market/kj3VaN',
						'css'        => EMTMPL_CONST['dist_url'],
						'image'      => EMTMPL_CONST['img_url'],
						'slug'       => '9mail-wp-email-templates-designer',
						'menu_slug'  => 'edit.php?post_type=wp_email_tmpl',
						'version'    => EMTMPL_CONST['version'],
						'survey_url' => 'https://script.google.com/macros/s/AKfycbxCadAI0khct5tqhGMvp1kGqVOtHH05iwOqrbPyJcjGWiQiKv-64FL7-VpWbO0bPUU7/exec'
					)
				);
			}
		}

		public function emtmpl_activate() {
			$check_exist = get_posts( [ 'post_type' => 'wp_email_tmpl', 'numberposts' => 1 ] );

			if ( empty( $check_exist ) ) {
				$default_subject = Email_Samples::default_subject();
				$templates       = Email_Samples::sample_templates();
				$site_title      = get_option( 'blogname' );

				foreach ( $templates as $key => $template ) {
					$args = [
						'post_title'  => $default_subject[ $key ] ? str_replace( '{site_title}', $site_title, $default_subject[ $key ] ) : '',
						'post_status' => 'publish',
						'post_type'   => 'wp_email_tmpl',
					];

					$post_id  = wp_insert_post( $args );
					$template = $template['basic']['data'];
					$template = str_replace( '\\', '\\\\', $template );

					update_post_meta( $post_id, 'emtmpl_settings_type', $key );
					update_post_meta( $post_id, 'emtmpl_email_structure', $template );
				}
			}
		}

		public function setting_link( $links ) {
			return array_merge(
				[
					sprintf( "<a href='%1s' >%2s</a>", esc_url( admin_url( 'edit.php?post_type=wp_email_tmpl' ) ),
						esc_html__( 'Settings', '9mail-wp-email-templates-designer' ) )
				],
				$links );
		}

	}

	new WP_Email_Templates_Designer();
}