<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

use Rankology\Helpers\PagesAdmin;

class rankology_options
{
    /**
     * Holds the values to be used in the fields callbacks.
     */
    private $options;

    /**
     * Start up.
     */
    public function __construct()
    {
        require_once dirname(__FILE__) . '/admin-dyn-variables-helper.php'; //Dynamic variables

        add_action('admin_menu', [$this, 'add_plugin_page'], 10);
        add_action('admin_init', [$this, 'set_default_values'], 10);
        add_action('admin_init', [$this, 'page_init']);
        add_action('admin_init', [$this, 'rankology_feature_save'], 30);
        add_action('admin_init', [$this, 'rankology_feature_title'], 20);
        add_action('admin_init', [$this, 'load_sections'], 30);
        add_action('admin_init', [$this, 'load_callbacks'], 40);
        add_action('admin_init', [$this, 'pre_save_options'], 50);
    }

    public function rankology_feature_save()
    {
        $html = '';
        if (isset($_GET['settings-updated']) && 'true' === $_GET['settings-updated']) {
            $html .= '<div id="rankology-notice-save" class="rkseo-components-snackbar-list">';
        } else {
            $html .= '<div id="rankology-notice-save" class="rkseo-components-snackbar-list" style="display: none">';
        }
        $html .= '<div class="rkseo-components-snackbar">
                <div class="rkseo-components-snackbar__content">
                    <span class="dashicons dashicons-yes"></span>
                    ' . __('Your settings have been saved.', 'wp-rankology') . '
                </div>
            </div>
        </div>';

        return $html;
    }

    public function rankology_feature_title($feature)
    {
        // $features = array();
        // $features = apply_filters('rankology_all_features_list_callback', $features);

        global $title;


        $html = '<h1 class="rankology-tab-title">' . $title . '</h1>';
        $html .= '<h1>';

        if (null !== $feature) {
            if ('1' == rankology_get_toggle_option($feature)) {
                $toggle = '"1"';
            } else {
                $toggle = '"0"';
            }

            $html .= '<input type="checkbox" name="toggle-' . $feature . '" id="toggle-' . $feature . '" class="toggle" data-toggle=' . $toggle . '>';
            $html .= '<label for="toggle-' . $feature . '"></label>';

            $html .= $this->rankology_feature_save();

            if ('1' == rankology_get_toggle_option($feature)) {
                $html .= '<span id="titles-state-default" class="feature-state">' . __('Click to disable this feature', 'wp-rankology') . '</span>';
                $html .= '<span id="titles-state" class="feature-state feature-state-off">' . __('Click to enable this feature', 'wp-rankology') . '</span>';
            } else {
                $html .= '<span id="titles-state-default" class="feature-state">' . __('Click to enable this feature', 'wp-rankology') . '</span>';
                $html .= '<span id="titles-state" class="feature-state feature-state-off">' . __('Click to disable this feature', 'wp-rankology') . '</span>';
            }
        }

        $html .= '</h1>';

        return $html;
    }


    /**
     * Add options page.
     */
    public function add_plugin_page()
    {
        if (has_filter('rankology_seo_admin_menu')) {
            $rkseo_seo_admin_menu['icon'] = '';
            $rkseo_seo_admin_menu['icon'] = apply_filters('rankology_seo_admin_menu', $rkseo_seo_admin_menu['icon']);
        } else {
            $rkseo_seo_admin_menu['icon'] = 'dashicons-chart-pie';
        }

        $rkseo_seo_admin_menu['title'] = __('Rankology', 'wp-rankology');
        if (has_filter('rankology_seo_admin_menu_title')) {
            $rkseo_seo_admin_menu['title'] = apply_filters('rankology_seo_admin_menu_title', $rkseo_seo_admin_menu['title']);
        }

        //SEO Dashboard page
//        add_menu_page(__('Rankology Option Page', 'wp-rankology'), $rkseo_seo_admin_menu['title'], rankology_capability('manage_options', 'menu'), 'rankology-option', [$this, 'create_admin_page'], $rkseo_seo_admin_menu['icon'], 5);
        add_menu_page(__('Header Metas', 'wp-rankology'), $rkseo_seo_admin_menu['title'], rankology_capability('manage_options', 'menu'), 'rankology-option', [$this, 'create_admin_page'], $rkseo_seo_admin_menu['icon'], 5);

        //SEO sub-pages
        add_submenu_page('rankology-option', __('Dashboard', 'wp-rankology'), __('Dashboard', 'wp-rankology'), rankology_capability('manage_options', 'menu'), 'rankology-option', [$this, 'create_admin_page']);
//        add_submenu_page('rankology-option', __('Header Metas', 'wp-rankology'), __('Header Metas', 'wp-rankology'), rankology_capability('manage_options', PagesAdmin::TITLE_METAS), 'rankology-titles', [$this, 'rankology_titles_page']);
//        add_submenu_page('rankology-option', __('Social Platforms', 'wp-rankology'), __('Social Platforms', 'wp-rankology'), rankology_capability('manage_options', PagesAdmin::SOCIAL_NETWORKS), 'rankology-social', [$this, 'rankology_social_page']);
//        add_submenu_page('rankology-option', __('XML Sitemap', 'wp-rankology'), __('XML Sitemap', 'wp-rankology'), rankology_capability('manage_options', PagesAdmin::XML_HTML_SITEMAP), 'rankology-xml-sitemap', [$this, 'rankology_xml_sitemap_page']);
//        add_submenu_page('rankology-option', __('Google Analytics', 'wp-rankology'), __('Google Analytics', 'wp-rankology'), rankology_capability('manage_options', PagesAdmin::ANALYTICS), 'rankology-google-analytics', [$this, 'rankology_google_analytics_page']);
//        add_submenu_page('rankology-option', __('Search Engines Indexing', 'wp-rankology'), __('Search Engines Indexing', 'wp-rankology'), rankology_capability('manage_options', PagesAdmin::INSTANT_INDEXING), 'rankology-instant-indexing', [$this, 'rankology_instant_indexing_page']);
//        add_submenu_page('rankology-option', __('Metaboxes & Columns', 'wp-rankology'), __('Metaboxes/Columns', 'wp-rankology'), rankology_capability('manage_options', PagesAdmin::ADVANCED), 'rankology-metaboxes', [$this, 'rankology_advanced_page']);
//        add_submenu_page('rankology-option', __('Images Optimization / SEO', 'wp-rankology'), __('Image SEO', 'wp-rankology'), rankology_capability('manage_options', PagesAdmin::ADVANCED), 'rankology-imageseo', [$this, 'rankology_imageseo_page']);
//        add_submenu_page('rankology-option', __('Import/Export', 'wp-rankology'), __('Import/Export', 'wp-rankology'), rankology_capability('manage_options', PagesAdmin::TOOLS), 'rankology-import-export', [$this, 'rankology_import_export_page']);

        if (method_exists(rankology_get_service('ToggleOption'), 'getToggleWhiteLabel')) {
            $white_label_toggle = rankology_get_service('ToggleOption')->getToggleWhiteLabel();
            if ('1' === $white_label_toggle) {
                if (method_exists('rankology_fno_get_service', 'getWhiteLabelHelpLinks') && '1' === rankology_fno_get_service('OptionPro')->getWhiteLabelHelpLinks()) {
                    return;
                }
            }
        }
    }

    //Rankology left panel Admin Pages
    public function rankology_titles_page()
    {
        //require_once dirname(__FILE__) . '/admin-pages/Titles.php';
        require_once dirname(__FILE__) . '/admin-pages/Title_new.php';

    }

    public function rankology_social_page()
    {
        //require_once dirname(__FILE__) . '/admin-pages/Social.php';
        require_once dirname(__FILE__) . '/admin-pages/Social_new.php';
    }

    public function rankology_xml_sitemap_page()
    {
        //require_once dirname(__FILE__) . '/admin-pages/Sitemaps.php';
        require_once dirname(__FILE__) . '/admin-pages/Sitemaps_new.php';
    }

    public function rankology_google_analytics_page()
    {
        //require_once dirname(__FILE__) . '/admin-pages/Analytics.php';
        require_once dirname(__FILE__) . '/admin-pages/Analytics_new.php';
    }

    public function rankology_instant_indexing_page()
    {
//        require_once dirname(__FILE__) . '/admin-pages/InstantIndexing.php';
        require_once dirname(__FILE__) . '/admin-pages/InstantIndexing_new.php';
    }

    public function rankology_advanced_page()
    {
        //require_once dirname(__FILE__) . '/admin-pages/Advanced.php';
        require_once dirname(__FILE__) . '/admin-pages/Advanced_new.php';
    }

    public function rankology_imageseo_page()
    {
        // require_once dirname(__FILE__) . '/admin-pages/ImageSEO.php';
        require_once dirname(__FILE__) . '/admin-pages/ImageSEO_new.php';
    }

    public function rankology_schemas_page()
    {
        require_once dirname(__FILE__) . '/admin-pages/Schemas.php';
        //require_once dirname(__FILE__) . '/admin-pages/Title_new.php';

    }

    public function rankology_redirections_page()
    {

        require_once dirname(__FILE__) . '/admin-pages/Redirections.php';
        //require_once dirname(__FILE__) . '/admin-pages/Title_new.php';

    }

    public function rankology_import_export_page()
    {
        //require_once dirname(__FILE__) . '/admin-pages/Tools.php';
        require_once dirname(__FILE__) . '/admin-pages/Tools_new.php';
    }

    public function rankology_stats_settings_page()
    {
        //require_once dirname(__FILE__) . '/admin-pages/Tools.php';
        require_once dirname(__FILE__) . '/admin-pages/stats_settings_main.php';
    }

    public function rankology_breadcrums_page()
    {

        require_once dirname(__FILE__) . '/admin-pages/Breadcrumbs.php';
        //require_once dirname(__FILE__) . '/admin-pages/Title_new.php';

    }
    public function rankology_inspecturl()
    {

        require_once dirname(__FILE__) . '/admin-pages/InspectURL.php';


    }
    public function rankology_googlenews()
    {

        require_once dirname(__FILE__) . '/admin-pages/GoogleNews.php';


    }
    public function rankology_woocommerce()
    {

        require_once dirname(__FILE__) . '/admin-pages/WooCommerce.php';


    }
    public function rankology_ai()
    {

        require_once dirname(__FILE__) . '/admin-pages/AI.php';


    }
    public function rankology_rss()
    {

        require_once dirname(__FILE__) . '/admin-pages/RSS.php';


    }
    public function rankology_robots()
    {

        require_once dirname(__FILE__) . '/admin-pages/Robots.php';


    }
    public function rankology_htaccess()
    {

        require_once dirname(__FILE__) . '/admin-pages/Htaccess.php';


    }
    public function rankology_pagespeed()
    {

        require_once dirname(__FILE__) . '/admin-pages/PageSpeed.php';


    }

    public function create_admin_page()
    {
        require_once dirname(__FILE__) . '/admin-pages/Main.php';
    }

    public function set_default_values()
    {
        if (defined('RANKOLOGY_WPMAIN_VERSION')) {
            return;
        }

        //IndewNow======================================================================================
        $rankology_instant_indexing_option_name = get_option('rankology_instant_indexing_option_name');

        //Init if option doesn't exist
        if (false === $rankology_instant_indexing_option_name) {
            $rankology_instant_indexing_option_name = [];

            if ('1' == rankology_get_toggle_option('instant-indexing')) {
                rankology_instant_indexing_generate_api_key_fn(true);
            }

            $rankology_instant_indexing_option_name['rankology_instant_indexing_automate_submission'] = '1';
        }

        //Check if the value is an array (important!)
        if (is_array($rankology_instant_indexing_option_name)) {
            add_option('rankology_instant_indexing_option_name', $rankology_instant_indexing_option_name);
        }
    }

    public function page_init()
    {

        register_setting(
            'rankology_option_group', // Option group
            'rankology_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        register_setting(
            'rankology_titles_option_group', // Option group
            'rankology_titles_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        register_setting(
            'rankology_xml_sitemap_option_group', // Option group
            'rankology_xml_sitemap_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        register_setting(
            'rankology_social_option_group', // Option group
            'rankology_social_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        register_setting(
            'rankology_google_analytics_option_group', // Option group
            'rankology_google_analytics_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        register_setting(
            'rankology_advanced_option_group', // Option group
            'rankology_advanced_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        register_setting(
            'rankology_tools_option_group', // Option group
            'rankology_tools_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        register_setting(
            'rankology_import_export_option_group', // Option group
            'rankology_import_export_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        register_setting(
            'rankology_instant_indexing_option_group', // Option group
            'rankology_instant_indexing_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_fno_option_group', // Option group
            'rankology_fno_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_fno_option_groupr', // Option group
            'rankology_fno_option_namer', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_fno_option_groupbr', // Option group
            'rankology_fno_option_namebr', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_instant_indexing_option_groupiu', // Option group
            'rankology_instant_indexing_option_nameiu', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_instant_indexing_option_groupgm', // Option group
            'rankology_instant_indexing_option_namegn', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_instant_indexing_option_groupwoo', // Option group
            'rankology_instant_indexing_option_namewoo', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_instant_indexing_option_groupai', // Option group
            'rankology_instant_indexing_option_nameai', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_instant_indexing_option_grouprss', // Option group
            'rankology_instant_indexing_option_namerss', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_instant_indexing_option_grouprobot', // Option group
            'rankology_instant_indexing_option_namerobot', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_instant_indexing_option_grouphtaccess', // Option group
            'rankology_instant_indexing_option_namehtaccess', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_instant_indexing_option_grouppspeed', // Option group
            'rankology_instant_indexing_option_namepspeed', // Option name
            [$this, 'sanitize'] // Sanitize
        );
        register_setting(
            'rankology_fno_settings_group', // Option group
            'rankology_stats', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        require_once dirname(__FILE__) . '/settings/Titles.php';
        require_once dirname(__FILE__) . '/settings/Sitemaps.php';
        require_once dirname(__FILE__) . '/settings/Social.php';
        require_once dirname(__FILE__) . '/settings/Analytics.php';
        require_once dirname(__FILE__) . '/settings/ImageSEO.php';
        require_once dirname(__FILE__) . '/settings/Advanced.php';
        require_once dirname(__FILE__) . '/settings/InstantIndexing.php';
        require_once dirname(__FILE__) . '/settings/Schemas.php';
        require_once dirname(__FILE__) . '/settings/Redirections.php';
        require_once dirname(__FILE__) . '/settings/Breadcrumbs.php';
        require_once dirname(__FILE__) . '/settings/stats_settings_main.php';
        require_once dirname(__FILE__) . '/settings/InspectURL.php';
        require_once dirname(__FILE__) . '/settings/GoogleNews.php';
        require_once dirname(__FILE__) . '/settings/WooCommerce.php';
        require_once dirname(__FILE__) . '/settings/AI.php';
        require_once dirname(__FILE__) . '/settings/RSS.php';
        require_once dirname(__FILE__) . '/settings/Robots.php';
    }

    public function sanitize($input)
    {
        require_once dirname(__FILE__) . '/sanitize/Sanitize.php';

        if (isset($_POST['option_page']) && $_POST['option_page'] === 'rankology_advanced_option_group') {
            if (!isset($input['rankology_advanced_appearance_universal_metabox_disable'])) {
                $input['rankology_advanced_appearance_universal_metabox_disable'] = '';
            }
        }

        return rankology_sanitize_options_fields($input);
    }

    public function load_sections()
    {
        require_once dirname(__FILE__) . '/sections/Titles.php';
        require_once dirname(__FILE__) . '/sections/Sitemaps.php';
        require_once dirname(__FILE__) . '/sections/Social.php';
        require_once dirname(__FILE__) . '/sections/Analytics.php';
        require_once dirname(__FILE__) . '/sections/ImageSEO.php';
        require_once dirname(__FILE__) . '/sections/Advanced.php';
        require_once dirname(__FILE__) . '/sections/InstantIndexing.php';
        require_once dirname(__FILE__) . '/sections/Schemas.php';
        require_once dirname(__FILE__) . '/sections/Redirections.php';
        require_once dirname(__FILE__) . '/sections/Breadcrumbs.php';
        require_once dirname(__FILE__) . '/sections/InspectURL.php';
        require_once dirname(__FILE__) . '/sections/GoogleNews.php';
        require_once dirname(__FILE__) . '/sections/WooCommerce.php';
        require_once dirname(__FILE__) . '/sections/AI.php';
        require_once dirname(__FILE__) . '/sections/RSS.php';
        require_once dirname(__FILE__) . '/sections/Robots.php';
    }

    public function load_callbacks()
    {
        require_once dirname(__FILE__) . '/callbacks/Titles.php';
        require_once dirname(__FILE__) . '/callbacks/Sitemaps.php';
        require_once dirname(__FILE__) . '/callbacks/Social.php';
        require_once dirname(__FILE__) . '/callbacks/Analytics.php';
        require_once dirname(__FILE__) . '/callbacks/ImageSEO.php';
        require_once dirname(__FILE__) . '/callbacks/Advanced.php';
        require_once dirname(__FILE__) . '/callbacks/InstantIndexing.php';
        require_once dirname(__FILE__) . '/callbacks/Schemas.php';
        require_once dirname(__FILE__) . '/callbacks/Redirections.php';
        require_once dirname(__FILE__) . '/callbacks/Breadcrumbs.php';
        require_once dirname(__FILE__) . '/callbacks/stats_settings_main.php';
        require_once dirname(__FILE__) . '/callbacks/InspectURL.php';
        require_once dirname(__FILE__) . '/callbacks/GoogleNews.php';
        require_once dirname(__FILE__) . '/callbacks/WooCommerce.php';
        require_once dirname(__FILE__) . '/callbacks/AI.php';
        require_once dirname(__FILE__) . '/callbacks/RSS.php';
        require_once dirname(__FILE__) . '/callbacks/Robots.php';
    }

    public function pre_save_options()
    {
        add_filter('pre_update_option_rankology_instant_indexing_option_name', [$this, 'pre_rankology_instant_indexing_option_name'], 10, 2);
    }


//    public function pre_rankology_instant_indexing_option_name($new_value, $old_value)
//    {
//        // Ensure $new_value is an array to prevent errors
//        if (!is_array($new_value)) {
//            return $old_value; // Return the existing value if $new_value is invalid
//        }
//
//        // Check if the Bing API key is missing in the new values
//        if (!array_key_exists('rankology_instant_indexing_bing_api_key', $new_value)) {
//            // Retrieve existing options and ensure it's an array
//            $options = get_option('rankology_instant_indexing_option_name');
//            $options = is_array($options) ? $options : [];
//
//            // Safely update the Google API key if present in $new_value
//            if (isset($new_value['rankology_instant_indexing_google_api_key'])) {
//                $options['rankology_instant_indexing_google_api_key'] = $new_value['rankology_instant_indexing_google_api_key'];
//            }
//
//            return $options; // Return merged options
//        }
//
//        return $new_value; // Return the new value if all checks pass
//    }
    public function pre_rankology_instant_indexing_option_name($new_value, $old_value)
    {
        if (!is_array($new_value)) {
            return $old_value; // Return the existing value if $new_value is invalid
        }
        //If we are saving data from SEO, Google Search Console tab, we have to save all Indexing options!
        if (!array_key_exists('rankology_instant_indexing_bing_api_key', $new_value)) {
            $options = get_option('rankology_instant_indexing_option_name');
            if (isset($new_value['rankology_instant_indexing_google_api_key'])) {
                $options['rankology_instant_indexing_google_api_key'] = $new_value['rankology_instant_indexing_google_api_key'];
            }
            return $options;
        }
        return $new_value;
    }
}

if (is_admin()) {
    $my_settings_page = new rankology_options();
}

//add_action('wp_ajax_nopriv_save_rankology_settings', 'save_rankology_settings');
add_action('wp_ajax_save_rankology_settings', 'save_rankology_settings');

function save_rankology_settings() {
    if (!isset($_POST['form_data'])) {
        wp_send_json_error('No data received');
    }

    $form_data = $_POST['form_data'];
    $structured_data = [];

    // Convert serialized data into a properly structured associative array
    foreach ($form_data as $field) {
        parse_str($field['name'] . '=' . $field['value'], $parsed);
        $structured_data = array_merge_recursive($structured_data, $parsed);
    }

    // Loop through each parent array and save separately
    foreach ($structured_data as $parent_key => $parent_data) {
        update_option("$parent_key", $parent_data);
    }

    wp_send_json_success('Settings saved successfully');
}


