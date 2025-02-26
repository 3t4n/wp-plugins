<?php

// If uninstall is not called from WordPress, exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}

// Upon plugin deletion, delete options
delete_option("aba_enabled");
delete_option("aba_notice_text");
delete_option("aba_show_banner_dismiss_icon");
delete_option("aba_show_banner_loggedin");
delete_option("aba_div_location");
delete_option("aba_background_color");
delete_option("aba_font_color");
delete_option("aba_font_size");
delete_option("aba_cookie_allow");
delete_option("aba_cookie_timeout");
// Removed in 1.4, but left in for archive
//delete_option("aba_timer_allow");
//delete_option("aba_timer_timeout");

?>
