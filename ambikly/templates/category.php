<?php
/**
 * The Template for displaying all Category
 * @package     Ambikly\Templates
 * @version     1.0.0
 */
if (!defined('ABSPATH')) {
    exit;
}
ambikly_header('single-category');
/**
 * @var \Ambikly\Models\Category $ambikly_category
 */
global $ambikly_category;

$products = $ambikly_category->getProducts();

?>
    <section class="ambikly-category-page">
        <h2 class="ambikly-category-title"><?php echo sprintf(esc_html__('Category: %s', 'ambikly'), esc_html($ambikly_category->getCategoryName())) ?></h2>
        <p><?php echo esc_html($ambikly_category->getDescription()) ?></p>
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

<?php

ambikly_footer('single-category');