<?php
/**
 * Auto_Aliexpress_Addon_Loader Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Aliexpress_Addon_Loader' ) ) :

    class Auto_Aliexpress_Addon_Loader {

        /**
         * Array Access-able of Registered Addons
         *
         * @since 1.0.0
         * @var array
         */
        private $addons = array();

        /**
         * @since 1.0.0
         * @var self
         */
        private static $instance = null;

        /**
         * Get instance of loader
         *
         * @since 1.0.0
         * @return Auto_Aliexpress_Addon_Loader
         */
        public static function get_instance() {
            if ( is_null( self::$instance ) ) {
                self::$instance = new self();
            }

            return self::$instance;
        }


        /**
         * Auto_Aliexpress_Addon_Loader constructor.
         *
         * @since 1.0.0
         */
        public function __construct() {

            // Initial addons data.
            $addons = array(
                array(
                    'name' => 'Twitter',
                    'slug' => 'twitter',
                    'type' => 'social',
                    'icon_url' => AUTO_ALIEXPRESS_URL.'/assets/images/twitter.png',
                    'is_connected' => false
                ),
                array(
                    'name' => 'Facebook',
                    'slug' => 'facebook',
                    'type' => 'facebook',
                    'icon_url' => AUTO_ALIEXPRESS_URL.'/assets/images/facebook.png',
                    'is_connected' => false
                ),
                array(
                    'name' => 'Youtube',
                    'slug' => 'youtube',
                    'type' => 'video',
                    'icon_url' => AUTO_ALIEXPRESS_URL.'/assets/images/youtube.png',
                    'is_connected' => false
                ),
                array(
                    'name' => 'Vimeo',
                    'slug' => 'vimeo',
                    'type' => 'video',
                    'icon_url' => AUTO_ALIEXPRESS_URL.'/assets/images/vimeo.png',
                    'is_connected' => false
                ),
                array(
                    'name' => 'Flickr',
                    'slug' => 'flickr',
                    'type' => 'social',
                    'icon_url' => AUTO_ALIEXPRESS_URL.'/assets/images/flickr.png',
                    'is_connected' => false
                ),
                array(
                    'name' => 'Soundcloud',
                    'slug' => 'soundcloud',
                    'type' => 'sound',
                    'icon_url' => AUTO_ALIEXPRESS_URL.'/assets/images/soundcloud.png',
                    'is_connected' => false
                ),
                array(
                    'name' => 'Aliexpress',
                    'slug' => 'aliexpress',
                    'type' => 'social',
                    'icon_url' => AUTO_ALIEXPRESS_URL.'/assets/images/aliexpress-sketched.png',
                    'is_connected' => false
                ),


            );

            $auto_aliexpress_addons = get_option( 'auto_aliexpress_addons', false );

            if ( !$auto_aliexpress_addons || count($auto_aliexpress_addons) !== count($addons) ) {
                update_option( 'auto_aliexpress_addons', $addons );
            }

            $this->addons = get_option( 'auto_aliexpress_addons', false );

        }

        /**
         * Get Addons
         *
         * @since 1.0.0
         **
         * @return array
         */
        public function get_addons( ) {
            return $this->addons;
        }

        /**
         * Save addon data
         *
         * @since 1.0.0
         **
         * @return bool
         */
        public function save_addon_data($data) {

            $addons = $this->addons;

            foreach ( $addons as $key => $addon ) {

                if ( $addon['slug'] == $data['slug'] ) {
                    // Set is_connected true
                    if($data['is_connected']){
                        $data['is_connected'] = false;
                    }else{
                        $data['is_connected'] = true;
                    }
                    $addons[$key] = array_merge($addons[$key], $data);
                }
            }

            update_option( 'auto_aliexpress_addons', $addons );

        }

        /**
         * Get addon data
         *
         * @since 1.0.0
         **
         * @return bool
         */
        public function get_addon_data($slug) {

            $addons = get_option( 'auto_aliexpress_addons', false );
            $selected_addon_data = array();

            foreach ( $addons as $key => $addon ) {
                if ( $addon['slug'] == $slug ) {
                    $selected_addon_data = $addon;
                }
            }

            return $selected_addon_data;
        }

    }

endif;