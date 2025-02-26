<?php
//if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();

$option_name1 = 'sopadblock_page';
$option_name2 = 'sopadblock_post_type';
// delete options
delete_option($option_name1);
delete_option($option_name2);
?>