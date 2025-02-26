<?php

if (!function_exists('wip_woocarousel_products_carousel_function')) {

	function wip_woocarousel_products_carousel_function ($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			
			'product_items' => '-1',
			'product_bestseller' => 'off',
			'product_columns' => '4',
			'product_rating' => 'off',
			'product_latest' => 'off',
			'product_dots' => 'on',
			
		), $atts));

		$bestseller_array = array();
		$latest_array = array();

		if ( ! function_exists( 'WC' ) )
			return;

        $query = array(
        
		    'post_type' => 'product',
            'posts_per_page' => $product_items,

		);
		
		if ( $product_latest == 'on' ) :
		
			$latest_array = array(
			
				'order' => 'DESC',
				'orderby' => 'date',
			
			);

		endif;

		if ( $product_bestseller == 'on' ) :
		
			$bestseller_array = array(

				'meta_key' => 'total_sales',
				'orderby' => 'meta_value_num',
			
			);

		endif;

        $custom_query = new WP_Query( array_merge( $query, $bestseller_array, $latest_array ) ); 
		
        $html = '<div class="wip-woocarousel-lite-carousel wip-woocarousel-wrapper" data-columns="'.esc_attr($product_columns).'" data-dots="'.esc_attr($product_dots).'">';
        
		if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); 

			global $post, $product;
			
			$button_class = '';
			
			$product_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'product');
			
			$html .= '<div class="item woocarousel-container woocommerce">';
			
			if ( $product_thumb ) :

				$product_image = '<img src="'.esc_url($product_thumb[0]).'" class="attachment-blog wp-post-image" alt="post image" title="post image">';
			
			else:

				$product_image = wc_placeholder_img('product');
			
			endif;
			
			$html .= '<div class="woocarousel-image">';
			
			$html .= $product_image;

			if ( wip_woocarousel_lite_postmeta( '_sale_price' ) ) 
				$html .= '<span class="onsale">' . __('Sale!','wip-woocarousel-lite') . '</span>';
			
			$html .= '<div class="woocarousel-content">';
			
			$html .= '<div class="woocarousel-details">';

			$html .= '<h3><a href="' . esc_url(get_permalink($post->ID)).'">' . esc_html(get_the_title()) . '</a></h3>';
            
			if ( $product_rating == 'on' )
				$html .= wc_get_rating_html( $product->get_average_rating() ); 
			
			if ( $product->get_price_html() ) 
				$html .= '<span class="price">' . $product->get_price_html() . '</span>'; 
                            
			if ( $product->get_type() == "simple" )
				$button_class = 'ajax_add_to_cart';
			
			$html .= apply_filters( 'woocommerce_loop_add_to_cart_link',
			sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button ' . $button_class . ' %s product_type_%s">%s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
				esc_attr( $product->get_type() ),
				esc_html( $product->add_to_cart_text() )
			),
			$product );

			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
                    
		endwhile; 

		wp_reset_postdata();

		else: 
				
            $html .= '<div class="woocarousel-container" style="width:100%"><div class="woocarousel-content">'.__('No products found','wip-woocarousel-lite').'</div></div>';
             		
		endif; 
                
        $html .= '</div>';
			
		return $html;
       
	}
	
	add_shortcode('wip_woocarousel_products_carousel', 'wip_woocarousel_products_carousel_function');

}

?>
