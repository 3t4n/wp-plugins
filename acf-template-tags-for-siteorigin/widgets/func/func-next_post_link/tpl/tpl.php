<div class="next_post_link">
	<?php
	if ( !empty($instance['option']['link_text']) ) {
		next_post_link( '%link', wp_kses_post($instance['option']['link_text']) );
		
	} else {
		next_post_link();
	}
	?>
</div>
