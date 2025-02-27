<?php
use News_Element\Khobish_Helper;

?>
        <div class="xldherone">
            
            <div class="firstblock anim-fade">
                <?php if( $wp_query->have_posts() ) :
                    while( $wp_query->have_posts() ) :
                        $wp_query->the_post();
                        if( $i == 0 ) :
                        ?>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
                              <a href="<?php the_permalink();?>">
                                <span class="icon khbmedia"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                              </a>
                              <?php echo Khobish_Helper::khobish_single_category_bg();?>
                            </div>
                        <?php endif; ?>

                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                        </div> 

                            <?php   
                            endif;
                            $i = $i + 1;
                        endwhile;
                        $i = 1;
                        wp_reset_postdata(); 
                    endif;?>
                </div>
            <ul class="listonly">
                <?php
                    if( $wp_query->have_posts() ) :
                        while( $wp_query->have_posts() ) :
                            $wp_query->the_post();
                            if ($i % 2 == 1){
                              $cls = 'khbeven';
                            } else {
                              $cls = 'khbodd';
                            }                             
                            if( $i > 1 ) : 
                            ?> 

                          <li class="listitm anim-fade <?php echo $cls;?>">
                            <?php Khobish_Helper::ae_build_postmeta($metar,$excerptf);?>                        
                          </li>
                      
                            <?php
                            endif;
                            $i = $i + 1;
                        endwhile;
                    $i = 1;
                    wp_reset_postdata();
                    endif;
                ?>

                </ul> 
        </div>
