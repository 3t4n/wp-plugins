<?php 
/*Plugin Name: ASPL Quick View for WooCommerce 
	Description: ASPL Quick View for WooCommerce makes it easier than ever for customers to browse through your WooCommerce products and make it Add-to-cart.
	Author: Acespritech Solutions Pvt. Ltd.
	Author URI: https://acespritech.com/
	Version: 1.1.0
	Domain Path: /languages/
	License: GPLv2 or later
 	License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) 
{
	exit;
}

/*Add Admin Menu Page*/
add_action('admin_menu', 'aspl_qview_add_admin_menu');
function aspl_qview_add_admin_menu(){
	$hook = add_menu_page('Quick-view', 'Quick-view', 'manage_options', 'quick_view', 'aspl_qview_menu_page_callback_fun','
dashicons-welcome-view-site' );
}
function aspl_qview_menu_page_callback_fun(){
	if (isset($_POST['aspl_qview_button_text_save'])) {
		$button_text  = sanitize_text_field($_POST['aspl_qview_button_text']);
		$button_back_color = sanitize_text_field($_POST['aspl_qview_button_back_color']);
		$button_text_color = sanitize_text_field($_POST['aspl_qview_button_text_color']);

		update_option('aspl_qview_button_text', $button_text);
		update_option('aspl_qview_button_back_color', $button_back_color);
		update_option('aspl_qview_button_text_color', $button_text_color);

	}
	$button_text = get_option('aspl_qview_button_text');
	$button_back_color = get_option('aspl_qview_button_back_color');
	$button_text_color = get_option('aspl_qview_button_text_color');


	include 'aspl_qview_first_menu_page_callback.php';
}

/*Script Admin and User Side*/
	/*User Side*/
		function aspl_qview_css_hook() {
		    wp_enqueue_style( 'aspl_quick_view_css', plugin_dir_url(__FILE__) . 'css/aspl_quick_view_user_css.css'); 
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui');
			wp_enqueue_script( 'wc-add-to-cart-variation' );
			wp_enqueue_script('wc-single-product');
		    wp_enqueue_script( 'aspl_quick_view_css', plugin_dir_url(__FILE__) . 'js/aspl_quick_view_custom_js.js', array('jquery'), '', true); 
		}
		add_action('wp_enqueue_scripts', 'aspl_qview_css_hook');
		function aspl_qview_css_admin_hook(){
		    wp_enqueue_style( 'aspl_quick_view_css_admin', plugin_dir_url(__FILE__) . 'css/aspl_quick_view_admin_css.css'); 
		}
		add_action('admin_enqueue_scripts','aspl_qview_css_admin_hook');
	/*End*/
/*End*/
		
add_action( 'woocommerce_after_shop_loop_item', 'aspl_qview_loop_btn');	
function aspl_qview_loop_btn(){
	include 'aspl_view_popup.php';
}

add_action( 'aspl_qview_product_data', 'woocommerce_template_single_title');
add_action( 'aspl_qview_product_data', 'aspl_qview_get_star_rating' );
add_action( 'aspl_qview_product_data', 'woocommerce_template_single_rating' );
add_action( 'aspl_qview_product_data', 'woocommerce_template_single_price');
add_action( 'aspl_qview_product_data', 'woocommerce_template_single_excerpt');
add_action( 'aspl_qview_product_data', 'woocommerce_template_single_add_to_cart');
add_action( 'aspl_qview_product_data', 'woocommerce_template_single_meta' );


function aspl_qview_get_star_rating()
{
    global $woocommerce, $product;
    $average = $product->get_average_rating();

    _e('<div class="star-rating"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>');
}

