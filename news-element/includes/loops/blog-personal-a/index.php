<?php
use News_Element\Khobish_Helper;
$i = 0;
?>

  <div class="firstblock">
        <?php if( $wp_query->have_posts() ) :
            while( $wp_query->have_posts() ) :
                $wp_query->the_post();
                if( $i == 0 ) :
                ?>

                <div class="anim-fade">
                    
                    <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap">
                          <a href="<?php the_permalink();?>">
                            <span class="icon khbmedia"></span>
                            <?php the_post_thumbnail($imgf);?>
                          </a>
                          <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                        </div>
                    <?php endif; ?>
 
                      <div class="excerpt-wrap">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                      </div>            

                    </article>                      
                    
                </div>

                    <?php   
                    endif;
                    $i = $i + 1;
                endwhile;
                $i = 1;
                wp_reset_postdata();
            endif;?>
       </div>     
    <div class="secondblock">
        <div class="inr">

                <?php
                    if( $wp_query->have_posts() ) :
                        while( $wp_query->have_posts() ) :
                            $wp_query->the_post();                           
                            if( $i > 1 ) : 
                            ?>                                     
                            <div class="contwrp">
                                  <div class="inrcont">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="ft-thumbwrap <?php echo Khobish_Helper::xl_post_format_icon();?>">
                                          <a href="<?php the_permalink();?>">
                                            <span class="icon khbmedia"></span>
                                            <?php the_post_thumbnail($imgr);?>
                                          </a>
                                          <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
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
        </div>
