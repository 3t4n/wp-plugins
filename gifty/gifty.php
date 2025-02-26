<?php
/*
Plugin Name: Gifty
Plugin URI: https://gifty.nl
Description: Are you affiliated with Gifty? Then make yourself comfortable and use the Gifty plugin. Place the order module at the touch of a button and sell giftcards on your website without difficulty.
Text Domain: gifty
Domain Path: /languages
Version: 1.0.2
Author: Gifty B.V.
Author URI: https://gifty.nl
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

// uninstall of plugin
register_uninstall_hook(__FILE__, 'gifty_uninstall');
function gifty_uninstall()
{
    delete_option('gifty_module_code');
    delete_option('gifty_module_icon_visibility');
}

require('admin/settings.php');

if ( ! class_exists('GiftyModule')) {

    class GiftyModule extends GiftySettings
    {
        public function __construct()
        {
            if (is_admin()) {
                add_action('plugins_loaded', [$this, 'setup_translations']);
                add_action('admin_menu', [$this, 'setup_dashboard']);

                add_action('nav_menu_meta_box_object', [$this, 'menu_metabox_register']);
            }

            add_action('wp_footer', [$this, 'display_widget']);
        }

        public function setup_translations()
        {
            load_plugin_textdomain('gifty', false, basename(dirname(__FILE__)) . '/languages/');
        }

        public function setup_dashboard()
        {
            $icon_svg = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMi4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGFhZ18xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDMyIDMyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzMiAzMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCgkuc3Qwe2ZpbGw6I0ZGRkZGRjt9DQo8L3N0eWxlPg0KPGc+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTExLjgsMTFjLTAuNy0wLjMtMS4yLTAuOC0xLjUtMS4zQzkuOSw5LDkuOSw4LjMsMTAuNCw3LjZDMTAuOCw3LDExLjMsNi44LDEyLDYuOGMxLjEsMCwyLjEsMC43LDIuOCwxLjZWMC4xDQoJCWMtMS4yLDAuMS0yLjMsMC40LTMuMiwwLjhDMTAuMiwxLjQsOSwyLjIsOCwzLjJjLTEsMS0xLjcsMi4yLTIuMywzLjZDNS4yLDguMSw1LDkuNSw0LjksMTFIMTEuOHoiLz4NCgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTkuNiw4LjFjLTAuMi0wLjItMC40LTAuNC0wLjctMC40Yy0wLjgsMC0yLjIsMC45LTIuOCwyLjljMS41LDAuMSwzLTAuNiwzLjUtMS40QzE5LjksOC45LDE5LjksOC41LDE5LjYsOC4xDQoJCXoiLz4NCgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTYuMSw4LjRjMC43LTAuOSwxLjctMS42LDIuOC0xLjZjMC43LDAsMS4zLDAuMywxLjYsMC44QzIxLDguMywyMSw5LDIwLjYsOS43Yy0wLjMsMC41LTAuOCwxLTEuNSwxLjNoNi4zDQoJCVYxLjJjLTEuMS0wLjMtMi40LTAuNi00LTAuOGMtMS42LTAuMy0zLjItMC40LTUtMC40Yy0wLjEsMC0wLjIsMC0wLjMsMFY4LjR6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTE2LjYsMTIuM2MwLjYsMC44LDEuOCwyLDQsMi45bC0wLjQsMWMtMi0wLjktMy4zLTEuOS00LjEtMi44djguOWMwLjctMC4xLDEuMy0wLjIsMS44LTAuMw0KCQljMC45LTAuMywxLjYtMC41LDIuMS0wLjh2MC45YzAsMS43LTAuNSwzLjEtMS40LDMuOWMtMC45LDAuOS0yLjUsMS4zLTQuNiwxLjNjLTEuNCwwLTIuNi0wLjEtMy44LTAuNGMtMS4yLTAuMi0yLjItMC41LTMuMS0wLjkNCgkJbC0xLDQuNmMxLjEsMC40LDIuMywwLjcsMy43LDAuOWMxLjMsMC4yLDIuNywwLjQsNC4xLDAuNGMzLjksMCw2LjctMC45LDguNi0yLjZjMS45LTEuNywyLjgtNC40LDIuOC04LjF2LTlIMTYuNnoiLz4NCgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTAuOSwyMS44YzEuMiwwLjUsMi41LDAuNyw0LDAuN3YtOWMtMC44LDAuOS0yLjEsMS45LTQuMSwyLjhsLTAuNC0xYzIuMi0xLDMuNC0yLjEsNC0yLjlINQ0KCQljMC4xLDEuNSwwLjMsMi44LDAuNyw0YzAuNSwxLjQsMS4yLDIuNSwyLDMuNEM4LjYsMjAuNiw5LjYsMjEuMywxMC45LDIxLjh6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTEyLDcuN2MtMC4zLDAtMC41LDAuMS0wLjcsMC40Yy0wLjMsMC40LTAuMywwLjgsMCwxLjJjMC41LDAuOSwyLDEuNSwzLjUsMS40QzE0LjMsOC43LDEyLjksNy43LDEyLDcuN3oiLz4NCjwvZz4NCjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0zMiwyOS4xYzAsMy45LTUuOSwzLjktNS45LDBDMjYuMSwyNS4yLDMyLDI1LjIsMzIsMjkuMXoiLz4NCjwvc3ZnPg0K';

            add_menu_page(__('Gifty integration settings', 'gifty'), 'Gifty', 'manage_options', 'gifty',
                [$this, 'options_page_render'], $icon_svg, 200);
        }

        public function add_script($script_name, $url, $var_name = null, $pass_var_value = [])
        {
            wp_register_script($script_name, plugins_url($url, __FILE__));

            if ( ! empty($var_name)) {
                wp_localize_script($script_name, $var_name, $pass_var_value);
            }

            wp_enqueue_script($script_name);
        }

        public function display_widget()
        {
            $module_code            = esc_js(get_option('gifty_module_code'));
            $module_icon_visibility = esc_js(get_option('gifty_module_icon_visibility'));

            if ($module_code) {
                $data_js_passing = [
                    'module_code'            => $module_code,
                    'module_icon_visibility' => $module_icon_visibility
                ];

                $this->add_script('gifty-script', 'assets/js/gifty.min.js', 'gifty_wp_data', $data_js_passing);
            }
        }
    }

    new GiftyModule();
}
