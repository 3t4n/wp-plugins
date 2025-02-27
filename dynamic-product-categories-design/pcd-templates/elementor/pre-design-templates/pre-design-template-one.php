<?php
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
<?php if( 'slider' === $settings['layout_type']): ?>
    <!-- Start Slider Layout -->
    <div class="pcd-elementor-cat-slider pcd-cat-slider pcd-predesign-template cat-slider pcd-<?php echo esc_attr($settings['content_position']); ?> pcd-arrow-<?php echo esc_attr($arrow_position); ?>" 
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
                                <?php if('overlay-content' == $settings['content_position']) : ?>
                                    <div class="pcd-grid-cat-info">
                                        <a class="pcd-grid-cat--title" href="<?php echo esc_url( $term_url ); ?>"><?php echo wp_kses_post( $category->name ); ?></a>
                                        <?php if(!empty($special_offer)): ?>
                                            <div class="pcd-grid-special-offer">
                                                <?php echo wp_kses_post( $special_offer ); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </a>
                        </div>
                
                        <div class="pcd-grid-cat--details">
                            <?php if($settings['show_category_name']):?>
                                <a  href="<?php echo esc_url( $term_url ); ?>" class="pcd-category-name">
                                    <?php echo wp_kses_post( $category->name ); ?>
                                </a>
                            <?php endif;?>
                            
                            <?php if(!empty($special_offer) && $settings['show_offer'] ): ?>
                                <div class="pcd-grid-special-offer">
                                    <?php echo wp_kses_post( $special_offer ); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if(!empty( $pcd_count ) && $settings['show_count']):?>
                                <div class="pcd-slide-product-count">
                                    <span><?php echo esc_html(  $pcd_count );?></span><span><?php echo esc_html__( ' products', 'wc-pcd' )?></span>
                                </div>
                            <?php endif;?>
                        
                            <?php if( empty($hide_show_now_btn) ):?>
                                <a class="pcd-btn pcd-shop-now" href="<?php echo esc_url( $term_url ); ?>">
                                    <?php echo esc_html( $settings['shop_now_text'] ); ?>
                                </a>
                            <?php endif;?>
                        </div><!--.pcd-grid-cat--details-->
                    </div>
                <?php endforeach; ?>

            <?php do_action( 'pcd_after_loop_lend', 'slider' );?>
    </div><!-- End Slider Layout -->

<?php else : ?>
        
    <!-- Start Grid Layout -->
        <div class="pcd-elementor-widget pcd-predesign-template pcd-row pcd-row-cols-<?php echo esc_attr($settings['columns']); ?>"> 
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
                    
                                <div class="pcd-grid-cat--details">
                                    <?php if($settings['show_category_name']):?>
                                        <a  href="<?php echo esc_url( $term_url ); ?>" class="pcd-category-name">
                                            <?php echo wp_kses_post( $category->name ); ?>
                                        </a>
                                    <?php endif;?>
                                    
                                    <?php if(!empty($special_offer) && $settings['show_offer'] ): ?>
                                        <div class="pcd-grid-special-offer">
                                            <?php echo wp_kses_post( $special_offer ); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty( $pcd_count ) && $settings['show_count'] ):?>
                                        <div class="pcd-slide-product-count">
                                            <span class="pcd-count-text"><?php echo esc_html(  $pcd_count );?></span><span class="pcd-count-text" ><?php echo esc_html__( ' products', 'wc-pcd' )?></span>
                                        </div>
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
<?php endif ?>