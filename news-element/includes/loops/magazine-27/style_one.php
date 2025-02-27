<?php
use News_Element\Khobish_Helper;

    if( $wp_query->have_posts() ) :
        while( $wp_query->have_posts() ) :
            $wp_query->the_post();
            ?>

            <div class="fw-col-md-12 first no-pad anim-fade">
                
                <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">

                  <div class="excerpt-wrap first-meta">
                    <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                  </div>  

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="ft-thumbwrap">
                      <a href="<?php the_permalink();?>">
                        <span class="icon khbmedia"></span>
                        <?php the_post_thumbnail($imgf);?>
                      </a> 
                    </div>
                <?php endif; ?>

                  <div class="excerpt-wrap rest-meta">
                    <?php Khobish_Helper::ae_build_postmeta($metar,$excerptf);?>                        
                  </div>            

                </article>                      
                
            </div>

            <?php   
        endwhile;
        wp_reset_postdata();
    endif;
?>  