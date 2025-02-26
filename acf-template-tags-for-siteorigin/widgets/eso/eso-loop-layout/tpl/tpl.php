<?php
$post_selector_pseudo_query = $instance['option']['posts'];
$processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );
$query_result = new WP_Query( $processed_query );

if($query_result->have_posts()) : ?>

<div class="loop-layout">
	<?php while($query_result->have_posts()) : $query_result->the_post(); ?>
		<?php echo siteorigin_panels_render( absint($instance['option']['layout']) ); ?>
	<?php endwhile; wp_reset_postdata(); ?>
</div>

<?php endif; ?>
