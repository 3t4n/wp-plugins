<?php
echo '<div class="edd-products">';
foreach ($products as $product) {
    echo '<div class="edd-product" style="padding: 20px 4px;display: flex;flex-direction: row;align-items: flex-end; justify-content: space-around;">';
    if($settings['show-image'] == 'yes') echo get_the_post_thumbnail(intval($product->ID), 'small', ['style' => 'max-width: 40%;']);
    echo wp_kses_post('<div class="edd-product-info">');
    echo wp_kses_post('<h3><a href="' . get_permalink(intval($product->ID)) . '">' . esc_html($product->post_title) . '</a></h3>');
    echo wp_kses_post('<div class="edd-product-price">' . edd_price(intval($product->ID)) . '</div>');
    echo edd_get_purchase_link(array_merge(['download_id' => intval($product->ID)],$purchaseLinkArgs));
    echo '</div>';
    echo '</div>';
}
echo '</div>';