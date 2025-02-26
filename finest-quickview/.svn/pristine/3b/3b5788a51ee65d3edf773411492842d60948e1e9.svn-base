<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$titelshow = get_theme_mod( 'on_title_view', true );
$ratingshow = get_theme_mod( 'on_rating_view', true );
$priceshow = get_theme_mod( 'on_price_view', true );
$descshow = get_theme_mod( 'on_decription_view', true );
$quantityshow = get_theme_mod( 'on_quantity_view', true );
$metashow = get_theme_mod( 'on_meta_view', true );
$sharingshow = get_theme_mod( 'on_sharing_view',true );

//tablet show
$tabtitle = get_theme_mod( 'tablet_title_show',true );
$tabrating = get_theme_mod( 'show_rating_on_tablet',true );
$tabprice = get_theme_mod( 'show_price_on_tablet',true );
$tabexcerpt = get_theme_mod( 'show_decription_on_table',true );
$tabquantity = get_theme_mod( 'show_quantity_on_tablet',true );
$tabmeta = get_theme_mod( 'show_meta_on_tablet',true );

// mobile show
$mobtitle = get_theme_mod( 'mobile_title_show',true );
$mobrating = get_theme_mod( 'show_rating_on_mobile',true );
$mobprice = get_theme_mod( 'show_price_on_mobile',true );
$mobexcerpt = get_theme_mod( 'show_decription_on_mobile',true );
$mobquantity = get_theme_mod( 'show_quantity_on_mobile',true );
$mobmeta = get_theme_mod( 'show_meta_on_mobile',true );

$tbc = '';

if ( true == $tabtitle  ) {
    $tbc .= "tablet_show";
}
else {
    $tbc .= 'tablet_hide';
}
if ( true == $tabrating  ) {
    $tbc .= ' tablet_show_rating';
}
else {
    $tbc .= ' tablet_hide_rating';
}
if ( true == $tabprice  ) {
    $tbc .= ' tablet_show_price';
}
else {
    $tbc .= ' tablet_hide_price';
}
if ( true == $tabexcerpt  ) {
    $tbc .= ' tablet_show_excerpt';
}
else {
    $tbc .= ' tablet_hide_excerpt';
}
if ( true == $tabquantity ) {
    $tbc .= ' tablet_show_quantity';
}
else {
    $tbc .= ' tablet_hide_quantity';
}
if ( true == $tabmeta ) {
    $tbc .= ' show_meta_on_tablet';
}
else {
    $tbc .= ' hide_meta_on_tablet';
}

// mobile show

if ( true == $mobtitle  ) {
    $tbc .= ' mobile_title_show';
}
else {
    $tbc .= ' mobile_title_hide';
}
if ( true == $mobrating  ) {
    $tbc .= ' mobile_show_rating';
}
else {
    $tbc .= ' mobile_hide_rating';
}
if ( true == $mobprice  ) {
    $tbc .= ' mobile_show_price';
}
else {
    $tbc .= ' mobile_hide_price';
}
if ( true == $mobexcerpt  ) {
    $tbc .= ' mobile_show_excerpt';
}
else {
    $tbc .= ' mobile_hide_excerpt';
}
if ( true == $mobquantity ) {
    $tbc .= ' mobile_show_quantity';
}
else {
    $tbc .= ' mobile_hide_quantity';
}
if ( true == $mobmeta ) {
    $tbc .= ' show_meta_on_mobile';
}
else {
    $tbc .= ' hide_meta_on_mobile';
}


global $product;
$attachment_ids = $product->get_gallery_image_ids() ? $product->get_gallery_image_ids() : array();
if ( $product->get_image_id() ){
    $attachment_ids = array( 'finestquick_thumbnail_id' => $product->get_image_id() ) + $attachment_ids;
}

?>
<div class="finest-content">
    <div class="finest-left-side">
    	<div class="finest-qwick-view-left">
            <div class="woocommerce finest-quick-view-learg-img">
             <?php
                    if ( $attachment_ids ) {
                        $i = 0;
                        foreach ( $attachment_ids as $attachment_id ) {
                            $i++;

                            $html = wc_get_gallery_image_html( $attachment_id, true );

                            if( $i == 1 ){
                                echo '<div class="finest-quick-view-single finest-quickview-firfinest-image">'.apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id ).'</div>';
                            }
                            else{
                                echo '<div class="finest-quick-view-single">'.apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id ).'</div>';
                            }

                        }
                    }
                ?>
            </div>
            <div class="finest-quick-view-thumbnails">
                <?php
                    if ( $attachment_ids && $product->get_image_id() ) {
                        foreach ( $attachment_ids as $attachment_id ) {
                            ?>
                                <div class="finest-quick-thumb-single">
                                    <?php $thumbnail_src = wp_get_attachment_image_src( $attachment_id, 'woocommerce_gallery_thumbnail' );?>
                                    <img src="<?php echo esc_url($thumbnail_src[0]); ?>" alt="<?php the_title(); ?>">
                                </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="finest-right-side">
        <div class="finest-quick-view-right <?php echo esc_attr( $tbc ); ?>">
            <?php do_action( 'finest_quick_quickview_before_summary' ); ?>
            <div class="entry-summary">
                <?php
                   if ( true === $titelshow ) {
                    add_action( 'finest_quick_content', 'woocommerce_template_single_title', 5 );
                    }
                   if ( true === $ratingshow ) {
                    add_action( 'finest_quick_content', 'woocommerce_template_single_rating', 10 );
                   }
                    if ( true === $priceshow ) {
                    add_action( 'finest_quick_content', 'woocommerce_template_single_price', 10 );
                    }
                    if ( true === $descshow ) {
                    add_action( 'finest_quick_content', 'woocommerce_template_single_excerpt', 20 );
                    }
                    if ( true === $quantityshow ) {
                    add_action( 'finest_quick_content', 'woocommerce_template_single_add_to_cart', 30 );
                    }
                    if ( true === $metashow ) {
                    add_action( 'finest_quick_content', 'woocommerce_template_single_meta', 40 );
                    }
                    if ( true === $sharingshow ) {
                    add_action( 'finest_quick_content', 'woocommerce_template_single_sharing', 50 );
                    }
                    // Render Content
                   do_action( 'finest_quick_content' );
                ?>
            </div><!-- .summary -->
            <?php do_action( 'finest_quick_quickview_after_summary' ); ?>

        </div>
    </div>

</div>