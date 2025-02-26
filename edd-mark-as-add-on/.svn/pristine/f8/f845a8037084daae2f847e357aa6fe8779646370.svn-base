<?php
/*
Plugin Name: EDD Mark as add-on
Plugin URI:  https://github.com/alessandrotesoro/wp-user-manager/
Description: Mark EDD Products as addons and expose them through the REST API. Useful for fremium WordPress plugins.
Version:     1.0.0
Author:      Alessandro Tesoro
Author URI:  http://alessandrotesoro.me
License:     GPLv3+
Text Domain: edd-mark-as-addon
Domain Path: /languages
*/

/**
 * EDD Mark as addon.
 *
 * Copyright (c) 2018 Alessandro Tesoro
 *
 * EDD Mark as addon. is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * EDD Mark as addon. is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * @author     Alessandro Tesoro
 * @version    1.0.0
 * @copyright  (c) 2018 Alessandro Tesoro
 * @license    http://www.gnu.org/licenses/gpl-3.0.txt GNU LESSER GENERAL PUBLIC LICENSE
 * @package    edd-mark-as-addon
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'EDD_Mark_As_Addon' ) && class_exists( 'Easy_Digital_Downloads' ) ) :

	/**
	 * Main EDD_Mark_As_Addon class.
	 */
	final class EDD_Mark_As_Addon {

        /**
		 * EDDMAA Instance.
		 *
		 * @var EDDMAA() the EDDMAA Instance
		 */
        protected static $_instance;

        /**
		 * Main EDDMAA Instance.
		 *
		 * Ensures that only one instance of EDDMAA exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @return EDDMAA
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
        }

        /**
		 * Get things up and running.
		 */
		public function __construct() {
			$this->setup_constants();
            $this->autoload();
            $this->init_hooks();
		}

		/**
		 * Autoload composer and other required classes.
		 *
		 * @return void
		 */
		private function autoload() {
            require __DIR__ . '/vendor/autoload.php';
            require_once EDDMAA_PLUGIN_DIR . 'includes/class-eddmaa-rest-controller.php';
        }

        /**
		 * Hook in our actions and filters.
		 *
		 * @return void
		 */
		private function init_hooks() {
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ), 0 );
            add_action( 'plugins_loaded', array( $this, 'init' ), 0 );
            add_action( 'carbon_fields_register_fields', [ $this, 'register_custom_field' ] );
            add_action( 'save_post', [ $this, 'clean_cache' ] );
		}

		/**
		 * Load plugin textdomain.
		 *
		 * @return void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'edd-mark-as-addon', false, basename( dirname( __FILE__ ) ) . '/languages' );
        }

        /**
		 * Hook into WordPress once all plugins are loaded.
		 *
		 * @return void
		 */
		public function init() {

            \Carbon_Fields\Carbon_Fields::boot();
            $controller = new EDDMAA_REST_Controller();
            $controller->register_routes();

        }

        /**
         * Register the custom meta field for the downloads post type.
         *
         * @return void
         */
        public function register_custom_field() {

            Container::make( 'post_meta', esc_html__( 'Mark as add-on', 'edd-mark-as-addon' ) )
                ->where( 'post_type', '=', 'download' )
                ->set_context( 'side' )
                ->set_priority( 'default' )
                ->add_fields( [
                    Field::make( 'checkbox', 'mark_as_addon', esc_html__( 'Mark download as add-on and expose in rest api.', 'edd-mark-as-addon' ) )
                ] );

        }

        /**
         * Clean transient cache when updating or saving a download.
         *
         * @param int $post_id
         * @return void
         */
        public function clean_cache( $post_id ) {

            if( current_user_can( 'manage_options' ) && isset( $_POST['post_type'] ) && $_POST['post_type'] == 'download' ) {

                $post_type = get_post_type( $post_id );

                if ( 'download' != $post_type ) return;

                delete_transient( 'wp_edd_addons_api_cached' );

            }

        }

        /**
		 * Throw error on object clone
		 *
		 * The whole idea of the singleton design pattern is that there is a single
		 * object therefore, we don't want the object to be cloned.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'edd-mark-as-addon' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since 1.0.0
		 * @access protected
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'edd-mark-as-addon' ), '1.0.0' );
		}

		/**
		 * Setup plugin constants
		 *
		 * @access private
		 * @since 1.0.0
		 * @return void
		 */
		private function setup_constants() {

			// Plugin version.
			if ( ! defined( 'EDDMAA_VERSION' ) ) {
				define( 'EDDMAA_VERSION', '1.0.0' );
			}

			// Plugin Folder Path.
			if ( ! defined( 'EDDMAA_PLUGIN_DIR' ) ) {
				define( 'EDDMAA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}

			// Plugin Folder URL.
			if ( ! defined( 'EDDMAA_PLUGIN_URL' ) ) {
				define( 'EDDMAA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}

			// Plugin Root File.
			if ( ! defined( 'EDDMAA_PLUGIN_FILE' ) ) {
				define( 'EDDMAA_PLUGIN_FILE', __FILE__ );
			}

			// Plugin Slug.
			if ( ! defined( 'EDDMAA_SLUG' ) ) {
				define( 'EDDMAA_SLUG', plugin_basename( __FILE__ ) );
			}

		}

    }

endif;

/**
 * Run the plugin
 */
function EDDMAA() {
	return class_exists( 'Easy_Digital_Downloads' ) ? EDD_Mark_As_Addon::instance() : false;
}

// Get EDD Running.
EDDMAA();