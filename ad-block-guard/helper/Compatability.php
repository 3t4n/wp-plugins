<?php

namespace AdBlockGuard\Helper;

use AdBlockGuard\PluginLogger;
use AdBlockGuard\Notices;

class Compatability {

    private $conflicting_settings = [
        'minify_concatenate_js' => 'The "Combine JavaScript files" option is not compatible and must be deactivated.',
        'manual_preload'        => 'The "Activate Preloading" option is not compatible and must be deactivated.',
        'defer_all_js'          => 'The "Defer All JavaScript files" option creates processing delays and must be deactivated.',
        'delay_js'              => 'The "Delay JavaScript" option creates significant overlay delays and must be deactivated.',
    ];

    private $cache_plugins = [
        'WP Super Cache'    => 'WPCACHEHOME',
        'W3 Total Cache'    => 'W3TC',
        'WP Rocket'         => 'WP_ROCKET_VERSION',
        'LiteSpeed Cache'   => 'LSCWP_V',
    ];

    public function __construct() {
        add_action('admin_init', [$this, 'check_wp_rocket_compatibility']);
        add_action('carbon_fields_theme_options_container_saved', [$this, 'notify_admin_to_flush_cache']);
        add_action('admin_init', [$this, 'handle_cache_flush_request']);
        add_action('admin_post_disable_wp_rocket_conflicts', [$this, 'disable_wp_rocket_conflicts']);
    }

public function check_wp_rocket_compatibility() {
    if ( ! defined( 'WP_ROCKET_VERSION' ) ) {
        return;
    }




    $rocket_settings = get_option( 'wp_rocket_settings', [] );
    $conflicts = array_filter( $this->conflicting_settings, function ( $key ) use ( $rocket_settings ) {
        return ! empty( $rocket_settings[ $key ] );
    }, ARRAY_FILTER_USE_KEY );

    if ( ! empty( $conflicts ) ) {
        $notices = new Notices();

        // Generate a message with bullet points
        $message = '<p>' . esc_html__( 'AdBlock Guard has detected incompatible WP Rocket settings:', 'ad-block-guard' ) . '</p>';
        $message .= '<ul>';
        foreach ( $conflicts as $key => $conflict_message ) {
            $message .= '<li> - ' . esc_html( $conflict_message ) . '</li>';
        }
        $message .= '</ul>';

        // Add the notice with the button
        $notices->add_notice(
            'wp_rocket_incompatibility',
            $message, // Pass the message with dynamic content
            'error', // Notice type
            false, // Not dismissible
            false, // Persistent
            [
            	'type' => 'button',
                'label' => esc_html__( 'Disable conflicting settings', 'ad-block-guard' ),
                'url'   => esc_url_raw( add_query_arg(
                    [
                        'action' => 'disable_wp_rocket_conflicts',
                        '_wpnonce' => wp_create_nonce( 'disable_wp_rocket_conflicts' ),
                        'redirect_to' => urlencode(add_query_arg(null, null)),
                    ],
                    admin_url( 'admin-post.php' )
                ) ),
            ]
        );
    }
}



    public function disable_wp_rocket_conflicts() {
        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'disable_wp_rocket_conflicts')) {
            wp_die(esc_html__('Invalid request.', 'ad-block-guard'));
        }

        if (!defined('WP_ROCKET_VERSION')) {
            wp_redirect(admin_url());
            exit;
        }

        $rocket_settings = get_option('wp_rocket_settings', []);
        $updated_settings = $rocket_settings;

        foreach ($this->conflicting_settings as $key => $message) {
            if (isset($rocket_settings[$key])) {
                $updated_settings[$key] = 0;
            }
        }

        update_option('wp_rocket_settings', $updated_settings);

        if (function_exists('rocket_clean_domain')) {
            rocket_clean_domain();
        }

        $notices = new Notices();
        $notices->clear_notice('wp_rocket_incompatibility');

        wp_redirect(admin_url());
        exit;
    }

	public function notify_admin_to_flush_cache() {
	    $notices = new Notices();

	    // Check if the flush notice is already stored
	    $stored_notices = get_option('wuadblockguard_notices', []);
	    if (empty($stored_notices['wp_rocket_flush_notice'])) {
	        if (defined('WP_ROCKET_VERSION') && WP_ROCKET_VERSION) {

				if ( function_exists( 'rocket_renew_box' ) && function_exists( 'rocket_warning_plugin_modification' ) ) {
				    rocket_renew_box( 'rocket_warning_plugin_modification' );
				}

	        	/*
	            $notices->add_notice(
	                'wp_rocket_flush_notice',
	                __('Flush the WP Rocket cache after completing all customizations to apply changes.', 'ad-block-guard'),
	                'warning',
	                true, // Persistent notice
	                false, // Not dismissible
	                [
	                    'label' => __('Flush WP Rocket Cache', 'ad-block-guard'),
	                    'url'   => esc_url_raw(add_query_arg(
	                        [
	                            'action' => 'flush_wp_rocket_cache',
	                            '_wpnonce' => wp_create_nonce('flush_wp_rocket_cache_nonce'),
	                            'redirect_to' => urlencode(add_query_arg(null, null)),
	                        ],
	                        admin_url('admin.php')
	                    )),
	                ]
	            );
	            */
	        } elseif (defined('WP_CACHE') && WP_CACHE) {

	        	/*
	            $notices->add_notice(
	                'wp_cache_notice',
	                __('WP_CACHE is enabled. Please ensure you purge your cache after making customizations.', 'ad-block-guard'),
	                'warning',
	                true, // Persistent notice
	                false  // Not dismissible
	            );
	            */
	        }
	    }

	    // Display all notices
	    $notices->display_notices();
	}


    public function handle_cache_flush_request() {
        if (isset($_GET['action']) && $_GET['action'] === 'flush_wp_rocket_cache') {
            if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'flush_wp_rocket_cache_nonce')) {
                wp_die(esc_html__('Invalid request.', 'ad-block-guard'));
            }

            if (function_exists('rocket_clean_domain')) {
                rocket_clean_domain();
            }

            $notices = new Notices();
            $notices->clear_notice('wp_rocket_flush_notice');

            $redirect_url = isset($_GET['redirect_to']) ? esc_url_raw(urldecode($_GET['redirect_to'])) : admin_url();
            wp_redirect($redirect_url);
            exit;
        }
    }
}
