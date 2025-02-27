<?php
/**
* Plugin Name: Free Shipping Badge
* Plugin URI: https://wordpress.org/plugins/free-shipping-badge
* Description: This is plugin to adding "FREE SHIPPING BADGE" to product if price is higher of some "admin declared limit price" 
* Version: 1.2
* Author: Desperado House - Cvijetin Maletic
* Author URI: https://desperadohouse.com/
**/

/** REGISTER STYLES **/
add_action( 'wp_enqueue_scripts', 'fsb_stylesheet' );
function fsb_stylesheet() {
    wp_register_style( 'view-style', plugins_url('/view/fsb_badge_style.css', __FILE__) );
    wp_register_style( 'view-style', plugins_url('/view/fontawesome.css', __FILE__) );
    wp_enqueue_style( 'view-style' );
}

/** ADD FREE SHIPPING BADGE SUFFIX AFTER PRICE **/
add_filter( 'woocommerce_get_price_suffix', 'fsb_suffix', 99, 4 );
function fsb_suffix( $html, $product, $price, $qty ){
	global $woocommerce_loop;
	$fsb_price = (float) $product->get_price(); // Regular price
	$fsb_limit_price = esc_attr( get_option('fsb_limit_price_option') ); // Limit price
	$fsb_badge_text = esc_attr( get_option('fsb_badge_text_option') ); // Text to display on badge
	$fsb_badge_color = esc_attr( get_option('fsb_badge_color') ); // Color of badge
	$fsb_badge_text_color = esc_attr( get_option('fsb_badge_text_color') ); // Color of badge text
	$fsb_products_with_tag = esc_attr( get_option('fsb_badge_product_with_tag') ); // Show Products tag
	$fsb_products_with_tag_hide = esc_attr( get_option('fsb_badge_hide_product_with_tag') ); // Hide Products tag
	$fsb_hide_badge_shop_page = esc_attr( get_option('fsb_hide_badge_shop_page') ); // Shop Page show or not
	$fsb_hide_badge_category_page = esc_attr( get_option('fsb_hide_badge_category_page') ); // Category Page show or not
	$fsb_hide_badge_single_page = esc_attr( get_option('fsb_hide_badge_single_page') ); // Single Product Page show or not
	$fsb_hide_badge_crossup_page = esc_attr( get_option('fsb_hide_badge_crossup_page') ); // Single Product Page show or not
	$fsb_badge_border = esc_attr( get_option('fsb_badge_border') ); // Badge border option
	$fsb_margin_top = esc_attr( get_option('fsb_margin_top_option') ); // Margin top option
	$fsb_margin_bottom = esc_attr( get_option('fsb_margin_bottom_option') ); // Margin bottom option
	$fsb_padding_top = esc_attr( get_option('fsb_padding_top_option') ); // Padding top option
	$fsb_padding_bottom = esc_attr( get_option('fsb_padding_bottom_option') ); // Padding bottom option

/** DON`T SHOW BADGE IF ISN`T ENTER LIMIT PRICE AND SHOWN IT IF PRODUCT PRICE HIGHER THEN LIMIT **/
	if((($fsb_limit_price == NULL || $fsb_price < $fsb_limit_price) && (!has_term( $fsb_products_with_tag, 'product_tag' ) || $fsb_products_with_tag == NULL) || (has_term( $fsb_products_with_tag_hide, 'product_tag' ) && !($fsb_products_with_tag_hide ==NULL))) 
	|| (($fsb_hide_badge_shop_page == 1) && !is_single() && !is_product_category()) /** DON`T SHOW BADGE ON SHOP PAGE IF IT CHACKED **/
	|| (($fsb_hide_badge_category_page == 1) && is_product_category()) /** DON`T SHOW BADGE ON CATEGORY PAGE IF IT CHACKED **/
	|| (($fsb_hide_badge_single_page == 1) && is_single() && ($woocommerce_loop['name'] !== 'related' || $woocommerce_loop['name'] !== 'up-sells')) /** DON`T SHOW BADGE ON SINGLE PRODUCT PAGE IF IT CHACKED **/
	|| (($fsb_hide_badge_crossup_page == 1) && ($woocommerce_loop['name'] == 'related' || $woocommerce_loop['name'] == 'up-sells'))
	|| ( is_admin() ) 
	|| (is_search())
){
		    $html .='';}

			else if ((isset($fsb_limit_price) && $fsb_price > $fsb_limit_price && !is_product() || $woocommerce_loop['name'] == 'related' || $woocommerce_loop['name'] == 'up-sells' ) || (has_term( $fsb_products_with_tag, 'product_tag') && !is_product() || $woocommerce_loop['name'] == 'related' || $woocommerce_loop['name'] == 'up-sells')){
				$html .='</br>'.'<fsb_badge class="fsb_badge_view_shop" style="background-color:' .$fsb_badge_color.'; border:1px solid '.$fsb_badge_border.'; color:'.$fsb_badge_text_color.'; margin-top:'.$fsb_margin_top.'; margin-bottom:'.$fsb_margin_bottom.'; padding-top: '.$fsb_padding_top.'; padding-bottom:'.$fsb_padding_bottom.'; "><i class="fa fa-truck"></i>&nbsp<span>'.$fsb_badge_text.'</span></fsb_badge>';}
				
	        else if ((isset($fsb_limit_price) && $fsb_price > $fsb_limit_price && is_product() && $woocommerce_loop['name'] !== 'related' && $woocommerce_loop['name'] !== 'up-sells') ||( has_term( $fsb_products_with_tag, 'product_tag') && is_product() && $woocommerce_loop['name'] !== 'related' && $woocommerce_loop['name'] !== 'up-sells')){
                $html .='</br>'.'<fsb_badge class="fsb_badge_view fsb_badge_view_single" style="background-color:' .$fsb_badge_color.'; border: 1px solid '.$fsb_badge_border.'; color:'.$fsb_badge_text_color.'; margin-top:'.$fsb_margin_top.'; margin-bottom:'.$fsb_margin_bottom.'; padding-top: '.$fsb_padding_top.'; padding-bottom:'.$fsb_padding_bottom.'; "><i class="fa fa-truck"> </i>&nbsp<span>'.$fsb_badge_text.'</span></fsb_badge>';}

				return $html;
	}


/** ADMINISTRATION SETTINGS PAGE **/
// create custom plugin settings menu
add_action('admin_menu', 'fsb_plugin_create_menu');

function fsb_plugin_create_menu() {

	//create new top-level menu
	add_menu_page('FSB Plugin Settings', 'Free Shipping Badge', 'administrator', __FILE__, 'fsb_settings_page' , plugins_url('/images/dashboard-logo.svg', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_fsb_settings');
	
	//call admin page
	include ("adminpage.php");
}

/** ADMINISTRATION SETTINGS PAGE **/
// changing of badge colour


