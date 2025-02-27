<?php if (!get_post_meta(get_the_ID(), 'meta_show_overlay', true)) : ?>
    <div class="overlay">
        <div class="meta-style-one">
            <ul class="product-buttons mr_pro_list wps_order_container">
            
<?php if (class_exists('MrwooMart')) : ?>
			
				
                <?php if (isset($settings['show_whishlist']) && $settings['show_whishlist']) : ?>
                  
                        <?php if (!get_post_meta(get_the_ID(), 'meta_show_wishlist', true)) : ?>
                      
<li class="single_metas mr_wishlist_li order-<?php echo esc_attr($settings['overlay_order_one']); ?>">
    <a class="wishlist mr_wishlist_a" data-product_id="<?php echo esc_attr(get_the_ID()); ?>">
       <i class="mr_wishlist_i <?php echo esc_attr($settings['wishlist_icon']['value']); ?>"></i>
    </a>
    <span class="tool_tip <?php echo esc_attr($settings['tooltip_alingment']); ?>"><?php echo esc_html($settings['wishlist_tooltip']); ?></span> 
    
</li>

           
                    <?php endif; ?>
                <?php endif; ?>
           
<?php if (isset($settings['show_compare']) && $settings['show_compare']) : ?>
<?php if (!get_post_meta(get_the_ID(), 'meta_show_compare', true)) : ?>
<li class="single_metas mr_compare_li order-<?php echo esc_attr($settings['overlay_order_two']); ?>">
	<a class="compare mr_compare_a" data-product_id="<?php echo esc_attr(get_the_ID()); ?>">
		<i class="mr_compare_i <?php echo esc_attr($settings['compare_icon']['value']); ?>"></i>	
	</a>
	<span class="tool_tip <?php echo esc_attr($settings['tooltip_alingment']); ?>"><?php echo esc_html($settings['compare_tooltip']); ?></span>  
	</li>
<?php endif; ?>
<?php endif; ?>
     
             
<?php if (isset($settings['show_quickview']) && $settings['show_quickview']) : ?>
<?php if (!get_post_meta(get_the_ID(), 'meta_show_quickview', true)) : ?>
                     
<li class="single_metas btn_same btn-quick mr_quickview_li order-<?php echo esc_attr($settings['overlay_order_three']); ?>">
    <a href="<?php echo esc_attr($product->get_id()); ?>" class="mr_quickview_a wpsection_quick_view_btn">
        <span class="tool_tip <?php echo esc_attr($settings['tooltip_alingment']); ?>"><?php echo esc_html($settings['quickview_tooltip']); ?></span>
        <i class="mr_quickview_i <?php echo esc_attr($settings['quickview_icon']['value']); ?>"></i>
    </a>
</li>

                    <?php endif; ?>
                <?php endif; ?>
                
<?php endif; ?>   
                
                <?php if (isset($settings['show_addtocart']) && $settings['show_addtocart']) : ?>
                    <?php if (!get_post_meta(get_the_ID(), 'meta_show_addtocart', true)) : ?>   
                       
				
			<?php	
	 if (!$product->is_type('variable')) { ?>
        <li class="single_metas mr_addtocart mr_addtocar_li order-<?php echo esc_attr($settings['overlay_order_four']); ?>">
                            <div class="cart-btn wps_overlay_cart">
                                <button class="wps_button_spin" type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
                                    <span class="tool_tip <?php echo esc_attr($settings['tooltip_alingment']); ?>"><?php echo esc_html($settings['addtocart_tooltip']); ?></span>
                                    <i class="mr_addtocart_i <?php echo esc_attr($settings['addtocart_icon']['value']); ?>"></i>
                                </button>
                            </div>
                        </li>  
				<?php
    }
				?>


             
                    <?php endif; ?>
                <?php endif; ?>
                
            </ul>
        </div>
    </div>
<?php endif; ?>
