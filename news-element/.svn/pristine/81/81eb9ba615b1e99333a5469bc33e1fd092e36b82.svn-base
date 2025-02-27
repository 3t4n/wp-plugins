<?php
use News_Element\Khobish_Helper;

if( $wp_query->have_posts() ) :
    while( $wp_query->have_posts() ) :
        $wp_query->the_post();
        if( $i == 0 ) :
        ?>
        <div class="first anim-fade">

            <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="ft-thumbwrap no-overflow">
                  <a href="<?php the_permalink();?>">
                    <span class="icon khbmedia"></span>
                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                  </a>
                </div>
            <?php endif; ?>

              <div class="excerpt-wrap">
                <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
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
                if( $i > 1 ) :?>

                    <div class="restblock anim-fade">
                        <article class="post-item">
                          <div class="excerpt-wrap">
                            <?php echo Khobish_Helper::khobish_post_title();?>
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
