<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// die when the file is called directly
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
//define a vairbale and store an option name as the value.
$option_name = 'threemasmart_id';
$option_name1 = 'threemasmart_position';
$option_name2 = 'threemasmart_floatingbutton_status';
$option_name3 = 'threemasmart_floation_posi_rechts_nach_links';
$option_name4 = 'threemasmart_floating_posi_unten_nach_oben';


//call delete option and use the vairable inside the quotations
delete_option($option_name);
delete_option($option_name1);
delete_option($option_name2);
delete_option($option_name3);
delete_option($option_name4);

// for site options in Multisite
delete_site_option($option_name);
delete_site_option($option_name1);
delete_site_option($option_name2);
delete_site_option($option_name3);
delete_site_option($option_name4);
?>