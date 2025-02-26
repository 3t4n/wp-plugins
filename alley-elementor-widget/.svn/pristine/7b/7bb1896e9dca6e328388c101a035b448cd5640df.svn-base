 <!-- service layout #  -->
 <ul class="service-holder">
 <?php 
    while( $all_posts->have_posts() ):$all_posts->the_post();
    $custom = get_post_custom(get_the_ID());
 ?>
    <li>
         <!-- featured image -->
         <?php $this->aew_render_thumbnail(); ?>
         <!-- featured image -->
         
			<!-- post_title -->
			  <?php $this->aew_render_title(); ?>
        <!-- post_title -->
        
        <!-- excerpt -->
			  <?php $this->aew_render_excerpt($all_posts);?> 
        <!-- excerpt -->
      
        <!-- readmore -->    
			  <?php $this->aew_render_readmore(); ?>      
			  <!-- readmore -->
		</li>
    
  <!--service  layout #  -->

<?php
endwhile; 
wp_reset_postdata();
?>
</ul>
