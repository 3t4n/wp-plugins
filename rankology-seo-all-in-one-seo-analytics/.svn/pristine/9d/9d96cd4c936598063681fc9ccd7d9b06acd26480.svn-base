<?php

namespace RANKOLOGY_STATS;

class Menus
{
    /**
     * List Of Admin Page Slug Rankology-stats
     *
     * -- Array Arg ---
     * key   : page key for using another methods
     * value : Admin Page Slug
     *
     * @var array
     */
    public static $pages = array(
        'overview'     => 'overview',
        'browser'      => 'browsers',
        'platform'     => 'platforms',
        'countries'    => 'countries',
        'exclusions'   => 'exclusions',
        'hits'         => 'hits',
        'online'       => 'online',
        'pages'        => 'pages',
        'categories'   => 'categories',
        'authors'      => 'authors',
        'tags'         => 'tags',
        'referrers'    => 'referrers',
        'searches'     => 'searches',
        'words'        => 'words',
        'top-visitors' => 'top_visitors',
        'visitors'     => 'visitors',
        'optimization' => 'optimization',
        'settings'     => 'settings',
        'plugins'      => 'plugins',
    );

    /**
     * Admin Page Slug
     *
     * @var string
     */
    public static $admin_menu_slug = 'rkns_[slug]_page';

    /**
     * Admin Page Load Action Slug
     *
     * @var string
     */
    public static $load_admin_slug = 'toplevel_page_[slug]';

    /**
     * Admin Page Load Action Slug
     *
     * @var string
     */
    public static $load_admin_submenu_slug = 'statistics_page_[slug]';

    /**
     * Get List Admin Pages
     */
    public static function get_admin_page_list()
    {
        /**
         * Get List Page
         */
        foreach (self::$pages as $page_key => $page_slug) {
            $admin_list_page[$page_key] = self::get_page_slug($page_slug);
        }
        return isset($admin_list_page) ? $admin_list_page : array();
    }

    /**
     * Check in admin page
     *
     * @param $page | For Get List
     * @return bool
     */
    public static function in_page($page)
    {
        global $pagenow;
        return (is_admin() and $pagenow == "admin.php" and isset($_REQUEST['page']) and $_REQUEST['page'] == Menus::get_page_slug($page));
    }

    /**
     * Check if User in Rankology Stats Plugin Admin Page
     */
    public static function in_plugin_page()
    {
        global $pagenow;
        if (is_admin() and $pagenow == "admin.php" and isset($_REQUEST['page'])) {
            $page_name = self::getPageKeyFromSlug(sanitize_text_field($_REQUEST['page']));
            if (is_array($page_name) and count($page_name) > 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * Convert Page Slug to Page key
     *
     * @param $page_slug
     * @return mixed
     * @example rkns_hists_pages -> hits
     */
    public static function getPageKeyFromSlug($page_slug)
    {
        $admin_menu_slug = explode("[slug]", self::$admin_menu_slug);
        preg_match('/(?<=' . $admin_menu_slug[0] . ').*?(?=' . $admin_menu_slug[1] . ')/', $page_slug, $page_name);
        return $page_name; # for get use $page_name[0]
    }

    /**
     * Get Admin Url
     *
     * @param null $page
     * @param array $arg
     * @area is_admin
     * @return string
     */
    public static function admin_url($page = null, $arg = array())
    {

        //Check If Pages is in Rankology-stats
        if (array_key_exists($page, self::get_admin_page_list())) {
            $page = self::get_page_slug($page);
        }

        return add_query_arg(array_merge(array('page' => $page), $arg), admin_url('admin.php'));
    }

    /**
     * Get Menu List
     */
    public static function get_menu_list()
    {

        // Get the read/write capabilities.
        $manage_cap     = User::ExistCapability(Option::get('manage_capability', 'manage_options'));

        /**
         * List of Rankology Stats Admin Menu
         */
        $list = array(
            'top'          => array(
                'title'    => __('Analatics', 'rankology-stats'),
                'page_url' => 'overview',
                'method'   => 'log',
                'icon'     => 'dashicons-chart-pie',
            ),
            'overview'     => array(
                'sub'      => 'overview',
                'title'    => __('Compare Reports', 'rankology-stats'),
                'page_url' => 'overview',
            ),
            'hits'         => array(
                'require'  => array('visits' => true),
                'sub'      => 'overview',
                'title'    => __('Overall Traffic', 'rankology-stats'),
                'page_url' => 'hits',
                'method'   => 'hits',
            ),
            'online'       => array(
                'require'  => array('useronline' => true),
                'sub'      => 'overview',
                'title'    => __('Online', 'rankology-stats'),
                'method'   => 'online',
                'page_url' => 'online',
            ),
            'visitors'     => array(
                'require'  => array('visitors' => true),
                'sub'      => 'overview',
                'title'    => __('Visitors', 'rankology-stats'),
                'page_url' => 'visitors',
                'method'   => 'visitors',
            ),
            'top.visitors' => array(
                'require'  => array('visitors' => true),
                'sub'      => 'overview',
                'title'    => __('Top Visitors Today', 'rankology-stats'),
                'page_url' => 'top-visitors',
                'method'   => 'top_visitors'
            ),
            'browsers'     => array(
                'require'  => array('visitors' => true),
                'sub'      => 'overview',
                'title'    => __('Browsers', 'rankology-stats'),
                'page_url' => 'browser',
                'method'   => 'browser'
            ),
            'platforms'    => array(
                'require'  => array('visitors' => true),
                'sub'      => 'overview',
                'title'    => __('Platforms', 'rankology-stats'),
                'page_url' => 'platform',
                'method'   => 'platform'
            ),
            'searches'     => array(
                'require'  => array('visitors' => true),
                'sub'      => 'overview',
                'title'    => __('Search Engines', 'rankology-stats'),
                'page_url' => 'searches',
                'method'   => 'searches',
            ),
            'countries'    => array(
                'require'  => array('geoip' => true, 'visitors' => true),
                'sub'      => 'overview',
                'title'    => __('Countries', 'rankology-stats'),
                'page_url' => 'countries',
                'method'   => 'country'
            ),
            'referrers'    => array(
                'require'  => array('visitors' => true),
                'sub'      => 'overview',
                'title'    => __('Referrers', 'rankology-stats'),
                'page_url' => 'referrers',
                'method'   => 'refer',
            ),
            'pages'        => array(
                'require'  => array('pages' => true),
                'sub'      => 'overview',
                'title'    => __('Top Pages', 'rankology-stats'),
                'page_url' => 'pages',
                'method'   => 'pages',
            ),
            'words'        => array(
                'require'  => array('visitors' => true),
                'sub'      => 'overview',
                'title'    => __('Search Words', 'rankology-stats'),
                'page_url' => 'words',
                'method'   => 'words',
            ),
            'exclusions'   => array(
                'require'  => array('record_exclusions' => true),
                'sub'      => 'overview',
                'title'    => __('Exclusions', 'rankology-stats'),
                'page_url' => 'exclusions',
                'method'   => 'exclusions',
                'break'    => true,
            ),
            'settings'     => array(
                'sub'      => 'overview',
                'title'    => __('Settings', 'rankology-stats'),
                'cap'      => $manage_cap,
                'page_url' => 'settings',
                'method'   => 'settings'
            )
        );

        /**
         * Rankology Stats Admin Page List
         *
         * @example add_filter('rankology_stats_admin_menu_list', function( $list ){ unset( $list['plugins'] ); return $list; });
         */
        return apply_filters('rankology_stats_admin_menu_list', $list);
    }

    /**
     * Get Menu Slug
     *
     * @param $page_slug
     * @return mixed
     */
    public static function get_page_slug($page_slug)
    {
        return str_ireplace("[slug]", $page_slug, self::$admin_menu_slug);
    }

    /**
     * Get Default Load Action in Load Any WordPress Page Slug
     *
     * @param $page_slug
     * @return mixed
     */
    public static function get_action_menu_slug($page_slug)
    {
        return str_ireplace("[slug]", self::get_page_slug($page_slug), self::$load_admin_slug);
    }

    /**
     * Menu constructor.
     */
    public function __construct()
    {

        # Load Rankology Stats Admin Menu
        add_action('admin_menu', array($this, 'wp_admin_menu'), 99);
    }

    /**
     * Load WordPress Admin Menu
     */
    public function wp_admin_menu()
    {

        // Get the read/write capabilities.
        $read_cap = User::ExistCapability(Option::get('read_capability', 'manage_options'));

        //Show Admin Menu List
        foreach (self::get_menu_list() as $key => $menu) {

            //Check Default variable
            $capability = $read_cap;
            $method     = 'log';
            $name       = $menu['title'];
            if (array_key_exists('cap', $menu)) {
                $capability = $menu['cap'];
            }
            if (array_key_exists('method', $menu)) {
                $method = $menu['method'];
            }
            if (array_key_exists('name', $menu)) {
                $name = $menu['name'];
            }

            //Check if SubMenu or Main Menu
            if (array_key_exists('sub', $menu)) {

                //Check Conditions For Show Menu
                if (Option::check_option_require($menu) === true) {
                    if (self::get_page_slug($menu['page_url']) != 'rkns_settings_page' && self::get_page_slug($menu['page_url']) != 'rkns_optimization_page') {
                        add_submenu_page(self::get_page_slug($menu['sub']), $menu['title'], $name, $capability, self::get_page_slug($menu['page_url']), array('\RANKOLOGY_STATS\\' . $method . '_page', 'view'));
                    }
                }

                //Check if add Break Line
                if (array_key_exists('break', $menu)) {
                    add_submenu_page(self::get_page_slug($menu['sub']), '', '', $capability, 'rkns_break_menu', array('\RANKOLOGY_STATS\\' . $method . '_page', $method));
                }
            } else {
                add_menu_page($menu['title'], $name, $capability, self::get_page_slug($menu['page_url']), array('\RANKOLOGY_STATS\\' . $method . '_page', 'view'), 'dashicons-chart-bar');
            }
        }

    }

}

new Menus;