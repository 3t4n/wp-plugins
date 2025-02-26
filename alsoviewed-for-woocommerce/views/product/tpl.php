<div class="alsow-viewed-container">
  <div class="alsow-viewed" >
    <div class="slider-items-products">
      <div class="new_title center">

        <h2> <?php _e( $plugin_title, 'woocommerce' ) ?> </h2>
      </div>
      <div id="also-viewed-slider" class="product-flexslider">
        <div class="slider-items slider-width-col4 owl-carousel owl-theme"  >
 					
 					 <?php  
 					  while ( $products->have_posts() ) : $products->the_post(); 
 					 	global $product; 
						
					 do_action( 'woocommerce_before_shop_loop_item' ); 
 					 	
 					 	?>
 					 
                <div class="item">
                  <div class="product-block">
                    <div class="product-image">
                      <a class="product-image" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                      <figure class="product-display">
                      	<?php if($product->get_sale_price() >0 ){ ?>
                        <div class="sale-label sale-top-left">
                          Sale
                        </div>
                        <?php } ?>
                        <?php echo $product->get_image('shop_thumbnail',array('class' => 'product-mainpic')); ?>
                         <?php echo $product->get_image('shop_thumbnail',array('class' => 'product-secondpic')); ?>
                        
                        </figure> </a>
                    </div>
                    <div class="product-meta">
                    	 <?php if($show_addtocart_filter=="yes" ) { ?>
                      <div class="product-action">
                          <?php   do_action( 'woocommerce_after_shop_loop_item' ); ?>
                       </div>
                       <?php  } ?>   
                    </div>
                  </div>
                  <div class="item-info">
                    <div class="info-inner">
                      <div class="item-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?>  </a>
                      </div>
                      <div class="item-content">
                      	<?php  if($show_price_filter=="yes" ){ ?>
                      		
                      		 
                        <div class="item-price">
                          <div class="price-box">
                            <span class="regular-price"> <span class="price">
                            	  <span class="special-price"><span class="price">   <?php if($product->sale_price >0) {echo wc_price($product->sale_price); }else{  echo wc_price($product->price); } ?> </span></span>
                            	  <?php  if($product->sale_price >0 ){
                            	  		$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
																	 ?>
                            	   <span class="old-price"><span class="price" style="padding-left:5px"> <?php    echo wc_price($product->regular_price) ;  ?>  </span></span>
                            	   
                            	  <span class="price"> <?php echo sprintf( __(' Save %s', $this -> textdomain ), $percentage . '%' ); ?> </span>
                            	  
                            	   
                            	   <?php } ?>
                            	   
                            	   </span>
                            	    </span>
                        
                          </div>
                        </div>
                        
                        
                        
                        
                        <?php } ?>
                        
                        <?php  if($show_rating_filter =="yes" ){ ?>
                        <div class="ratings">
                        	<div class="rating-box">
                            <div style="width: <?php echo  number_format($product->get_average_rating()*(20)); ?>%" class="rating"></div>
                          </div>
                        
                        </div>
                        <?php } ?>
                        

                      </div>
                    </div>
                  </div>
                </div>
              
                 <?php endwhile; wp_reset_query(); ?>
        
        
        
        
        
        
        
        
        
          
        </div>
      </div>
    </div>
  </div>
</div>



<style>
	<?php echo $custom_css; ?>
	
   	.new_title h2 {
  					border-bottom: 2px solid <?php echo $color_schema?>;
	  				}
	  				
	  .product-block .product-meta .product-action {
	  	border-bottom: 2px <?php echo $color_schema?> solid;
	  }			
	  
	  .special-price .price {
	  	 color: <?php echo $color_schema?>;
	  }	
	  
	  .item .item-info .info-inner .item-title a:hover {
  color: <?php echo $color_schema?> !important;
}
	 .slider-items-products .owl-buttons a:hover {
	 	 background: <?php echo $color_schema?>;
	   border: 1px solid <?php echo $color_schema?>;
	 } 				

		 
	 
</style>