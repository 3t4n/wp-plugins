<?php
/*
Plugin Name: World Map
Plugin URI: https://www.wpmapplugins.com/interactive-world-map-wordpress-plugin.html
Description: Customize each continent (colors, link, etc) through the map dashboard and use the shortcode in your page.
Version: 2.7
Author: WP Map Plugins
Author URI: https://www.wpmapplugins.com/
Text Domain: wd-map
Domain Path: /languages
*/

declare(strict_types=1);

namespace WDMap;

use WDMap\WDMap;

if (!defined('WDMAP_VERSION')) {
    define('WDMAP_VERSION', '2.7');
}

if (!defined('WDMAP_DIR')) {
    define('WDMAP_DIR', plugin_dir_path(__FILE__));
}

if (!defined('WDMAP_URL')) {
    define('WDMAP_URL', plugin_dir_url(__FILE__));
}

(new WDMap())->init();

class WDMap {

    const PLUGIN_NAME = 'World Map';

    private $options = null;

    public function init() {
        $this->initActions();
        $this->initShortcodes();
        $this->initOptions();
    }

    private function initActions() {
    	if( !function_exists('wp_get_current_user') ) {
            include(ABSPATH . "wp-includes/pluggable.php");
        }
        add_action( 'admin_menu', array($this, 'addOptionsPage') );
        add_action( 'admin_footer', array($this, 'addJsConfigInFooter') );
        add_action( 'wp_footer', array($this, 'addSpanTag') );
        add_action( 'admin_enqueue_scripts', array($this, 'initAdminScript') );
        add_action( 'init', array($this, 'loadTextdomain') );
    }

    private function initShortcodes() {
        add_shortcode('wd_map', array($this, 'WDMapShortcode'));
    }

    private function initOptions() {
        $defaultOptions = $this->getDefaultOptions();
        $this->options  = get_option('wd_map');

        if (current_user_can( 'manage_options' )){
            $this->updateOptions($defaultOptions);
        }

        if (!is_array($this->options)) {
            $this->options = $defaultOptions;
        }

        $this->prepareOptionsListForTpl();
    }

    public function addJsConfigInFooter() {
        echo wp_kses_post('<span id="tipwdmap" style="margin-top:-32px"></span>');
        include __DIR__ . "/includes/js-config.php";
    }

    public function addOptionsPage() {
        add_menu_page(
            WDMap::PLUGIN_NAME,
            WDMap::PLUGIN_NAME,
            'manage_options',
            'wd-map',
            array($this, 'optionsScreen'),
            WDMAP_URL . 'public/images/map-icon.png'
        );
    }

    /**
     * @return array
     */
    private function getDefaultOptions() {
        $default = array(
            'wdbrdrclr'    => '#6B8B9E',
            'wdshowvisns'  => 1,
            'wdvisns'      => '#666666',
            'wdvisnshover' => '#113e6b',
        );

        $areas = array(
            'AFRICA', 'ASIA', 'EUROPE', 'NORTH AMERICA', 'OCEANIA', 'SOUTH AMERICA'
        );

        foreach ($areas as $k => $area) {
            $default['upclr_' . ($k + 1)]  = '#E0F3FF';
            $default['ovrclr_' . ($k + 1)] = '#8FBEE8';
            $default['dwnclr_' . ($k + 1)] = '#477CB2';
            $default['url_' . ($k + 1)]    = '';
            $default['turl_' . ($k + 1)]   = '_self';
            $default['info_' . ($k + 1)]   = $area;
            $default['enbl_' . ($k + 1)]   = 1;
        }

        return $default;
    }

    private function updateOptions(array $defaultOptions) {
        if (isset($_POST['wd_map']) && isset($_POST['submit-clrs'])) {
            $i = 1;
            while (isset($_POST['url_' . $i])) {
                $_POST['upclr_' . $i]  = $_POST['upclr_all'];
                $_POST['ovrclr_' . $i] = $_POST['ovrclr_all'];
                $_POST['dwnclr_' . $i] = $_POST['dwnclr_all'];

                $i++;
            }

            update_option('wd_map',$_POST);

            $this->options = $_POST;
        }

        if (isset($_POST['wd_map']) && isset($_POST['submit-url'])) {
            $i = 1;
            while (isset($_POST['url_' . $i])) {
                $_POST['url_' . $i]  = $_POST['url_all'];
                $_POST['turl_' . $i] = $_POST['turl_all'];

                $i++;
            }

            update_option('wd_map',$_POST);

            $this->options = $_POST;
        }

        if (isset($_POST['wd_map']) && isset($_POST['submit-info'])) {
            $i = 1;
            while (isset($_POST['url_' . $i])) {
                $_POST['info_' . $i] = $_POST['info_all'];

                $i++;
            }

            update_option('wd_map',$_POST);

            $this->options = $_POST;
        }

        if (isset($_POST['wd_map']) && !isset($_POST['preview_map'])) {
            update_option('wd_map',$_POST);

            $this->options = $_POST;
        }

        if (isset($_POST['wd_map']) && isset($_POST['restore_default'])) {
            update_option('wd_map', $defaultOptions);

            $this->options = $defaultOptions;
        }
    }

    private function prepareOptionsListForTpl() {
        $this->options['prepared_list'] = array();
        $i                              = 1;
        while (isset($this->options['url_' . $i])) {
            $this->options['prepared_list'][] = array(
                'index'  => $i,
                'info_'  => $this->options['info_' . $i],
                'url'    => $this->options['url_' . $i],
                'turl'   => $this->options['turl_' . $i],
                'upclr'  => $this->options['upclr_' . $i],
                'ovrclr' => $this->options['ovrclr_' . $i],
                'dwnclr' => $this->options['dwnclr_' . $i],
                'enbl'   => isset($this->options['enbl_' . $i]),
            );

            $i++;
        }
    }

    public function WDMapShortcode() {
        wp_enqueue_style('wd-map-style-frontend', WDMAP_URL . 'public/css/map-style.css', false, '1.0', 'all');
        wp_enqueue_script('wd-map-interact', WDMAP_URL . 'public/js/map-interact.js?t=' . time(), array('jquery'), 10, '1.0', true);

        ob_start();

        include __DIR__ . "/includes/map.php";
        include __DIR__ . "/includes/js-config.php";

        return ob_get_clean();
    }

    public function optionsScreen() {
        include __DIR__ . "/includes/admin.php";
    }

    public function initAdminScript() {
        if ( current_user_can( 'manage_options') && ( esc_attr(isset($_GET['page'])) && esc_attr($_GET['page']) == 'wd-map') ):
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_style('thickbox');
            wp_enqueue_script('thickbox');
            wp_enqueue_script('media-upload');

            wp_enqueue_style('wd-map-dashboard-style', WDMAP_URL . 'public/css/dashboard-style.css', false, '1.0', 'all');
            wp_enqueue_style('wd-map-style', WDMAP_URL . 'public/css/map-style.css', false, '1.0', 'all');
            wp_enqueue_style('wp-tinyeditor', WDMAP_URL . 'public/css/tinyeditor.css', false, '1.0', 'all');

            wp_enqueue_script('wd-map-interact', WDMAP_URL . 'public/js/map-interact.js?t=' . time(), array('jquery'), 10, '1.0', true);
            wp_enqueue_script('wd-map-tiny.editor', WDMAP_URL . 'public/js/editor/tinymce.min.js', 10, '1.0', true);
            wp_enqueue_script('wd-map-script', WDMAP_URL . 'public/js/editor/scripts.js', array('wp-color-picker'), false, true);
        endif;
    }

    public function addSpanTag()
    {
        echo wp_kses_post('<span id="tipwdmap"></span>');
    }
    
    public function loadTextdomain() {
        load_plugin_textdomain( 'wd-map', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }
}
