<?php
echo '<style> 
.edd-product-card {
    margin: 3%;
    padding-bottom: 2%;
    border-radius: 2%;
}
.edd-product-card-info {
    text-align: center;
}
.edd-product-card-info h3 {
    margin: 13px 0;
}
.edd-product-card-info .edd_price {
    margin: 13px 0;
}
.edd-product-card-info .edd-product-price {
    margin-bottom: 16px;
}
.edd-product-card img {
    border-top-left-radius: 2%;
    border-top-right-radius: 2%;
}
.edd-product-cart-btn .edd_purchase_submit_wrapper a {
    width: 80%;
}
</style>';



echo '<div class="edd-products-card" style="display: grid; grid-template-columns:'. str_repeat("auto ", intval($settings["product-per-row"])) . ';">';
foreach ($products as $product) {
    echo '<div class="edd-product-card">';
    echo wp_kses_post('<a href="' . get_permalink(intval($product->ID)) . '">');
        if($settings['show-image'] == 'yes') echo get_the_post_thumbnail(intval($product->ID));
    echo '</a>';
    echo '<div class="edd-product-card-info">';
    echo wp_kses_post('<h3><a href="' . get_permalink(intval($product->ID)) . '">' . esc_html($product->post_title) . '</a></h3>');
    echo wp_kses_post('<div class="edd-product-price">' . edd_price(intval($product->ID)) . '</div>');
    echo '<span class="edd-product-cart-btn">' . edd_get_purchase_link(array_merge(['download_id' => intval($product->ID)],$purchaseLinkArgs)) . '</span>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';