<?php

/**
 * Plugin Name:       Healthy filenames
 * Plugin URI:        http://www.samy.kantari.fr/
 * Description:       Automatically clean filenames.
 * Version:           1.0.0
 * Author:            Kantari Samy, Developer Back @ Whodunit
 * Author URI:        http://www.kantari.fr/
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       healthy-filenames
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );


/**
 * DEFINES
 */
define( 'HEALTHY_FILENAMES'          , '1.0.0' );
define( 'HEALTHY_FILENAMES_FILE'     , __FILE__ );
define( 'TEXT_DOMAIN'     , 'healthy-filenames' );


if ( ! class_exists( 'Healthy_Filenames' ) ) :

    class Healthy_Filenames {
        protected $plugin_name;
        protected $version;

        protected static $instance = null;

        public function __construct() {

            $this->plugin_name = 'healthy-filenames';
            $this->version     = HEALTHY_FILENAMES;

            load_plugin_textdomain( TEXT_DOMAIN, false, dirname( plugin_basename( HEALTHY_FILENAMES_FILE ) ) . '/languages' );

            $this->start();
        }

        public function start() {
            add_filter('wp_handle_upload_prefilter', array($this, 'upload_filter') );
        }


        public function upload_filter( $file ){
            $path = pathinfo($file['name']);
            $tmp  = preg_replace('/.' . $path['extension'] . '$/', '', $file['name']); // Remove extension from filename
            $tmp  = sanitize_title($tmp); // Remove accents && Lower case && Remove special characters

            $tmp  = $tmp . '.' . $path['extension'];

            $new_filename = $tmp;

            $file['name'] = $new_filename;
            return $file;
        }


        public static function get_instance() {

            if ( null == self::$instance ) {
                self::$instance = new self;
            }

            return self::$instance;
        }
    }

    Healthy_Filenames::get_instance();

endif;