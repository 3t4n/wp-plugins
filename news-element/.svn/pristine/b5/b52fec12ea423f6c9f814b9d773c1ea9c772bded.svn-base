<?php
use News_Element\Khobish_Helper;
  $post_array =['2','3','6','7','10','11','14','15','18','19','22','23','26','27','30','31'];
  if( $wp_query->have_posts() ) :
      $post_count = 0;while( $wp_query->have_posts() ) :
          $wp_query->the_post();$post_count++;
          if (in_array($post_count, $post_array)){
            $cls = 'khbsmgrid';
          } else {
            $cls = '';  
          }                         
          ?>
          <div class="ne-df-50 photonegrid anim-fade <?php echo $cls;?>">

                <div class="post-item abs-excerpt ne-d-flex <?php echo Khobish_Helper::xl_post_format_icon();?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="ft-thumbwrap no-overflow has-border">
                      <a href="<?php the_permalink();?>">
                        <span class="icon xlsmall khbmedia"></span>
                        <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$imgf);?>
                      </a>
                      <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                    </div>
                <?php endif; ?>

                  <div class="excerpt-wrap light-meta">
                    <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
                  </div>
                </div>

          </div>
   
          <?php   
      endwhile;
      wp_reset_postdata();
  endif;
?>  