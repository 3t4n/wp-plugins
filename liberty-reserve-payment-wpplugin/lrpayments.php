<?php

/*
Plugin Name: Liberty Reserve Payment WPPlugin
Plugin URI: http://www.silmarweny.com
Description: Simple to make payments using Liberty Reserve (Your customers to send any amount / Currency USD). Go to your <a href="admin.php?page=liberty-reserve-payment-wpplugin/lrpayments.php">Account configuration</a>
Author: papadestra
Version: 1.0
Author URI: http://www.papadestra.com
Stable tag: 1.0
*/
define('lrpay_direktori', WP_PLUGIN_DIR.'/liberty-reserve-payment-wpplugin');
//shortcode libertyreserve
add_shortcode('libertyreserve', 'libertyreserve_tampil'); 
add_filter('widget_text', 'do_shortcode');
remove_action('wp_head', 'wp_generator'); // ilang versi 
// MENU ADMIN
add_action('admin_menu', 'libertyreserve_admin_page');
function libertyreserve_admin_page() {  
add_menu_page('Liberty Reserve Payment Account Settings', 'Liberty Reserve', 8, __FILE__, null);
	add_submenu_page(__FILE__,"Liberty Reserve Payment", "Liberty Reserve Payment", 8, __FILE__, "libertyreserve_menu_tampil");  
} 
function libertyreserve_menu_tampil(){
include(lrpay_direktori . '/libertyreserve_menu_tampil.php');
}
// Gaya Tampilan shortcode [libertyreserve]
function libertyreserve_tampil(){
echo'
<p>
<a href="https://sci.libertyreserve.com/en?lr_acc='. get_option('account_number') . '&lr_store='. get_option('store_name') . '&lr_currency=LRUSD&lr_success_url='. get_option('successful_payment_url') . '&lr_success_url_method=GET&lr_fail_url='. get_option('canceled_payment_url') . '&lr_fail_url_method=GET&lr_status_url='. get_option('override_status_url') . '&lr_status_url_method=GET" alt="Pay With Liberty Reserve!" target="_blank"><img src="'. get_option('image_button_url') . '" alt="Pay With Liberty Reserve!" border="0" title="Pay With Liberty Reserve!"/></a>
</p>
';
}

//////////////////////
?>
