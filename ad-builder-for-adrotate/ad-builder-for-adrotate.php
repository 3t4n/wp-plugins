<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
Plugin Name: Ad Builder for AdRotate
Plugin URI: https://broadstreetads.com
Description: The easiest way to build attractive ads for your advertising clients in the AdRotate plugin
Version: 1.0.0
Author: Broadstreet
Author URI: https://broadstreetads.com
*/

add_action('admin_init', array('AdBuilderForAdRotate', 'registerAdminScripts'));
add_action('wp_enqueue_scripts', array('AdBuilderForAdRotate', 'registerFrontendScripts'));

/**
 * This class is the core of Ad Widget
 */
class AdBuilderForAdRotate
{
    /**
     * The callback used to register the scripts
     */
    static function registerAdminScripts()
    {
        # Include thickbox on widgets page
        if($GLOBALS['pagenow'] == 'admin.php')
        {
            wp_enqueue_script('html-for-adrotate-main',  self::getBaseURL().'assets/widgets.js');
        }
    }

    /**
     * The callback used to register the scripts
     */
    static function registerFrontendScripts()
    {
        if (!is_admin()) {
            wp_enqueue_script('html-for-adrotate-analytics',  self::getBaseURL().'assets/analytics.js');            
        }
    }    

    /**
     * Get the base URL of the plugin installation
     * @return string the base URL
     */
    public static function getBaseURL()
    {
        return plugin_dir_url(__FILE__);
    }

    public static function getParkaveWidgetButton($widget, $just_button = false)
    {
        if ($just_button) {
            return '<div style="text-align: center;" id="' . $widget->get_field_id('w_parkave_button') . '"></div><p><a href="https://www.youtube.com/watch?v=QBTH4aF9vJ0&feature=emb_title" target="_blank">Learn more about ParkAve for news and magazine publishers.</a></p>';
        } else {
            return '<div style="background-color: #f7f7f7; border-radius: 4px; padding: 5px 10px; margin-bottom: 10px;"><p><strong>Impress advertising prospects with amazing banner styles.</strong> Click below to use it right here, for free. <a href="https://www.youtube.com/watch?v=QBTH4aF9vJ0&feature=emb_title" target="_blank">Watch a video explainer.</a></p><div style="text-align: center;" id="' . $widget->get_field_id('w_parkave_button') . '"></div><p>After creating a ParkAve ad, be sure to click "Save." below.</p></div>';
        }

    }
}