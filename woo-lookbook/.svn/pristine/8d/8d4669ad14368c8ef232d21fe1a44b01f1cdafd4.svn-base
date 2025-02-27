<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! is_array( $lb_ids ) || empty( $lb_ids ) ) {
	return;
}
?>
<div class="woo-lookbook <?php echo esc_attr('carousel' === $style ? 'wlb-lookbook-carousel' : 'wlb-lookbook-gallery') ?>"
     data-col="<?php echo esc_attr( $row ) ?>" data-rtl="<?php echo esc_attr(is_rtl() ? 1 : ''); ?>">
	<div class="woo-lookbook-inner">
		<?php
        foreach ($lb_ids as $id){
	        $attachmen_id = WOO_F_LOOKBOOK_Data::get_lookbook_data( $id, 'image' );
	        $src          = wp_get_attachment_image_url( $attachmen_id, 'lookbook' );
            if (!$src){
                continue;
            }
	        $pos_x        = WOO_F_LOOKBOOK_Data::get_lookbook_data( $id, 'x' );
	        $pos_y        = WOO_F_LOOKBOOK_Data::get_lookbook_data( $id, 'y' );
	        $products     = WOO_F_LOOKBOOK_Data::get_lookbook_data( $id, 'product_id' );
            ?>
            <div class="wlb-lookbook-item-wrapper wlb-lookbook-instagram-item wlb-col-<?php echo esc_attr($row ) ?>">
                <div class="wlb-lookbook-instagram-item-inner">
                    <img src="<?php echo esc_url( $src ) ?>" class="wlb-lookbook-item-image wlb-lookbook-instagram-item-image"/>
			        <?php
			        if ( is_array( $products ) && !empty( $products ) ) {
				        foreach ( $products as $k => $product ) {
					        if ( ! $product ) {
						        continue;
					        }
                            do_action('wlb_lookbook_get_node',$product, $pos_x[ $k ], $pos_y[ $k ]);
				        }
			        } ?>
                    <div class="wlb-zoom" data-id="<?php echo esc_attr( $id ) ?>"></div>
                </div>
            </div>
            <?php
        }
		?>
	</div>
</div>