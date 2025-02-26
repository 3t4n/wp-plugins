<?php
/**
 * Plugin Name: ingenidev UAE Shipping Emirates
 * Plugin URI: https://ingenidev.com/uae-shipping-emirates/
 * Author: ingenidev
 * Author URI: https://ingenidev.com
 * Description: This plugin provides customization options for the UAE for the default WooCommerce Shipping options per Emirate.
 * Text Domain: ingenidev-uae-shipping-emirates
 * Version: 1.0.1
 * Requires Plugins: woocommerce
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') or die('Direct access not permitted');

add_filter(
    'woocommerce_get_country_locale',
    static function (array $locale): array {
        $locale['AE']['state']['required'] = true;
        return $locale;
    }
);

add_filter( 'woocommerce_default_address_fields' , 'ingenidev_use_custom_override_default_address_fields',1,9999 );
function ingenidev_use_custom_override_default_address_fields( $address_fields ) {
	$address_fields['state']['label'] = 'Emirate/Region';
	$address_fields['state']['priority'] = 45;
	$address_fields['city']['label'] = "Area";
	$address_fields['city']['priority'] = 47;
	$address_fields['address_1']['label'] = "Street/Building/Apartment";
	unset($address_fields['company']);
	unset($address_fields['address_2']);




     return $address_fields;
}

add_filter( 'woocommerce_states', 'ingenidev_use_fs_add_uae_emirates' );
function ingenidev_use_fs_add_uae_emirates( $states ) {
 $states['AE'] = array(
	'DUBAI'  => __( 'Dubai', 'ingenidev-uae-shipping-emirates' ),
	'ABU DHABI' => __( 'Abu Dhabi', 'ingenidev-uae-shipping-emirates' ),
	'AL AIN' => __( 'Al Ain', 'ingenidev-uae-shipping-emirates' ),
	'SHARJAH' => __( 'Sharjah', 'ingenidev-uae-shipping-emirates' ),
 	'AJMAN' => __( 'Ajman', 'ingenidev-uae-shipping-emirates' ),
 	'FUJAIRAH'  => __( 'Fujairah', 'ingenidev-uae-shipping-emirates' ),
 	'RAS AL KHAIMAH' => __( 'Ras Al Khaimah', 'ingenidev-uae-shipping-emirates' ),
 	'UMM AL QUWAIN'  => __( 'Umm Al Quwain', 'ingenidev-uae-shipping-emirates' ),
	'WESTERN REGION'  => __( 'Western Region', 'ingenidev-uae-shipping-emirates' ),

 );
 return $states;
}
register_activation_hook(__FILE__, 'ingenidev_use_activate');

function ingenidev_use_activate()
{
    add_option('ingenidev_use_welcome_displayed', false);
}

add_action('admin_notices', 'ingenidev_use_welcome_message');

function ingenidev_use_welcome_message()
{
    if (!get_option('ingenidev_use_welcome_displayed') && is_admin() && current_user_can('manage_options')) {
        ?>
        <div class="notice notice-success is-dismissible" id="ingenidev-welcome-notice">
            <p><?php esc_html_e('Welcome! Thank you for installing ingenidev UAE Shipping Emirates', 'ingenidev-uae-shipping-emirates'); ?></p>
            <button type="button" class="notice-dismiss" id="ingenidev-dismiss-notice"></button>
        </div>
        <?php
        wp_enqueue_script(
            'dismiss-notice',
            plugin_dir_url(__FILE__) . '/js/ingenidev_use_dismiss_notice.js',
            array('jquery'),
            '1.0.0',
            true
        );
        wp_localize_script('dismiss-notice', 'ingenidev_use_ajax_obj', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'action' => 'ingenidev_use_dismiss_welcome_notice'
        ));
        update_option('ingenidev_use_welcome_displayed', true);
    }
}

add_action('wp_ajax_ingenidev_use_dismiss_welcome_notice', 'ingenidev_use_dismiss_welcome_notice');

function ingenidev_use_dismiss_welcome_notice()
{
    update_option('ingenidev_use_welcome_displayed', true);
    wp_die();
}

add_action('wp_dashboard_setup', 'ingenidev_use_custom_dashboard_widgets');

function ingenidev_use_custom_dashboard_widgets()
{
    global $wp_meta_boxes;
    wp_add_dashboard_widget('ingenidev-use-welcome-widget', 'ingenidev, UAE Emirates Shipping Configurator', 'ingenidev_use_custom_dashboard_help');
}

function ingenidev_use_custom_dashboard_help()
{
    ?>
    <p>Thank you for installing our Plugin. Should you encounter any issues, please do not hesitate to contact us.</p>
    <?php
}


register_uninstall_hook(__FILE__, 'ingenidev_use_uninstall');

function ingenidev_use_uninstall()
{
    delete_option('ingenidev_use_welcome_displayed');
}

