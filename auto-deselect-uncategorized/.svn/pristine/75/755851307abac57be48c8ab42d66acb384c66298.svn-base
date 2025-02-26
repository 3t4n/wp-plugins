<?php

/**
 * Auto-Deselect Uncategorized
 *
 * @package           Auto-Deselect Uncategorized
 * @author            Gifford Nowland
 * @copyright         Copyright (c) 2020 Gifford Nowland
 * @license           http://opensource.org/licenses/gpl-3.0.php GNU Public License
 *
 * @wordpress-muplugin
 * Plugin Name:         Auto-Deselect Uncategorized
 * Plugin URI:          https://github.com/gnowland/auto-deselect-uncategorized/
 * Description:         Automatically deselect the "Uncategorized" category (or your custom default post category) when another category is selected, and select it when no other categories are selected.
 * Version:             1.0.3
 *
 * Requires at least:    5.0
 * Requires PHP:        5.6
 *
 * Author:              Gifford Nowland
 * Author URI:          https://giffordnowland.com
 *
 * License:             GPL-3.0+
 * License URI:         https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * GitHub Plugin URI:   https://github.com/gnowland/auto-deselect-uncategorized
 * GitHub Branch:       release
 *
 * Text Domain:         auto-deselect-uncategorized
 * Domain Path:         /languages/
 *
 */
namespace Gnowland\AutoDeselectUncategorized;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Main plugin class.
 *
 * @class    Auto_Deselect_Uncategorized
 */
class Auto_Deselect_Uncategorized {

    /* @var obj $instance The single instance of Auto_Deselect_Uncategorized.*/
    protected static $_instance = null;

    /* @var str $version */
    public static $version = '1.0.3';

    /**
     * Main Auto_Deselect_Uncategorized Instance
     *
     * Ensures only one instance of Auto_Deselect_Uncategorized is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see Auto_Deselect_Uncategorized()
     * @return Auto_Deselect_Uncategorized - Main instance
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     */
    public function __clone() {
        _doing_it_wrong( __FUNCTION__, esc_html__( 'Cloning this object is forbidden.', 'auto-deselect-uncategorized' ), '1.0' );
    }

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 1.0.0
     */
    public function __wakeup() {
        _doing_it_wrong( __FUNCTION__, esc_html__( 'Unserializing instances of this class is forbidden.', 'auto-deselect-uncategorized' ), '1.0' );
    }

    /**
     * Auto_Deselect_Uncategorized Constructor.
     * @access public
     * @return Auto_Deselect_Uncategorized
     * @since  1.0.0
     */
    public function __construct() {

        // load plugin text domain for translations.
        add_action( 'init', array( $this, 'load_text_domain' ) );

        // Load Gutenberg sidebar scripts.
        add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_assets' ), 99 );

    }

    /**
     * Make plugin translation-ready
     *
     * @access public
     * @since  1.0.0
     */
    public function load_text_domain() {
        load_plugin_textdomain( 'auto-deselect-uncategorized', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }


    /**
     * Load Gutenberg Sidebar Scripts
     *
     * @access public
     * @return void
     * @since  1.0.0
     */
    public function block_editor_assets() {

        // Get the build path
        $env_path = is_dir( plugin_dir_path( __FILE__ ) . 'build/' ) ? 'build/' : '';

        // Automatically load dependencies and version.
        $asset_file = include( plugin_dir_path( __FILE__ ) . $env_path . 'js/index.asset.php');

        wp_enqueue_script(
            'auto-deselect-uncategorized',
            plugins_url( $env_path . 'js/index.js', __FILE__ ),
            $asset_file['dependencies'],
            self::$version,
            true
        );

        wp_localize_script( 'auto-deselect-uncategorized', 'scriptParams', [
            'defaultCategory' => get_option( 'default_category' )
        ] );
    }

} // End class

/**
 * Launch the whole plugin
 * Returns the main instance of Auto_Deselct_Uncategorized to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return Auto_Deselect_Uncategorized
 */
$registry = new Auto_Deselect_Uncategorized;

add_filter( 'auto_deselect_uncategorized', function() use( $registry ) {
  return $registry;
} );
