<?php
use News_Element\Khobish_Helper;
  $post_array =['1','2','6','7','11','12','16','17','21','22'];
  if( $wp_query->have_posts() ) :
      $post_count = 0;while( $wp_query->have_posts() ) :
          $wp_query->the_post();$post_count++;
          if (in_array($post_count, $post_array)){
            $cls = 'ne-df-50 khbsmgrid';
            $img = $imgf;
            $meta = $metaf;
            $excerpt = $excerptf;
          } else {
            $cls = 'ne-df-33 khbgrid';
            $img = $imgs;
            $meta = $metas;
            $excerpt = $excerpts;
          }
          ?>
          <div class="<?php echo $cls;?> photonegrid abs-excerpt anim-fade">

              <div class="post-item ne-d-flex ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
              <?php if ( has_post_thumbnail() ) : ?>
                  <div class="ft-thumbwrap no-overflow">
                    <a href="<?php the_permalink();?>">
                    <?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),$img);?>
                      <span class="icon khbmedia"></span>
                      <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                    </a>
                  </div>
              <?php endif; ?>

                <div class="excerpt-wrap">
                  <?php Khobish_Helper::ae_build_postmeta($meta,$excerpt);?>
                </div>
              </div>  
          </div>

          <?php
      endwhile;
      wp_reset_postdata();
  endif;
?>