<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('FSDT_Library')) {

    class FSDT_Library {

        /**
         * Exit for unauthorized access
         *
         * @since 1.0.0
         */
        function permission_denied() {
            die('No script kiddies please!!');
        }

        /**
         * Prints array in the pre format
         *
         * @param array $array
         * @since 1.0.0
         */
        function print_array($array) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }


        /**
         * Fetches the menu row from menu table
         *
         * @global object $wpdb
         * @param int $menu_id
         * @return object
         */
        public static function get_menu_row_by_id($menu_id) {
            global $wpdb;
            $table = FSDT_MENU_SETTING_TABLE;
            $menu_row = $wpdb->get_row($wpdb->prepare("select * from %i where menu_id = %d", $table, $menu_id));
            return $menu_row;
        }

        /**
         * Prints Display None
         *
         * @param string $parameter1 
         * @param string $parameter2
         *
         * @since 1.0.0
         */
        function display_none($parameter1, $parameter2) {
            if ($parameter1 != $parameter2) {
                echo 'fsdt-field-hide';
            }
        }
        /**
         * Prints Display None
         *
         * @param string $parameter3
         *
         * @since 1.0.0
         */
        function display_none_image_size($parameter3) {
            if ($parameter3 == 'recent_posts' || $parameter3 == 'woo_product') {
                echo '';
            } else {
                echo 'fsdt-field-hide';
            }
        }
        /**
         * Prints Display None
         *
         * @param string $parameter1
         * @param string $parameter2
         *
         * @since 1.0.0
         */
        function display_flex($parameter1, $parameter2) {
            if ($parameter1 == $parameter2) {
                echo 'fsdt-field-flex';
            }
        }

        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function sanitize_array($array = array(), $sanitize_rule = array()) {
            if (!is_array($array) || count($array) == 0) {
                return array();
            }

            foreach ($array as $k => $v) {
                if (!is_array($v)) {

                    $default_sanitize_rule = (is_numeric($k)) ? 'html' : 'text';
                    $sanitize_type = isset($sanitize_rule[$k]) ? $sanitize_rule[$k] : $default_sanitize_rule;
                    $array[$k] = $this->sanitize_value($v, $sanitize_type);
                }
                if (is_array($v)) {
                    $array[$k] = $this->sanitize_array($v, $sanitize_rule);
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value($value = '', $sanitize_type = 'text') {
            switch ($sanitize_type) {
                case 'html':
                    return wp_kses_post($value);
                    break;
                case 'to_br':
                    return $this->sanitize_escaping_linebreaks($value);
                    break;
                default:
                    return sanitize_text_field($value);
                    break;
            }
        }


        /**
         * Sanitizes field by converting line breaks to <br /> tags
         *
         * @since 1.0.0
         *
         * @return string $text
         */
        function sanitize_escaping_linebreaks($text) {
            $text = implode("<br \>", array_map('sanitize_text_field', explode("\n", $text)));
            return $text;
        }
    }

    $GLOBALS['fsdt_library'] = new FSDT_Library();
}
