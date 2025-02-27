<div class="bdlr-bundle-container">
    <div class="bdlr-product-wrap">
        <div class="bdlr-product-container1">
            <?php $block_id = 0; ?>
            <div class="bdlr-product-block" data-id=<?php esc_attr_e($block_id);
                                                    $block_id++; ?> data-product_id=<?php esc_attr_e($product1->get_id()); ?> data-product_share=<?php esc_attr_e($sale_price1 / $total_sale_price); ?>>
                <div class="bdlr-product-image-block">
                    <img class="bdlr-product-image" width="100" height="100" src="<?php echo wp_get_attachment_image_url($product1->get_image_id(), 'full'); ?>" />
                    <!-- <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.5" y="0.5" width="79" height="79" rx="1.5" fill="#F4F6F8" stroke=""></rect>
                                                <path d="M61.0875 26.7751L45.8254 23H45.5267H45.4839C44.8864 23 44.3996 23.3663 44.3099 23.9135C44.1865 24.6652 43.7512 25.2683 43.008 25.7805C42.2784 26.2832 41.4496 26.5313 40.5103 26.5313C39.5713 26.5313 38.7388 26.2879 37.9915 25.7805C37.2447 25.273 36.8248 24.663 36.6896 23.9135C36.5903 23.3641 36.0917 23 35.5156 23H35.43H35.1313L19.8691 26.7751C19.2475 26.9288 18.8782 27.5635 19.0367 28.1549L21.1711 36.1311C21.3054 36.6325 21.7899 36.9633 22.3664 36.9633H28.0018V54.8839C28.0018 55.5129 28.5141 56 29.1758 56H51.7809C52.4426 56 52.9976 55.5129 52.9976 54.8839V36.9633H58.633C59.1667 36.9633 59.654 36.6126 59.7856 36.1311L61.9627 28.1549C62.124 27.5639 61.7492 26.9387 61.0875 26.7751ZM57.715 34.7105H51.7809C51.162 34.7105 50.6069 35.218 50.6069 35.8471V53.7474H30.3497V35.8471C30.3497 35.218 29.8374 34.7105 29.1758 34.7105H23.2844L21.6191 28.6828L34.7254 25.4558C35.1954 26.4504 35.9422 27.2622 36.9883 27.8913C38.0342 28.5204 39.2082 28.8248 40.5102 28.8248C41.7912 28.8248 42.9438 28.5204 43.9898 27.8913C45.0358 27.2622 45.804 26.4504 46.2735 25.4558L59.3798 28.6828L57.715 34.7105Z" fill="#919EAB" fill-opacity="0.4"></path>
                                            </svg> -->
                </div>
                <div class="bdlr-product-details-block">
                    <div class="bdlr-product-details-text-container">
                        <h5 class="bdlr-product-title"><?php echo $product1->get_name(); ?></h5>
                        <div class="bdlr-product-price">
                            <?php if ($sale_price1 !== $regular_price1) { ?>
                                <span class="product-cprice" name="product_cprice" value="<?php esc_attr_e($regular_price1); ?>"><?php echo esc_html(Strip_tags(wc_price($regular_price1))); ?></span>
                            <?php } ?>
                            <?php if ($sale_price1 > 0) { ?>
                                <span class="product-price" name="product_price" value="<?php esc_attr_e(Strip_tags($sale_price1)); ?>"><?php esc_html_e(Strip_tags(wc_price($sale_price1))); ?></span>
                            <?php } else { ?>
                                <span class="product-price-free" name="product_price" value="0"><?php echo $free_gift_text; ?></span>
                            <?php } ?>

                        </div>
                    </div>
                </div>

            </div>


        </div>
        <div color="#108043" class="bdlr-add-product">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M31.5 16C31.5 24.5604 24.5604 31.5 16 31.5C7.43959 31.5 0.5 24.5604 0.5 16C0.5 7.43959 7.43959 0.5 16 0.5C24.5604 0.5 31.5 7.43959 31.5 16Z" fill="white" stroke="#DFE3E8"></path>
                <path d="M22.125 15.125H16.875V9.875C16.875 9.392 16.4839 9 16 9C15.5161 9 15.125 9.392 15.125 9.875V15.125H9.875C9.39113 15.125 9 15.517 9 16C9 16.483 9.39113 16.875 9.875 16.875H15.125V22.125C15.125 22.608 15.5161 23 16 23C16.4839 23 16.875 22.608 16.875 22.125V16.875H22.125C22.6089 16.875 23 16.483 23 16C23 15.517 22.6089 15.125 22.125 15.125Z" fill="gray"></path>
            </svg>
        </div>
        <div class="bdlr-product-container2">
            <div class="bdlr-product-block" data-id=<?php esc_attr_e($block_id);
                                                    $block_id++; ?> data-product_id=<?php esc_attr_e($product2->get_id()); ?> data-product_share=<?php esc_attr_e($sale_price2 / $total_sale_price); ?>>
                <div class="bdlr-product-image-block">
                    <img class="bdlr-product-image" width="100" height="100" src="<?php echo wp_get_attachment_image_url($product2->get_image_id(), 'full'); ?>" />
                    <!-- <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.5" y="0.5" width="79" height="79" rx="1.5" fill="#F4F6F8" stroke="#DFE3E8"></rect>
                                                <path d="M61.0875 26.7751L45.8254 23H45.5267H45.4839C44.8864 23 44.3996 23.3663 44.3099 23.9135C44.1865 24.6652 43.7512 25.2683 43.008 25.7805C42.2784 26.2832 41.4496 26.5313 40.5103 26.5313C39.5713 26.5313 38.7388 26.2879 37.9915 25.7805C37.2447 25.273 36.8248 24.663 36.6896 23.9135C36.5903 23.3641 36.0917 23 35.5156 23H35.43H35.1313L19.8691 26.7751C19.2475 26.9288 18.8782 27.5635 19.0367 28.1549L21.1711 36.1311C21.3054 36.6325 21.7899 36.9633 22.3664 36.9633H28.0018V54.8839C28.0018 55.5129 28.5141 56 29.1758 56H51.7809C52.4426 56 52.9976 55.5129 52.9976 54.8839V36.9633H58.633C59.1667 36.9633 59.654 36.6126 59.7856 36.1311L61.9627 28.1549C62.124 27.5639 61.7492 26.9387 61.0875 26.7751ZM57.715 34.7105H51.7809C51.162 34.7105 50.6069 35.218 50.6069 35.8471V53.7474H30.3497V35.8471C30.3497 35.218 29.8374 34.7105 29.1758 34.7105H23.2844L21.6191 28.6828L34.7254 25.4558C35.1954 26.4504 35.9422 27.2622 36.9883 27.8913C38.0342 28.5204 39.2082 28.8248 40.5102 28.8248C41.7912 28.8248 42.9438 28.5204 43.9898 27.8913C45.0358 27.2622 45.804 26.4504 46.2735 25.4558L59.3798 28.6828L57.715 34.7105Z" fill="#919EAB" fill-opacity="0.4"></path>
                                            </svg> -->
                </div>
                <div class="bdlr-product-details-block">
                    <div class="bdlr-product-details-text-container">
                        <h5 class="bdlr-product-title"><?php esc_html_e($product2->get_name()); ?></h5>
                        <div class="bdlr-product-price">
                            <?php if ($sale_price2 !== $regular_price2) { ?>
                                <span class="product-cprice" name="product_cprice" value="<?php esc_attr_e($regular_price2); ?>"><?php echo esc_html(Strip_tags(wc_price($regular_price2))); ?></span>
                            <?php } ?>
                            <?php if ($sale_price2 > 0) { ?>
                                <span class="product-price" name="product_price" value="<?php esc_attr_e(Strip_tags($sale_price2)); ?>"><?php esc_html_e(Strip_tags(wc_price($sale_price2))); ?></span>
                            <?php } else { ?>
                                <span class="product-price-free" name="product_price" value="0"><?php echo $free_gift_text; ?></span>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="bdlr-product-variation-block">
                        <?php if ($product2->is_type('variable')) { ?>
                            <div class="bdlr-product-variation">

                                <?php
                                $attributes = $product2->get_attributes();
                                $default_attributes = $product2->get_default_attributes();
                                ?>
                                <div class="custom-vari">
                                    <p class="variant-title">
                                        <?php
                                        $j = 0;
                                        $attribute_name = '';
                                        foreach ($attributes as $attribute) {
                                            if ($attribute->get_variation()) {
                                                if ($attribute->is_taxonomy()) {
                                                    $attribute_name = wc_attribute_label($attribute->get_name());
                                                } else {
                                                    $attribute_name = ucfirst($attribute->get_name());
                                                }
                                                if ($j == 0) {
                                                    echo esc_html($attribute_name);
                                                } else {
                                                    echo ' & ' . esc_html($attribute_name);
                                                }
                                                $j++;
                                            }
                                        }
                                        ?>
                                    </p>
                                    <div class="variant-options">
                                        <?php

                                        foreach ($attributes as $attribute) {

                                            if ($attribute->get_variation()) {

                                                $options = $attribute->is_taxonomy() ? $attribute->get_terms() : $attribute->get_options();
                                                $attribute_slug = wc_sanitize_taxonomy_name($attribute->get_name());
                                                $attribute_name = "attribute_" . $attribute_slug;
                                                $default_value = isset($default_attributes[$attribute_slug]) ? $default_attributes[$attribute_slug] : '';


                                        ?>
                                                <select name="bundle_option[]" class="option" data-attribute_name="<?php echo esc_attr($attribute_name); ?>">
                                                    <?php
                                                    foreach ($options as $key => $val) {
                                                        if ($attribute->is_taxonomy()) {
                                                            $option_value = $val->slug ? $val->slug : esc_attr(strtolower(str_replace(' ', '-', $val->name)));
                                                            $selected = ($option_value === $default_value) ? 'selected="selected"' : '';
                                                            $option_label = esc_html($val->name);
                                                        } else {
                                                            $option_value = esc_attr($val);
                                                            $selected = ($val === $default_value) ? 'selected="selected"' : '';
                                                            $option_label = esc_html($val);
                                                        }
                                                    ?>
                                                        <option value="<?php echo $option_value; ?>" <?php echo $selected; ?>><?php echo $option_label; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </div>
                                </div>

                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bdlr-total-block">
        <span class="bdlr-total-text"><?php echo $total_text; ?></span>
        <div class="bdlr-total-price-and-savings">

            <span class="bdlr-total-price">
                <?php if ($total_sale_price !== $total_regular_price) { ?>
                    <p class="bdlr-saving-text"><?php echo $saving_text; ?></p>
                    <span class="bdlr-total-regular-price" value=<?php echo $total_regular_price; ?>><?php esc_html_e(Strip_tags(wc_price($total_regular_price))); ?></span>
                <?php } ?>

                <span class="bdlr-total-sale-price" value=<?php echo $total_sale_price; ?>><?php esc_html_e(Strip_tags(wc_price($total_sale_price))); ?></span>
            </span>
        </div>
    </div>

</div>
<div class="bdlr-button-container">
    <div class="bdlr-button">
        <div class="bdlr-button-text"><?php echo $button_text; ?></div>
    </div>
</div>