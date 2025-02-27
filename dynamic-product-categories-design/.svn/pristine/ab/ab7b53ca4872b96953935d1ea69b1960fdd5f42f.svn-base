<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
    $desktop = isset($settings['columns']) ? $settings['columns'] : '4';
    $tablet = isset($settings['columns_tablet']) ? $settings['columns_tablet'] : '3';
    $mobile = isset($settings['columns_mobile']) ? $settings['columns_mobile'] : '1';
    
?>
<!-- Start Grid Layout -->
    <div class="pcd-elementor-widget pcd-predesign-template-three pcd-row pcd-row-cols-<?php echo esc_attr($settings['columns']); ?>"> 
        <?php 
                
            do_action( 'pcd_before_loop_start', 'grid' );

                foreach ( $pcd_cats as $category ):
                    $pcd_term = get_term( $category->term_id, 'product_cat' );
                    $pcd_count = $pcd_term->count;
                    $cat_thumb_id	= get_term_meta( $category->term_id, 'thumbnail_id', true );
                    $term_url		= get_term_link( $category, 'product_cat' );
                    $term_id        = get_term_by('name', $category->name, 'product_cat');
                    $special_offer  = get_term_meta( $term_id->term_id, 'wc_pcd_cat_special_offer', true);?>
                    
                    <div class="pcd-single-cat-grid-item pcd-single-card pcd-single-card__overlay-design <?php echo esc_attr($bootstrap_class_name); ?>"> 
                        <div class="pdc-reap">
                            <?php if(!empty( $cat_thumb_id ) AND $settings['show_image']): ?>
                                <a href="<?php echo esc_url( $term_url ); ?>">
                                    <?php echo wp_get_attachment_image( $cat_thumb_id , 'medium' );?>
                                </a>
                            <?php endif; ?>
                

                            <?php if(!empty( $pcd_count ) && $settings['show_count']):?>
                                <div class="pcd-slide-product-count">
                                    <a href="<?php echo esc_url( $term_url ); ?>">
                                        <span class="pcd-count-text"><?php echo esc_html(  $pcd_count );?></span><span class="pcd-count-text" ><?php echo esc_html__( ' products', 'wc-pcd' )?></span>
                                    </a>
                                </div>
                            <?php endif;?>

                            <div class="pcd-grid-cat--details">
                                <?php if($settings['show_category_name']):?>
                                    <a  href="<?php echo esc_url( $term_url ); ?>" class="pcd-category-name">
                                        <?php echo wp_kses_post( $category->name ); ?>
                                    </a>
                                <?php endif;?>
                            
                                <?php if( empty($hide_show_now_btn) ):?>
                                    <a class="pcd-btn pcd-shop-now" href="<?php echo esc_url( $term_url ); ?>">
                                        <?php echo esc_html( $settings['shop_now_text'] ); ?>
                                    </a>
                                <?php endif;?>
                            </div><!--.pcd-grid-cat--details-->
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php do_action( 'pcd_after_loop_start', 'grid' );?>
    </div>
<!-- End Grid Layout -->