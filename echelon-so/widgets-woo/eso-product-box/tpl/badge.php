<?php if ( empty($has_product) || empty($image) ) : ?>

    <?php echo __('Please select a product with an image.', 'echelon-so'); ?>

<?php else : ?>

    <?php $product = wc_get_product($product_id); ?>

    <a href="<?php echo $link; ?>">

        <div class="eso-product-box-wrap eso-product-box-badge uk-position-relative uk-transition-toggle">

            <div class="eso-product-box-image uk-overflow-hidden uk-position-relative">

                <?php if ( empty($image_mode) ) : ?>

                    <div class="uk-overflow-hidden uk-transition-toggle">

                        <img class="uk-float-left uk-transition-opaque <?php echo esc_attr(implode(' ', $image_class)); ?>" src="<?php echo $image;?>">

                    </div>

                <?php elseif ( $image_mode == 'swap' ) : ?>
                    <?php
                    $image_ids = $product->get_gallery_image_ids();
                    if ( !empty($image_ids) ) {
                        $image_2 = wp_get_attachment_image_url($image_ids[0], $image_size) ;
                    }
                    ?>

                    <div class="uk-overflow-hidden">
                        <img class="uk-float-left uk-transition-opaque <?php echo esc_attr(implode(' ', $image_class)); ?>" src="<?php echo $image;?>">
                        <?php if (!empty($image_2)) : ?>
                            <img class="uk-float-left uk-position-top <?php echo esc_attr(implode(' ', $image_class)); ?> <?php echo esc_attr(implode(' ', $swap_class)); ?>" src="<?php echo $image_2; ?>">
                        <?php endif; ?>
                    </div>

                <?php elseif ( $image_mode == 'slider' ) : ?>

                    <div uk-slider="autoplay: <?php echo esc_attr($autoplay); ?>; autoplay-interval: <?php echo esc_attr($autoplay_interval); ?>; clsActivated: eso" tabindex="-1">

                        <div class="uk-position-relative uk-visible-toggle">

                            <div class="uk-slider-container">

                                <div class="uk-slider-items">

                                    <?php $image_ids = $product->get_gallery_image_ids(); ?>

                                    <div class="uk-width-1-1 uk-overflow-hidden uk-transition-toggle">

                                        <img class="uk-float-left uk-transition-opaque <?php echo esc_attr(implode(' ', $image_class)); ?>" src="<?php echo $image;?>">

                                    </div>

                                    <?php foreach ($image_ids as $k => $v) : ?>
                                        <div class="uk-width-1-1 uk-overflow-hidden uk-transition-toggle">

                                            <img class="uk-float-left uk-transition-opaque <?php echo esc_attr(implode(' ', $image_class)); ?>" src="<?php echo wp_get_attachment_image_url($v, $image_size); ?>" />

                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>

                            <?php if ( !empty($nav_visibility) ) : ?>
                                <div class="uk-slidenav-container uk-flex uk-flex-left <?php echo esc_attr(implode(' ', $slidenav_class)); ?>">
                                    <span class="uk-slidenav eso-slidenav-previous" href="#" uk-slidenav-previous uk-slider-item="previous"></span>
                                    <span class="uk-slidenav eso-slidenav-next" href="#" uk-slidenav-next uk-slider-item="next"></span>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>

                <?php endif; ?>

                <?php if ( !empty($discount_visibility) && $product->is_on_sale() ) : ?>

                    <div class="eso-product-box-discount <?php echo esc_attr(implode(' ', $discount_class)); ?>" style="pointer-events: none;">
                        <?php

                        $discount = ( $product->get_regular_price() -  $product->get_sale_price() ) / $product->get_regular_price() * 100;
                        echo '-' . round($discount) . '%';

                        ?>
                    </div>

                <?php endif; ?>

            </div>

            <div class="eso-badge-wrap uk-position-bottom uk-margin-medium-bottom">

                <?php if ( !empty($category_visibility) ) : ?>

                    <div class="eso-product-box-category <?php echo esc_attr(implode(' ', $category_class)); ?>">
                        <?php echo strip_tags(wc_get_product_category_list($product_id)); ?>
                    </div>

                <?php endif; ?>

                <?php if ( !empty($name_visibility) ) : ?>

                    <div class="eso-product-box-name <?php echo esc_attr(implode(' ', $name_class)); ?>">
                        <?php echo $product->get_name(); ?>
                    </div>

                <?php endif; ?>

                <?php if ( !empty($price_visibility) ) : ?>

                    <div class="eso-product-box-price <?php echo esc_attr(implode(' ', $price_class)); ?>">
                        <?php if ( $product->is_on_sale() ) : ?>
                            <span class="eso-line-through uk-text-small uk-inline uk-margin-micro-right">
                                <?php echo wc_price($product->get_regular_price()); ?>
                            </span>
                            <?php echo wc_price($product->get_sale_price()); ?>
                        <?php else : ?>
                            <?php echo wc_price($product->get_regular_price()); ?>
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </a>

<?php endif; ?>
