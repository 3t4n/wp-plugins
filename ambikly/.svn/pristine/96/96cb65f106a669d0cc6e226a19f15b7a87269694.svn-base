<?php
/**
 * The Template for displaying all product
 * @package     Ambikly\Templates
 * @version     1.0.0
 */
if (!defined('ABSPATH')) {
    exit;
}

use Ambikly\Models\Product;

ambikly_header('single-product');
/**
 * @var Product $ambikly_product
 */
global $ambikly_product;
?>
    <div class="ambikly-product-page">
        <div class="ambikly-container">
            <!-- Product Section -->
            <div class="ambikly-product-section">
                <div class="ambikly-product-image">
                    <?php
                    ambikly_image($ambikly_product->getImage(), 'full', ['alt' => $ambikly_product->getProductName()]);
                    ?>

                </div>

                <div class="ambikly-product-details">
                    <form method="post" class="ambikly-add-to-cart">
                        <?php
                        ambikly_action_field('add_to_cart');
                        ambikly_nonce_field('add_to_cart');
                        ambikly_hidden_field('product_id', $ambikly_product->getID());
                        ?>
                        <h1 class="ambikly-product-title"><?php echo esc_html($ambikly_product->getProductName()); ?></h1>
                        <p class="ambikly-product-price"><?php ambikly_price_html($ambikly_product); ?></p>
                        <p class="ambikly-product-description">
                            <?php
                            echo esc_html($ambikly_product->getDescription());
                            ?>
                        </p>

                        <div class="ambikly-product-actions">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1">
                            <button type="submit"
                                    class="ambikly-btn"><?php echo esc_html__('Add to Cart', 'ambikly'); ?></button>
                        </div>

                        <div class="ambikly-product-meta">
                            <p>Categories: <?php
                                $categories = $ambikly_product->getCategories();
                                $category_list_index = 0;
                                foreach ($categories as $category_slug => $category_title) {
                                    $category_list_index++;
                                    echo '<a href="' . esc_url(ambikly_permalink($category_slug, 'category')) . '">' . esc_html($category_title) . '</a>';
                                    if ($category_list_index != count($categories)) {
                                        echo ', ';
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php

ambikly_footer('single-product');
