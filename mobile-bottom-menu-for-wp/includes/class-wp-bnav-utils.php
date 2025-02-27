<?php

class WP_BNAV_Utils {
    public static function isProActivated() {

        if (class_exists('SureCart\Licensing\Client')) {
            $activation_key = get_option('wpmobilebottommenupro_license_options');

            if( $activation_key && count($activation_key) > 0 && isset($activation_key['sc_license_key']) && $activation_key['sc_license_key'] !== '') {
                return true;
            }
        } else {
            global $bnav_pro_license;
            if ($bnav_pro_license) {
                return $bnav_pro_license->is_valid();
            }
        }

         return false;
    }
}