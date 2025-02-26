<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

class rankology_fno_options
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
        //License activation / deactivation
        require_once dirname(__FILE__) . '/callbacks/License.php';

        add_action('admin_menu', [$this, 'add_plugin_page'], 20);
        add_action('admin_init', [$this, 'pro_set_default_values'], 10);
        add_action('network_admin_menu', [$this, 'add_network_plugin_page'], 10);
        add_action('admin_init', [$this, 'page_init']);
        add_action('admin_init', [$this, 'metabox_init']);

        add_action('admin_init', [$this, 'rankology_feature_save'], 30);
        add_action('admin_init', [$this, 'rankology_feature_title'], 20);
        add_action('admin_init', [$this, 'load_sections'], 30);
        add_action('admin_init', [$this, 'load_callbacks'], 40);
    }

    public function rankology_feature_save()
    {
        $html = '';
        if (isset($_GET['settings-updated']) && 'true' === $_GET['settings-updated']) {
            $html .= '<div id="rankology-notice-save" class="rkseo-components-snackbar-list">';
        } else {
            $html .= '<div id="rankology-notice-save" class="rkseo-components-snackbar-list" style="display:none">';
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
        global $title;

        $html = '<h1>' . $title;

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

    public function pro_set_default_values()
    {
        if (defined('RANKOLOGY_WPMAIN_VERSION')) {
            return;
        }

        $rankology_fno_option_name = get_option('rankology_fno_option_name', []);

        //WooCommerce==============================================================================
        if (is_plugin_active('woocommerce/woocommerce.php')) {
            $rankology_fno_option_name['rankology_woocommerce_cart_page_no_index']             = '1';
            $rankology_fno_option_name['rankology_woocommerce_checkout_page_no_index']         = '1';
            $rankology_fno_option_name['rankology_woocommerce_customer_account_page_no_index'] = '1';
            $rankology_fno_option_name['rankology_woocommerce_product_og_price']               = '1';
            $rankology_fno_option_name['rankology_woocommerce_product_og_currency']            = '1';
            $rankology_fno_option_name['rankology_woocommerce_meta_generator']                 = '1';
        }

        //DublinCore===============================================================================
        $rankology_fno_option_name['rankology_dublin_core_enable'] = '1';

        //Check if the value is an array (important!)
        if (is_array($rankology_fno_option_name)) {
            add_option('rankology_fno_option_name', $rankology_fno_option_name);
        }

        //BOT======================================================================================
        $rankology_bot_option_name = get_option('rankology_bot_option_name', []);

        $rankology_bot_option_name['rankology_bot_scan_settings_post_types']['post']['include'] = '1';
        $rankology_bot_option_name['rankology_bot_scan_settings_post_types']['page']['include'] = '1';
        $rankology_bot_option_name['rankology_bot_scan_settings_404']                           = '1';

        //Check if the value is an array (important!)
        if (is_array($rankology_bot_option_name)) {
            add_option('rankology_bot_option_name', $rankology_bot_option_name);
        }
    }

    /**
     * Add options page.
     */
    public function add_network_plugin_page()
    {
        if (has_filter('rankology_seo_admin_menu')) {
            $rkseo_seo_admin_menu['icon'] = '';
            $rkseo_seo_admin_menu['icon'] = apply_filters('rankology_seo_admin_menu', $rkseo_seo_admin_menu['icon']);
        } else {
            $rkseo_seo_admin_menu['icon'] = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIGlkPSJ1dWlkLTRmNmE4YTQxLTE4ZTMtNGY3Ny1iNWE5LTRiMWIzOGFhMmRjOSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgODk5LjY1NSA0OTQuMzA5NCI+PHBhdGggaWQ9InV1aWQtYTE1NWMxY2EtZDg2OC00NjUzLTg0NzctOGRkODcyNDBhNzY1IiBkPSJNMzI3LjM4NDksNDM1LjEyOGwtMjk5Ljk5OTktLjI0OTdjLTE2LjI3MzUsMS4xOTM3LTI4LjQ5ODEsMTUuMzUzOC0yNy4zMDQ0LDMxLjYyNzMsMS4wNzE5LDE0LjYxMjgsMTIuNjkxNiwyNi4yMzI1LDI3LjMwNDQsMjcuMzA0NGwyOTkuOTk5OSwuMjQ5N2MxNi4yNzM1LTEuMTkzNywyOC40OTgxLTE1LjM1MzgsMjcuMzA0NC0zMS42MjczLTEuMDcxOC0xNC42MTI4LTEyLjY5MTYtMjYuMjMyNS0yNy4zMDQ0LTI3LjMwNDRaIiBzdHlsZT0iZmlsbDojZmZmOyIvPjxwYXRoIGlkPSJ1dWlkLWUzMGJhNGM2LTQ3NjktNDY2Yi1hMDNhLWU2NDRjNTE5OGU1NiIgZD0iTTI3LjM4NDksNTguOTMxN2wyOTkuOTk5OSwuMjQ5N2MxNi4yNzM1LTEuMTkzNywyOC40OTgxLTE1LjM1MzcsMjcuMzA0NC0zMS42MjczLTEuMDcxOC0xNC42MTI4LTEyLjY5MTYtMjYuMjMyNS0yNy4zMDQ0LTI3LjMwNDRMMjcuMzg0OSwwQzExLjExMTQsMS4xOTM3LTEuMTEzMiwxNS4zNTM3LC4wODA1LDMxLjYyNzNjMS4wNzE5LDE0LjYxMjgsMTIuNjkxNiwyNi4yMzI1LDI3LjMwNDQsMjcuMzA0NFoiIHN0eWxlPSJmaWxsOiNmZmY7Ii8+PHBhdGggaWQ9InV1aWQtMmJiZDUyZDYtYWVjMS00Njg5LTlkNGMtMjNjMzVkNGYyMmI4IiBkPSJNNjUyLjQ4NSwuMjg0OWMtMTI0LjkzODgsLjA2NC0yMzAuMTU1NCw5My40MTMyLTI0NS4xMDAxLDIxNy40NTVIMjcuMzg0OWMtMTYuMjczNSwxLjE5MzctMjguNDk4MSwxNS4zNTM3LTI3LjMwNDQsMzEuNjI3MiwxLjA3MTksMTQuNjEyOCwxMi42OTE2LDI2LjIzMjUsMjcuMzA0NCwyNy4zMDQ0SDQwNy4zODQ5YzE2LjIyOTgsMTM1LjQ0NTQsMTM5LjE4NywyMzIuMDg4OCwyNzQuNjMyMywyMTUuODU4OSwxMzUuNDQ1NS0xNi4yMjk4LDIzMi4wODg4LTEzOS4xODY5LDIxNS44NTg5LTI3NC42MzI0Qzg4Mi45OTIxLDkzLjY4MzQsNzc3LjU4ODQsLjIxMTIsNjUyLjQ4NSwuMjg0OVptMCw0MzMuNDIxN2MtMTAyLjk3NTQsMC0xODYuNDUzMy04My40NzgtMTg2LjQ1MzMtMTg2LjQ1MzMsMC0xMDIuOTc1Myw4My40NzgxLTE4Ni40NTMzLDE4Ni40NTMzLTE4Ni40NTMzLDEwMi45NzU0LDAsMTg2LjQ1MzMsODMuNDc4LDE4Ni40NTMzLDE4Ni40NTMzLC4wNTI0LDEwMi45NzUzLTgzLjM4MywxODYuNDk1OS0xODYuMzU4MywxODYuNTQ4My0uMDMxNiwwLS4wNjM0LDAtLjA5NTEsMHYtLjA5NVoiIHN0eWxlPSJmaWxsOiNmZmY7Ii8+PC9zdmc+';
        }

        $rkseo_seo_admin_menu['title'] = __('SEO', 'wp-rankology');
        if (has_filter('rankology_seo_admin_menu_title')) {
            $rkseo_seo_admin_menu['title'] = apply_filters('rankology_seo_admin_menu_title', $rkseo_seo_admin_menu['title']);
        }

        add_menu_page(__('SEO Network settings', 'wp-rankology'), $rkseo_seo_admin_menu['title'], rankology_capability('manage_options', 'menu'), 'rankology-network-option', [$this, 'create_network_admin_page'], $rkseo_seo_admin_menu['icon'], 90);
    }

    public function add_plugin_page()
    {
//        if ('1' == rankology_get_toggle_option('rich-snippets')) {
//            add_submenu_page('rankology-option', __('Schemas', 'wp-rankology'), __('Schemas', 'wp-rankology'), rankology_capability('edit_schemas', 'menu'), 'edit.php?post_type=rankology_schemas', null);
//        }
//        if ('1' == rankology_get_toggle_option('404')) {
//            add_submenu_page('rankology-option', __('Redirections', 'wp-rankology'), __('Redirections', 'wp-rankology'), rankology_capability('edit_redirections', 'menu'), 'edit.php?post_type=rankology_404', null);
//        }
//        if ('1' == rankology_get_toggle_option('bot')) {
//            add_submenu_page('rankology-option', __('Broken links', 'wp-rankology'), __('Broken links', 'wp-rankology'), rankology_capability('manage_options', 'menu'), 'edit.php?post_type=rankology_bot', null);
//        }
//        add_submenu_page('rankology-option', __('Stats Settings', 'wp-rankology'), __('Stats Settings', 'wp-rankology'), 'manage_options', 'rkns_settings_page', array('\RANKOLOGY_STATS\\settings_page', 'view'), 13);
//        add_submenu_page('rankology-option', __('General Settings', 'wp-rankology'), __('General Settings', 'wp-rankology'), rankology_capability('manage_options', 'fno'), 'rankology-fno-page', [$this, 'rankology_fno_page'], 14);
    }

    public function rankology_fno_page()
    {
        require_once dirname(__FILE__) . '/admin-pages/GeneralSettings.php';
    }

    public function rankology_license_page()
    {
        require_once dirname(__FILE__) . '/admin-pages/License.php';
    }

    public function create_network_admin_page()
    {
        require_once dirname(__FILE__) . '/admin-pages/NetworkAdmin.php';
    }

    public function page_init()
    {
        require_once dirname(__FILE__) . '/settings/Main.php';
        require_once dirname(__FILE__) . '/settings/Bot.php';
       // require_once dirname(__FILE__) . '/settings/WooCommerce.php';
        require_once dirname(__FILE__) . '/settings/EasyDigitalDownloads.php';
        require_once dirname(__FILE__) . '/settings/DublinCore.php';
       // require_once dirname(__FILE__) . '/settings/Schemas.php';
       // require_once dirname(__FILE__) . '/settings/Breadcrumbs.php';
       // require_once dirname(__FILE__) . '/settings/AI.php';
        require_once dirname(__FILE__) . '/settings/PageSpeed.php';
        //require_once dirname(__FILE__) . '/settings/InspectURL.php';
      //  require_once dirname(__FILE__) . '/settings/Robots.php';
       // require_once dirname(__FILE__) . '/settings/GoogleNews.php';
       // require_once dirname(__FILE__) . '/settings/Redirections.php';
        require_once dirname(__FILE__) . '/settings/Htaccess.php';
       // require_once dirname(__FILE__) . '/settings/RSS.php';
        require_once dirname(__FILE__) . '/settings/Advanced.php';
        require_once dirname(__FILE__) . '/settings/Analytics.php';
        require_once dirname(__FILE__) . '/settings/AnalyticsEcommerce.php';
        require_once dirname(__FILE__) . '/settings/Sitemaps.php';
        require_once dirname(__FILE__) . '/settings/Rewrite.php';
        require_once dirname(__FILE__) . '/settings/WhiteLabel.php';
        require_once dirname(__FILE__) . '/blocks/features-list.php';
        if (version_compare(RANKOLOGY_VERSION, '6.3.1', '>') || (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG === true)) {
            require_once dirname(__FILE__) . '/blocks/tasks.php';
        }
        require_once dirname(__FILE__) . '/blocks/insights.php';
        require_once dirname(__FILE__) . '/wizard/wizard.php';
        require_once dirname(__FILE__) . '/admin-pages/Tools.php';
    }

    public function metabox_init() {
        require_once dirname(__FILE__) . '/metaboxes/admin-metaboxes-form.php';
        require_once dirname(__FILE__) . '/metaboxes/admin-content-analysis-metaboxes-form.php';
    }

    public function sanitize($input)
    {
        require_once dirname(__FILE__) . '/sanitize/Sanitize.php';

        return rankology_fno_sanitize_options_fields($input);
    }

    public function load_sections()
    {
        require_once dirname(__FILE__) . '/sections/GeneralSettings.php';
        require_once dirname(__FILE__) . '/sections/Bot.php';
      //  require_once dirname(__FILE__) . '/sections/WooCommerce.php';
        require_once dirname(__FILE__) . '/sections/EasyDigitalDownloads.php';
        require_once dirname(__FILE__) . '/sections/DublinCore.php';
      //  require_once dirname(__FILE__) . '/sections/Schemas.php';
       // require_once dirname(__FILE__) . '/sections/Breadcrumbs.php';
      //  require_once dirname(__FILE__) . '/sections/AI.php';
        require_once dirname(__FILE__) . '/sections/PageSpeed.php';
        //require_once dirname(__FILE__) . '/sections/InspectURL.php';
      //  require_once dirname(__FILE__) . '/sections/Robots.php';
       // require_once dirname(__FILE__) . '/sections/GoogleNews.php';
       // require_once dirname(__FILE__) . '/sections/Redirections.php';
        require_once dirname(__FILE__) . '/sections/Htaccess.php';
       // require_once dirname(__FILE__) . '/sections/RSS.php';
        require_once dirname(__FILE__) . '/sections/Analytics.php';
        require_once dirname(__FILE__) . '/sections/AnalyticsEcommerce.php';
        require_once dirname(__FILE__) . '/sections/Rewrite.php';
        require_once dirname(__FILE__) . '/sections/WhiteLabel.php';
        require_once dirname(__FILE__) . '/sections/Advanced.php';
    }

    public function load_callbacks()
    {
        require_once dirname(__FILE__) . '/callbacks/Bot.php';
      //  require_once dirname(__FILE__) . '/callbacks/WooCommerce.php';
        require_once dirname(__FILE__) . '/callbacks/EasyDigitalDownloads.php';
        require_once dirname(__FILE__) . '/callbacks/DublinCore.php';
       // require_once dirname(__FILE__) . '/callbacks/Schemas.php';
      //  require_once dirname(__FILE__) . '/callbacks/Breadcrumbs.php';
       // require_once dirname(__FILE__) . '/callbacks/AI.php';
        require_once dirname(__FILE__) . '/callbacks/PageSpeed.php';
        //require_once dirname(__FILE__) . '/callbacks/InspectURL.php';
       // require_once dirname(__FILE__) . '/callbacks/Robots.php';
        //require_once dirname(__FILE__) . '/callbacks/GoogleNews.php';
       // require_once dirname(__FILE__) . '/callbacks/Redirections.php';
        require_once dirname(__FILE__) . '/callbacks/Htaccess.php';
       // require_once dirname(__FILE__) . '/callbacks/RSS.php';
        require_once dirname(__FILE__) . '/callbacks/Sitemaps.php';
        require_once dirname(__FILE__) . '/callbacks/Analytics.php';
        require_once dirname(__FILE__) . '/callbacks/AnalyticsEcommerce.php';
        require_once dirname(__FILE__) . '/callbacks/Security.php';
        require_once dirname(__FILE__) . '/callbacks/Rewrite.php';
        require_once dirname(__FILE__) . '/callbacks/WhiteLabel.php';
        require_once dirname(__FILE__) . '/callbacks/Advanced.php';
    }
}

if (is_admin()) {
    $my_settings_page = new rankology_fno_options();
}
