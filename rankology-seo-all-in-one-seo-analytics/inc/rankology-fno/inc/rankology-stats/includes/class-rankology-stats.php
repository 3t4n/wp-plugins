<?php

# Exit if accessed directly
defined('ABSPATH') || exit;

/**
 * Main bootstrap class for Rankology Stats
 *
 * @package Rankology Stats
 */
final class RANKOLOGY_Stats
{
    /**
     * Holds various class instances
     *
     * @var array
     */
    private $container = array();

    /**
     * The single instance of the class.
     *
     * @var Rankology Stats
     */
    protected static $_instance = null;

    /**
     * Main Rankology Stats Instance.
     * Ensures only one instance of Rankology Stats is loaded or can be loaded.
     *
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * RANKOLOGY_Stats constructor.
     */
    public function __construct()
    {
        /**
         * Check PHP Support
         */
        if (!$this->require_php_version()) {
            add_action('admin_notices', array($this, 'php_version_notice'));
            return;
        }

        /**
         * Plugin Loaded Action
         */
        add_action('plugins_loaded', array($this, 'plugin_setup'), 10);

        /**
         * rankology-stats loaded
         */
        do_action('rankology_stats_loaded');
    }

    /**
     * Cloning is forbidden.
     *
     * 
     */
    public function __clone()
    {
        \RANKOLOGY_STATS\Helper::doing_it_wrong(__CLASS__, esc_html__('Cloning is forbidden.', 'rankology-stats'));
    }

    /**
     * Magic getter to bypass referencing plugin.
     *
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->container[$key];
    }

    /**
     * Constructors plugin Setup
     *
     * @throws Exception
     */
    public function plugin_setup()
    {
        /**
         * Load Text Domain
         */
        add_action('init', array($this, 'load_textdomain'));

        try {

            /**
             * Include Require File
             */
            $this->includes();

            /**
             * Display Admin Notices
             */
            add_action('admin_notices', array('\\RANKOLOGY_STATS\\Helper', 'displayAdminNotices'));

            /**
             * instantiate Plugin
             */
            $this->instantiate();

        } catch (Exception $e) {
            self::log($e->getMessage());
        }
    }

    /**
     * Includes plugin files
     */
    public function includes()
    {
        // third-party Libraries
        require_once RANKOLOGY_STATS_DIR . 'includes/vendor/autoload.php';

        // Create the plugin upload directory in advance.
        $this->create_upload_directory();

        // Utility classes.
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-db.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-timezone.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-option.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-user.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-helper.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-mail.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-menus.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-meta-box.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-rest-api.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-purge.php';

        // Traffic Class
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-country.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-user-online.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-user-agent.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-ip.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-geoip.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-pages.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-visitor.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-historical.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-visit.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-referred.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-search-engine.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-exclusion.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-hits.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-privacy-exporter.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-privacy-erasers.php';

        // Ajax area
        require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-template.php';

        // Admin classes
        if (is_admin()) {

            require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-install.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-ajax.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-dashboard.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-export.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-network.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-assets.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-notices.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-post.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-user.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-taxonomy.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/class-rankology-stats-admin-privacy.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/TinyMCE/class-rankology-stats-tinymce.php';

            // Admin Pages List
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-settings.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-optimization.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-overview.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-online.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-hits.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-refer.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-words.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-searches.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-pages.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-visitors.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-country.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-taxonomies.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-authors.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-browsers.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-platforms.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-top-visitors-today.php';
            require_once RANKOLOGY_STATS_DIR . 'includes/admin/pages/class-rankology-stats-admin-page-exclusions.php';
        }

        // WordPress ShortCode and Widget
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-shortcode.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-widget.php';

        // Meta Box List
        \RANKOLOGY_STATS\Meta_Box::includes();

        // Rest-Api
        require_once RANKOLOGY_STATS_DIR . 'includes/api/v2/class-rankology-stats-api-hit.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/api/v2/class-rankology-stats-api-meta-box.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/api/v2/class-rankology-stats-api-check-user-online.php';

        // WordPress Cron
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-schedule.php';

        // Front Class.
        if (!is_admin()) {
            require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-frontend.php';
        }

        // WP-CLI Class.
        if (defined('WP_CLI') && WP_CLI) {
            require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-cli.php';
        }

        // Template functions.
        include RANKOLOGY_STATS_DIR . 'includes/template-functions.php';
    }

    private function create_upload_directory()
    {
        $upload_dir      = wp_upload_dir();
        $upload_dir_name = $upload_dir['basedir'] . '/' . RANKOLOGY_STATS_UPLOADS_DIR;

        wp_mkdir_p($upload_dir_name);

        /**
         * Create .htaccess to avoid public access.
         */
        if (is_dir($upload_dir_name) and is_writable($upload_dir_name)) {
            $htaccess_file = path_join($upload_dir_name, '.htaccess');

            if (!file_exists($htaccess_file)
                and $handle = @fopen($htaccess_file, 'w')) {
                fwrite($handle, "Deny from all\n");
                fclose($handle);
            }
        }
    }

    /**
     * Loads the load plugin text domain code.
     */
    public function load_textdomain()
    {
        // Compatibility with WordPress < 5.0
        if (function_exists('determine_locale')) {
            $locale = apply_filters('plugin_locale', determine_locale(), 'rankology-stats');

            unload_textdomain('rankology-stats');
            load_textdomain('rankology-stats', WP_LANG_DIR . '/rankology-stats-' . $locale . '.mo');
        }

        load_plugin_textdomain('rankology-stats', false, basename(RANKOLOGY_STATS_DIR) . '/languages');
    }

    /**
     * Check PHP Version
     */
    public function require_php_version()
    {
        if (!version_compare(phpversion(), RANKOLOGY_STATS_REQUIRE_PHP_VERSION, ">=")) {
            return false;
        }

        return true;
    }

    /**
     * Show notice about PHP version
     *
     * @return void
     */
    function php_version_notice()
    {
        $error = __('Your installed PHP Version is: ', 'rankology-stats') . PHP_VERSION . '. ';
        $error .= __('The <strong>Rankology Stats</strong> plugin requires PHP version <strong>', 'rankology-stats') . RANKOLOGY_STATS_REQUIRE_PHP_VERSION . __('</strong> or greater.', 'rankology-stats');
        ?>
        <div class="error">
            <p><?php printf($error); ?></p>
        </div>
        <?php
    }

    /**
     * The main logging function
     *
     * @param $message
     * @uses error_log
     */
    public static function log($message)
    {
        if (is_array($message)) {
            $message = json_encode($message);
        }

        error_log(sprintf('Rankology Stats Error: %s', $message));
    }

    /**
     * Create tables on plugin activation
     *
     * @param object $network_wide
     */
    public static function install($network_wide)
    {
        add_filter('rankology_stats_show_welcome_page', '__return_false', 99);
        remove_action('upgrader_process_complete', 'RANKOLOGY_Stats_Welcome::do_welcome', 99);

        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-db.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-install.php';
        $installer = new \RANKOLOGY_STATS\Install();
        $installer->install($network_wide);
    }

    /**
     * Manage task on plugin deactivation
     *
     * @return void
     */
    public static function uninstall()
    {
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-db.php';
        require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-uninstall.php';
        new \RANKOLOGY_STATS\Uninstall();
    }

    /**
     * Instantiate the classes
     *
     * @return void
     * @throws Exception
     */
    public function instantiate()
    {
        $this->container['country_codes'] = \RANKOLOGY_STATS\Country::getList();
        $this->container['user_id']       = \RANKOLOGY_STATS\User::get_user_id();
        $this->container['option']        = new \RANKOLOGY_STATS\Option();
        $this->container['ip']            = \RANKOLOGY_STATS\IP::getIP();
        $this->container['agent']         = \RANKOLOGY_STATS\UserAgent::getUserAgent();
        $this->container['users_online']  = new \RANKOLOGY_STATS\UserOnline();
        $this->container['visitor']       = new \RANKOLOGY_STATS\Visitor();
    }

}