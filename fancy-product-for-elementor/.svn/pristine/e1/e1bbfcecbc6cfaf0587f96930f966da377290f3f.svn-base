<?php

namespace FancyProductForElementor\Traits;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

//added to repo
trait Styles
{
    function svg_styles( $product, $tp_woo_products, $svg_tag_hover) {
        ?>

        <div class="tp-few_item"  data-path-hover="<?php echo $svg_tag_hover['hover']; ?>">
            <figure class="tp-few_inner" >

                <?php echo $product->get_image( $tp_woo_products['img'], ['class'=>'tp-few__img']); ?>

                <?php echo $svg_tag_hover['tag']; ?>

                <figcaption class="tp-few__content" >
                <a href="<?php echo $product->get_permalink(); ?>" >
                    <?php if ( 'yes' === $tp_woo_products['show_sale'] && $product->is_on_sale() ) { ?> <span  class="tp-few__sale"><?php _e( 'Sale!', 'fancy-product-for-elementor' ) ?></span> <?php } ?>

                
                    <h2 class="tp-few__title"><?php echo $product->get_title() ?></h2>

                    <?php
                        if ( 'yes' === $tp_woo_products['show_desc'] ) {
                            ?>
                    <p class="tp-few__desc">
                        
                        <?php echo $this->fancy_product_for_elementor_limit_text( $product->get_description(), $tp_woo_products['desc_length'] ); ?>
                    </p>
                        <?php } ?>
                        <?php if ( 'yes' === $tp_woo_products['show_price'] ) { ?>
                    <div class="tp-few__price"><?php echo $product->get_price_html(); ?></div>
                        <?php } ?>
                    <?php  
                    if ( 'yes' === $tp_woo_products['show_add_to_cart'] ) {
                        woocommerce_template_loop_add_to_cart(['class'=>'tp-few__link']); 
                    }
                    ?>
                </a>
                </figcaption>
            </figure>
        </div>

            <?php
    }

    function second_version_styles( $product, $tp_woo_products) {
        ?>

        <div class="tp-few_item">
        <?php if ( 'yes' === $tp_woo_products['show_sale'] && $product->is_on_sale() ) { ?> <span  class="tp-few__sale"><?php _e( 'Sale!', 'fancy-product-for-elementor' ) ?></span> <?php } ?>
            <figure class="tp-few_inner">
            <?php if ( $tp_woo_products["styles"] != "8" ) { ?>
                 <a href="<?php echo get_the_permalink() ?>">
            <?php } ?>

                    <?php echo $product->get_image( $tp_woo_products['img'], ['class'=>'tp-few__img']); ?>
            <?php if ( $tp_woo_products["styles"] != "8" ) { ?>
                </a>
            <?php } ?>
                <div class="tp-few_front">
            <?php if ( $tp_woo_products["styles"] != "8" ) { ?>
                 <a href="<?php echo get_the_permalink() ?>">
            <?php } ?>
                        <h2 class="tp-few__title"><?php echo $product->get_title() ?></h2>
            <?php if ( $tp_woo_products["styles"] != "8" ) { ?>
                </a>
            <?php } ?>
                    <?php if ( 'yes' === $tp_woo_products['show_price'] ) { ?>
                    <div class="tp-few__price"><?php echo $product->get_price_html(); ?></div>
                        <?php } ?>
                </div>

                <div class="tp-few_back">

                <?php
                    if ( $tp_woo_products["styles"] == "7" ) {
                        ?>
                        <h2 class="tp-few__title"><?php echo $product->get_title() ?></h2>
                        <?php if ( 'yes' === $tp_woo_products['show_price'] ) { ?>
                            <div class="tp-few__price"><?php echo $product->get_price_html(); ?></div>
                        <?php } ?>
                        <?php
                    }
                    ?>
                    <?php
                        if ( 'yes' === $tp_woo_products['show_desc'] ) {
                            ?>
                    <span class="tp-few__desc">
                        <?php echo $this->fancy_product_for_elementor_limit_text( $product->get_description(), $tp_woo_products['desc_length'] ); ?>
                    </span>
                        <?php } ?>
                    <?php  
                    if ( 'yes' === $tp_woo_products['show_add_to_cart'] ) {
                        woocommerce_template_loop_add_to_cart(['class'=>'tp-few__link']); 
                    }
                    ?>
                </div>
            </figure>
        </div>



            <?php
    } 
}
