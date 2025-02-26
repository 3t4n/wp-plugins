<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
 /* Remove saved options */
$general = "ae_admin_customizer_options";
$logreg  = "ae_admin_customizer_logreg_options";
$admcolors  = "ae_admin_customizer_color_options";
$custom_css = "ae_admin_customizer_custom_css";

 
delete_option($general);
delete_site_option($general);

delete_option($logreg);
delete_site_option($logreg);

delete_option($admcolors);
delete_site_option($admcolors);

delete_option($custom_css);
delete_site_option($custom_css);
 
