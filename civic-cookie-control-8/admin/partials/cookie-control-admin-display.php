<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.civicuk.com/
 * @since      1.0.0
 *
 * @package    Civic_Cookie_Control_8
 * @subpackage Civic_Cookie_Control_8/admin/partials
 */

// pull the settings from the db
// fallback default settings

$ccc_cookiecontrol_settings=$this->ccc_cookiecontrol_settings_init();
$ccc_cookiecontrol_settings_defaults_ins=$this->ccc_cookiecontrol_settings_defaults();
$ccc_cookiecontrol_current_version=$this->ccc_is_civic_current_version();

if ( ! $ccc_cookiecontrol_current_version ) {
  $this->ccc_update_civic_version();
}

$ccc_options_apikey_version = get_option('civic_cookiecontrol_apikey_version') ? get_option('civic_cookiecontrol_apikey_version') : '';

if( $ccc_options_apikey_version == 'v9'){

    require_once ('v9/admin-form-fields-display.php');

}else{

    require_once ('v8/admin-form-fields-display.php');

}
?>