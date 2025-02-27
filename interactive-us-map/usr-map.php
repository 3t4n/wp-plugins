<?php
/*
Plugin Name: US Regional Map
Plugin URI: https://wordpress.org/plugins/interactive-us-map/
Description: Customize each region (colors, link, etc) through the map dashboard and use the shortcode in your page.
Version: 2.7
Author: WP Map Plugins
Author URI: https://www.wpmapplugins.com/
Text Domain: usr-map
Domain Path: /languages
*/

declare(strict_types=1);

namespace USRMap;

use USRMap\USRMap;

if (!defined('USRMAP_VERSION')) {
    define('USRMAP_VERSION', '2.7');
}

if (!defined('USRMAP_DIR')) {
    define('USRMAP_DIR', plugin_dir_path(__FILE__));
}

if (!defined('USRMAP_URL')) {
    define('USRMAP_URL', plugin_dir_url(__FILE__));
}

(new USRMap())->init();

class USRMap {

    const PLUGIN_NAME = 'US Regional Map';

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
        add_shortcode('usr_map', array($this, 'USRMapShortcode'));
    }

    private function initOptions() {
        $defaultOptions = $this->getDefaultOptions();
        $this->options  = get_option('usr_map');

        if (current_user_can( 'manage_options' )){
            $this->updateOptions($defaultOptions);
        }

        if (!is_array($this->options)) {
            $this->options = $defaultOptions;
        }

        $this->prepareOptionsListForTpl();
    }

    public function addJsConfigInFooter() {
        echo wp_kses_post('<span id="tipusrmap" style="margin-top:-32px"></span>');
        include __DIR__ . "/includes/js-config.php";
    }

    public function addOptionsPage() {
        add_menu_page(
            USRMap::PLUGIN_NAME,
            USRMap::PLUGIN_NAME,
            'manage_options',
            'usr-map',
            array($this, 'optionsScreen'),
            USRMAP_URL . 'public/images/map-icon.png'
        );
    }

    /**
     * @return array
     */
    private function getDefaultOptions() {
        $default = array(
            'usrbrdrclr'    => '#6B8B9E',
            'usrshowvisns'  => 1,
            'usrvisns'      => '#666666',
            'usrvisnshover' => '#113e6b',
            'usrshowlakes'  => 1,
            'usrlakesfill'  => '#66CCFF',
        );

        $areas = array(
            'STANDARD FEDERAL REGION [1]','STANDARD FEDERAL REGION [2]','STANDARD FEDERAL REGION [3]','STANDARD FEDERAL REGION [4]','STANDARD FEDERAL REGION [5]','STANDARD FEDERAL REGION [6]','STANDARD FEDERAL REGION [7]','STANDARD FEDERAL REGION [8]','STANDARD FEDERAL REGION [9]','STANDARD FEDERAL REGION [10]'
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
        if (isset($_POST['usr_map']) && isset($_POST['submit-clrs'])) {
            $i = 1;
            while (isset($_POST['url_' . $i])) {
                $_POST['upclr_' . $i]  = $_POST['upclr_all'];
                $_POST['ovrclr_' . $i] = $_POST['ovrclr_all'];
                $_POST['dwnclr_' . $i] = $_POST['dwnclr_all'];

                $i++;
            }

            update_option('usr_map',$_POST);

            $this->options = $_POST;
        }

        if (isset($_POST['usr_map']) && isset($_POST['submit-url'])) {
            $i = 1;
            while (isset($_POST['url_' . $i])) {
                $_POST['url_' . $i]  = $_POST['url_all'];
                $_POST['turl_' . $i] = $_POST['turl_all'];

                $i++;
            }

            update_option('usr_map',$_POST);

            $this->options = $_POST;
        }

        if (isset($_POST['usr_map']) && isset($_POST['submit-info'])) {
            $i = 1;
            while (isset($_POST['url_' . $i])) {
                $_POST['info_' . $i] = $_POST['info_all'];

                $i++;
            }

            update_option('usr_map',$_POST);

            $this->options = $_POST;
        }

        if (isset($_POST['usr_map']) && !isset($_POST['preview_map'])) {
            update_option('usr_map',$_POST);

            $this->options = $_POST;
        }

        if (isset($_POST['usr_map']) && isset($_POST['restore_default'])) {
            update_option('usr_map', $defaultOptions);

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

    public function USRMapShortcode() {
        wp_enqueue_style('usr-map-style-frontend', USRMAP_URL . 'public/css/map-style.css', false, '1.0', 'all');
        wp_enqueue_script('usr-map-interact', USRMAP_URL . 'public/js/map-interact.js?t=' . time(), array('jquery'), 10, '1.0', true);

        ob_start();

        include __DIR__ . "/includes/map.php";
        include __DIR__ . "/includes/js-config.php";

        return ob_get_clean();
    }

    public function optionsScreen() {
        include __DIR__ . "/includes/admin.php";
    }

    public function initAdminScript() {
        if ( current_user_can( 'manage_options') && ( esc_attr(isset($_GET['page'])) && esc_attr($_GET['page']) == 'usr-map') ):
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_style('thickbox');
            wp_enqueue_script('thickbox');
            wp_enqueue_script('media-upload');

            wp_enqueue_style('usr-map-dashboard-style', USRMAP_URL . 'public/css/dashboard-style.css', false, '1.0', 'all');
            wp_enqueue_style('usr-map-style', USRMAP_URL . 'public/css/map-style.css', false, '1.0', 'all');
            wp_enqueue_style('wp-tinyeditor', USRMAP_URL . 'public/css/tinyeditor.css', false, '1.0', 'all');

            wp_enqueue_script('usr-map-interact', USRMAP_URL . 'public/js/map-interact.js?t=' . time(), array('jquery'), 10, '1.0', true);
            wp_enqueue_script('usr-map-tiny.editor', USRMAP_URL . 'public/js/editor/tinymce.min.js', 10, '1.0', true);
            wp_enqueue_script('usr-map-script', USRMAP_URL . 'public/js/editor/scripts.js', array('wp-color-picker'), false, true);
        endif;
    }

    public function addSpanTag()
    {
        echo wp_kses_post('<span id="tipusrmap"></span>');
    }
    
    public function loadTextdomain() {
        load_plugin_textdomain( 'usr-map', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }
}
