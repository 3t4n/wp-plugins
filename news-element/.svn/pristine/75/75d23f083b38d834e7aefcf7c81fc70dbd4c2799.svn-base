<?php
use News_Element\Khobish_Helper;

if( $wp_query->have_posts() ) :
    while( $wp_query->have_posts() ) :
        $wp_query->the_post();
        if( $i == 0 ) :
        ?>
        <div class="ne-df-50">
            <div class="anim-fade first">

                <div class="post-item ne-d-flex <?php echo Khobish_Helper::xl_post_format_icon();?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="ft-thumbwrap no-overflow has-border">
                      <a href="<?php the_permalink();?>">
                        <span class="icon xlsmall khbmedia"></span>
                        <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                      </a>
                      <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                    </div>
                <?php endif; ?>

                  <div class="excerpt-wrap">
                    <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
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
<div class="ne-df-50 anim-fade">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 2 ) :?>

                            <div class="post-item middle ne-d-flex <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap no-overflow">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon xlsmall khbmedia"></span>
                                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                                  </a>
                                  <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                </div>
                            <?php endif; ?>

                              <div class="excerpt-wrap">
                                <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts);?>
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
                    if( $i > 2 ) :?>

                        <div class="anim-fade rest">
                            <div class="ne-d-flex ne-v-center post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap no-overflow">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon xlsmall khbmedia"></span>
                                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgr);?>
                                  </a>
                                </div>
                            <?php endif; ?>

                              <div class="excerpt-wrap">
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
</div>