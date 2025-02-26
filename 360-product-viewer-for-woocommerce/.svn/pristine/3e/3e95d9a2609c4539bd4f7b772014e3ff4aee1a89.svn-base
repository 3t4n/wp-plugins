<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load product images
$data_images = implode(',',$gallery_urls);
$width = $gallery_details[1];
$height = $gallery_details[2];
$slider_images = [];
foreach( $gallery_urls as $key => $val ) {
	$slider_images[] = '<li><img src="'.esc_attr($val).'" alt="360 Slider images" class="normal previous-image"></li>';//$val;
} 

// Assign class if show cursor is on from admin panel
$show_cursor_class = "";
if(isset($product_data["showcursor"]) && !empty($product_data["showcursor"]) && (trim($product_data["showcursor"]) == "1" || trim($product_data["showcursor"]) == "true")) {
	$show_cursor_class = "enable-show-cursor";
}

// Create unique id of each shortcode for product images
$product_360view_dynamic_id = md5(rand(0,16036598).time().rand(0,16036598)); 

echo '<div data-original-title="'. esc_attr__( '360 Product View', 'wp360view' ) .'"  id="'.esc_attr( $product_360view_dynamic_id ) .'" data-images="'. esc_attr ( $data_images ) .'" data-height="'. esc_attr( $height ) .'" data-width="'. esc_attr( $width ) .'" class="custom-slider-cl">';

	echo '<div class="slider-side-icons">';		

		// Show full screen icon if enable from shortcode settings or admin settings
		if($product_data["fullscreen"] === "true" || $product_data["fullscreen"] === true || $product_data["fullscreen"] == '1'){
			echo '<div class="full-screen">';
				echo '<a href="javascript:void(0);"></a>';
			echo '</div>';
		} 
		
		// Show zoom in/out icon if enable from shortcode settings or admin settings
		if( $product_data["zoominout"] === "true" || $product_data["zoominout"] === true || $product_data["zoominout"] == '1' ) {
			echo '<div class="image-zoomin">';
				echo '<a href="javascript:void(0);"></a>';
			echo '</div>';
		}

    echo '</div>';	

	// Show 360 view of product images
	echo '<div class="threesixty '.esc_attr($show_cursor_class).' full-screen-product threesixty-products-'.esc_attr($product_360view_dynamic_id).'">';  
		echo '<div class="spinner spinner-'.esc_attr($product_360view_dynamic_id).'"><span>0%</span></div>';
		echo '<div class="threesixty_images__container"><ol class="threesixty_images short-threesixty-products threesixty_images-'.esc_attr($product_360view_dynamic_id).'"></ol></div>';
			foreach ( $product_data as $key => $fields) {
				echo "<input type='hidden' class='cls-".esc_attr($key)."' value='".esc_attr($fields)."'  />";
			}
	echo '</div>';

echo '</div>';  