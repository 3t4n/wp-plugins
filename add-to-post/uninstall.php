<?php
if(!defined('WP_UNINSTALL_PLUGIN')) {
  exit();
}

delete_option('gts_addtopost_top_enabled');
delete_option('gts_addtopost_top');
delete_option('gts_addtopost_bottom_enabled');
delete_option('gts_addtopost_bottom');
?>
