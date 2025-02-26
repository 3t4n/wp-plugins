<?php
/**
 * General functions for the plugin
 */


/**
 * Define if any of the redirect options is toogled
 */
function amr_is_anything_toggled(){
    $ret = false;

    if ( get_option( 'iphone_redirect_toggle' ) == '1' 
        || get_option( 'ipad_redirect_toggle' ) == '1' 
        || get_option( 'android_redirect_toggle' ) == '1' 
        || get_option( 'blackberry_redirect_toggle' ) == '1' 
        || get_option( 'windowsm_redirect_toggle' ) == '1' 
        || get_option( 'opera_redirect_toggle' ) == '1' 
        || get_option( 'palm_redirect_toggle' ) == '1' 
        || get_option( 'other_redirect_toggle' ) == '1' 
    ){
        $ret = true;
    }
    return $ret;
}


?>
