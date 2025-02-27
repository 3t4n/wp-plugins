<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoWidgetFormCorePart') ) {

    final class EsoWidgetFormCorePart {

        /*
        * Instance
        */

        private static $instance = null;
        private static $text_domain = 'echelon-so';

        public static function get_instance() {

            if ( null == self::$instance ) {
                self::$instance = new self;
            }

            return self::$instance;

        }

        private function __construct() {

        }

        /*
        * Text Domain
        */

        public static function text_domain() {
            return self::$text_domain;
        }

        /*
        * Builder
        */

        public static function builder($label = 'Builder', $desc = '', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'builder',
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Checkbox
        */

        public static function checkbox($label = 'Checkbox', $desc = '', $default = false, $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'checkbox',
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'default' => $default,
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Color
        */

        public static function color($label = 'Color', $desc = 'Choose a color to use.', $default = '', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'color',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Font
        */

        public static function font($label = 'Font', $desc = '', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'font',
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Icon
        */

        public static function icon($label = 'Icon', $desc = 'Choose an icon to use.', $default = '', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'icon',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Image Size
        */

        public static function image_size($label = 'Image Size', $desc = 'Chose the image size to use.', $default = 'full', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'image-size',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Link
        */

        public static function link($label = 'Link', $desc = 'Set a target for the link.', $default = 'https://example.com', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'link',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Media
        */

        public static function media($label = 'Image', $desc = 'Choose an image to use.', $choose = 'Choose Image', $update = 'Update Image', $library = 'image', $fallback = false, $state_handler = array(), $state_emitter = array()) {
            return array(
                'type' => 'media',
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'choose' => __( $choose, self::$text_domain ),
                'update' => __( $update, self::$text_domain ),
                'library' => $library,
                'fallback' => $fallback,
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Measurement
        */

        public static function measurement($label = 'Measurement', $desc = '', $default = '0px', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'measurement',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'units' => array( 'px', 'rem', 'em' ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Multi Measurement
        */

        public static function multi_measurement($label = 'Multi Measurement', $desc = '', $default = '0px 0px 0px 0px', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'multi-measurement',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'autofill' => true,
                'measurements' => array(
                    'top' => array(
                        'label' => __( 'Top', self::$text_domain ),
                        'units' => array( 'px', 'rem', 'em' ),
                    ),
                    'right' => array(
                        'label' => __( 'Right', self::$text_domain ),
                        'units' => array( 'px', 'rem', 'em' ),
                    ),
                    'bottom' => array(
                        'label' => __( 'Bottom', self::$text_domain ),
                        'units' => array( 'px', 'rem', 'em' ),
                    ),
                    'left' => array(
                        'label' => __( 'Left', self::$text_domain ),
                        'units' => array( 'px', 'rem', 'em' ),
                    ),
                ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Number
        */

        public static function number($label = 'Number', $desc = '', $default = '', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'number',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Posts
        */

        public static function posts($label = 'Posts', $desc = '', $default = '', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'posts',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Repeater
        */

        public static function repeater($label = 'Repeater', $desc = '', $item_name = '', $fields = array(), $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'repeater',
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'item_name' => __( $item_name, self::$text_domain),
                'fields' => $fields,
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Section
        */

        public static function section($label = 'Section', $fields = array(), $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'section',
                'label' => __( $label, self::$text_domain ),
                'hide' => true,
                'fields' => $fields,
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Select
        */

        public static function select($label = 'Select', $desc = '', $default = '', $options = array(), $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'select',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'options' => $options,
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Slider
        */

        public static function slider($label = 'Slider', $desc = '', $default = 1, $min = 1, $max = 1, $int = true, $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'slider',
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'default' => $default,
                'min' => $min,
                'max' => $max,
                'integer' => $int,
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Text
        */

        public static function text($label = 'Text', $desc = '', $default = '', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'text',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

        /*
        * Textarea
        */

        public static function textarea($label = 'Text', $desc = '', $default = '', $state_handler = array(), $state_emitter = array() ) {
            return array(
                'type' => 'textarea',
                'default' => $default,
                'label' => __( $label, self::$text_domain ),
                'description' => __( $desc, self::$text_domain ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );
        }

    } // end class

} // end class exists
