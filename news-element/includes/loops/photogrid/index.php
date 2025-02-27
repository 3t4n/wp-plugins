<?php
use News_Element\Khobish_Helper;
if ( $wp_query->have_posts() ) {
	  while ( $wp_query->have_posts() ) {
		$wp_query->the_post();	
		?> 

    <div class="photonegrid">
        <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>
          <div class="metawrpr">
              <div class="inrwrp">
                <div class="topmeta">
                  <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                                
                </div> 
                <div class="bottmeta">                           
                 <?php Khobish_Helper::ae_build_postmeta($metar,$excerptf);?>
                </div>  
               </div>                           
          </div>
      </div> 
    </div>


	 <?php } wp_reset_postdata(); } else {
}