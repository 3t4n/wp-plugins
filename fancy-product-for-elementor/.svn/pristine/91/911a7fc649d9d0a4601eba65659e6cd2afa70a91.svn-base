    <div class="tp-few_item"  data-path-hover="<?php echo $svg_tag_hover['hover']; ?>">
        <figure class="tp-few_inner" >

            <?php echo $product->get_image( $tp_woo_products_img, ['class'=>'tp-few__img']); ?>

            <?php echo $svg_tag_hover['tag']; ?>

            <figcaption class="tp-few__content" >
            <a href="<?php echo $product->get_permalink(); ?>" >
                <?php if ( 'yes' === $tp_woo_products_show_sale && $product->is_on_sale() ) { ?> <span  class="tp-few__sale"><?php _e( 'Sale!', 'fancy-product-for-elementor' ) ?></span> <?php } ?>

            
                <h2 class="tp-few__title"><?php echo $product->get_title() ?></h2>

                <?php
                    if ( 'yes' === $tp_woo_products_show_desc ) {
                        ?>
                <p class="tp-few__desc">
                    <?php echo $this->fancy_product_for_elementor_limit_text( $product->get_description(), $tp_woo_products_desc_length ); ?>
                </p>
                    <?php } ?>
                    <?php if ( 'yes' === $tp_woo_products_show_price ) { ?>
                <div class="tp-few__price"><?php echo $product->get_price_html(); ?></div>
                    <?php } ?>
                <?php  
                if ( 'yes' === $tp_woo_products_show_add_to_cart ) {
                    woocommerce_template_loop_add_to_cart(['class'=>'tp-few__link']); 
                }
                ?>
            </a>
            </figcaption>
        </figure>
    </div>