<div class="previous_post_link">
	<?php
	if ( !empty($instance['option']['link_text']) ) {
		previous_post_link( '%link', wp_kses_post($instance['option']['link_text']) );
		
	} else {
		previous_post_link();
	}
	?>
</div>
