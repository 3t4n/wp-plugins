<?php
use News_Element\Khobish_Helper;
?>

      <?php if( $wp_query->have_posts() ) :
          while( $wp_query->have_posts() ) :
              $wp_query->the_post();
              if( $i == 0 ) :
              ?>
                <div class="ne-df-100 abs-excerpt firstblock anim-fade">

                  <div class="ne-d-flex no-overflow post-item ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap no-overflow">
                            <a href="<?php the_permalink();?>">
                              <span class="icon khbmedia"></span>
                              <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                            </a>
                            <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                          </div>
                      <?php endif; ?>
                      
                    <div class="excerpt-wrap light-meta">
                      <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                    </div>            
                  </div> 

                </div>

                  <?php
                  endif;
                  $i = $i + 1;
              endwhile;
              $i = 1;
              wp_reset_postdata();
          endif;?>

          <?php
              if( $wp_query->have_posts() ) :
                  while( $wp_query->have_posts() ) :
                      $wp_query->the_post();
                      if( $i == 2 || $i == 3  ) : ?>

                        <div class="ne-df-50 abs-excerpt secondblock anim-fade">

                          <div class="ne-d-flex no-overflow post-item ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                              <?php if ( has_post_thumbnail() ) : ?>
                                  <div class="ft-thumbwrap no-overflow">
                                    <a href="<?php the_permalink();?>">
                                      <span class="icon khbmedia"></span>
                                      <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgr);?>
                                    </a>
                                    <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                  </div>
                              <?php endif; ?>
                              
                            <div class="excerpt-wrap light-meta">
                              <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                        
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

        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > 3  ) : ?>

                    <div class="ne-df-100 anim-fade thirdblock">
                      <div class="post-item ne-d-flex ne-v-center<?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow">
                              <a href="<?php the_permalink();?>">
                                <span class="icon khbmedia"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                              </a>
                               <?php echo Khobish_Helper::khobish_single_category_bg();?>
                            </div>
                        <?php endif; ?>
                        <div class="excerpt-wrap">
                          <div class="inr">
                            <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts);?>
                          </div>
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
          
