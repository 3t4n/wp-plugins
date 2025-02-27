<?php
use News_Element\Khobish_Helper;
?>

  <div class="herogrid6wrp ne-d-flex ne-gutter">
      
    <div class="firstblock anim-fade">
          <?php if( $wp_query->have_posts() ) :
              while( $wp_query->have_posts() ) :
                  $wp_query->the_post();
                  if( $i == 0 ) :
                  ?>
                      <div class="post-item ne-d-flex ne-v-center">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
                              <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                              </a>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                            </div>
                        <?php endif; ?>

                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                        </div> 
                      </div>

                      <?php   
                      endif;
                      $i = $i + 1;
                  endwhile;
                  $i = 1;
                  wp_reset_postdata();
              endif;?>
         </div>     
      <div class="secondblock abs-excerpt anim-fade ne-flex-1">
          <?php
              if( $wp_query->have_posts() ) :
                  while( $wp_query->have_posts() ) :
                      $wp_query->the_post();                           
                      if( $i > 1 ) : 
                      ?> 
                        <div class="post-item no-overflow ne-d-flex ne-v-center">

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
                              <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgr);?>
                              </a>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                            </div>
                        <?php endif; ?>

                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                        
                        </div> 

                        </div>

                      <?php
                      endif;
                      $i = $i + 1;
                  endwhile;
              $i = 1;
              wp_reset_postdata();
              endif;
          ?>

          </div> 
  </div>
        
