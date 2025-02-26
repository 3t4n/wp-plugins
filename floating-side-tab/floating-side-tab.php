<?php
defined('ABSPATH') or die('No script kiddies please!!');
/**
 * Plugin Name:       Floating Side Tab
 * Plugin URI:        https://wpshuffle.com/wordpress-plugins/floating-side-tab
 * Description:       This plugin adds a floating tab to your website, allowing user to easily access important pages and content.
 * Version:           1.1.2
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            WP Shuffle
 * Author URI:        https://wpshuffle.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       floating-side-tab
 * Domain Path:       /languages
 */
if (!class_exists('FSDT_Main')) {
    class FSDT_Main {
        function __construct() {
            $this->define_constants();
            $this->includes();
            register_activation_hook(__FILE__, [$this, 'create_fsdt_tables']);
        }

        function define_constants() {
            global $wpdb;
            defined('FSDT_PATH') or define('FSDT_PATH', untrailingslashit(plugin_dir_path(__FILE__)));
            defined('FSDT_URL') or define('FSDT_URL', untrailingslashit(plugin_dir_url(__FILE__)));
            defined('FSDT_VERSION') or define('FSDT_VERSION', '1.1.2');
            defined('FSDT_IMG_DIR') or define('FSDT_IMG_DIR', plugin_dir_url(__FILE__) . 'images');
            defined('FSDT_CSS_DIR') or define('FSDT_CSS_DIR', untrailingslashit(plugin_dir_url(__FILE__)) . '/assets/css'); // plugin's CSS directory URL
            defined('FSDT_MENU_SETTING_TABLE') or define('FSDT_MENU_SETTING_TABLE', $wpdb->prefix . '_fsdt_menu_settings');
            defined('FSDT_DEMO_LINK') or define('FSDT_DEMO_LINK', 'https://demo.wpshuffle.com/floating-side-tab-pro/demo-playground/');
        }

        function includes() {

            include(FSDT_PATH . '/includes/classes/admin/class-fsdt-library.php');
            include(FSDT_PATH . '/includes/classes/admin/class-fsdt-admin.php');
            include(FSDT_PATH . '/includes/classes/admin/class-fsdt-crud.php');
            include(FSDT_PATH . '/includes/classes/admin/class-fsdt-metabox.php');
            include(FSDT_PATH . '/includes/classes/class-fsdt-enqueue.php');
            include(FSDT_PATH . '/includes/classes/class-fsdt-frontend.php');
        }

        function create_fsdt_tables() {
            $activation_date = get_option('fsdt_activation_date');
            if (empty($activation_date)) {
                $activation_date = date('Y-m-d');
                update_option('fsdt_activation_date', $activation_date);
            }

            global $wpdb;
            $charset_collate = $wpdb->get_charset_collate();

            $menu_settings_table = FSDT_MENU_SETTING_TABLE;

            /**
             * Menu Settings Table Query
             */
            $menu_settings_sql = "CREATE TABLE $menu_settings_table (
				menu_id mediumint(9) NOT NULL AUTO_INCREMENT,
                menu_title varchar(255),
                menu_details longtext,
                UNIQUE KEY menu_id (menu_id)
							  ) $charset_collate;";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($menu_settings_sql);
            $menu_table = FSDT_MENU_SETTING_TABLE;
            $menu_check = $wpdb->get_var($wpdb->prepare("select count(*) from %i", $menu_table));
            if ($menu_check == 0) {

                $menu_title = esc_html__('Untitled Floating Tab Menu', 'floating-side-tab');
                $fsdt_settings = [];
                $fsdt_settings = ['menu' => [], 'layout' => ['menu_position' => 'menu_position', 'menu_templates' => 'template-1', 'icon_animation' => 'fmt-animate-slide']];


                $menu_table = FSDT_MENU_SETTING_TABLE;

                $wpdb->insert(
                    $menu_table,
                    array(

                        'menu_title' => $menu_title,
                        'menu_details' => maybe_serialize($fsdt_settings),

                    ),

                    array(

                        '%s',
                        '%s',

                    )
                );
            }
        }
    }

    new FSDT_Main();
}
