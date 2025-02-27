<?php
if (isset($settings['show_hot']) && $settings['show_hot']) {
    if ($product->is_on_sale()) {
        $prices = mr_get_product_prices($product);
        $returned = mr_product_special_price_calc($prices);
        if (isset($returned['percent']) && $returned['percent']) {
            if (!get_post_meta(get_the_id(), 'meta_show_hotsale', true)) {
                ?>
                <div class="mr_hot" style="position:absolute;z-index:9; width:100%">
                    <button class="hot_text" style="background:<?php echo esc_attr(wp_kses(get_post_meta(get_the_id(), 'meta_hot_color', true), 'post')); ?>!important;">
                        <?php if ($settings['show_hot_percent']) { ?>
                        <?php
                        // Translators: Percentage placeholder for displaying percent value.
                        echo esc_html(sprintf(__(' %d%%', 'wpsection'), $returned['percent']));
                        ?>
                        <?php } ?>

                        <?php
                        $hot_text = wp_kses(get_post_meta(get_the_id(), 'meta_hot_text', true), 'post');
                        if ($hot_text) {
                            echo esc_html($hot_text);
                        } else {
                            echo esc_html($settings['hot_text']);
                        }
                        ?>
                    </button>
                </div>
            <?php }
        }
    }
}
?>
