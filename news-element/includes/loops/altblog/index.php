<?php
use News_Element\Khobish_Helper;
    if( $wp_query->have_posts() ) :
        $post_count = 0;while( $wp_query->have_posts() ) :
        $wp_query->the_post();$post_count++;
        ?>

            <div class="anim-fade">
                  <article class="post-item ne-d-flex ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow">
                              <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                              </a>
                            </div>
                        <?php endif; ?>                       
     
                        <div class="excerpt-wrap ne-flex-1">
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                        </div> 
                                                  
                  </article>                      
            </div>

           <?php

        endwhile;
        wp_reset_postdata();
    endif;
?>
