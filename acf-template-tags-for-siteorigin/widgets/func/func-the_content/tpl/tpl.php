<div class="the_content">
	<?php
	
	$old_value = apply_filters('siteorigin_panels_filter_content_enabled', true);
	
	add_filter('siteorigin_panels_filter_content_enabled', function() { return false; });
	
	global $post;
	
	echo $post->post_content;
	
	add_filter('siteorigin_panels_filter_content_enabled', function() use ($old_value) { return $old_value; });
	
	?>
</div>
