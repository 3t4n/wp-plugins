<?php
use News_Element\Khobish_Helper;

if( $wp_query->have_posts() ) :
   $post_count = 0; while( $wp_query->have_posts() ) :
        $wp_query->the_post();$post_count++;
        if($post_count % 2 == 0){
            $cls = 'odd';
        } else {
            $cls = 'even';
        }

        $current_month = get_the_date('F');
        if( $wp_query->current_post === 0 ) { 

           echo '<div class="datewrapper"><span>'.get_the_date( 'F Y' ).'</span></div>';

        }else{ 

            $f = $wp_query->current_post - 1;       
            $old_date =   mysql2date( 'F', $wp_query->posts[$f]->post_date ); 
            if($current_month != $old_date) {

                echo '<div class="datewrapper"><span>'.get_the_date( 'F Y' ).'</span></div>';

            }

        }                         
        ?>
        <div class="item anim-fade <?php echo Khobish_Helper::xl_post_format_icon().' '.$cls;?>">

          <div class="post-item ne-v-center ne-d-flex <?php echo Khobish_Helper::xl_post_format_icon();?>">
          <?php if ( has_post_thumbnail() ) : ?>
              <div class="ft-thumbwrap no-overflow">
                <a href="<?php the_permalink();?>">
                  <span class="icon xlsmall khbmedia"></span>
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
    endwhile;
    wp_reset_postdata();
endif;
?>  