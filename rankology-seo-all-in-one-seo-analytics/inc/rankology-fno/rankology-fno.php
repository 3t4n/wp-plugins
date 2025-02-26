<?php

//CRON
function rankology_fno_cron() {
    //CRON - 404 cleaning
    if ( ! wp_next_scheduled('rankology_404_cron_cleaning')) {
        wp_schedule_event(time(), 'daily', 'rankology_404_cron_cleaning');
    }

    //CRON - GA stats in dashboard
    if ( ! wp_next_scheduled('rankology_google_analytics_cron')) {
        wp_schedule_event(time(), 'hourly', 'rankology_google_analytics_cron');
    }

    //CRON - Page Speed Insights
    if ( ! wp_next_scheduled('rankology_page_speed_insights_cron')) {
        wp_schedule_event(time(), 'daily', 'rankology_page_speed_insights_cron');
    }

    //CRON - 404 errors Email Alerts
    if ( ! wp_next_scheduled('rankology_404_email_alerts_cron')) {
        wp_schedule_event(time(), 'weekly', 'rankology_404_email_alerts_cron');
    }

    //CRON - Insight from GSC
    if ( ! wp_next_scheduled('rankology_insights_gsc_cron')) {
        wp_schedule_event(time(), 'daily', 'rankology_insights_gsc_cron');
    }
}

//Install plugins
function rankology_fno_install_plugin($plugin_slug) {
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
    require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    require_once ABSPATH . 'wp-admin/includes/plugin.php';

    WP_Filesystem();

    $skin              = new Automatic_Upgrader_Skin();
    $upgrader          = new WP_Upgrader( $skin );

    if (!empty($plugin_slug)) {
        ob_start();

        try {
            $plugin_information = plugins_api(
                'plugin_information',
                array(
                    'slug'   => $plugin_slug,
                    'fields' => array(
                        'short_description' => false,
                        'sections'          => false,
                        'requires'          => false,
                        'rating'            => false,
                        'ratings'           => false,
                        'downloaded'        => false,
                        'last_updated'      => false,
                        'added'             => false,
                        'tags'              => false,
                        'homepage'          => false,
                        'donate_link'       => false,
                        'author_profile'    => false,
                        'author'            => false,
                    ),
                )
            );

            if ( is_wp_error( $plugin_information ) ) {
                throw new Exception( $plugin_information->get_error_message() );
            }

            $package  = $plugin_information->download_link;
            $download = $upgrader->download_package( $package );

            if ( is_wp_error( $download ) ) {
                throw new Exception( $download->get_error_message() );
            }

            $working_dir = $upgrader->unpack_package( $download, true );

            if ( is_wp_error( $working_dir ) ) {
                throw new Exception( $working_dir->get_error_message() );
            }

            $result = $upgrader->install_package(
                array(
                    'source'                      => $working_dir,
                    'destination'                 => WP_PLUGIN_DIR,
                    'clear_destination'           => false,
                    'abort_if_destination_exists' => false,
                    'clear_working'               => true,
                    'hook_extra'                  => array(
                        'type'   => 'plugin',
                        'action' => 'install',
                    ),
                )
            );

            if ( is_wp_error( $result ) ) {
                throw new Exception( $result->get_error_message() );
            }

            $activate = true;
        } catch ( Exception $e ) {
            $e->getMessage();
        }

        ob_end_clean();
    }

    wp_clean_plugins_cache();
}

function rankology_fno_setRoles() {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    if ( ! function_exists('activate_plugins')) {
        return;
    }

    if ( ! function_exists('get_plugins')) {
        return;
    }

    $plugins = get_plugins();
    if ( empty($plugins['wp-rankology/rankology.php'])) {//if Rankology is NOT installed
        rankology_fno_install_plugin('wp-rankology');
        activate_plugins('wp-rankology/rankology.php');
    }

    //Add Redirections caps to user with "manage_options" capability
    $roles = get_editable_roles();
    if ( ! empty($roles)) {
        foreach ($GLOBALS['wp_roles']->role_objects as $key => $role) {
            if (isset($roles[$key]) && $role->has_cap('manage_options')) {
                $role->add_cap('edit_redirection');
                $role->add_cap('edit_redirections');
                $role->add_cap('edit_others_redirections');
                $role->add_cap('publish_redirections');
                $role->add_cap('read_redirection');
                $role->add_cap('read_private_redirections');
                $role->add_cap('delete_redirection');
                $role->add_cap('delete_redirections');
                $role->add_cap('delete_others_redirections');
                $role->add_cap('delete_published_redirections');
            }
            if (isset($roles[$key]) && $role->has_cap('manage_options')) {
                $role->add_cap('edit_schema');
                $role->add_cap('edit_schemas');
                $role->add_cap('edit_others_schemas');
                $role->add_cap('publish_schemas');
                $role->add_cap('read_schema');
                $role->add_cap('read_private_schemas');
                $role->add_cap('delete_schema');
                $role->add_cap('delete_schemas');
                $role->add_cap('delete_others_schemas');
                $role->add_cap('delete_published_schemas');
            }
        }
    }

    do_action('rankology_fno_setRoles');
}
register_activation_hook(__FILE__, 'rankology_fno_setRoles');

function rankology_fno_deactivate_rules() {
    delete_option('rankology_fno_activated');
    flush_rewrite_rules(false);
    wp_clear_scheduled_hook('rankology_404_cron_cleaning');
    wp_clear_scheduled_hook('rankology_google_analytics_cron');
    wp_clear_scheduled_hook('rankology_page_speed_insights_cron');
    wp_clear_scheduled_hook('rankology_404_email_alerts_cron');
    wp_clear_scheduled_hook('rankology_insights_gsc_cron');
    do_action('rankology_fno_deactivate_rules');
}
register_deactivation_hook(__FILE__, 'rankology_fno_deactivate_rules');

/**
 * Hooks uninstall.
 */
function rankology_fno_uninstall() {
    //Remove CRON
    wp_clear_scheduled_hook('rankology_404_cron_cleaning');
    wp_clear_scheduled_hook('rankology_google_analytics_cron');
    wp_clear_scheduled_hook('rankology_page_speed_insights_cron');
    wp_clear_scheduled_hook('rankology_404_email_alerts_cron');
    wp_clear_scheduled_hook('rankology_insights_gsc_cron');
}

//Define
//define('RANKOLOGY_VERSION', '1.0');
define('RANKOLOGY_FNO_AUTHOR', 'WordPress');
define('STORE_URL_RANKOLOGY', 'https://www.wordpress.org');
define('ITEM_ID_RANKOLOGY', 113);
define('ITEM_NAME_RANKOLOGY', 'Rankology FNO');
define('RANKOLOGY_LICENSE_PAGE', 'rankology-license');
define('RANKOLOGY_FNO_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('RANKOLOGY_FNO_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
define('RANKOLOGY_FNO_ASSETS_DIR', RANKOLOGY_FNO_PLUGIN_DIR_URL . 'assets');
define('RANKOLOGY_FNO_PUBLIC_URL', RANKOLOGY_FNO_PLUGIN_DIR_URL . 'public');
define('RANKOLOGY_FNO_PUBLIC_PATH', RANKOLOGY_FNO_PLUGIN_DIR_PATH . 'public');
define('RANKOLOGY_FNO_TEMPLATE_DIR', RANKOLOGY_FNO_PLUGIN_DIR_PATH . 'templates');
define('RANKOLOGY_FNO_TEMPLATE_JSON_SCHEMAS', RANKOLOGY_FNO_TEMPLATE_DIR . '/json-schemas');
define('RANKOLOGY_FNO_TEMPLATE_STOP_WORDS', RANKOLOGY_FNO_TEMPLATE_DIR . '/stop-words');

use RankologyFno\Core\Kernel;

require_once __DIR__ . '/rankology-autoload.php';

if (file_exists(__DIR__ . '/vendor/autoload.php') && file_exists(__DIR__ . '/rankology-autoload.php')) {

    require_once __DIR__ . '/rankology-autoload.php';
    require_once __DIR__ . '/rankology-fno-functions.php';
    require_once __DIR__ . '/inc/admin/cron.php';
    Kernel::execute([
        'file' => __FILE__,
        'slug' => 'wp-rankology',
        'main_file' => 'rankology-fno',
        'root' => __DIR__,
    ]);
}

function rankology_fno_init() {
    //CRON
    rankology_fno_cron();

    //i18n
    load_plugin_textdomain('wp-rankology', false, dirname(plugin_basename(__FILE__)) . '/languages/');

    global $pagenow;

    if ( ! function_exists('rankology_capability')) {
        return;
    }

    if (is_admin() || is_network_admin()) {
        require_once dirname(__FILE__) . '/inc/admin/admin.php';
        require_once dirname(__FILE__) . '/inc/admin/ajax.php';
        if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
            require_once dirname(__FILE__) . '/inc/admin/metaboxes/admin-metaboxes.php';
        }

        if ('index.php' == $pagenow || (isset($_GET['page']) && 'rankology-analytics-results' === $_GET['page'])) {
            require_once dirname(__FILE__) . '/inc/admin/wp-dashboard/google-analytics.php';
        }

        //CSV Import
        include_once dirname(__FILE__) . '/inc/admin/import/class-csv-wizard.php';

        //Bot
        require_once dirname(__FILE__) . '/inc/admin/bot.php';
        require_once dirname(__FILE__) . '/inc/functions/bot/rankology-bot.php';
    }

    // Watchers
    require_once dirname(__FILE__) . '/inc/admin/watchers/index.php';

    //Redirections
    if (is_admin()) {
        if (function_exists('rankology_get_toggle_option') && '1' === rankology_get_toggle_option('404')) {
            require_once dirname(__FILE__) . '/inc/admin/redirections/redirections.php';
        }
    }
    require_once dirname(__FILE__) . '/inc/functions/options.php';

    //Elementor
    if (did_action('elementor/loaded')) {
        require_once dirname(__FILE__) . '/inc/admin/page-builders/elementor/elementor.php';
        require_once dirname(__FILE__) . '/inc/admin/page-builders/elementor/elementor-widgets.php';
    }

    //TranslationsPress
    if ( ! class_exists('RANKOLOGY_Language_Packs')) {
        if (is_admin() || is_network_admin()) {
            require_once dirname(__FILE__) . '/inc/admin/updater/t15s-registry.php';
        }
    }

    // Blocks registration
    require_once dirname(__FILE__) . '/inc/functions/blocks.php';
}
add_action('plugins_loaded', 'rankology_fno_init', 999);

///////////////////////////////////////////////////////////////////////////////////////////////////
//Translations
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_init_t15s() {
    if (class_exists('RANKOLOGY_Language_Packs')) {
        $t15s_updater = new RANKOLOGY_Language_Packs(
            'wp-rankology',
            'https://packages.translationspress.com/rankology/wp-rankology-fno/packages.json'
        );
    }
}
add_action('init', 'rankology_init_t15s');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Loads the JS/CSS in admin
///////////////////////////////////////////////////////////////////////////////////////////////////
// Add JS for AI
add_action('rankology_seo_metabox_init', 'rankology_fno_admin_scripts');
function rankology_fno_admin_scripts(){

    $active = rankology_get_service('ToggleOption')->getToggleAi();
    if($active !== "1"){
        return;
    }

    $rankology_ai_generate_seo_meta = [
        'rankology_nonce'            => wp_create_nonce('rankology_ai_generate_seo_meta_nonce'),
        'rankology_ai_generate_seo_meta'      => admin_url('admin-ajax.php'),
    ];

    wp_enqueue_script('rankology-fno-ai-js', plugins_url('assets/js/rankology-fno-ai.js', __FILE__), ['jquery'], RANKOLOGY_VERSION, true);

    wp_localize_script('rankology-fno-ai-js', 'rankologyAjaxAIMetaSEO', $rankology_ai_generate_seo_meta);
}

//Google Page Speed Insights
function rankology_fno_admin_ps_scripts() {
    wp_enqueue_script('rankology-page-speed', plugins_url('assets/js/rankology-page-speed.js', __FILE__), ['jquery', 'jquery-ui-accordion'], RANKOLOGY_VERSION, true);

    $rankology_request_page_speed = [
        'rankology_nonce' => wp_create_nonce('rankology_request_page_speed_nonce'),
        'rankology_request_page_speed' => admin_url('admin-ajax.php'),
    ];
    wp_localize_script('rankology-page-speed', 'rankologyAjaxRequestPageSpeed', $rankology_request_page_speed);

    $rankology_clear_page_speed_cache = [
        'rankology_nonce' => wp_create_nonce('rankology_clear_page_speed_cache_nonce'),
        'rankology_clear_page_speed_cache' => admin_url('admin-ajax.php'),
    ];
    wp_localize_script('rankology-page-speed', 'rankologyAjaxClearPageSpeedCache', $rankology_clear_page_speed_cache);

}

function rankology_fno_add_admin_options_scripts($hook) {
    $prefix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

    wp_register_style('rankology-fno-admin', plugins_url('assets/css/rankology-fno' . $prefix . '.css', __FILE__), [], RANKOLOGY_VERSION);
    wp_enqueue_style('rankology-fno-admin');
	
	wp_enqueue_script('rankology-toggle-ajax', plugins_url('assets/js/rankology-dashboard' . $prefix . '.js', __FILE__), ['jquery'], RANKOLOGY_VERSION, true);

		//Features
		$rankology_toggle_features = [
			'rankology_nonce'           => wp_create_nonce('rankology_toggle_features_nonce'),
			'rankology_toggle_features' => admin_url('admin-ajax.php'),
			'i18n'                     => __('has been successfully updated!', 'wp-rankology'),
		];
		wp_localize_script('rankology-toggle-ajax', 'rankologyAjaxToggleFeatures', $rankology_toggle_features);

    //Dashboard GA
    global $pagenow;
    if ('index.php' == $pagenow || (isset($_GET['page']) && 'rankology-analytics-results' === $_GET['page'])) {
        if (function_exists('rankology_google_analytics_dashboard_widget_option') && rankology_google_analytics_dashboard_widget_option() !== '1') {
            wp_register_style('rankology-ga-dashboard-widget', plugins_url('assets/css/rankology-fno-dashboard' . $prefix . '.css', __FILE__), [], RANKOLOGY_VERSION);
            wp_enqueue_style('rankology-ga-dashboard-widget');

            //GA API
            wp_enqueue_script('rankology-fno-ga-embed', plugins_url('assets/js/chart.bundle.min.js', __FILE__), [], RANKOLOGY_VERSION);

            wp_enqueue_script('rankology-fno-ga', plugins_url('assets/js/rankology-fno-ga.js', __FILE__), ['jquery', 'jquery-ui-tabs'], RANKOLOGY_VERSION);

            $rankology_request_google_analytics = [
                'rankology_nonce' => wp_create_nonce('rankology_request_google_analytics_nonce'),
                'rankology_request_google_analytics' => admin_url('admin-ajax.php'),
            ];
            wp_localize_script('rankology-fno-ga', 'rankologyAjaxRequestGoogleAnalytics', $rankology_request_google_analytics);
        }
    }

    //Local Business widget
    if ('widgets.php' == $pagenow) {
        wp_enqueue_script('rankology-fno-lb-widget', plugins_url('assets/js/rankology-fno-lb-widget.js', __FILE__), ['jquery', 'jquery-ui-tabs'], RANKOLOGY_VERSION);

        $rankology_fno_lb_widget = [
            'rankology_nonce' => wp_create_nonce('rankology_fno_lb_widget_nonce'),
            'rankology_fno_lb_widget' => admin_url('admin-ajax.php'),
        ];
        wp_localize_script('rankology-fno-lb-widget', 'rankologyAjaxLocalBusinessOrder', $rankology_fno_lb_widget);
    }

    //GA tab
    if (isset($_GET['page']) && ('rankology-google-analytics' == $_GET['page'])) {
        wp_enqueue_script('rankology-fno-ga-lock', plugins_url('assets/js/rankology-fno-ga-lock.js', __FILE__), ['jquery'], RANKOLOGY_VERSION, true);

        $rankology_google_analytics_lock = [
            'rankology_nonce' => wp_create_nonce('rankology_google_analytics_lock_nonce'),
            'rankology_google_analytics_lock' => admin_url('admin-ajax.php'),
        ];
        wp_localize_script('rankology-fno-ga-lock', 'rankologyAjaxLockGoogleAnalytics', $rankology_google_analytics_lock);
    }

    //Tabs

    if (!empty($_GET['page']) && (('rankology-option' == $_GET['page']) ||   ('rankology-fno-page' == $_GET['page']))) {

        wp_enqueue_script('rankology-fno-admin-tabs-js', plugins_url('assets/js/rankology-fno-tabs.js', __FILE__), ['jquery-ui-tabs'], RANKOLOGY_VERSION);
        wp_enqueue_script('rankology-fno-search-console-js', plugins_url('assets/js/rankology-fno-search-console.js', __FILE__), ['jquery'], RANKOLOGY_VERSION);

        $search_console = [
            'rankology_nonce' => wp_create_nonce('rankology_request_bot_nonce'),
            'rankology_request_bot' => admin_url('admin-ajax.php'),
            'rankology_nonce_search_console' => wp_create_nonce('rankology_nonce_search_console'),
            'rankology_search_console_batch_process' => apply_filters('rankology_search_console_batch_process', 20),
            'i18n' => [
                'progress_matches' => __('%s matches.', 'wp-rankology'),
                'finish_matches' => __('The analysis is complete. We have matched %s urls. Go to post / page or post types list to see your metrics.', 'wp-rankology'),
            ]
        ];
        wp_localize_script('rankology-fno-search-console-js', 'rankologyAjaxGSC', $search_console);
    }

    if (isset($_GET['page']) && ('rankology-fno-page' == $_GET['page'] || 'rankology-network-option' == $_GET['page'])) {
        //htaccess
        wp_enqueue_script('rankology-save-htaccess', plugins_url('assets/js/rankology-htaccess.js', __FILE__), ['jquery'], RANKOLOGY_VERSION, true);

        $rankology_save_htaccess = [
            'rankology_nonce' => wp_create_nonce('rankology_save_htaccess_nonce'),
            'rankology_save_htaccess' => admin_url('admin-ajax.php'),
        ];
        wp_localize_script('rankology-save-htaccess', 'rankologyAjaxSaveHtaccess', $rankology_save_htaccess);

        wp_enqueue_media();
    }

    //Google Page Speed
    if ('edit.php' == $hook) {
        rankology_fno_admin_ps_scripts();
    } elseif (isset($_GET['page']) && ('rankology-fno-page' == $_GET['page'])) {
        rankology_fno_admin_ps_scripts();
    }

    //Bot Tabs
    if (isset($_GET['page']) && ('rankology-bot-batch' == $_GET['page'])) {
        wp_enqueue_script('rankology-bot-admin-tabs-js', plugins_url('assets/js/rankology-bot-tabs.js', __FILE__), ['jquery-ui-tabs'], RANKOLOGY_VERSION);


        $rankology_bot = [
            'rankology_nonce' => wp_create_nonce('rankology_request_bot_nonce'),
            'rankology_request_bot' => admin_url('admin-ajax.php'),
        ];
        wp_localize_script('rankology-bot-admin-tabs-js', 'rankologyAjaxBot', $rankology_bot);
    }

}

add_action('admin_enqueue_scripts', 'rankology_fno_add_admin_options_scripts', 10, 1);

//Rankology FNO Notices
function rankology_fno_admin_notices() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG === true) {
        return;
    }
    

}
add_action('admin_notices', 'rankology_fno_admin_notices');

//Shortcut settings page
add_filter('plugin_action_links', 'rankology_fno_plugin_action_links', 10, 2);
function rankology_fno_plugin_action_links($links, $file) {
    static $this_plugin;

    if ( ! $this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="' . admin_url('admin.php?page=rankology-fno-page') . '">' . __('Settings', 'wp-rankology') . '</a>';

        array_unshift($links, $settings_link);
    }

    return $links;
}

//Rankology FNO Updater
if ( ! class_exists('RANKOLOGY_Updater')) {
    // load our custom updater
    require_once dirname(__FILE__) . '/inc/admin/updater/plugin-updater.php';
    require_once dirname(__FILE__) . '/inc/admin/updater/plugin-upgrader.php';
}

// Highlight Current menu when Editing Post Type
add_filter('parent_file', 'rankology_submenu_current');
function rankology_submenu_current($current_menu) {
    global $pagenow;
    global $typenow;
    if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
        if ('rankology_404' == $typenow || 'rankology_bot' == $typenow || 'rankology_backlinks' == $typenow || 'rankology_schemas' == $typenow) {
            global $plugin_page;
            $plugin_page = 'rankology-option';
        }
    }

    return $current_menu;
}
