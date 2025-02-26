<?php
/*
 * Plugin Name: MyThemeShop Theme Customizer
 * Plugin URI: https://wordpress.org/plugins/mythemeshop-theme-customizer/
 * Description: Enhance your OnePage Lite theme with extra functionality through sections like: Buttons, Clients, Counter, Features, Blog Posts, Services, Team, Testimonials & Tweets.
 * Author: MYThemeShop
 * Author URI: https://mythemeshop.com/
 * Version: 1.0.0
 * Text Domain: mythemeshop-theme-customizer
 * Domain Path: /languages
 *
 * @since     1.0.0
 * @copyright Copyright (c) 2018, MyThemesShop
 * @author    MyThemesShop
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

define( 'MTS_CUSTOMIZER_VERSION',  '1.0.0' );
define( 'MTS_CUSTOMIZER_PATH',  plugin_dir_path( __FILE__ ) );
define( 'MTS_CUSTOMIZER_URL',  plugin_dir_url( __FILE__ ) );

function mts_customizer_loader() {
	if ( function_exists( 'onepage_lite_setup' ) ) {
		require_once( MTS_CUSTOMIZER_PATH . 'inc/onepage-lite-functions.php' );
	}
}

add_action( 'after_setup_theme', 'mts_customizer_loader', 0 );
