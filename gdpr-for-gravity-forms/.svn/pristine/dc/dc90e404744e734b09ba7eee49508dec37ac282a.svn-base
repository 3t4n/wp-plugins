<?php
/**
 * Plugin Name:       Gravity Forms: GDPR Framework Add-on
 * Plugin URI:        https://www.data443.com/gdpr-framework-wordpress-plugin/
 * Description:       The easiest way to make your Gravity Forms GDPR-compliant. Fully documented, extendable and developer-friendly.
 * Requires at least: 4.7
 * Requires PHP:      5.6
 * Version:           2.0.0
 * Author:            Data443
 * Author URI:        https://www.data443.com/
 * Text Domain:       gdpr
 * Domain Path:       /languages
 */

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if (!defined('WPINC')) {
    die;
}

define('GF_GDPR_VERSION', '2.0.0');

add_action('plugins_loaded', function () {

    if (!class_exists('\GFForms')) {
        add_action('admin_notices', function () {
            $class   = 'notice notice-error';
            $message = __('It seems your Gravity Forms plugin is not activated. Gravity Forms GDPR Add-On will not function.', 'gdpr-admin');

            printf('<div class="%1$s"><p>%2$s</p></div>', $class, $message);
        });
        deactivate_plugins( plugin_basename( __FILE__ ) );
        unset($_GET['activate']);
        return;
    }

    $have_gdpr = false;
    $have_gdpr_pro = false;

    if (function_exists('gdpr')) {
        $have_gdpr = true;
    }

    if (function_exists('gdpr_pro')) {
        $have_gdpr_pro = true;
    }

    if (!$have_gdpr && !$have_gdpr_pro) {
        add_action('admin_notices', function () {
            $class   = 'notice notice-error';
            $message =
                sprintf(
                    __("Gravity Forms GDPR Add-On currently requires %sThe GDPR Framework%s to function. Get it from the %sofficial WordPress plugin repository%s - it's free and fully documented!", 'gdpr-admin'),
                    '<a href="https://wordpress.org/plugins/gdpr-framework/" target="_blank">',
                    '</a>',
                    '<a href="https://wordpress.org/plugins/gdpr-framework/" target="_blank">',
                    '</a>'
                );

            printf('<div class="%1$s"><p>%2$s</p></div>', $class, $message);
        });
        deactivate_plugins( plugin_basename( __FILE__ ) );
        unset($_GET['activate']);
        return;
    }

    require_once('src/GravityForms.php');
    require_once('src/GravityFormsGDPRAddOn.php');

    global $gdpr;
    new \data443\GDPR\Modules\GravityForms\GravityForms($gdpr->DataSubject, $gdpr->Consent);
}, 5);