<?php
/**
 * Plugin Name: Featured Image Customizer
 * Plugin URI: https://krasenslavov.com/plugins/featured-image-customizer/
 * Description: Generate and create custom featured images on the fly with 100+ brand logos.
 * Author: Krasen Slavov
 * Version: 1.0.8
 * Author URI: https://krasenslavov.com/
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: featured-image-customizer
 * Domain Path: /lang
 *
 * Copyright 2018-2024 Krasen Slavov (email: hello@krasenslavov.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 */

namespace FIC\Featured_Image_Customizer;

! defined( ABSPATH ) || exit;

if ( ! class_exists( 'Featured_Image_Customizer' ) ) {

	class Featured_Image_Customizer {

		const DEV_MODE         = false;
		const VERSION          = '1.0.8';
		const PHP_MIN_VERSION  = '7.2';
		const WP_MIN_VERSION   = '5.0';
		const UUID             = 'fic';
		const TEXTDOMAIN       = 'featured-image-customizer';
		const PLUGIN_NAME      = 'Featured Image Customizer';
		const PLUGIN_DOCURL    = 'https://krasenslavov.com/plugins/featured-image-customizer/';
		const PLUGIN_WPORGURL  = 'https://wordpress.org/support/plugin/featured-image-customizer/';
		const PLUGIN_WPORGRATE = 'https://wordpress.org/support/plugin/featured-image-customizer/reviews/?filter=5';

		var $settings;

		public function __construct() {
			$this->settings = array(
				'dev_mode'         => self::DEV_MODE,
				'version'          => self::VERSION,
				'php_min_version'  => self::PHP_MIN_VERSION,
				'wp_min_version'   => self::WP_MIN_VERSION,
				'uuid'             => self::UUID,
				'textdomain'       => self::TEXTDOMAIN,
				'plugin_name'      => self::PLUGIN_NAME,
				'plugin_docurl'    => self::PLUGIN_DOCURL,
				'plugin_wporgurl'  => self::PLUGIN_WPORGURL,
				'plugin_wporgrate' => self::PLUGIN_WPORGRATE,
				'plugin_url'       => plugin_dir_url( __FILE__ ),
				'plugin_basename'  => plugin_basename( __FILE__ ),
				'plugin_path'      => plugin_dir_path( __FILE__ ),
				'plugin_uploads'   => wp_upload_dir()['basedir'] . DIRECTORY_SEPARATOR . 'fic-local-storage' . DIRECTORY_SEPARATOR,
			);

			if ( $this->check_dependencies() ) {
				require_once $this->settings['plugin_path'] . 'config/defined.php';
				load_plugin_textdomain( $this->settings['textdomain'], false, $this->settings['plugin_basename'] . 'lang' );
			}
		}

		public function rating_notice_display() {
			if ( ! get_option( 'fic_rating_notice' ) ) {
				?>
					<div class="fic-notice notice notice-success is-dismissible">
						<h3>Featured Image Customizer</h3>
						<p>
							Could you please kindly help the plugin in your turn by <strong>giving it 5 stars rating?</strong>
						</p>
						<p class="button-group">
							<a href="<?php echo esc_url( $this->settings['plugin_wporgrate'] ); ?>" target="_blank" class="button button-primary">Rate Us @ WordPress.org</a>
							<a href="<?php echo esc_url( admin_url( 'options-media.php?fic_rating_notice_dismiss=1' ) ); ?>" class="button"><strong>I already did</strong></a>
							<a href="<?php echo esc_url( admin_url( 'options-media.php?fic_rating_notice_dismiss=1' ) ); ?>" class="button"><strong>Don't show this notice again!</strong></a>
						</p>
					</div>
				<?php
			}
		}

		public function rating_notice_dismiss() {
			if ( isset( $_GET['fic_rating_notice_dismiss'] ) ) {
				add_option( 'fic_rating_notice', 1 );
			}
		}

		public function check_dependencies() {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';

			if ( version_compare( PHP_VERSION, $this->settings['php_min_version'] ) >= 0
				&& version_compare( $GLOBALS['wp_version'], $this->settings['wp_min_version'] ) >= 0 ) {
				$check = true;
			} else {
				$check = false;
				add_action( 'admin_notices', array( $this, 'display_min_requirements_notice' ) );
			}

			if ( ! get_extension_funcs( 'gd' ) ) {
				$check = false;
				add_action( 'admin_notices', array( $this, 'display_gd_notice' ) );
			}

			if ( $check ) {
				return true;
			}

			deactivate_plugins( $this->settings['plugin_basename'] );

			return false;
		}

		public function display_min_requirements_notice() {
			$wp_version = isset( $GLOBALS['wp_version'] ) ? sanitize_text_field( wp_unslash( $GLOBALS['wp_version'] ) ) : '';
			?>
				<div class="notice notice-error">
					<p>
						<strong><?php echo esc_html( $this->settings['plugin_name'] ); ?></strong> requires a minimum of <em>PHP <?php echo esc_html( $this->settings['php_min_version'] ); ?></em> and <em>WordPress <?php echo esc_html( $this->settings['wp_min_version'] ); ?></em>.
					</p>
					<p>
						You are currently running <strong>PHP <?php echo PHP_VERSION; ?></strong> and <strong>WordPress <?php echo esc_html( $wp_version ); ?></strong>.
					</p>
				</div>
			<?php
		}

		public function display_gd_notice() {
			?>
				<div class="notice notice-error">
					<p>
						GD is required for Featured Image Customizer! Contact your system administrator and ask them to enable the extension.
					</p>
				</div>
			<?php
		}
	}

	new Featured_Image_Customizer();

	// Core
	require_once 'classes/core/class-fic-fs.php';
	require_once 'classes/core/class-fic-view.php';
	require_once 'classes/core/class-fic-creator.php';
	require_once 'classes/core/class-fic-options.php';

	// Init
	require_once 'classes/class-fic-init.php';

	// Events
	require_once 'classes/events/class-fic-preview-image.php';
	require_once 'classes/events/class-fic-create-image.php';
}
