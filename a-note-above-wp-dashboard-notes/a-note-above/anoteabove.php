<?php
/*
Plugin Name: A Note Above - WP Dashboard Notes
Description: A WP Note Taking System - Leave notes on your WP Dashboard. Leave notes to your team or privately to yourself.
Version: 1.0.1
Author: Josh Brown
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: anoteabove
Domain Path: /languages
*/

/**
 * Copyright (c) 2021 Josh Brown (email: joshbrown101@gmail.com). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

// don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * A_Note_Above class
 *
 * @class A_Note_Above The class that holds the entire A_Note_Above plugin
 */
final class A_Note_Above {

    /**
     * Plugin version
     *
     * @var string
     */
    public $version = '1.0.1';

    /**
     * Holds various class instances
     *
     * @var array
     */
    private $container = array();

    /**
     * Constructor for the A_Note_Above class
     *
     * Sets up all the appropriate hooks and actions
     * within our plugin.
     */
    public function __construct() {

        $this->define_constants();

        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
    }

    /**
     * Initializes the A_Note_Above() class
     *
     * Checks for an existing A_Note_Above() instance
     * and if it doesn't find one, creates it.
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new A_Note_Above();
        }

        return $instance;
    }

    /**
     * Magic getter to bypass referencing plugin.
     *
     * @param $prop
     *
     * @return mixed
     */
    public function __get( $prop ) {
        if ( array_key_exists( $prop, $this->container ) ) {
            return $this->container[ $prop ];
        }

        return $this->{$prop};
    }

    /**
     * Magic isset to bypass referencing plugin.
     *
     * @param $prop
     *
     * @return mixed
     */
    public function __isset( $prop ) {
        return isset( $this->{$prop} ) || isset( $this->container[ $prop ] );
    }

    /**
     * Define the constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'ANOTEABOVE_VERSION', $this->version );
        define( 'ANOTEABOVE_FILE', __FILE__ );
        define( 'ANOTEABOVE_PATH', dirname( ANOTEABOVE_FILE ) );
        define( 'ANOTEABOVE_INCLUDES', ANOTEABOVE_PATH . '/includes' );
        define( 'ANOTEABOVE_URL', plugins_url( '', ANOTEABOVE_FILE ) );
        define( 'ANOTEABOVE_ASSETS', ANOTEABOVE_URL . '/assets' );
    }

    /**
     * Load the plugin after all plugis are loaded
     *
     * @return void
     */
    public function init_plugin() {
        $this->includes();
        $this->init_hooks();
    }

    /**
     * Placeholder for activation function
     *
     * Nothing being called here yet.
     */
    public function activate() {

        $installed = get_option( 'anoteabove_installed' );

        if ( ! $installed ) {
            add_option( 'anoteabove_installed', time() );
            add_option( 'anoteabove_stack', '100' );
            update_option( 'anoteabove_version', ANOTEABOVE_VERSION );

            $this->create_mynote_database();
        }
    }

    private function create_mynote_database() {
      global $wpdb;

      $table_name = $wpdb->prefix . '_anoteabove';
      $charset_collate = $wpdb->get_charset_collate();

      $mynote_table = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        title varchar(55) NOT NULL,
        content text NOT NULL,
        shared tinyint(1) NOT NULL,
        single_visibility tinyint(1) NOT NULL,
        role_visibility tinyint(1) NOT NULL,
        selected_role varchar(15) NULL,
        author mediumint(3) NOT NULL,
        meta varchar(155)  NOT NULL,
        PRIMARY KEY  (id)
      ) $charset_collate;";

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $mynote_table );
    }

    /**
     * Placeholder for deactivation function
     *
     * Nothing being called here yet.
     */
    public function deactivate() {

    }

    /**
     * Include the required files
     *
     * @return void
     */
    public function includes() {

        require_once ANOTEABOVE_INCLUDES . '/Assets.php';

        if ( $this->is_request( 'admin' ) ) {
            require_once ANOTEABOVE_INCLUDES . '/Admin.php';
        }



        if ( $this->is_request( 'ajax' ) ) {
            // require_once ANOTEABOVE_INCLUDES . '/class-ajax.php';
        }

        require_once ANOTEABOVE_INCLUDES . '/Api.php';
    }

    /**
     * Initialize the hooks
     *
     * @return void
     */
    public function init_hooks() {

        add_action( 'init', array( $this, 'init_classes' ) );

        // Localize our plugin
        add_action( 'init', array( $this, 'localization_setup' ) );
    }

    /**
     * Instantiate the required classes
     *
     * @return void
     */
    public function init_classes() {

        if ( $this->is_request( 'admin' ) ) {
            $this->container['admin'] = new ANoteAbove\Admin();
        }

        if ( $this->is_request( 'ajax' ) ) {
            // $this->container['ajax'] =  new ANoteAbove\Ajax();
        }

        $this->container['api'] = new ANoteAbove\Api();
        $this->container['assets'] = new ANoteAbove\Assets();
    }

    /**
     * Initialize plugin for localization
     *
     * @uses load_plugin_textdomain()
     */
    public function localization_setup() {
        load_plugin_textdomain( 'anoteabove', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    /**
     * What type of request is this?
     *
     * @param  string $type admin, ajax, cron or frontend.
     *
     * @return bool
     */
    private function is_request( $type ) {
        switch ( $type ) {
            case 'admin' :
                return is_admin();

            case 'ajax' :
                return defined( 'DOING_AJAX' );

            case 'rest' :
                return defined( 'REST_REQUEST' );

            case 'cron' :
                return defined( 'DOING_CRON' );

            case 'frontend' :
                return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
        }
    }

} // A_Note_Above

$anoteabove = A_Note_Above::init();
