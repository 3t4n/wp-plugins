<?php
use News_Element\Khobish_Helper;
$i = 0;
?>
<?php if( $wp_query->have_posts() ) :
    while( $wp_query->have_posts() ) :
        $wp_query->the_post();
        if( $i == 0 ) :
        ?>
        <div class="ne-df-66 second anim-fade">
                <div class="post-item no-overflow ne-d-flex <?php echo Khobish_Helper::xl_post_format_icon();?>">

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
                    <div class="inr">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
                    </div>
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

<?php
    if( $wp_query->have_posts() ) :
        while( $wp_query->have_posts() ) :
            $wp_query->the_post();
            if( $i == 2 ) :?>

                <div class="ne-df-33 first anim-fade">
                    <div class="post-item no-overflow ne-d-flex <?php echo Khobish_Helper::xl_post_format_icon();?>">
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
                </div>
            <?php
            endif;
            $i = $i + 1;
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
                    if( $i > 2 ) :?>

                        <div class="post-item ne-d-flex ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap no-overflow">
                                  <a href="<?php the_permalink();?>">
                                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgr);?>
                                    <span class="icon khbmedia"></span>
                                    <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                  </a>
                                </div>
                            <?php endif; ?>

                              <div class="excerpt-wrap">
                                <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>
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