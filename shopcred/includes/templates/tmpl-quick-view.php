<?php
/**
 * The template for displaying product content in the quickview-product.php template
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$attachment_ids = $product->get_gallery_image_ids() ? $product->get_gallery_image_ids() : array();
if ( $product->get_image_id() ){
    $attachment_ids = array( 'spc_quick_thumbnail_id' => $product->get_image_id() ) + $attachment_ids;
}

// Placeholder image set
if( empty( $attachment_ids ) ){
    $attachment_ids = array( 'spc_quick_thumbnail_id' => get_option( 'woocommerce_placeholder_image', 0 ) );
}

?>
<div <?php wc_product_class(); ?>>

    <div class="spc-row-wrapper woocommerce">
        <div class="spc-col spc-col-2">
            <div class="spc-quick-view-img-wrapper product">
                <div class="spc-qwick-view-image spc-product-thumb-view-default">
                    <div class="spc-product-image">
                        <?php 

                            wc_get_template( 'single-product/product-image.php' );
                            // On render widget from Editor - trigger the init manually.
                            if ( wp_doing_ajax() ) {
                                ?>
                                <script>
                                    jQuery( '.woocommerce-product-gallery' ).each( function() {
                                        jQuery( this ).wc_product_gallery();
                                    } );
                                </script>
                                <?php
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="spc-col spc-col-2">
            <div class="qwick-view-content">
                <?php do_action( 'spc_quickview_before_summary' ); ?>
                <div class="content-spcquickview entry-summary">
                    <?php
                        add_action( 'spc_quickview_content', 'woocommerce_template_single_title', 5 );
                        add_action( 'spc_quickview_content', 'woocommerce_template_single_rating', 10 );
                        add_action( 'spc_quickview_content', 'woocommerce_template_single_price', 10 );
                        add_action( 'spc_quickview_content', 'woocommerce_template_single_excerpt', 20 );
                        add_action( 'spc_quickview_content', 'woocommerce_template_single_add_to_cart', 30 );
                        add_action( 'spc_quickview_content', 'woocommerce_template_single_meta', 40 );
                        add_action( 'spc_quickview_content', 'woocommerce_template_single_sharing', 50 );
                       
                        // Render Content
                        do_action( 'spc_quickview_content' );
                    ?>
                </div><!-- .summary -->
                <?php do_action( 'spc_quickview_after_summary' ); ?>
            </div>
        </div>
    </div>
</div>	
