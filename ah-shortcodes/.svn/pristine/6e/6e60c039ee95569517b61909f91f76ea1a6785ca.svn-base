<?php
/**
 * Plugin Name: AH Shortcodes
 * Plugin URI: https://andreas-hecht.com/plugins/evolution-shortcodes
 * Description: This is a simple shortcode generator. Add buttons, columns, tabs, toggles and alerts to your theme.
 * Version: 1.0.2
 * Author: Andreas Hecht
 * Author URI: https://andreas-hecht.com
 * Based on the ZillaShortcodes Plugin
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: evo-shortcodes
 * Domain Path: /languages
 */



class Evolution_Shortcodes {

    function __construct()
    {
        define( 'TZSC_VERSION', '2.0' );

        // Plugin folder path
        if ( ! defined( 'TZSC_PLUGIN_DIR' ) ) {
            define( 'TZSC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
        }

        // Plugin folder URL
        if ( ! defined( 'TZSC_PLUGIN_URL' ) ) {
            define( 'TZSC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        }

        require_once( TZSC_PLUGIN_DIR .'includes/shortcodes.php' );

        add_action( 'init', array(&$this, 'init') );
        add_action( 'admin_init', array(&$this, 'admin_init') );
    }

    /**
	 * Enqueue front end scripts and styles
	 *
	 * @return	void
	 */
    function init()
    {
        if( ! is_admin() )
        {
            wp_enqueue_style( 'ah-shortcodes', TZSC_PLUGIN_URL . 'assets/css/shortcodes.css' );
            wp_enqueue_script( 'ah-shortcodes-js', TZSC_PLUGIN_URL . 'assets/js/evolution-shortcodes.js', array('jquery', 'jquery-ui-accordion', 'jquery-ui-tabs') );
        }
    }

    /**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
    function admin_init()
    {
        include_once( TZSC_PLUGIN_DIR . 'includes/class-admin-insert.php' );

        // css
        wp_enqueue_style( 'evo-popup', TZSC_PLUGIN_URL . 'assets/css/admin.css', false, '1.0', 'all' );

        // js
        wp_enqueue_script( 'jquery-ui-sortable' );
        wp_localize_script( 'jquery', 'EvolutionShortcodes', array('plugin_folder' => WP_PLUGIN_URL .'/ah-shortcodes') );
    }
}
new Evolution_Shortcodes();


function evolution_load_plugin_textdomain() {
    load_plugin_textdomain( 'evo-shortcodes', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'evolution_load_plugin_textdomain' );