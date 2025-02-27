<?php
use News_Element\Khobish_Helper;
?>
 
    <div class="ne-df-33 anim-fade"> 
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();

                    if ( $i == 0 ) { ?> 
                      <div class="post-item bottom-space no-overflow ne-d-flex big <?php echo Khobish_Helper::xl_post_format_icon(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap no-overflow">
                            <a href="<?php the_permalink(); ?>">
                              <span class="icon"></span>
                              <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                            </a>
                            <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg(); ?></div>
                          </div>
                      <?php endif; ?>
                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf); ?>                        
                        </div>            
                      </div> 
                    <?php } ?>

                   <?php if ( $i == 1 ) { ?> 
                      <div class="post-item no-overflow ne-d-flex small <?php echo Khobish_Helper::xl_post_format_icon(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap no-overflow">
                            <a href="<?php the_permalink(); ?>">
                              <span class="icon"></span>
                              <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                            </a>
                          </div>
                      <?php endif; ?>
                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts); ?>                        
                        </div>            
                      </div> 
                    <?php }

                    $i = (int)$i + (int)1;
                endwhile;
                $i = (int)1;
                wp_reset_postdata();
            endif;
        ?>

  </div>

  <div class="ne-df-33 anim-fade"> 
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();

                    if ( $i == 3 ) { ?> 
                      <div class="post-item no-overflow ne-d-flex small <?php echo Khobish_Helper::xl_post_format_icon(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap no-overflow">
                            <a href="<?php the_permalink(); ?>">
                              <span class="icon"></span>
                              <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                            </a>
                          </div>
                      <?php endif; ?>
                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts); ?>                        
                        </div>            
                      </div> 
                    <?php } ?>

                   <?php if ( $i == 4 ) { ?> 
                      <div class="post-item top-space no-overflow ne-d-flex big <?php echo Khobish_Helper::xl_post_format_icon(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap no-overflow">
                            <a href="<?php the_permalink(); ?>">
                              <span class="icon"></span>
                              <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                            </a>
                            <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg(); ?></div>
                          </div>
                      <?php endif; ?>
                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf); ?>                        
                        </div>            
                      </div> 
                    <?php }

                    $i = (int)$i + (int)1;
                endwhile;
                $i = (int)1;
                wp_reset_postdata();
            endif;
        ?>

    </div>

    <div class="ne-df-33 anim-fade"> 
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();

                    if ( $i == 5 ) { ?> 
                      <div class="post-item bottom-space no-overflow ne-d-flex big <?php echo Khobish_Helper::xl_post_format_icon(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap no-overflow">
                            <a href="<?php the_permalink(); ?>">
                              <span class="icon"></span>
                              <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                            </a>
                            <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg(); ?></div>
                          </div>
                      <?php endif; ?>
                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf); ?>                        
                        </div>            
                      </div> 
                    <?php } ?>

                   <?php if ( $i == 6 ) { ?> 
                      <div class="post-item ne-d-flex ne-v-center small <?php echo Khobish_Helper::xl_post_format_icon(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap no-overflow">
                            <a href="<?php the_permalink(); ?>">
                              <span class="icon"></span>
                              <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                            </a>
                          </div>
                      <?php endif; ?>
                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts); ?>                        
                        </div>            
                      </div> 
                    <?php }

                    $i = (int)$i + (int)1;
                endwhile;
                $i = (int)1;
                wp_reset_postdata();
            endif;
        ?>

  </div>

