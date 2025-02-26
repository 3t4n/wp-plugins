<?php

namespace Rankology_Stats\Detailed_Data;

use Rankology_Stats\Detailed_Data\Services\Admin\AdminManager;
use RANKOLOGY_STATS\Option;
if (!\defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly
\define('RANKOLOGY_STATS_DETAILED_DATA_SITE', home_url('/'));
\define('RANKOLOGY_STATS_DETAILED_DATA_VERSION', '1.2.0');
\define('RANKOLOGY_STATS_DETAILED_DATA_PATH', plugin_dir_path(__FILE__));
\define('RANKOLOGY_STATS_DETAILED_DATA_URL', plugins_url('', __FILE__));
class Rankology_Stats_Detailed_Data_plugin
{
    /**
     * Plugin instance.
     *
     * @see get_instance()
     * @type object
     */
    protected static $instance = null;
    /**
     * URL to this plugin's directory.
     *
     * @type string
     */
    public $plugin_url = '';
    /**
     * Path to this plugin's directory.
     *
     * @type string
     */
    public $plugin_path = '';
    /**
     * Options
     *
     * @type array
     */
    public $options = array();
    /**
     * Access this plugin’s working instance
     *
     * @wp-hook plugins_loaded
     * @return  object of this class
     * 
     */
    public static function get_instance()
    {
        null === self::$instance and self::$instance = new self();
        return self::$instance;
    }
    /**
     * Used for regular plugin work.
     *
     * @wp-hook plugins_loaded
     * @return  void
     * @throws Exception
     * 
     */
    public function plugin_setup()
    {
        //Get plugin Data information
        if (!\function_exists('get_plugin_data')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        $plugin_data = get_plugin_data(__FILE__);
        //Set Default Plugin information
        $this->plugin_url = plugins_url('', __FILE__);
        $this->plugin_path = plugin_dir_path(__FILE__);
        //Set Default Option Actions Plugin
        $this->options = get_option('rankologystats_detailed_data_settings');
        //Load i18n TextDomain
        $this->load_language($plugin_data['TextDomain']);
        // Check required plugin
        if (!\function_exists('is_plugin_active')) {
            include_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        //Load Plugin File autoload
        include_once \dirname(__FILE__) . '/vendor/autoload.php';
        include_once \dirname(__FILE__) . '/src/Helper.php';
        include_once \dirname(__FILE__) . '/src/Services/Abstracts/AbstractWidget.php';
        include_once \dirname(__FILE__) . '/src/Services/Admin/AdminManager.php';
        include_once \dirname(__FILE__) . '/src/Services/Model/ComparisonModel.php';
        //
        include_once \dirname(__FILE__) . '/src/Services/Widgets/Widget/ComparisonWidget.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/Widget/LatestVisitorsWidget.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/Widget/OnlineUsersWidget.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/Widget/PostVisitorsWidget.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/Widget/TopBrowsersWidget.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/Widget/TopCountriesWidget.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/Widget/TopPlatformsWidget.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/Widget/TopReferringWidget.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/Widget/TopVisitorsWidget.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/Widget/VisitorsMapWidget.php';
        //
        include_once \dirname(__FILE__) . '/src/Services/Widgets/MetaboxManager.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/PostTypeManager.php';
        include_once \dirname(__FILE__) . '/src/Services/Widgets/TaxonomyManager.php';

        //Start Rankology Stats Detailed Data
        new AdminManager($plugin_data, $this->plugin_url, $this->plugin_path);
    }
    /**
     * Admin notices
     *
     * @return string
     * 
     * @see plugin_setup()
     */
    public function admin_notices_core_not_active()
    {
        //
    }
    /**
     * Loads translation file.
     * Accessible to other classes to load different language files
     *
     * @wp-hook init
     * @param string $domain
     * @return  void
     * 
     */
    public function load_language($domain)
    {
        load_plugin_textdomain($domain, \false, \basename(\dirname(__FILE__)) . '/languages');
    }
    /**
     * Activation Hook
     */
    public static function activate()
    {
        //
        if (\class_exists(Option::class) && Option::get('visitors_log') == \false) {
            Option::update('visitors_log', \true);
        }
    }
    /**
     * On uninstallation Method
     */
    public static function uninstall()
    {
        delete_option('rankologystats_detailed_data_settings');
    }
}
add_action('init', array(\Rankology_Stats\Detailed_Data\Rankology_Stats_Detailed_Data_plugin::get_instance(), 'plugin_setup'), 10);
register_activation_hook(__FILE__, array('\\Rankology_Stats\\Detailed_Data\\Rankology_Stats_Detailed_Data_plugin', 'activate'));
register_uninstall_hook(__FILE__, array('\\Rankology_Stats\\Detailed_Data\\Rankology_Stats_Detailed_Data_plugin', 'uninstall'));
