<?php if (isset($settings['show_product_cat_features']) && $settings['show_product_cat_features']) : ?>

    <?php if (!get_post_meta(get_the_ID(), 'meta_show_catarea', true)) : ?>

        <div class="wps_order order-<?php echo esc_attr($settings['position_order_nine']); ?>">
        
          
			<?php if ('style-2' === $settings['thumb_cat_postion_style']) : ?>
			
                <?php if (!get_post_meta(get_the_ID(), 'meta_show_catimg', true)) : ?>
			
                    <?php if ($thumbnail_url) : ?>
                        <div class="wps_cat_thumb">
                            <a class="wps_cat_img" href="<?php echo esc_url($category_link); ?>">
                                <img src="<?php echo esc_url(wp_get_attachment_url($thumbnail_id)); ?>" alt="<?php echo esc_attr($category_name); ?>" />
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        
			
			
            <div class="wps_cat">
        
				
              
				
				<?php if ('style-1' === $settings['thumb_cat_postion_style']) : ?>
				   <?php if ($thumbnail_id) : ?>
				
                    <a class="wps_cat_img" href="<?php echo esc_url($category_link); ?>">
                        <img src="<?php echo esc_url(wp_get_attachment_url($thumbnail_id)); ?>" alt="<?php echo esc_attr($category_name); ?>" />
                    </a>
				<?php endif; ?>
                <?php endif; ?>
				
                
                <a href="<?php echo esc_url($category_link); ?>">
        
                    <?php if (!get_post_meta(get_the_ID(), 'meta_show_cattitle', true)) : ?>
                        <p class="wps_cat_title"><?php echo esc_html($category_name); ?>
                        
                        <?php if ('style-1' === $settings['cat_postion_style']) : ?>
                            <?php if (!get_post_meta(get_the_ID(), 'meta_show_catnum', true)) : ?>
                                <span class="wps_cat_number"><?php echo esc_html($category_count); ?></span>
                            <?php endif; ?>
                        <?php endif; ?>
                        </p>
                    <?php endif; ?>
        
                    <?php if ('style-2' === $settings['cat_postion_style'] && !get_post_meta(get_the_ID(), 'meta_show_catnum', true)) : ?>
                        <p class="wps_cat_number"><?php echo esc_html($category_count); ?></p>
                    <?php endif; ?>
        
                </a>
            </div>
			
			
			
        
        </div>


    <?php endif; ?>

<?php endif; ?>
