<?php

//if uninstall not called from WordPress exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) || ! current_user_can( 'activate_plugins' ) ) exit();

// remove options added by AddonPayments Plugin

$options = array(
    'addonp_user_type_label_field',
    'addonp_price_with_tax_field',
    'addonp_percent_tax_field',
    'addonp_apply_retention_field',
    'addonp_percent_retention_field',
    'addonp_price_with_or_without_tax_field',
    'addonp_apply_retention_to_private_field',
    'addonp_apply_retention_to_business_field',
    'addonp_apply_retention_to_self_employed_field',
    'addonp_test_mode_field',
    'addonp_merchant_id_field',
    'addonp_shared_secret_field',
    'addonp_currency_field',
    'addonp_auto_set_flag_field',
    'addonp_account_field',
    'addonp_place_currency_sign_field',
    'addonp_currency_sign_field',
    'addonp_fields_to_screen_front_label_field',
    'addonp_show_price_with_tax_field'
    );

foreach ( $options as $option ){

    delete_option( $option );

}