<?php
use News_Element\Khobish_Helper;
$i = 0;
?>

<div class="herogrid3 abs-excerpt ne-d-flex ne-gutter ne-mobile-block">
    <div class="ne-df-33 bgtitle">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 0 ) :
                    ?>
                    <div class="post-item no-overflow ne-d-flex">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap">  
                                <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$settings['img_size']);?>
                                </a>
                                <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                </div>
                            <?php endif; ?>

                        <div class="excerpt-wrap">                           
                                <?php Khobish_Helper::ae_build_postmeta($metaf,$settings['excerpt']['size']);?>
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
        
    <div class="ne-df-33 smtitle">
        <?php 
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 2 || $i == 3) : 
                    ?> 
                    <div class="post-item no-overflow ne-d-flex">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap">  
                                <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$settings['img_sizes']);?>
                                </a>
                                <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                </div>
                            <?php endif; ?>

                        <div class="excerpt-wrap">                           
                                <?php Khobish_Helper::ae_build_postmeta($metas,$settings['excerpt']['size']);?>
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
    <div class="ne-df-33 bgtitle">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 4 ) : 
                    ?>

                    <div class="post-item no-overflow ne-d-flex">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap">  
                                <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$settings['img_size']);?>
                                </a>
                                <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                </div>
                            <?php endif; ?>

                        <div class="excerpt-wrap">                           
                                <?php Khobish_Helper::ae_build_postmeta($metaf,$settings['excerpt']['size']);?>
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

