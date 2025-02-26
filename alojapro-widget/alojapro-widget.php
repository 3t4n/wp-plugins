<?php
/**
 * Plugin Name: Alojapro Booking Engine
 * Plugin URI: https://www.alojapro.com/#alojapro-widget
 * Description: Widget de reservas Alojapro
 * Version: 2.0.6
 * Author: Alojapro
 * Author URI: https://www.alojapro.com
 */

require_once __DIR__ . "/src/Alojapro_OptionsPage.php";
require_once __DIR__ . "/src/Alojapro_Shortcode.php";
require_once __DIR__ . "/src/Alojapro_TemplateManager.php";
require_once __DIR__ . "/src/alojapro-integration-wp.php";

if (!defined('ALOJAPRO_PLUGIN_BASE_URL')) {
    define('ALOJAPRO_PLUGIN_BASE_URL', plugin_dir_url(__FILE__));
}
if (!defined('ALOJAPRO_PLUGIN_BASE_PATH')) {
    define('ALOJAPRO_PLUGIN_BASE_PATH', plugin_dir_path(__FILE__));
}
if (!defined('ALOJAPRO_ASSETS_VERSION')) {
    define('ALOJAPRO_ASSETS_VERSION', '1.0.0');
}

if (is_admin()) {
    Alojapro_OptionsPage::instance();
}

Alojapro_Shortcode::instance();

global $pagenow;
if (!is_admin() && ($pagenow != 'wp-login.php')) {
    add_action('init', 'alojapro_loadScripts');
}

function alojapro_loadScripts()
{
    alojapro_registerScript();
    alojapro_enqueueScript();
    alojapro_enqueueStyle();
}

function alojapro_registerScript()
{
    $lang = (defined('ICL_LANGUAGE_CODE')) ? ICL_LANGUAGE_CODE : get_locale();
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), ALOJAPRO_ASSETS_VERSION, true);
    wp_register_script('bootstrap_js', ALOJAPRO_PLUGIN_BASE_URL . 'js/bootstrap/bootstrap_v5-3-3.bundle.min.js', array(), ALOJAPRO_ASSETS_VERSION, true);
    wp_register_script('datepickerlang', ALOJAPRO_PLUGIN_BASE_URL . 'js/datepicker-lang/datepicker-' . $lang . '.js', array('jquery', 'jquery-ui-datepicker'), ALOJAPRO_ASSETS_VERSION, true);
    wp_register_script('alojapro_widget', ALOJAPRO_PLUGIN_BASE_URL . 'js/alojapro_widget.js', array('jquery', 'jquery-ui-datepicker', 'jquery-ui-dialog'), ALOJAPRO_ASSETS_VERSION, true);
}

function alojapro_enqueueScript()
{
    //add_bootstrap_ver('js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap_js');
    wp_enqueue_script('datepickerlang');
    wp_enqueue_script('alojapro_widget');
}


function alojapro_enqueueStyle()
{
    //add_bootstrap_ver('css');
    wp_enqueue_style('bootstrap_css', ALOJAPRO_PLUGIN_BASE_URL . 'css/bootstrap/bootstrap_v5-3-3.min.css', array(), ALOJAPRO_ASSETS_VERSION, 'all');
    wp_enqueue_style('fontawesome', ALOJAPRO_PLUGIN_BASE_URL . 'css/font-awesome/css/all.css', array(), ALOJAPRO_ASSETS_VERSION, 'all');
    wp_enqueue_style('jqueryui', ALOJAPRO_PLUGIN_BASE_URL . 'css/jquery-ui.css', array(), ALOJAPRO_ASSETS_VERSION, 'all');
    add_custom_styles();
}

/* function add_bootstrap_ver($extension) {
    
    $customProperties = get_option('alojapro_settings');
    
    switch ($extension) {
        case 'css':
            if ($customProperties['bootstrapVer'] == 0) {
                wp_enqueue_style('bootstrap_css', ALOJAPRO_PLUGIN_BASE_URL . 'css/bootstrap/bootstrap_v4-6-2.min.css', array(), ALOJAPRO_ASSETS_VERSION, 'all');
            } else {
                wp_enqueue_style('bootstrap_css', ALOJAPRO_PLUGIN_BASE_URL . 'css/bootstrap/bootstrap_v5-3-3.min.css', array(), ALOJAPRO_ASSETS_VERSION, 'all');
            }
            break;
        case 'js':
            if ($customProperties['bootstrapVer'] == 0) {
                wp_register_script('bootstrap_js', ALOJAPRO_PLUGIN_BASE_URL . 'js/bootstrap/bootstrap_v4-6-2.bundle.min.js', array('jquery'), ALOJAPRO_ASSETS_VERSION, true);
            } else {
                wp_register_script('bootstrap_js', ALOJAPRO_PLUGIN_BASE_URL . 'js/bootstrap/bootstrap_v5-3-3.bundle.min.js', array('jquery'), ALOJAPRO_ASSETS_VERSION, true);
            }
            wp_enqueue_script('bootstrap_js');
            break;
    }
} */

function add_custom_styles() {
    $customProperties = get_option('alojapro_settings');

    //var_dump($customProperties);

    if (isset($customProperties['customLayout']) && $customProperties['customLayout'] == 'modern') {
        wp_enqueue_style('alojapro_widgetcss_modern', ALOJAPRO_PLUGIN_BASE_URL . 'css/alojapro_widget_modern.css', array(), ALOJAPRO_ASSETS_VERSION, 'all');
        $css_file = 'alojapro_widgetcss_modern';
    } else {
        wp_enqueue_style('alojapro_widgetcss', ALOJAPRO_PLUGIN_BASE_URL . 'css/alojapro_widget.css', array(), ALOJAPRO_ASSETS_VERSION, 'all');
        $css_file = 'alojapro_widgetcss';
    }

    if (isset($customProperties['customPrimaryColor']) && $customProperties['customPrimaryColor'] !== false && 
        isset($customProperties['customSecondaryColor']) && $customProperties['customSecondaryColor'] !== false) {
        
        $style = (isset($customProperties['customStyle']) && $customProperties['customStyle'] == 0) ? 'unset' : '25px';
        
        $css = ":root { --custom-primary-color: " . $customProperties['customPrimaryColor'] . "; --custom-secondary-color: " . $customProperties['customSecondaryColor'] . "; --custom-style: " . $style . "; }";
    } else {
        // Si no hay colores definidos se pone en negro y estilo flat
        $css = ":root { --custom-primary-color: #000000; --custom-secondary-color: #000000; --custom-style: unset; }";
    }

    wp_add_inline_style($css_file, $css);
}


/**
 * Load textdomain
 */
function alojaproWidget_theme_setup(){
    load_theme_textdomain('alojapro-widget', ALOJAPRO_PLUGIN_BASE_PATH . '/languages');
}
add_action('after_setup_theme', 'alojaproWidget_theme_setup');

add_action('init', function () {
    load_textdomain('alojapro-widget', WP_PLUGIN_DIR . '/alojapro-widget/languages/' . get_locale() . '.mo');
});