<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


add_action('woocommerce_after_shop_loop_item', 'add_quick_view_button', 20);

function add_quick_view_button() {
    global $product;
    $enable_appalify_qv = (bool) get_option('appalify_enable_qv', true);
    if($enable_appalify_qv == 1){
    echo '<div class="quick-view-button-container"><a href="#" class="quick-view-button" data-product-id="' . esc_attr($product->get_id()) . '">Quick View</a></div>';
    }
}

