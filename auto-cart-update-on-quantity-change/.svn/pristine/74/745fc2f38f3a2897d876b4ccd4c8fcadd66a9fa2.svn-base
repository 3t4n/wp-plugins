<?php
/**
 * Plugin Name: Auto Cart Update On Quantity Change
 * Plugin URI: https://wordpress.org/plugins/auto-cart-update-on-quantity-change
 * Text Domain: auto-cart-update-on-quantity-change
 * Description: Auto-update WooCommerce Cart when Quantity Changes, Remove "Update Cart" button and Do It Automatically.
 * Domain Path: /languages/
 * Version: 1.0
 * Author: Rajdip Sinha Roy
 * Author URI: https://rajdip.tech
 * Developer: Rajdip Sinha Roy
 * Developer URI: https://rajdip.tech
 * WC requires at least: 3.0.0
 * WC tested up to: 4.2.2
*/



if (! defined('ABSPATH')) {
    exit;
}

/* Checking WooCommerce is active or not */

   if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

/**
 * Custom Script
 */

add_action( 'wp_footer', 'cart_update_qty_script' );
function cart_update_qty_script() {
  if (is_cart()) :
   ?>
    <script>
    	jQuery(window).on('load', function(){
    		jQuery("[name='update_cart']").removeAttr('disabled');
    	});
    	jQuery( document.body ).on( 'updated_cart_totals', function(){
		    jQuery("[name='update_cart']").removeAttr('disabled');
		});
		jQuery('div.woocommerce').on('change', '.qty', function(){
           jQuery("[name='update_cart']").trigger("click"); 
        });
   </script>
<?php
endif;
}
}