<?php
/**
 * Plugin Name: Dehkadeh Fonts
 * Version: 1.2.0
 * Plugin URI: https://dehkadeh-wp.ir/wordpress/dehkadeh-fonts-plugin/
 * Tags: WordPress Persian Fonts Plugin, Persian Webfonts, Persian Fonts WordPress, Typography, Webfonts, WordPress Webfonts, Fonts, WordPress Fonts, Theme Fonts, Theme Fonts Plugin, Admin Font, Wordpress Admin Font
 * Description: By using this plugin you can change the site and wordpress dashboard font to persian fonts easily.
 * Author: Sajjad Rajab Pour
 * Author URI: https://dehkadeh-wp.ir/
 * Domain Path: /languages
 * Text Domain: dw-fonts
 * Requires at least: 4.2
 * Tested up to: 5.1.0
 * Requires PHP: 5.3-7.2
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


define( 'DW_FONTS_URL', plugin_dir_url( __FILE__ ) );
define( 'DW_FONTS_PATH', plugin_dir_path(__FILE__) );


class Dehkadeh_Fonts {

    /**
     * Initialize plugin.
     */
    public function __construct() {

        $this->includes();

        add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

        add_action( 'wp_enqueue_scripts', array( $this, 'dw_fonts_css_file' ) );

    }

    /**
     * Load plugin files.
     */
    public function includes() {

        // helper functions
        require plugin_dir_path( __FILE__ ) . 'includes/functions.php';

        // customizer settings
        require plugin_dir_path( __FILE__ ) . 'includes/settings.php';

        // help center in wp admin
        require plugin_dir_path( __FILE__ ) . 'includes/wp-admin.php';

    }

    /**
     * Load plugin textdomain.
     */
    public function load_textdomain() {

        load_plugin_textdomain( 'dw-fonts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

    }

    /* add dw-fonts.css to head */
    function dw_fonts_css_file() {
        wp_enqueue_style( 'dw-fonts', plugins_url( '/dw-fonts/dw-fonts.css', __FILE__ ) );
    }

}

$dwf = new Dehkadeh_Fonts();