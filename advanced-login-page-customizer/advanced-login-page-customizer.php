<?php
/**
 * Plugin Name: Advanced Login Page Customizer
 * Description: Personalize, White label & Rebrand your login page without any coding. Easy setup and live preview.
 * Author: One Loop Studio
 * Author URI: https://oneloopstudio.com/
 * Plugin URI: https://oneloopstudio.com/wordpress-plugins/advanced-login-page-customizer/
 * Version: 1.1.3
 * Text Domain: advanced-login-page-customizer
 * Domain Path: /languages
 * Tested up to: 6.7
 * Requires at least: 6.0
 * Requires PHP: 5.5
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * Advanced Login Page Customizer is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * You should have received a copy of the GNU General Public License
 * along with Advanced Login Page Customizer. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package Advanced Login Page Customizer
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define( 'ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_FILE', __FILE__ );
define( 'ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_DIR', plugin_dir_path( ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_FILE ) );
define( 'ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL', trailingslashit( plugin_dir_url( ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_FILE ) ) );


function advanced_login_page_customizer_login_init() {
	require_once sprintf( '%s/vendor/autoload.php', ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_DIR );
	$class = new \Ols\OlsDashboard\Ols_Dashboard();

	require_once sprintf( '%sinc/bootstrap.php', ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_DIR );

	if( function_exists( 'advanced_login_page_customizer_login_pro_init' ) ) {
		advanced_login_page_customizer_login_pro_init();
	}

	if( function_exists( 'advanced_login_page_customizer_validation_init' ) ) {
		advanced_login_page_customizer_validation_init();
	}

	if( function_exists( 'advanced_login_page_customizer_captcha_init' ) ) {
		advanced_login_page_customizer_captcha_init();
	}

}

advanced_login_page_customizer_login_init();
