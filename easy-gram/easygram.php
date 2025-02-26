<?php
/**
 * @package Easygram
 * @version 2.2
 */
/*
Plugin Name: Easygram
Plugin URI: http://anthonygreat.com/plugins/easygram/
Description: Easily display Instagram photos as a widget that looks good in (almost) any WordPress theme.
Version: 2.2
Author: Anthony Great
Author URI: anthonygreat.com
Donate URI: https://anthonygreat.com/donate/
Text Domain: easygram
Domain Path: /languages
*/

/*
 * This file is part of the Easygram plugin.
 *
 * (c) Anthony Great and OneDotThirty, LLC <hello@1dot30.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
/* Prevent Direct access */
if ( !defined( 'DB_NAME' ) ) {
	header( 'HTTP/1.0 403 Forbidden' );
	die;
}

define( 'EASYGRAM_WIDGET_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'EASYGRAM_WIDGET_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'EASYGRAM_WIDGET_VER', '2.2.0' );

/* Initialize Widget */
if ( !function_exists( 'easygram_widget_init' ) ):
    function easygram_widget_init() {
        require_once EASYGRAM_WIDGET_DIR.'inc/class-easygram-widget.php';
        register_widget( 'Easygram_Widget' );
    }
endif;

add_action( 'widgets_init', 'easygram_widget_init' );

/* Load text domain */
function easygram_load_widget_text_domain() {
    load_plugin_textdomain( 'easygram-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action( 'plugins_loaded', 'easygram_load_widget_text_domain' );