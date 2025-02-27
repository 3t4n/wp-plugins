<?php
use News_Element\Khobish_Helper;

if( $wp_query->have_posts() ) :
    while( $wp_query->have_posts() ) :
        $wp_query->the_post();
        if( $i == 0 ) :
        ?>
        <div class="first anim-fade">
            <article class="post-item has-height no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
                <div class="slide-bg lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>></div>
                <span class="icon xlsmall khbmedia"></span>
                <?php echo Khobish_Helper::khobish_single_category_bg();?>
                <a href="<?php the_permalink();?>" class="full-thumb-link"></a>

              <div class="excerpt-wrap">
                <div class="inr">
                    <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
                </div>
              </div>

            </article>

        </div>

        <?php
        endif;
        $i = (int)$i + (int)1;
    endwhile;
    $i = (int)1;
    wp_reset_postdata();
endif;
?>

    <?php
        if( $wp_query->have_posts() ) :
            while( $wp_query->have_posts() ) :
                $wp_query->the_post();
                if( $i == 2 ) :?>

                    <div class="restblock anim-fade">
                        <article class="post-item ne-d-flex ne-v-center no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
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

                        </article>
                    </div>
                <?php
                endif;
                $i = (int)$i + (int)1;
            endwhile;
            $i = (int)1;
            wp_reset_postdata();
        endif;
        ?>


    <?php
        if( $wp_query->have_posts() ) :
            while( $wp_query->have_posts() ) :
                $wp_query->the_post();
                if( $i > 2 ) :?>

                    <div class="restblock anim-fade">
                        <article class="post-item">
                          <div class="excerpt-wrap">
                            <?php echo Khobish_Helper::khobish_post_title();?>
                          </div>

                        </article>
                    </div>
                <?php
                endif;
                $i = $i + 1;
            endwhile;
            $i = 1;
            wp_reset_postdata();
        endif;
        ?>
