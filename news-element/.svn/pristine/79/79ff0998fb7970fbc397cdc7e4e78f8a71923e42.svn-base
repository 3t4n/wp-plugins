<?php
use News_Element\Khobish_Helper;
?>
<div class="ne-d-flex ne-gutter ne-mobile-block"> 
    <div class="ne-df-50 firstblock anim-fade"> 
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 0 ) :
                    ?> 
                      <div class="post-item ne-d-flex <?php echo Khobish_Helper::xl_post_format_icon();?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap no-overflow">
                            <a href="<?php the_permalink();?>">
                              <span class="icon"></span>
                              <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                            </a>
                            <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                          </div>
                      <?php endif; ?>
                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
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
        
    <div class="ne-df-50 secondblock">
        <div class="small anim-fade">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post(); 
                    if( $i <= 3 && $i >= 2 ) : 

                    ?> 

                      <div class="post-item ne-d-flex <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap no-overflow">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                                  </a>
                  
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
      </div>
      <div class="big ne-d-flex ne-mobile-block ne-gutter">

      <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post(); 
                    if( $i >= 4 ) : 

                    ?> 

                      <div class="ne-df-50 post-item anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap no-overflow">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                                  </a>
                                  <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                </div>
                            <?php endif; ?>                       
                          <div class="excerptwrp">
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

      </div>

    </div>  
</div>      

