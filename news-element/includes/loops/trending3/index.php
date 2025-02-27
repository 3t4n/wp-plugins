<?php
use News_Element\Khobish_Helper;

      if ($cat[0]=='all_time'){

        $vrange = 'all_time';

      } elseif ($cat[0]=='monthly'){

        $vrange = '30_day';

      } elseif ($cat[0]=='weekly'){

        $vrange = '7_day';

      } else {

        $vrange = '1_day';
 
      }

      $post_count = 0;
      global $post;
      if ( count( $posts ) > 0 ): foreach ( $posts as $post ):
        setup_postdata( $post );
        $post_count++;
        $views = get_post_views(get_the_ID(),$vrange);
        
        ?>
          <div class="khbtrendinginr anim-fade">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap">
                            <a href="<?php the_permalink();?>">
                              <?php the_post_thumbnail('thumbnail');?>
                              <span class="khbnumber"><?php echo $post_count;?></span>
                            </a>
                           
                          </div>
                      <?php endif; ?>

                      <div class="excerpt-wrap">
                        
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?> 
                        <span class="khbviews"><b><?php echo $views;?></b> views</span>  
                                         
                      </div>  
                      </div>
                      
        <?php
      endforeach; endif;