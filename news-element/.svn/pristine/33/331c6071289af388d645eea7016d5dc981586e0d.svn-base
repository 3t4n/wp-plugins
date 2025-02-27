<?php
use News_Element\Khobish_Helper;
if( $wp_query->have_posts() ) :
    $post_count = 0;while( $wp_query->have_posts() ) :
        $wp_query->the_post();$post_count++;
        ?>
        <div class="minimalgrid ne-df-50 pos-rel ne-has-rb-border anim-fade">
            
            <div class="ne-d-flex ne-v-center post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">

              <div class="excerpt-wrap">
                <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
              </div>            

            </div>                      
            
        </div>
 
        <?php   
    endwhile;
    wp_reset_postdata();
endif;
?>  