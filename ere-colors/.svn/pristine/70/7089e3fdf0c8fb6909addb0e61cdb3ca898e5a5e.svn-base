<?php
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
if ( ! class_exists( 'ERE_Colors_Custom_Css' ) ) {
    class ERE_Colors_Custom_Css {
        private $_custom_css = array();

        private static $_instance;

        public static function getInstance() {
            if ( self::$_instance == null ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }
        public function init() {
            add_action( 'template_redirect', array( $this, 'global_custom_css' ), 100 );
            add_action( 'wp_footer', array( $this, 'init_custom_css' ), 10 );
        }

        public function global_custom_css() {
            $this->addCss( $this->site_variables(), 'site_variables' );
        }

        public function site_variables() {
            $variables = array();
            $colors = array(
                'accent_color' => '--ere-color-accent',
                'contrast_color' => '--ere-color-heading',
                'border_color' => '--ere-color-border'
            );

            foreach ($colors as $k => $v) {
                $color = $this->get_option($k);
                if (!empty($color)) {
                    $variables[] = sprintf('%s: %s',$v, $color);
                }
            }

            $css = sprintf(':root{%s}', join('; ', $variables));
            return $css;
        }


        /**
         * Add custom css
         *
         * @param $css
         * @param string $key (default: '')
         */
        public function addCss( $css, $key = '' ) {
            if ( $key === '' ) {
                $this->_custom_css[] = $css;
            } else {
                $this->_custom_css[ $key ] = $css;
            }

        }

        /**
         * @param bool $allow_flush
         *
         * @return null|string|string[]
         */
        public function getCss( $allow_flush = false ) {
            $css = ' ' . implode( '', $this->_custom_css );
            if ( $allow_flush ) {
                $this->_custom_css = [];
            }

            return preg_replace( '/\r\n|\n|\t/', '', $css );
        }

        public function init_custom_css() {
            echo '<style type="text/css" id="ere-colors-custom-css">' . $this->getCss( true ) . '</style>';
        }


        public function get_option($key, $default = '') {
            if (!function_exists('ere_get_option')) {
                return $default;
            } else {
                return ere_get_option($key, $default);
            }
        }
    }

    ERE_Colors_Custom_Css::getInstance()->init();
}