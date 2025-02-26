<?php
namespace AcademyEA;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Dependency {
	const MINIMUM_ELEMENTOR_VERSION = '3.5.0';
	const MINIMUM_PHP_VERSION = '5.6';
	public $is_missing_dependency = false;

	public function dispatch_notice() {
		// Check if Academy installed and activated
		if ( ! class_exists( 'Academy' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_academy_plugin' ) );
			$this->is_missing_dependency = true;
		}

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_elementor_plugin' ) );
			$this->is_missing_dependency = true;
		}

		// Check for required Elementor version
		if ( did_action( 'elementor/loaded' ) && ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			$this->is_missing_dependency = true;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			$this->is_missing_dependency = true;
		}
	}

	public function is_plugin_installed( $basename ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			include_once ABSPATH . '/wp-admin/includes/plugin.php';
		}
		$installed_plugins = get_plugins();
		return isset( $installed_plugins[ $basename ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Academy LMS installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_academy_plugin() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		$academy = 'academy/academy.php';
		if ( $this->is_plugin_installed( $academy ) ) {
			$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $academy . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $academy );

			$message = sprintf( __( '%1$sAcademy LMS Elementor Addons%2$s requires %1$sAcademy LMS%2$s plugin to be active. Please activate Academy main plugin to continue.', 'academy-elementor-addons' ), '<strong>', '</strong>' );

			$button_text = __( 'Activate Academy LMS', 'academy-elementor-addons' );
		} else {
			$activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=academy' ), 'install-plugin_academy' );

			$message = sprintf( __( '%1$sAcademy LMS Elementor Addons%2$s requires %1$sAcademy LMS%2$s plugin to be installed and activated. Please install Elementor to continue.', 'academy-elementor-addons' ), '<strong>', '</strong>' );
			$button_text = __( 'Install Academy LMS', 'academy-elementor-addons' );
		}

		$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';

		printf( '<div class="error"><p>%1$s</p>%2$s</div>', wp_kses_post( $message ), wp_kses_post( $button ) );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( isset( $_GET['activate'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'academy-elementor-addons' ),
			'<strong>' . esc_html__( 'Academy Addons For Elementor', 'academy-elementor-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'academy-elementor-addons' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', esc_html( $message ) );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( isset( $_GET['activate'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'academy-elementor-addons' ),
			'<strong>' . esc_html__( 'Academy Addons For Elementor', 'academy-elementor-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'academy-elementor-addons' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', esc_html( $message ) );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_elementor_plugin() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$elementor = 'elementor/elementor.php';

		if ( $this->is_plugin_installed( $elementor ) ) {
			$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor );

			$message = sprintf( __( '%1$sAcademy LMS Elementor Addons%2$s requires %1$sElementor%2$s plugin to be active. Please activate Elementor to continue.', 'academy-elementor-addons' ), '<strong>', '</strong>' );

			$button_text = __( 'Activate Elementor', 'academy-elementor-addons' );
		} else {
			$activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );

			$message = sprintf( __( '%1$sAcademy LMS Elementor Addons%2$s requires %1$sElementor%2$s plugin to be installed and activated. Please install Elementor to continue.', 'academy-elementor-addons' ), '<strong>', '</strong>' );
			$button_text = __( 'Install Elementor', 'academy-elementor-addons' );
		}

		$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';

		printf( '<div class="error"><p>%1$s</p>%2$s</div>', wp_kses_post( $message ), wp_kses_post( $button ) );
	}

}

