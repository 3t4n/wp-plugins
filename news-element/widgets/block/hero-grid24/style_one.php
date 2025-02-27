<?php
use News_Element\Khobish_Helper;
$i = 0;
?>

<div class="ne-d-flex ne-gutter ne-mobile-block herogrid24">
  <div class="ne-df-33 firstblock">
  <?php 
      if( $wp_query->have_posts() ) :
          while( $wp_query->have_posts() ) :
              $wp_query->the_post();
              if( $i == 0|| $i == 1|| $i == 2 ) :
              ?>
                <div class="post-item ne-d-flex ne-v-center">
                  <?php if ( has_post_thumbnail() ) : ?>
                      <div class="ft-thumbwrap no-overflow">
                        <a href="<?php the_permalink();?>">
                          <span class="icon"></span>
                          <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$settings['img_size']);?>
                        </a> 
                        <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>              
                      </div>
                  <?php endif; ?>

                  <div class="excerpt-wrap ne-flex-1">
                    <?php Khobish_Helper::ae_build_postmeta($metaf,$settings['excerpt']['size']);?>                        
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

        <?php 
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > 3) : 
                    ?> 
                    <div class="ne-df-33 abs-excerpt secondblock">
                      <div class="post-item ne-d-flex ne-v-center">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow">
                              <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$settings['img_sizes']);?>
                              </a> 
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>              
                            </div>
                        <?php endif; ?>

                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metas,$settings['excerpts']['size']);?>                        
                        </div> 

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

