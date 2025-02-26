<?php declare(strict_types=1);
/**
 * Functions
 *
 * @package wp-fail2ban-addon-gravity-forms
 * @since 1.1.0
 */
namespace com\wp_fail2ban\addons\GravityForms;

defined('ABSPATH') or exit;

/**
 * Register plugin messages with WP fail2ban
 *
 * @since  1.3.0    Add return type
 * @since  1.0.0
 *
 * @return void
 *
 * @wp-f2b-extra \(WPf2b\+\+/gravityforms\) Spam form submission
 */
function wp_fail2ban_register_plugin(): void
{
    try {
        do_action('wp_fail2ban_register_plugin', WP_FAIL2BAN_ADDON_GRAVITY_FORMS_PLUGIN_SLUG, '<b>WPf2b++</b> | Gravity Forms');
        do_action('wp_fail2ban_register_message', WP_FAIL2BAN_ADDON_GRAVITY_FORMS_PLUGIN_SLUG, [
            'slug'          => 'gform_spam',
            'fail'          => 'soft',
            'priority'      => LOG_NOTICE,
            'event_class'   => 'Spam',
            'event_desc'    => __('Spam form', WP_FAIL2BAN_ADDON_GRAVITY_FORMS_I18N),
            'event_id'      => 0x0001,
            'message'       => 'Spam form submission',
            'vars'          => []
        ]);
    } catch (\RuntimeException $e) {
        // @todo decide what to do
    }
}

/**
 * Fired after an entry is created
 *
 * @since 1.0.0
 *
 * @param array $lead The Entry object
 * @param array $form The Form object
 *
 * @return mixed
 *
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
function gform_entry_created($lead, $form)
{
    if ('spam' == $lead['status']) {
        try {
            do_action('wp_fail2ban_log_message', WP_FAIL2BAN_ADDON_GRAVITY_FORMS_PLUGIN_SLUG, 'gform_spam', []);
        } catch (\InvalidArgumentException $e) { // @codeCoverageIgnore
            // failed to register previously
        }
    }
    return $lead;
}
