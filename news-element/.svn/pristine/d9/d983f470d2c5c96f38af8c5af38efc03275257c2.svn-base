<?php
use News_Element\Khobish_Helper;
?>

<?php
    if( $wp_query->have_posts() ) :
        while( $wp_query->have_posts() ) :
            $wp_query->the_post();$i++;?>
                <?php if( $i < $break){?>

                <div class="ne-df-50 abs-excerpt smtitle anim-fade">
                    <div class="ne-d-flex post-item ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap no-overflow">
                          <a href="<?php the_permalink();?>">
                            <span class="icon khbmedia"></span>
                            <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                          </a>
                          <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>

                        </div>
                    <?php endif; ?>

                      <div class="excerpt-wrap">
                      
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
                       
                      </div>

                    </div>
                </div>


                <?php } elseif ( $i == $break ) { ?>
                <div class="ne-df-100 abs-excerpt bgtitle anim-fade">
                    <div class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap no-overflow">
                          <a href="<?php the_permalink();?>">
                            <span class="icon khbmedia"></span>
                            <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                          </a>
                          <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>

                        </div>
                    <?php endif; ?>

                      <div class="excerpt-wrap">
                        <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts);?>
                      </div>

                    </div>
                </div>

                <?php } else {?>

                <div class="ne-df-50 abs-excerpt smtitle anim-fade">
                    <div class="ne-d-flex post-item ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap no-overflow">
                          <a href="<?php the_permalink();?>">
                            <span class="icon khbmedia"></span>
                            <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                          </a>
                          <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>

                        </div>
                    <?php endif; ?>

                      <div class="excerpt-wrap">
                     
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
      
                      </div>

                    </div>
                </div>

                <?php } ?>

            <?php
        endwhile;
        wp_reset_postdata();
    endif;
?>