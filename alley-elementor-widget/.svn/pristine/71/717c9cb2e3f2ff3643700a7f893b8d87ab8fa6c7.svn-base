 <!-- testimonial layout #  -->
 <?php 
 while( $all_posts->have_posts() ):$all_posts->the_post();
  $id = get_the_ID();
  $custom = get_post_custom(get_the_ID());$taxonomy = 'service_tag';
  
  $terms = get_the_terms( $id, $taxonomy );
  
  ?>
  <div class="testimonial-holder">

    <!-- featured image -->
    <?php $this->aew_render_thumbnail_testimonial(); ?>
    <!-- featured image -->

    <div class="testimonial-content">

      <!-- post_content -->
      <?php $this->aew_render_content(); ?>
      <!-- post_content -->

      <!-- post_title -->
      <?php $this->aew_render_title(); ?>
      <!-- post_title -->
      
      <div class="review-tag">
        <?php if ($custom['abt_source'][0]){ ?>
          <span><a target = "_blank" rel="noreferrer noopener" href="<?php echo esc_url($custom['abt_source_link'][0]); ?>"><?php echo esc_html($custom['abt_source'][0]); ?></a></span>
        <?php }?>
        <?php
        if ($terms) {
          echo '<ul>';
          foreach ( $terms as $term ) {
            if ( isset( $term ) ) {
              if ( isset( $term->name ) ) {
                echo '<li>'.$term->name.'</li>';
              }
            }
          }
          echo '</ul>';
        } ?>
      </div>
      
      
    </div>
  </div>
  <!--testimonial layout #  -->

  <?php
endwhile; 

wp_reset_postdata();
