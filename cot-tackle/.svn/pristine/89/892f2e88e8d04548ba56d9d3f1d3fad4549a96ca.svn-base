<?php

/**
 * Description of class
 *
 * @author iam00
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Cot_Tackle')) {

    class Cot_Tackle {

        private static $initiated;

        /**
         * Actions setup
         */
        public function __construct() {
            add_action('admin_notices', array($this, 'admin_notice'), 4);
        }

        /**
         * Includes
         */
        public static function includes() {
            //Post types
            require_once ( CT_PLUGIN_DIR . 'inc/post-type/post-type-projects.php' );
            require_once ( CT_PLUGIN_DIR . 'inc/post-type/post-type-employees.php' );
            //Metaboxes
            require_once ( CT_PLUGIN_DIR . 'inc/metaboxes/project-metaboxes.php' );
            require_once ( CT_PLUGIN_DIR . 'inc/metaboxes/employees-metaboxes.php' );
            //Teconomy
            require_once ( CT_PLUGIN_DIR . 'inc/taxonomy/project-taxonomy.php' );
        }

        /**
         * Admin notice
         */
        function admin_notice() {
            $theme = wp_get_theme();
            $parent = wp_get_theme()->parent();
            if (($theme != 'Cot' ) && ($parent != 'Cot')) {
                echo '<div class="error">';
                echo '<p>' . __('Please note that the <strong>Cot Tackle</strong> plugin is meant to be used only with the <a href="http://wordpress.org/themes/cot/" target="_blank">Cot theme</a></p>', 'cot-tackle');
                echo '</div>';
            }
        }

        public static function init() {
            if (!self::$initiated)
                self::$initiated = new self;
            return self::$initiated;
        }

    }

}