<?php

/**
 * Plugin Name:The Events Calendar Events Notification Bar Addon
 * Description: Events Notification Bar & Popup Addon For The Events Calendar
 * Author: Cool Plugins
 * Author URI: http://coolplugins.net
 * Version:1.1
 * License: GPL2
 * Text Domain: enba
 * Domain Path: languages
 *
 * @package Event_Notification_Bar_Addon
 */

/*
Copyright (C) 2016  CoolPlugins contact@coolplugins.net

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if (!defined('ABSPATH')) {
    exit;
}

if (defined('ENBA_VERSION')) {
    return;
}

define('ENBA_VERSION', '1.1');
define('ENBA_FILE', __FILE__);
define('ENBA_PATH', plugin_dir_path(ENBA_FILE));
define('ENBA_URL', plugin_dir_url(ENBA_FILE));

register_activation_hook(ENBA_FILE, array('Event_Notification_Bar_Addon', 'activate'));
register_deactivation_hook(ENBA_FILE, array('Event_Notification_Bar_Addon', 'deactivate'));

/**
 * Class Event_Notification_Bar_Addon
 */
final class Event_Notification_Bar_Addon
{

    /**
     * Plugin instance.
     *
     * @var Event_Notification_Bar_Addon
     * @access private
     */
    private static $instance = null;

    /**
     * Get plugin instance.
     *
     * @return Event_Notification_Bar_Addon
     * @static
     */
    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Constructor.
     *
     * @access private
     */
    private function __construct()
    {
        add_action('init', array($this, 'enba_notice_required_plugin'));
        $this->enba_includes();

        /*** Event Notification Bar Setting Page Link inside Plugins List */
		add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this,'enba_settings_page'));
               
    }
   
    /**
     * This function is used to display notice if the required plugin is not activated.
     */
    public function enba_notice_required_plugin()
    {
        // load_plugin_textdomain('ect', false, basename(dirname(__FILE__)) . '/languages/');
        if (! class_exists('Tribe__Events__Main') or ! defined('Tribe__Events__Main::VERSION')) {
            add_action('admin_notices', array( $this, 'enba_Install_ECT_Notice' ));
        }
        else{
            add_action('admin_init','enba_plugin_redirect');
        }

        
    }
    // notice for installation TEC parent plugin installation
    public function enba_Install_ECT_Notice()
    {
        if (current_user_can('activate_plugins')) {
            $url = 'plugin-install.php?tab=plugin-information&plugin=the-events-calendar&TB_iframe=true';
            $title = __('The Events Calendar', 'tribe-events-ical-importer');
            $plugin_info = get_plugin_data( __FILE__ , true, true );
            echo '<div class="error CTEC_Msz"><p>' . sprintf(__('In order to use <strong>%s</strong> plugin, please install and activate the latest version of <a href="%s" class="thickbox" title="%s">%s</a>', 'tecspb'),$plugin_info['Name'], esc_url($url), esc_attr($title), esc_attr($title)) . '</p></div>';
            deactivate_plugins(__FILE__);
        }
    }


    /**
     * Load plugin function files here.
     */
    public function enba_includes()
    {
        if(is_admin()){
            require_once __DIR__ . "/admin/events-addon-page/events-addon-page.php";
            cool_plugins_events_addon_settings_page('the-events-calendar','cool-plugins-events-addon' ,'📅 Events Addons For The Events Calendar');
            
            require_once dirname(__FILE__) . '/includes/admin/enba-feedback-notice.php';
            new ENBAFeedbackNotice();
        }
        require_once dirname(__FILE__) . '/includes/enba-class-settings-api.php';
        require_once dirname(__FILE__) . '/includes/enba-settings.php';
        new ENBA_Settings();
        require_once dirname(__FILE__) . '/includes/enba-functions.php';
        require_once dirname(__FILE__) . '/includes/enba-html.php';
        new ENBA_HTML();     
    }

    /**
     * Code you want to run when all other plugins loaded.
     */
   /*  public function init()
    {
        load_plugin_textdomain('wp-plugin-singleton', false, ENBA_FILE . 'languages');
    } */

    /*** Add links in plugin list page */
    public function enba_settings_page($links){
        $links[] = '<a style="font-weight:bold" href="'. esc_url( get_admin_url(null, 'admin.php?page=event_notification_bar') ) .'">Settings</a>';
        return $links;
    }
        
    /**
     * Run when activate plugin.
     */
    public static function activate()
    {
        update_option("enba-installDate",date('Y-m-d h:i:s') );
        update_option("enba-ratingDiv","no");
        update_option('enba_do_activation_redirect', true);
    }

    /**
     * Run when deactivate plugin.
     */
    public static function deactivate()
    {
    }
}

function Event_Notification_Bar_Addon()
{
    return Event_Notification_Bar_Addon::get_instance();
}

$GLOBALS['Event_Notification_Bar_Addon'] = Event_Notification_Bar_Addon();