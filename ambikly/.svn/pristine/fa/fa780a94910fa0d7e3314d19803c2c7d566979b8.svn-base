<?php
/**
 * The Template for displaying all product
 * @package     Ambikly\Templates
 * @version     1.0.0
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * @var \Ambikly\Models\Products $ambikly_products
 */
global $ambikly_products;


$products = $ambikly_products->getProducts();
?>
<section class="ambikly-shop-page">
    <div class="ambikly-product-grid">
        <?php
        /**
         * @var \Ambikly\Models\Product $product
         */
        foreach ($products as $product) { ?>
            <div class="ambikly-product-item">
                <?php ambikly_image($product->getImage(), 'full', ['alt' => $product->getProductName(), 'class' => 'ambikly-product-image']); ?>
                <div class="ambikly-product-info">
                    <h3 class="ambikly-product-name"><?php echo esc_html($product->getProductName()) ?></h3>
                    <p class="ambikly-product-price"><?php ambikly_price_html($product); ?></p>
                    <a class="ambikly-add-to-cart"
                       href="<?php echo esc_url(ambikly_permalink($product->getProductSlug())) ?>"><?php echo esc_html__('View Product', 'ambikly') ?></a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
