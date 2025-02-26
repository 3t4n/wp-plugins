<!-- team-layouts #  -->
<?php
	  while( $all_posts->have_posts() ):$all_posts->the_post();
	  $custom = get_post_custom(get_the_ID());
?>
	<div class="team-holder">
		<!-- featured image -->
        <?php $this->aew_render_thumbnail(); ?>           
		<!-- featured image -->

        <!-- summary -->
		<div class="summary">
		<!-- post_title -->
        <?php $this->aew_render_title(); ?>
		<!-- post_title -->

		<!-- position -->   
        <?php $this->aew_render_position($all_posts);?> 
		<!-- position -->   	

        <!-- excerpt -->
			<?php $this->aew_render_excerpt($all_posts);?> 
		<!-- excerpt -->

		

		<!-- readmore -->    
		<?php $this->aew_render_readmore(); ?>      
		<!-- readmore -->
        </div>
        <!-- summary -->
	</div>
<?php
endwhile; 
wp_reset_postdata();
?>

<!-- team-layouts #  -->