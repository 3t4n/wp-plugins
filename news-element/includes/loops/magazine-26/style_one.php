<?php
use News_Element\Khobish_Helper;
$i = 0;
?>

<?php if( $wp_query->have_posts() ) :
    while( $wp_query->have_posts() ) :
        $wp_query->the_post();
        if( $i < $break ) :
        ?>      
        <div class="ne-df-33 first anim-fade">
                <div class="post-item ne-d-flex ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap no-overflow">
                          <a href="<?php the_permalink();?>">
                          <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                            <span class="icon khbmedia"></span>
                            <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                          </a>
                        </div>
                    <?php endif; ?>

                  <div class="excerpt-wrap">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
                  </div>     
                </div>
            </div>
        <?php
        endif;
        $i = (int)$i + (int)1;
    endwhile;
    $i = 1;
    wp_reset_postdata();
endif;
?>



    <div class="ne-df-100 rest anim-fade">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > $break ) :?>

                     
                            <div class="post-item ne-d-flex ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap no-overflow">
                                  <a href="<?php the_permalink();?>">
                                  <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                                    <span class="icon khbmedia"></span>
                                    <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                  </a>
                                </div>
                            <?php endif; ?>

                              <div class="excerpt-wrap">
                                <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts);?>
                              </div>

                            </div>
                      
                    <?php
                    endif;
                    $i = (int)$i + (int)1;
                endwhile;
                $i = (int)1;
                wp_reset_postdata();
            endif;
            ?>

</div>