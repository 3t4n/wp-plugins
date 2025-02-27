<?php
use News_Element\Khobish_Helper;
?>

    <div class="ne-df-100">
        <div class="ne-d-flex ne-gutter ne-mobile-block">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 0 ) :
                    ?>
                    <div class="ne-df-66 anim-fade smtitle">
                        <div class="post-item no-overflow ne-d-flex ne-v-center">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
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
                    if( $i == 2 ) :
                    ?>
                    <div class="ne-df-33 anim-fade smtitle <?php echo Khobish_Helper::xl_post_format_icon();?>">

                    <div class="post-item no-overflow ne-d-flex ne-v-center">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
                                <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgs);?>
                                </a>
                                <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                            </div>
                        <?php endif; ?>

                        <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts);?>                        
                        </div> 
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
  </div>    

    <div class="ne-df-100 comblock">
    <div class="ne-d-flex ne-gutter ne-mobile-block">
      <div class="ne-df-33 anim-fade has-margin smtitle">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post(); 
                    if( $i == 3 || $i == 4 ) : 

                    ?> 
                    <div class="post-item no-overflow ne-d-flex ne-v-center">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
                                <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
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
    </div>  

      <div class="ne-df-66 anim-fade bgtitle">
        
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post(); 
                    if( $i == 5 ) : 

                    ?> 

                      <div class="post-item no-overflow ne-d-flex ne-v-center">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
                                <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgr);?>
                                </a>
                                <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                            </div>
                        <?php endif; ?>

                        <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                        
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
    
  <div class="ne-df-100 comblock">
    <div class="ne-d-flex ne-gutter ne-mobile-block">
            <?php
                if( $wp_query->have_posts() ) :
                    while( $wp_query->have_posts() ) :
                        $wp_query->the_post();
                        if( $i > 5 ) :
                        ?> 
                        <div class="ne-df-50 anim-fade smtitle">
                        <div class="post-item no-overflow ne-d-flex ne-v-center">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
                                <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
                                <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgr);?>
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

