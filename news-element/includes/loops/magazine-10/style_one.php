<?php
    use News_Element\Khobish_Helper;
    if( $wp_query->have_posts() ) :
        while( $wp_query->have_posts() ) :
            $wp_query->the_post();
            ?>

                <div class="ne-df-100 anim-fade">

                      <div class="ne-d-flex abs-excerpt ne-v-center post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow">
                              <a href="<?php the_permalink();?>">
                                <span class="icon khbmedia xlsmall"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                              </a>
                              <?php echo Khobish_Helper::square_dates();?>
                            </div>
                        <?php endif; ?>
           
                        <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                        </div>                                     
                    
                      </div>                     
                    
                </div>
            <?php   
        endwhile;
        wp_reset_postdata();
    endif;
?>