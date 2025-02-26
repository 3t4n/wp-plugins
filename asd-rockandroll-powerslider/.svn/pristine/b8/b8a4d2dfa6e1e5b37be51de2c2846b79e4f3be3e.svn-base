<?php
/**
 * A template for inserting woocommerce product types with the shortcode.
 *
 * @package        WordPress
 * @subpackage     ASD_RockAndRoll_PowerSlider
 * Author:         Michael H Fahey
 * Author URI:     https://artisansitedesigns.com/staff/michael-h-fahey
 * WooCommerce Product Class API documentation:  https://docs.woocommerce.com/wc-apidocs/class-WC_Product.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;
global $product;

echo '<div class="powerslide-woocommerce" id="powerslide_' . esc_attr( $post->ID ) . '">' . "\r\n";
echo '   <a href="' . esc_url( $product->get_permalink() ) . '">';
echo '      <div class="fullwidth">';

echo '         <div class="rightcol">';
the_post_thumbnail( 'medium' );
echo '         </div>';

echo '         <div class="leftcol">';
echo '            <div class="fullwidth">';
if ( $product->get_name() ) {
	echo '            <span class="name_wrapper"><span class="name"><h3>';
	echo esc_attr( $product->get_name() );
	echo '            </h3></span></span>';
}
echo '            </div>';

echo '            <div class="fullwidth">';
if ( $product->get_sku() ) {
	echo '            <span class="sku_wrapper"><span class="sku">SKU: ';
	echo esc_attr( $product->get_sku() );
	echo '            </span></span>';
}
echo '            </div>';

echo '            <div class="fullwidth">';
if ( $product->get_price() ) {
	echo '            <span class="price_wrapper"><span class="price">Price: ';
	echo wp_kses_post( woocommerce_price( $product->get_price() ) );
	echo '            </span></span>';
}
echo '            </div>';

echo '            <div class="fullwidth">';
if ( $product->get_stock_status() ) {
	echo '            <span class="instock_wrapper"><span class="instock">Availability: ';
	echo esc_attr( $product->get_stock_status() );
	echo '            </span></span>';
}
echo '            </div>';

echo '            <div class="fullwidth">';
the_content();
echo '            </div>';

echo '            <div class="fullwidth">';
echo '               <span class="addtocart">';
echo 'Add To Cart';
echo '               </span>';
echo '            </div>';

echo '         </div>';

echo '      </div>';
echo '   </a>';

echo '</div>';
