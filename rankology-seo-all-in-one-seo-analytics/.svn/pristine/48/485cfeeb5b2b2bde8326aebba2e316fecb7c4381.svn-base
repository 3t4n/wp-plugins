<?php

namespace RANKOLOGY_STATS;

class Admin_Assets
{
    /**
     * Prefix Of Load Css/Js in WordPress Admin
     *
     * @var string
     */
    public static $prefix = 'rankology-stats-admin';

    /**
     * Suffix Of Minify File in Assets
     *
     * @var string
     */
    public static $suffix_min = '.min';

    /**
     * Assets Folder name in Plugin
     *
     * @var string
     */
    public static $asset_dir = 'assets';

    /**
     * Basic Of Plugin Url in Wordpress
     *
     * @var string
     * @example http://site.com/wp-content/plugins/my-plugin/
     */
    public static $plugin_url = RANKOLOGY_STATS_URL;

    /**
     * Current Asset Version for this plugin
     *
     * @var string
     */
    public static $asset_version = RANKOLOGY_STATS_VERSION;

    /**
     * Admin_Assets constructor.
     */
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'admin_styles'));
        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));

        $this->initFeedback();
    }

    /**
     * Get Version of File
     *
     * @param $ver
     * @return bool
     */
    public static function version($ver = false)
    {
        if ($ver) {
            return $ver;
        } else {
            if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
                return time();
            } else {
                return self::$asset_version;
            }
        }
    }

    /**
     * Get Asset Url
     *
     * @param $file_name
     * @return string
     */
    public static function url($file_name)
    {

        // Get file Extension Type
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if ($ext != "js" and $ext != "css") {
            $ext = 'images';
        }

        // Prepare File Path
        $path = self::$asset_dir . '/' . $ext . '/';

        // Prepare Full Url
        $url = self::$plugin_url . $path;

        // Return Url
        return $url . $file_name;
    }

    /**
     * Enqueue dashboard page styles.
     */

    public function dashboard_styles()
    {
        // Load Dashboard Css
        wp_enqueue_style(self::$prefix . '-dashboard', self::url('dashboard.min.css'), array(), self::version());
    }

    /**
     * Enqueue styles.
     */
    public function admin_styles()
    {

        // Get Current Screen ID
        $screen_id = Helper::get_screen_id();

        // Load Admin Css
        wp_enqueue_style(self::$prefix, self::url('admin.min.css'), array(), self::version());

        // Load Rtl Version Css
        if (is_rtl()) {
            wp_enqueue_style(self::$prefix . '-rtl', self::url('rtl.min.css'), array(), self::version());
        }

        //Load Jquery VMap Css
        if (!Option::get('disable_map') and (Menus::in_page('overview') || Menus::in_page('pages') || (in_array($screen_id, array('dashboard')) and !Option::get('disable_dashboard')))) {
            wp_enqueue_style(self::$prefix . '-jqvmap', self::url('jqvmap/jqvmap.min.css'), array(), '1.5.1');
        }

        // Load Jquery-ui theme
//        if (Menus::in_plugin_page() and Menus::in_page('optimization') === false and Menus::in_page('settings') === false) {
//            wp_enqueue_style(self::$prefix . '-jquery-datepicker', self::url('datepicker.min.css'), array(), '1.11.4');
//        }

        // Load Select2
        if (Menus::in_page('visitors') || (Menus::in_page('pages') and isset($_GET['ID']))) {
            wp_enqueue_style(self::$prefix . '-select2', self::url('select2/select2.min.css'), array(), '4.0.9');
        }

        // Load RangeDatePicker
        if (Menus::in_plugin_page() || Menus::in_page('pages') || in_array($screen_id, array('dashboard'))) {
            wp_enqueue_style(self::$prefix . '-daterangepicker', self::url('datepicker/daterangepicker.css'), array(), '1.0.0');
            wp_enqueue_style(self::$prefix . '-customize', self::url('datepicker/customize.css'), array(), '1.0.0');
        }
    }

    /**
     * Enqueue scripts.
     *
     * @param $hook [ Page Now ]
     */
    public function admin_scripts($hook)
    {

        // Get Current Screen ID
        $screen_id = Helper::get_screen_id();

        // Load Chart Js Library [ Load in <head> Tag ]
        if (Menus::in_plugin_page() || (in_array($screen_id, array('dashboard')) and !Option::get('disable_dashboard')) || (in_array($hook, array('post.php', 'edit.php', 'post-new.php')) and !Option::get('disable_editor'))) {
            wp_enqueue_script(self::$prefix . '-chart.js', self::url('chartjs/chart.umd.min.js'), false, '4.3.0', false);
        }

        // Load Jquery VMap Js Library
        if (!Option::get('disable_map') and (Menus::in_page('overview') || Menus::in_page('pages') || (in_array($screen_id, array('dashboard')) and !Option::get('disable_dashboard')))) {
            wp_enqueue_script(self::$prefix . '-jqvmap', self::url('jqvmap/jquery.vmap.min.js'), true, '1.5.1');
            wp_enqueue_script(self::$prefix . '-jqvmap-world', self::url('jqvmap/jquery.vmap.world.min.js'), true, '1.5.1');
        }

        // Load Jquery UI
//        if (Menus::in_plugin_page() and Menus::in_page('optimization') === false and Menus::in_page('settings') === false) {
//            wp_enqueue_script('jquery-ui-datepicker');
//            wp_localize_script('jquery-ui-datepicker', 'rkns_i18n_jquery_datepicker', self::localize_jquery_datepicker());
//        }

        // Load Select2
        if (Menus::in_page('visitors') || (Menus::in_page('pages') and isset($_GET['ID']))) {
            wp_enqueue_script(self::$prefix . '-select2', self::url('select2/select2.full.min.js'), array('jquery'), '4.0.9');
        }

        // Load WordPress PostBox Script
        if (Menus::in_plugin_page() and Menus::in_page('optimization') === false and Menus::in_page('settings') === false) {
            wp_enqueue_script('common');
            wp_enqueue_script('wp-lists');
            wp_enqueue_script('postbox');
        }

        // Load Admin Js
        if (Menus::in_plugin_page() || (in_array($screen_id, array('dashboard')) and !Option::get('disable_dashboard')) || (in_array($hook, array('post.php', 'edit.php', 'post-new.php')) and !Option::get('disable_editor'))) {
            wp_enqueue_script(self::$prefix, self::url('admin.min.js'), array('jquery'), self::version());
            wp_localize_script(self::$prefix, 'rkns_global', self::rkns_global($hook));
        }

        // Load TinyMCE for Widget Page
        if (in_array($screen_id, array('widgets'))) {
            wp_enqueue_script(self::$prefix . '-button-widget', self::url('tinymce.min.js'), array('jquery'), self::version());
        }

        // Add Thick box
        if (Menus::in_page('visitors')) {
            wp_enqueue_script('thickbox');
            wp_enqueue_style('thickbox');
        }

        // Add RangeDatePicker
        if (Menus::in_plugin_page() || Menus::in_page('pages') || in_array($screen_id, array('dashboard'))) {
            wp_enqueue_script(self::$prefix . '-moment', self::url('datepicker/moment.min.js'), array(), self::version());
            wp_enqueue_script(self::$prefix . '-daterangepicker', self::url('datepicker/daterangepicker.min.js'), array(), self::version());
        }

        if (Menus::in_page('pages')) {
            wp_enqueue_script(self::$prefix . '-datepicker', self::url('datepicker/datepicker.js'), array(), self::version());
        }
    }

    /**
     * Prepare global Rankology Stats data for use Admin Js
     *
     * @param $hook
     * @return mixed
     */
    public static function rkns_global($hook)
    {
        global $post;

        //Global Option
        $list['options'] = array(
            'rtl'           => (is_rtl() ? 1 : 0),
            'user_online'   => (Option::get('useronline') ? 1 : 0),
            'visitors'      => (Option::get('visitors') ? 1 : 0),
            'visits'        => (Option::get('visits') ? 1 : 0),
            'geo_ip'        => (GeoIP::active() ? 1 : 0),
            'geo_city'      => (GeoIP::active('city') ? 1 : 0),
            'overview_page' => (Menus::in_page('overview') ? 1 : 0),
            'gutenberg'     => (Helper::is_gutenberg() ? 1 : 0),
            'more_btn'      => (apply_filters('rankology_stats_meta_box_more_button', true) ? 1 : 0),
            'overview_ads'  => (apply_filters('rankology_stats_ads_overview_page_show', true) ? 1 : 0)
        );

        // WordPress Current Page
        $list['page'] = array(
            'file' => $hook,
            'ID'   => (isset($post) ? $post->ID : 0)
        );

        // WordPress Admin Page request Params
        if (isset($_GET)) {
            foreach ($_GET as $key => $value) {
                if ($key == "page") {
                    $slug  = Menus::getPageKeyFromSlug(esc_html($value));
                    $value = $slug[0];
                }
                $list['request_params'][esc_html($key)] = esc_html($value);
            }
        }

        // Global Lang
        $list['i18n'] = array(
            'more_detail'   => __('More Details', 'rankology-stats'),
            'reload'        => __('Reload', 'rankology-stats'),
            'online_users'  => __('Active Users', 'rankology-stats'),
            'visitors'      => __('Visitors', 'rankology-stats'),
            'visits'        => __('Visits', 'rankology-stats'),
            'today'         => __('Today', 'rankology-stats'),
            'yesterday'     => __('Yesterday', 'rankology-stats'),
            'last-week'     => __('Last week', 'rankology-stats'),
            'week'          => __('Last 7 days', 'rankology-stats'),
            'month'         => __('Last 30 days', 'rankology-stats'),
            '60days'        => __('Last 60 days', 'rankology-stats'),
            '90days'        => __('Last 90 days', 'rankology-stats'),
            'year'          => __('Last 12 months', 'rankology-stats'),
            'this-year'     => __('This year', 'rankology-stats'),
            'last-year'     => __('Last year', 'rankology-stats'),
            'total'         => __('Total', 'rankology-stats'),
            'daily_total'   => __('Daily Total', 'rankology-stats'),
            'date'          => __('Date', 'rankology-stats'),
            'time'          => __('Time', 'rankology-stats'),
            'browsers'      => __('Browsers', 'rankology-stats'),
            'rank'          => __('#', 'rankology-stats'),
            'flag'          => __('Flag', 'rankology-stats'),
            'country'       => __('Country', 'rankology-stats'),
            'visitor_count' => __('Visitors', 'rankology-stats'),
            'id'            => __('ID', 'rankology-stats'),
            'title'         => __('Title', 'rankology-stats'),
            'link'          => __('Link', 'rankology-stats'),
            'address'       => __('Address', 'rankology-stats'),
            'word'          => __('Word', 'rankology-stats'),
            'browser'       => __('Browser', 'rankology-stats'),
            'city'          => __('City', 'rankology-stats'),
            'ip'            => __('IP', 'rankology-stats'),
            'referrer'      => __('Referrer', 'rankology-stats'),
            'hits'          => __('Visits', 'rankology-stats'),
            'agent'         => __('Agent', 'rankology-stats'),
            'platform'      => __('Platform', 'rankology-stats'),
            'version'       => __('Version', 'rankology-stats'),
            'page'          => __('Page', 'rankology-stats'),
            'str_today'     => __('Today', 'rankology-stats'),
            'str_yesterday' => __('Yesterday', 'rankology-stats'),
            'str_7days'     => __('Last 7 days', 'rankology-stats'),
            'str_14days'    => __('Last 14 days', 'rankology-stats'),
            'str_30days'    => __('Last 30 days', 'rankology-stats'),
            'str_60days'    => __('Last 60 days', 'rankology-stats'),
            'str_90days'    => __('Last 90 days', 'rankology-stats'),
            'str_120days'   => __('Last 120 days', 'rankology-stats'),
            'str_6months'   => __('Last 6 months', 'rankology-stats'),
            'str_year'      => __('This year', 'rankology-stats'),
            'str_back'      => __('Back', 'rankology-stats'),
            'str_custom'    => __('Custom...', 'rankology-stats'),
            'custom'        => __('Custom', 'rankology-stats'),
            'to'            => __('to', 'rankology-stats'),
            'from'          => __('from', 'rankology-stats'),
            'go'            => __('Go', 'rankology-stats'),
            'no_data'       => __('No data to display', 'rankology-stats'),
            'count'         => __('Count', 'rankology-stats'),
            'percentage'    => __('Percentage', 'rankology-stats'),
            'version_list'  => __('Version List', 'rankology-stats'),
            'filter'        => __('Filter', 'rankology-stats'),
            'all'           => __('All', 'rankology-stats'),
            'er_datepicker' => __('Please select the time efficiency.', 'rankology-stats'),
            'er_valid_ip'   => __('Please enter a valid ip.', 'rankology-stats'),
            'please_wait'   => __('Please Wait ...', 'rankology-stats'),
            'user'          => __('User', 'rankology-stats'),
            'rest_connect'  => __('An error occurred while connecting to WordPress REST API. It seems blocked by one of your plugins or your theme.', 'rankology-stats'),
        );

        // Rest-API Meta Box Url
        $list['admin_url']      = admin_url();
        $list['assets_url']     = self::$plugin_url . self::$asset_dir;
        $list['rest_api_nonce'] = wp_create_nonce('wp_rest');
        $list['meta_box_api']   = get_rest_url(null, RestAPI::$namespace . '/metabox');

        // Meta Box List
        $meta_boxes_list    = Meta_Box::getList();
        $list['meta_boxes'] = array();

        foreach ($meta_boxes_list as $meta_box => $value) {

            // Convert Page Url
            if (isset($value['page_url'])) {
                $value['page_url'] = Menus::get_page_slug($value['page_url']);
            }

            // Add Post ID Params To Post Widget Link
            if ($meta_box == "post" and isset($post) and isset($post->ID) and in_array($post->post_status, array("publish", "private"))) {

                $value['page_url'] = add_query_arg(array(
                    'ID'   => $post->ID,
                    'type' => Pages::get_post_type($post->ID),
                ), $value['page_url']);

                /**
                 * Convert ? to & because ? is appending in the prefix of page_url out side of functionality.
                 * @note Annoying architecture...
                 * 
                 */
                $value['page_url'] = str_replace('?', '&', $value['page_url']);
            }

            // Remove unnecessary params
            foreach (array('show_on_dashboard', 'hidden', 'place', 'require', 'js', 'disable_overview') as $param) {
                unset($value[$param]);
            }

            // Add Meta Box Lang
            $class = Meta_Box::getMetaBoxClass($meta_box);
            if (method_exists($class, 'lang')) {
                $value['lang'] = $class::lang();
            }

            //Push to List
            $list['meta_boxes'][$meta_box] = $value;
        }

        // Ads For Overview Pages
        if (Menus::in_page('overview')) {
            $overview_ads = get_option('rankology_stats_overview_page_ads', false);
            if ($overview_ads != false and is_array($overview_ads) and $overview_ads['ads']['ID'] != $overview_ads['view'] and $overview_ads['ads']['status'] == "yes") {

                if ($overview_ads['ads']['link']) {
                    $overview_ads['ads']['link'] = add_query_arg(array(
                        'utm_source'   => 'rankology-stats',
                        'utm_medium'   => 'plugin',
                        'utm_campaign' => 'overview-page',
                        'referrer'     => get_bloginfo('url'),
                    ), $overview_ads['ads']['link']);
                }

                $list['overview']['ads'] = $overview_ads['ads'];
            }
        }

        // Return Data JSON
        return $list;
    }

    /**
     * Localize jquery datepicker
     *
     * @see https://gist.github.com/mehrshaddarzi/7f661baeb5d801961deb8b821157e820
     */
    public static function localize_jquery_datepicker()
    {
        global $wp_locale;

        return array(
            'closeText'       => __('Done', 'rankology-stats'),
            'currentText'     => __('Today', 'rankology-stats'),
            'monthNames'      => Helper::strip_array_indices($wp_locale->month),
            'monthNamesShort' => Helper::strip_array_indices($wp_locale->month_abbrev),
            'monthStatus'     => __('Show a different month', 'rankology-stats'),
            'dayNames'        => Helper::strip_array_indices($wp_locale->weekday),
            'dayNamesShort'   => Helper::strip_array_indices($wp_locale->weekday_abbrev),
            'dayNamesMin'     => Helper::strip_array_indices($wp_locale->weekday_initial),
            'dateFormat'      => 'yy-mm-dd', // Format time for Jquery UI
            'firstDay'        => get_option('start_of_week'),
            'isRTL'           => $wp_locale->is_rtl(),
        );
    }

    /**
     * Init FeedbackBird widget a third-party service to get feedbacks from users
     *
     * @url https://feedbackbird.io
     *
     * @return void
     */
    private function initFeedback()
    {
        
    }
}

new Admin_Assets;