<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

if ($REVI_DISPLAY_PRODUCT_LIST_ALIGN == 'left'): ?>
    <style>
        .reviStarsContainer {
            justify-content: left;
        }
    </style>
<?php endif; ?>


<?php if (isset($productInfo->num_reviews) && isset($productInfo->avg_rating) && $productInfo->num_reviews > 0 && !empty($productInfo->avg_rating)) : ?>

    <div class="reviStarsContainer">

        <div class="reviStars" style="--rating: <?= esc_html($productInfo->avg_rating) ?>;"></div>
        <?php if (!empty($REVI_DISPLAY_PRODUCT_LIST_TEXT)) : ?>
            <div class="reviStarsBlock">(<?= esc_html($productInfo->num_reviews) ?>)</div>
        <?php endif; ?>

    </div>


<?php elseif (!empty($REVI_DISPLAY_PRODUCT_LIST_EMPTY)) : ?>

    <div class="reviStarsContainer">

        <div class="reviStars" style="--rating: 0;"></div>
        <?php if (!empty($REVI_DISPLAY_PRODUCT_LIST_TEXT)) : ?>
            <div class="reviStarsBlock">(0)</div>
        <?php endif; ?>

    </div>

<?php else: ?>

    <?php if (!empty($REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE)) : ?>
        <div class="reviStarsContainer">
        </div>
    <?php endif; ?>

<?php endif; ?>