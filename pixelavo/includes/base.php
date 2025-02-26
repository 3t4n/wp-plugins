<?php

namespace Pixelavo;

/**
 *  TODO: remove data from other events in the future update (in wp_localize_script)
 */

/**
 * Exit if accessed directly
 * */
if (!defined('ABSPATH')) {
    exit;
}

/**
* Base
*/
final class Base {

    private static $_instance = null;

    /**
     * Instance
     * 
     * Initializes a singleton instance
     * 
     * @return self class
     */
    static function instance() {
        if (is_null( self::$_instance )) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Base class constructor
     * @return void
     */
    private function __construct() {
        if (!function_exists('is_plugin_active')) {
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }
        add_action('init', [$this, 'i18n']);
        add_action('plugins_loaded', [$this, 'init']);
        add_action('in_admin_header', [$this, 'remove_admin_notice'], 1000);
        add_action('wp_enqueue_scripts', [$this, 'scripts']);
        add_action('admin_init', [$this, 'show_diagnostic_notice']);
        add_action('admin_init', [$this, 'show_rating_notice']);
        add_action('admin_init', [$this, 'show_promo_notice']);
        /**
         * Register Plugin Active Hook
         */
        register_activation_hook( PIXELAVO_PL_ROOT, [ $this, 'plugin_activate_hook' ] );
    }

    /**
     * i18n
     * 
     * Load text domain
     * @return void
     */
    function i18n() {
        load_plugin_textdomain('pixelavo', false, dirname(plugin_basename(PIXELAVO_PL_ROOT)) . '/languages');
    }
        
    /**
     * Remove all Notices on admin pages.
     * @return void
     */
    function remove_admin_notice(){
        $current_screen = get_current_screen();
        $hide_screen = ['toplevel_page_pixelavo', 'update'];
        if(  in_array( $current_screen->id, $hide_screen) ){
            remove_all_actions('admin_notices');
            remove_all_actions('all_admin_notices');
        }
    }

    /**
     * init
     * 
     * Plugins loaded init hook
     * @return void
     */
    function init() {

        /**
         * Include required files.
         */
        $this->include_files();
        
        /**
         * Redirect to option page after plugin activate
         */
        $this->plugin_redirect_option_page();

        /**
         * Add plugin setting link to the plugin.
         */
        add_filter('plugin_action_links_' . PIXELAVO_PLUGIN_BASE, [$this, 'plugins_setting_links']);

    }

    /**
     * Include Require Files
     */
    function include_files() {
        require_once (PIXELAVO_PL_PATH . 'includes/helper-functions.php');
        require_once (PIXELAVO_PL_PATH . 'admin/admin-setting.php');
        require_once (PIXELAVO_PL_PATH . 'includes/add-pixel.php');
        require_once (PIXELAVO_PL_PATH . 'includes/modifier.php');
        if(pixelavo_is_woocommerce_active()) {
            require_once (PIXELAVO_PL_PATH . 'includes/pixel-events-data.php');
            if(pixelavo_get_option('product_feed', 'pixelavo_settings') == 'on') {
                require_once (PIXELAVO_PL_PATH . 'includes/pixel-feed.php');
            }
        }
        if(pixelavo_is_edd_active()) {
            require_once (PIXELAVO_PL_PATH . 'includes/pixel-edd-events-data.php');
            if(pixelavo_get_option('edd_product_feed', 'pixelavo_settings') == 'on') {
                require_once (PIXELAVO_PL_PATH . 'includes/pixel-edd-feed.php');
            }
        }
        if(!empty(pixelavo_get_custom_events())) {
            require_once (PIXELAVO_PL_PATH . 'includes/pixel-custom-events-data.php');
        }
        require_once PIXELAVO_PL_PATH . 'includes/pixel-ajax-events-data.php';

        if( is_admin() ){
            require_once (PIXELAVO_PL_PATH . 'admin/class-notice-manager.php');
            require_once (PIXELAVO_PL_PATH . 'admin/class-diagnostic-data.php');
            require_once (PIXELAVO_PL_PATH . 'admin/class-notices.php');
            require_once (PIXELAVO_PL_PATH . 'admin/class-trial.php');
        }
        add_action('wp_footer', [$this, 'localizedEventsData'], 11);
    }

    function localizedEventsData() {
        global $pixelavoEventsLocalizedData;
        if(count($pixelavoEventsLocalizedData) > 0) {
            wp_localize_script('pixelavo', 'pixelavo_event', $pixelavoEventsLocalizedData);
        }
    }

    /**
     * Scripts
     * 
     * Enqueue style and scripts for frontend part
     * @return void
     */
    function scripts() {
        if(pixelavo_pixel_status()) {
            wp_enqueue_script('pixelavo', PIXELAVO_DIR_URL . 'assets/public/js/main.js', ['jquery'], PIXELAVO_VERSION, true);
            wp_localize_script('pixelavo', 'pixelavo', [
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('pixelavo_ajax_event_nonce'),
                'other_events' => wp_json_encode(array_merge(pixelavo_get_other_events(), ['data' => pixelavo_get_event_common_data()])),
                'custom_events' => wp_json_encode(pixelavo_get_custom_events()),
                'additional_user_info' => apply_filters('pixelavo_additional_user_info', [], [] ),
                'common_params' => pixelavo_get_event_common_data(),
                'other_event_options' => [
                    "download_files" => pixelavo_get_option('download_files', 'pixelavo_download_files'),
                    "page_scroll" => pixelavo_get_option('page_scroll', 'pixelavo_page_scroll'),
                    "time_on_page" => pixelavo_get_option('time_on_page', 'pixelavo_time_on_page'),
                    "form" => pixelavo_get_option('form_submission', 'pixelavo_form_submission'),
                ],
                'is_active' => [
                    "woo" => pixelavo_is_woocommerce_active(),
                    'edd' => pixelavo_is_edd_active(),
                    'fluent_form' => pixelavo_is_fluentform_active(),
                    'cf7' => pixelavo_is_cf7_active(),
                    'wpforms' => pixelavo_is_wpforms_active(),
                ]
            ]);
            wp_localize_script('pixelavo', 'pixelavo_event', []);
        }
    }

    /**
    * Plugins setting links

    * @param  array plugin default action links
    * @return array plugin action link
    */
    function plugins_setting_links($links) {
        $link = sprintf(
            '<a href="%1$s">%2$s</a>',
            admin_url('admin.php?page=pixelavo#/pixels'),
            __( 'Settings', 'pixelavo' )
        );
        array_unshift($links, $link);
        return $links; 
    }

    /**
     * Plugin Active Hook
     * Run when plugin is activated
     */
    public function plugin_activate_hook() {
        $events = get_option('pixelavo_events', [
            'search' => 'on',
            'view_content' => 'on',
            'view_category' => 'on',
        ]);
        $edd_events = get_option('pixelavo_edd_events', [
            'edd_search' => 'on',
            'edd_view_content' => 'on',
            'edd_view_category' => 'on',
        ]);
        $other_events = get_option('pixelavo_edd_events', [
            'youtube_video' => 'off',
            'vimeo_video' => 'off',
            'self_hosted_video' => 'off',
            'page_scroll' => 'on',
            'time_on_page' => 'on',
            'download_files' => 'on',
            'form_submission' => 'on',
            'internal_links' => 'off',
            'external_links' => 'off',
        ]);
        $download_files = get_option('pixelavo_download_files', [
            'download_files' => [
                "download_files_extensions" => ["pdf", "zip"]
            ]
        ]);
        $time_on_page = get_option('pixelavo_time_on_page', [
            'time_on_page' => [
                "time_on_page_value" => "10"
            ]
        ]);
        $page_scroll = get_option('pixelavo_page_scroll', [
            'page_scroll' => [
                "page_scroll_value" => "30"
            ]
        ]);
        $form_submission = get_option('pixelavo_form_submission', [
            'form_submission' => [
                "fluent_form" => [],
                "contact_form_7" => [],
                "wp_forms" => [],
            ]
        ]);
        update_option('pixelavo_events', $events);
        update_option('pixelavo_edd_events', $edd_events);
        update_option('pixelavo_other_events', $other_events);
        update_option('pixelavo_download_files', $download_files);
        update_option('pixelavo_time_on_page', $time_on_page);
        update_option('pixelavo_page_scroll', $page_scroll);
        update_option('pixelavo_form_submission', $form_submission);

        /* ViewContent Event Settings */
        $pixelavo_wc_view_content = get_option('pixelavo_wc_view_content', [
            'view_content' => [
                'view_content_delay' => 0,
            ],
        ]);
        update_option('pixelavo_wc_view_content', $pixelavo_wc_view_content);
        /* Purchase Event Settings */
        $pixelavo_wc_purchase = get_option('pixelavo_wc_purchase', [
            'purchase' => [
                'purchase_event_trigger' => ['on-hold', 'processing'],
                'purchase_additional_info' => 'off',
            ],
        ]);
        update_option('pixelavo_wc_purchase', $pixelavo_wc_purchase);

        add_option('pixelavo_do_activation_redirect', true);
        flush_rewrite_rules();

        if ( ! get_option( 'pixelavo_installed' ) ) {
            update_option( 'pixelavo_installed', time() );
        }
    }

    /**
     * After Active the plugin then redirect to option page
     * @return void
     */
    public function plugin_redirect_option_page() {
        if ( get_option( 'pixelavo_do_activation_redirect', false ) ) {
            delete_option('pixelavo_do_activation_redirect');
            if( !isset( $_GET['activate-multi'] ) ){
                wp_redirect( admin_url("admin.php?page=pixelavo#/pixels") );
            }
        }
    }

    
    function show_diagnostic_notice() {
        $notice_instance = \Pixelavo_Diagnostic_Data::get_instance();
        ob_start();
        $notice_instance->show_notices();
        $message = ob_get_clean();
        if (! empty( $message ) ) {
            \Pixelavo_Notice::set_notice(
                [
                    'id'          => 'diagnostic-data',
                    'type'        => 'success',
                    'dismissible' => false,
                    'message_type' => 'html',
                    'message'     => $message,
                    'display_after'  => ( 7 * DAY_IN_SECONDS ),
                    'expire_time' => ( 0 * DAY_IN_SECONDS ),
                    'close_by'    => 'transient'
                ]
            );
        }
    }
    
    function show_rating_notice() {
        $message = '<div class="pixelavo-review-notice-wrap">
            <div class="pixelavo-rating-notice-logo">
                <img src="' . esc_url(PIXELAVO_PL_URL . 'assets/images/logo.png') . '" alt="Pixelavo" style="max-width:110px"/>
            </div>
            <div class="pixelavo-review-notice-content">
                <h3>'.esc_html__('Thank you for choosing Pixelavo to manage you plugins!','pixelavo').'</h3>
                <p>'.esc_html__('Would you mind doing us a huge favor by providing your feedback on WordPress? Your support helps us spread the word and greatly boosts our motivation.','pixelavo').'</p>
                <div class="pixelavo-review-notice-action">
                    <a href="https://wordpress.org/support/plugin/pixelavo/reviews/?filter=5#new-post" class="pixelavo-review-notice button-primary" target="_blank">'.esc_html__('Ok, you deserve it!','pixelavo').'</a>
                    <a href="#" class="pixelavo-notice-close pixelavo-review-notice"><span class="dashicons dashicons-calendar"></span>'.esc_html__('Maybe Later','pixelavo').'</a>
                    <a href="#" data-already-did="yes" class="pixelavo-notice-close pixelavo-review-notice"><span class="dashicons dashicons-smiley"></span>'.esc_html__('I already did','pixelavo').'</a>
                </div>
            </div>
        </div>';
        if (! empty( $message ) ) {
            \Pixelavo_Notice::set_notice(
                [
                    'id'          => 'ratting',
                    'type'        => 'info',
                    'dismissible' => true,
                    'message_type' => 'html',
                    'message'     => $message,
                    'display_after'  => ( 14 * DAY_IN_SECONDS ),
                    'close_by'    => 'transient'
                ]
            );
        }
    }

    

    function show_promo_notice() {

        // remove on next update
        if(!get_option('force_update_pixelavo_notice_info')) {
            delete_transient('pixelavo_notice_info');
            update_option('force_update_pixelavo_notice_info', true);
        }

        $noticeManager = \Pixelavo_Notice_Manager::instance();
        $notices = $noticeManager->get_notices_info();
        if(!empty($notices)) {
            $notices = array_map(function($notice) {
                $notice["display_after"] = false;
                $notice["expire_time"] = WEEK_IN_SECONDS;
                return $notice;
            }, $notices);
            foreach ($notices as $notice) {
                if(empty($notice['disable'])) {
                    \Pixelavo_Notice::set_notice($notice);
                }
            }
        }
    }

}

/**
 * Initialize Base Class
 */
Base::instance();
