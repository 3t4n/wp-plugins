<?php

namespace AdBlockGuard;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;
use Carbon_Fields\Datastore\Datastore;
use AdBlockGuard\CarbonFieldsSetup;
use AdBlockGuard\LicenseChecker;
use AdBlockGuard\PluginLogger;
use AdBlockGuard\Notices;

class Admin
{
    private static $instance = null;
    private static $encoding = 'NQOYBPXTHNEQ_VF_CEB';

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

	public function __construct()
	{
	    // Register hooks
	    $this->register_hooks();

	    // Warning if not enabled
	    if (get_option('_wuadblockguard_enable') !== 'yes') {
	        // Show admin notice
	        $this->wuadblockguard_admin_notice(
	            __('AdBlock Guard is currently disabled globally. Enable it under [General Options]. Overlays can be enabled and disabled per Role as needed.', 'ad-block-guard'),
	            'warning'
	        );
	    } else {



	        // Ensure at least one detection method is chosen
	        if (empty(get_option('_wuadblockguard_fast_detection')) &&
	            empty(get_option('_wuadblockguard_custom_load_js_enable')) &&
	            empty(get_option('_wuadblockguard_network_detection')) &&
	            empty(get_option('_wuadblockguard_remote_detection'))) 
	        {
	            $this->wuadblockguard_admin_notice(
	                __('You must enable at least one detection method in [General Options] or detection can never occur.', 'ad-block-guard'),
	                'error'
	            );   
	        }
	    }
	}

	private function register_hooks()
	{
	    // Enqueue admin scripts and styles
	    add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
	}

	public function enqueue_admin_scripts()
	{
	    $screen = get_current_screen();

	    // Ensure $screen is valid
	    if (!$screen) {
	        return;
	    }

	    // Define the allowed screen IDs
	    $allowed_screen_ids = [
	        'toplevel_page_wuadblockguard_settings',
	        'adblock-guard_page_wuadblockguard_demo_page',
	        'adblock-guard_page_wuadblockguard_license_key',
	        'adblock-guard_page_wuadblockguard_system_check',
	    ];

	    // If current screen isn't one of these, bail early
	    if (! in_array($screen->id, $allowed_screen_ids, true)) {
	        return;
	    }

	    // ---- Enqueues for DEMO PAGE ----
	    // If this is the demo page
	    if (strpos($screen->id, 'wuadblockguard_demo_page') !== false) {
	        wp_enqueue_script(
	            'sweetalert2',
	            'https://cdn.jsdelivr.net/npm/sweetalert2@11',
	            [],
	            '11.0.0',
	            true
	        );

	        wp_enqueue_style(
	            'sweetalert2',
	            'https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css',
	            [],
	            '11.0.0'
	        );

	        wp_enqueue_script(
	            'wuadblockguard_admin_js_demo',
	            ADBLOCKGUARD_PLUGIN_URL . 'assets/js/demo-page.js',
	            ['wp-i18n'],
	            ADBLOCKGUARD_VERSION,
	            true
	        );
	    }

	    // ---- Enqueues for MAIN SETTINGS PAGE ----
	    // If this is the main settings page
		if (
		    strpos($screen->id, 'wuadblockguard_settings') !== false ||
		    strpos($screen->id, 'wuadblockguard_demo_page') !== false ||
		    strpos($screen->id, 'wuadblockguard_system_check') !== false ||
		    strpos($screen->id, 'wuadblockguard_license_key') !== false
		) {
	        // JS: admin-linking
	        wp_enqueue_script(
	            'wuadblockguard_admin_js_linking',
	            ADBLOCKGUARD_PLUGIN_URL . 'assets/js/admin-linking.js',
	            ['wp-i18n'],
	            ADBLOCKGUARD_VERSION,
	            true
	        );

	        // JS: form-dirty
	        wp_enqueue_script(
	            'wuadblockguard_admin_form_dirty',
	            ADBLOCKGUARD_PLUGIN_URL . 'assets/js/admin-form-dirty.js',
	            ['wp-i18n'],
	            ADBLOCKGUARD_VERSION,
	            true
	        );

	        // JS: main admin
	        wp_enqueue_script(
	            'wuadblockguard_admin_js',
	            ADBLOCKGUARD_PLUGIN_URL . 'assets/js/admin.js',
	            ['wp-i18n'],
	            ADBLOCKGUARD_VERSION,
	            true
	        );

	        // JS: admin notices
	        wp_enqueue_script(
	            'wuadblockguard_admin_js_notices',
	            ADBLOCKGUARD_PLUGIN_URL . 'assets/js/admin-notices.js',
	            ['wp-i18n'],
	            ADBLOCKGUARD_VERSION,
	            true
	        );

	        // JS: validation
	        wp_enqueue_script(
	            'wuadblockguard_admin_validation_js',
	            ADBLOCKGUARD_PLUGIN_URL . 'assets/js/admin-validation.js',
	            ['wp-i18n'],
	            ADBLOCKGUARD_VERSION,
	            true
	        );

	        // Thickbox
	        add_thickbox();

	        // JS: demo
	        wp_enqueue_script(
	            'wuadblockguard_admin_js_demo',
	            ADBLOCKGUARD_PLUGIN_URL . 'assets/js/demo.js',
	            ['wp-i18n'],
	            ADBLOCKGUARD_VERSION,
	            true
	        );

	        $this->enableEncoding();

	        if (!defined(str_rot13( self::$encoding ))) {

	            // Enqueue the admin JS script for the free version
	            wp_enqueue_script(
	                'wuadblockguard_free_js',
	                ADBLOCKGUARD_PLUGIN_URL . 'assets/js/free.js',
	                ['wp-i18n'], // Dependencies
	                ADBLOCKGUARD_VERSION,
	                true
	            );
	        } else {
	            // Enqueue the admin JS script for the free version
	            wp_enqueue_script(
	                'wuadblockguard_paid_js',
	                ADBLOCKGUARD_PLUGIN_URL . 'assets/js/paid.js',
	                ['wp-i18n'], // Dependencies
	                ADBLOCKGUARD_VERSION,
	                true
	            );
	        }

	        // ---- IMPORTANT: enqueue admin.css with wp_enqueue_style() ----
	        wp_enqueue_style(
	            'wuadblockguard_admin_css',
	            ADBLOCKGUARD_PLUGIN_URL . 'assets/css/admin.css',
	            [],
	            ADBLOCKGUARD_VERSION
	        );
	    }

	    // ---- Localization ----
	    // Only call wp_localize_script *after* the script is enqueued
	    // We'll localize the 'wuadblockguard_admin_js' handle as an example
	    wp_localize_script(
	        'wuadblockguard_admin_js',
	        'customAdminData',
	        [
	            'proFeatureMessage' => __('This is a pro feature', 'ad-block-guard'),
	        ]
	    );
	}


    public function wuadblockguard_admin_notice($message, $type = 'warning', $dismissible = false)
    {
        add_action('admin_notices', function () use ($message, $type, $dismissible) {
            // Ensure the type is one of the allowed values
            $allowed_types = ['warning', 'error', 'info', 'success'];
            if (!in_array($type, $allowed_types)) {
                $type = 'warning'; // Default to 'warning' if an invalid type is provided
            }

            // Capitalize the first letter of the type for display
            $type_display = ucfirst($type);

            // Check if we are on one of the plugin's admin pages
            $screen = get_current_screen();

            // Determine the class based on whether the notice is dismissible
            $class = $dismissible ? 'is-dismissible' : '';

            if ($screen && isset($screen->id) && 
                (
                    $screen->id === 'toplevel_page_wuadblockguard_settings' 
                   // || $screen->id === 'ad-block-guard-settings_page_wuadblockguard_license_key'
                    || $screen->id === 'ad-block-guard-settings_page_wuadblockguard_demo_page'
                    || $screen->id === 'ad-block-guard-settings_page_wuadblockguard_review'
                    || $screen->id === 'ad-block-guard-settings_page_wuadblockguard_help'
                )) {
                // Output the notice with the message
                echo sprintf(
                    '<div class="notice notice-%1$s %2$s"><p><strong>%3$s:</strong> %4$s</p></div>',
                    esc_attr($type),
                    esc_html($class),
                    esc_html($type_display),
                    wp_kses_post($message)
                );
            }
        });
    }

    private function enableEncoding()
    {
		if (LicenseChecker::getInstance()->isLicenseValid()) {
			if ( ! defined( str_rot13( self::$encoding ) ) ) {
			    define( str_rot13( self::$encoding ), true );
			}
		}
    }

}
