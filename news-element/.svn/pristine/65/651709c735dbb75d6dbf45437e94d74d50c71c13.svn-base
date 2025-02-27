<?php
use News_Element\Khobish_Helper;
$i = 0;
?>

<div class="khobishhero16 ne-d-flex ne-gutter ne-mobile-block">
    <div class="ne-df-33 firstblock">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 0){ ?>

                        <div class="post-item ne-d-flex ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow">
                              <a href="<?php the_permalink();?>">
                                <span class="icon khbicon"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$settings['fimg']);?>
                              </a>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                            </div>
                        <?php endif; ?>
     
                          <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($fmeta,$settings['fex']['size']);?>                        
                          </div>            

                        </div>

                    <?php }
                    
                    $i = $i + 1;
                    
                endwhile;
                $i = 1;
                wp_reset_postdata();
            endif;
        ?>
    </div>
        
    <div class="ne-df-33 firstblock">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if($i == 2){ ?> 
                        <div class="post-item ne-d-flex ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow">
                              <a href="<?php the_permalink();?>">
                                <span class="icon khbicon"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$settings['fimg']);?>
                              </a>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                            </div>
                        <?php endif; ?>
     
                          <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($fmeta,$settings['fex']['size']);?>                        
                          </div>            

                        </div>

                    <?php }
                    $i = $i + 1;
                endwhile;
            $i = 1;
            wp_reset_postdata();
            endif;
        ?>
    </div>    

    <div class="ne-df-33 secondblock">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 4 || $i== 3 ) { ?>
                    <div class="post-item ne-d-flex ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap no-overflow"> 
                          <a href="<?php the_permalink();?>">
                            <span class="icon khbicon"></span>
                            <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$settings['simg']);?>
                          </a>
                          <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                        </div>
                    <?php endif; ?>
 
                      <div class="excerpt-wrap">
                        <?php Khobish_Helper::ae_build_postmeta($smeta,0);?>                        
                      </div>            

                    </div>
                    <?php } 
                    $i = $i + 1;
                endwhile;
                $i = 1;
                wp_reset_postdata();
            endif;
        ?>
    </div>

</div> 



