<?php

namespace Rankology_Stats\Detailed_Data\Services\Admin;

use Rankology_Stats\Detailed_Data\Helper;
use Rankology_Stats\Detailed_Data\Services\Widgets\MetaboxManager;
use Rankology_Stats\Detailed_Data\Services\Widgets\PostTypeManager;
use Rankology_Stats\Detailed_Data\Services\Widgets\TaxonomyManager;
class AdminManager
{
    /**
     * The single instance of the class.
     */
    protected static $_instance = null;
    /**
     * Plugin Version
     * @type string
     */
    public static $plugin_version;
    /**
     * Plugin textDomain
     * @type string
     */
    public static $textdomain;
    /**
     * Plugin Url
     * @type string
     */
    public static $plugin_url;
    /**
     * Plugin base Path
     * @type string
     */
    public static $plugin_path;
    /**
     * Plugin Option
     * @type string
     */
    public static $plugin_option;
    /**
     * Rankology_Stats_Actions constructor.
     *
     * @param $plugin_data
     * @param $plugin_url
     * @param $plugin_path
     */
    public function __construct($plugin_data, $plugin_url, $plugin_path)
    {
        //Get Plugin Option
        self::$plugin_option = get_option('rankologystats_detailed_data_settings');
        //Set Plugin Data
        self::$textdomain = $plugin_data['TextDomain'];
        self::$plugin_version = $plugin_data['Version'];
        self::$plugin_url = $plugin_url;
        self::$plugin_path = $plugin_path;
        // load admin assets
        add_action('admin_enqueue_scripts', array($this, 'load_admin_assets'));
        // Load Classes
        $MetaboxManager = new MetaboxManager();
        $MetaboxManager->init();
        new TaxonomyManager();
        new PostTypeManager();
    }
    /**
     * Load admin assets
     */
    public function load_admin_assets()
    {
        // Load Admin Style
        wp_enqueue_style('rankology-stats-detailed-data', Helper::getPluginAssetUrl('css/admin.css'), \false);
    }
}
