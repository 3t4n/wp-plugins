<?php
/**
 * @package  * AJAX Contact Form
 * @version 1.0.4
 */
/*
Plugin Name: AJAX Contact Form
Plugin URI: http://www.magazento.com/
Description: Simple and nice AJAX contact form plugin for your website
Author: Magazento
Version: 1.0.4
Author URI: http://www.magazento.com/
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

class acf_loader {
    public $ajax;

    public $defaults = array();
    public $settings = array();

    function __construct() {
        global $wp_version;

        define('ACF_WP_VERSION', intval(substr(str_replace('.', '', $wp_version), 0, 2)));

        $_dirname = trailingslashit(dirname(__FILE__));
        $_urlname = plugin_dir_url(__FILE__);

        define('ACF_PATH', $_dirname);
        define('ACF_URL', $_urlname);

        require_once(ACF_PATH.'core/defaults.php');

        if (!defined('ACF_EOL')) {
            define('ACF_EOL', "\r\n");
        }

        if (is_admin()) {
            require_once(ACF_PATH.'core/admin.php');
        }

        if (defined('DOING_AJAX') && DOING_AJAX) {
            require_once(ACF_PATH.'front/ajax.php');
            $this->ajax = new acf_ajax();
        }

        add_action('plugins_loaded', array(&$this, 'init_plugin_settings'), 9);
        add_action('wp', array(&$this, 'control_load'));
    }

    public function control_load() {
        if (!is_admin()) {
            add_action('wp_print_footer_scripts', array(&$this, 'embed_ajax_form'), 1000);
            add_action('wp_head', array(&$this, 'embed_styles'));
        }
    }


    public function init_plugin_settings() {
        $_d = new acf_defaults();

        $this->settings = get_option('ajax-contact-form');
        $this->styler = get_option('ajax-contact-form-styler');

        if (!is_array($this->settings)) {
            $this->settings = $_d->settings;
            update_option('ajax-contact-form', $this->settings);
        } else if ($this->settings['__build__'] != $_d->settings['__build__']) {
            $this->settings = $_d->upgrade($this->settings);
            update_option('ajax-contact-form', $this->settings);
        }

        define('AJAX_CONTACT_FORM', $this->settings['__version__']);

        do_action('acf_init_plugin_settings');
    }

    public function get($name) {
        return $this->settings[$name];
    }

    public function set($name, $value) {
        $this->settings[$name] = $value;
    }

    public function save() {
        update_option('ajax-contact-form', $this->settings);
    }
    public function embed_styles() {
        $_load_css = apply_filters('acf_embed_styles', true);

        if ($_load_css) {
            wp_enqueue_style('acf-fblb', ACF_URL.'css/style-front.css');
            do_action('acf_embed_styles_css');
        }
    }

    public function embed_ajax_form() {
        do_action('acf_embed_contact_slider_before');
        do_action('acf_embed_contact_slider_before_js');

        require_once(ACF_PATH.'front/build.php');

        do_action('acf_embed_contact_slider_after_js');
        do_action('acf_embed_contact_slider_after');
    }
}

global $acf_core_loader;
$acf_core_loader = new acf_loader();

?>