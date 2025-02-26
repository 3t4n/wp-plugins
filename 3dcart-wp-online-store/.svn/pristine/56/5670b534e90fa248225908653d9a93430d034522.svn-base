<?php

function shift4shop_shortcode( $atts = array() ) {
  
    // set up default parameters
    extract(shortcode_atts(array(
     'catalog_id' => '0',
     'stock_text' => 'In Stock',
     'nostock_text' => 'Out of Stock',
     'button_color' => '#333333',
     'button_text_color' => '#ffffff',
     'bg_color' => '#ffffff',
     'text_color' => '#000000',
     'button_text' => 'Buy Now',

    ), $atts));

    $response = '<div data-store-url="'.get_option('shift4shop_siteurl').'/" data-currency="'.get_option('shift4shop_currency').'" data-content-id="'.$catalog_id.'" data-affiliate-id="0" data-stock-text="'.$stock_text.'" data-nostock-text="'.$nostock_text.'" data-product-name="true" data-product-thumb="true" data-product-price="true" data-button_color="'.$button_color.'" data-button_text_color="'.$button_text_color.'" data-bgd_color="'.$bg_color.'" data-text_color="'.$text_color.'" data-content-size="default" data-redir="0" data-content-button_text="'.$button_text.'" class="buy-content default" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);"></div>';

    wp_enqueue_script( 'shift4shop-widget-script', Shift4Shop_URL.'assets/js/buy_widget.js', array('jquery'), '1.0.0');
    wp_enqueue_style( 'shift4shop-widget-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');
    wp_enqueue_style( 'shift4shop-widget-style', Shift4Shop_URL.'assets/css/buy_widget.css', null, '1.0.0');
    
    return $response;
}

add_shortcode('shift4shop', 'shift4shop_shortcode');