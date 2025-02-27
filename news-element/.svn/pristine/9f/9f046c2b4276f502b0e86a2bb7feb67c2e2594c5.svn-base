<?php
use News_Element\Khobish_Helper;
if ( $wp_query->have_posts() ) {
	  $post_count = 0;while ( $wp_query->have_posts() ) {
		$wp_query->the_post();$post_count++;
    if ($post_count % 2 == 1){	
		?> 

            <div class="masongrdgrid masonitm anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">

                <div class="bgholder">
                    <div class="inrbg lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>
                    <a href="<?php the_permalink();?>" class="khbhvr"></a> 
                    <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                    <div class="metawrpr">
                      <div class="inrwrp">  
                          <div class="topmeta">
                            <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                                
                           </div>  
                       </div>   
                    </div> 
                    </div>                          
                </div>

            </div>


	 <?php } else {?>

          <div class="masongrdgrid masonitm anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">
          <div class="bgholder">

          <?php if ( has_post_thumbnail() ) : ?>
              <div class="ft-thumbwrap">
                <a href="<?php the_permalink();?>">
                  <span class="icon khbmedia"></span>
                  <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgr);?>
                </a>
                <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                </div>
                <div class="topmeta khbgrid">
                  <?php Khobish_Helper::ae_build_postmeta($metar,$excerptf);?>                                
                 </div> 

              
          <?php endif; ?> 
                                      
              </div>
          </div>

   <?php }



  } wp_reset_postdata(); } else {
}