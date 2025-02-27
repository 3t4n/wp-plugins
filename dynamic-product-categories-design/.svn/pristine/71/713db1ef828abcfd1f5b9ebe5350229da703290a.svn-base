<?php 
use dpcdCategoryDesign\Helper;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

    /**
     * Slider settings
     */
    $arrows = isset($settings['show_arrow']) && $settings['show_arrow'] ? true : false;
    $dot_nav = isset($settings['show_dot_navigation']) && $settings['show_dot_navigation'] ? true : false;
    $autoplay = isset($settings['enable_autoplay']) && $settings['enable_autoplay'] ? true : false;
    $arrow_position = isset($all_settings['wc_pcd_arrow_position']) ? $all_settings['wc_pcd_arrow_position'][0] : 'side';
    $desktop = isset($settings['columns']) ? $settings['columns'] : '4';
    $tablet = isset($settings['columns_tablet']) ? $settings['columns_tablet'] : '3';
    $mobile = isset($settings['columns_mobile']) ? $settings['columns_mobile'] : '1';
    $speed  = isset($settings['Autoplay_Speed']) ? $settings['Autoplay_Speed'] : '4000';
?>

<!-- Start Slider Layout -->
<div class="pcd-elementor-cat-slider pcd-cat-slider pcd-predesign-template-two cat-slider pcd-<?php echo esc_attr($settings['content_position']); ?> pcd-arrow-<?php echo esc_attr($arrow_position); ?>" 
        data-arrows="<?php echo esc_attr($arrows); ?>" 
        data-dots="<?php echo esc_attr($dot_nav); ?>"  
        data-autoplay="<?php echo esc_attr($autoplay); ?>"
        data-desktop = "<?php echo esc_attr($desktop); ?>"
        data-tablet = "<?php echo esc_attr($tablet); ?>"
        data-mobile = "<?php echo esc_attr($mobile); ?>"
        data-speed = "<?php echo esc_attr($speed); ?>"
        > 
        <?php 
            do_action( 'pcd_before_loop_start', 'slider' );
            
                foreach ( $pcd_cats as $category ):
                    $cat_thumb_id	= get_term_meta( $category->term_id, 'thumbnail_id', true );
                    $term_url		= get_term_link( $category, 'product_cat' );
                    $term_id        = get_term_by('name', $category->name, 'product_cat');
                    $special_offer  = get_term_meta( $term_id->term_id, 'wc_pcd_cat_special_offer', true);
                    $pcd_term = get_term( $category->term_id, 'product_cat' );
                    $pcd_count = $pcd_term->count; ?>

                    <div class="pcd-single-cat-slider-item pcd-single-card pcd-<?php echo esc_attr($settings['content_position']); ?>-design"> 
                        <div class="pcd-cat-thumbnail">
                            <a href="<?php echo esc_url( $term_url ); ?>">
                                <?php if(!empty($cat_thumb_id) && $settings['show_image']): ?>
                                    <?php echo wp_get_attachment_image( $cat_thumb_id , 'medium' );  ?>
                                <?php endif; ?>
                            </a>
                            <a href="<?php echo esc_url( $term_url ); ?>" class="pcd-over-lay"></a>

                            <div class="pcd-sub-category">
                                <?php Helper::get_woo_child_category_by_id($category->term_id); ?>
                            </div>
                            <?php if($settings['show_category_name']):?>
                                <div class="pcd-grid-cat--details">
                                    <a  href="<?php echo esc_url( $term_url ); ?>" class="pcd-category-name">
                                        <?php echo wp_kses_post( $category->name ); ?>
                                    </a>
                                </div><!--.pcd-grid-cat--details-->
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php do_action( 'pcd_after_loop_lend', 'slider' );?>
    </div><!-- End Slider Layout -->