<?php

/**
 * Fired during plugin activation
 *
 * @link       https://rovidx.com
 * @since      1.0.0
 *
 * @package    Wp_Smart_Tv
 * @subpackage Wp_Smart_Tv/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Smart_Tv
 * @subpackage Wp_Smart_Tv/includes
 * @author     Rovidx Media <plugins@rovidx.com>
 */
class Wp_Smart_Tv_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        global $wp_version;
        
        $old_settings = get_option('rovidx_smart_tv_options');
        $new_roku_settings = [];
        $new_ad_settings = [];
        $req_php_ver = '7.2';
        $req_wp_ver = '5.2.0';
        
        if (version_compare(PHP_VERSION, $req_php_ver, '<')) { 
            $plugin_data = get_plugin_data(__FILE__, false);
            $message = $plugin_data['Name'] . ' ' . __('requires PHP')  . ' ' . $required_php_version . __(' or higher. Your PHP version is ') . phpversion() . '.';
            echo "<p>{$message}</p>";
            exit;
        }
        
        if (version_compare($wp_version, $req_wp_ver, '<')) { 
            $plugin_data = get_plugin_data(__FILE__, false);
            $message = $plugin_data['Name'] . ' ' . __('requires Wordpress')  . ' ' . $req_wp_ver . __(' or higher. Your version is ') . $wp_version . '.';
            echo "<p>{$message}</p>";
            exit;
        }
        
        // Transfer Roku Settings
        if (isset($old_settings['rovidx_smart_tv_roku_dfp_tvspecials_enabled'])) {
            $new_roku_settings['rovidx_smart_tv_roku_dfp_tvspecials_enabled'] = 'on';
            unset($old_settings['rovidx_smart_tv_roku_dfp_tvspecials_enabled']);
        }
        
        if (isset($old_settings['rovidx_smart_tv_roku_dfp_movies_enabled'])) {
            $new_roku_settings['rovidx_smart_tv_roku_dfp_movies_enabled'] = 'on';
            unset($old_settings['rovidx_smart_tv_roku_dfp_movies_enabled']);
        }
        
        if (isset($old_settings['rovidx_smart_tv_roku_dfp_shortform_enabled'])) {
            $new_roku_settings['rovidx_smart_tv_roku_dfp_shortform_enabled'] = 'on';
            unset($old_settings['rovidx_smart_tv_roku_dfp_shortform_enabled']);
        }
        
        if (isset($old_settings['rovidx_smart_tv_roku_dfp_series_enabled'])) {
            $new_roku_settings['rovidx_smart_tv_roku_dfp_series_enabled'] = 'on';
            unset($old_settings['rovidx_smart_tv_roku_dfp_series_enabled']);
        }
        
        if (isset($old_settings['rovidx_smart_tv_no_posts'])) {
            $new_roku_settings['rovidx_smart_tv_no_posts'] = $old_settings['rovidx_smart_tv_no_posts'];
            unset($old_settings['rovidx_smart_tv_no_posts']);
        }
        
        if (isset($old_settings['rovidx_smart_tv_roku_dfp_recipes_enabled'])) {
            $new_roku_settings['rovidx_smart_tv_roku_dfp_recipes_enabled'] = 'on';
            unset($old_settings['rovidx_smart_tv_roku_dfp_recipes_enabled']);
        }
        
        // Transfer Ad Settings
        if (isset($old_settings['rovidx_smart_tv_ad_feed_type'])) {
            $new_ad_settings['rovidx_smart_tv_ad_feed_type'] = $old_settings['rovidx_smart_tv_ad_feed_type'];
            unset($old_settings['rovidx_smart_tv_ad_feed_type']);
        }
        
        if (isset($old_settings['rovidx_smart_tv_roku_midroll_timer'])) {
            $new_ad_settings['rovidx_smart_tv_roku_midroll_timer'] = $old_settings['rovidx_smart_tv_roku_midroll_timer'];
            unset($old_settings['rovidx_smart_tv_roku_midroll_timer']);
        }
        
        // Write new options
        $old_set = update_option( 'rovidx_smart_tv_options', $old_settings );
        $new_roku = update_option( 'rovidx_smart_tv_roku_options', $new_roku_settings);
        $new_ad = update_option( 'rovidx_smart_tv_ad_options', $new_ad_settings);

	}
}