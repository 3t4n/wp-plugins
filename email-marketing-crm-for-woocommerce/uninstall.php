<?php 
if( !defined( 'ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') ) exit();
delete_option('woocommerce_woo-repupress-mail-crm_settings');
// Note that tags in Advanced Product Data section will not be deleted
?>