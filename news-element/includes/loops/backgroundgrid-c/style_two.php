<?php
use News_Element\Khobish_Helper;
  $post_array = ['2','5','8','11','14','17','20'];
  if( $wp_query->have_posts() ) :
      $post_count = 0;while( $wp_query->have_posts() ) :
          $wp_query->the_post();$post_count++;
          if (in_array($post_count, $post_array)){
            $cls = 'ne-df-50 bgtitle';
            $img = $imgf;
          } else {
            $cls = 'ne-df-25 smtitle'; 
            $img = $imgr;
          }                        
          ?>
          <div class="<?php echo $cls;?> anim-fade abs-excerpt">
            <div class="post-item no-overflow ne-d-flex ne-v-center">
              <?php if ( has_post_thumbnail() ) : ?>
                  <div class="ft-thumbwrap no-overflow <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <a href="<?php the_permalink();?>">
                      <span class="icon"></span>
                      <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$img);?>
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