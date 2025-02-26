<div class="the_title">
	<?php
	
	if ( !empty($instance['option']['link']) ) {
		
		if ( $instance['option']['html_tag'] != 'none' ) {
			
			$before = '<' . wp_kses_post(esc_html($instance['option']['html_tag'])) . '><a href="' . get_permalink(get_the_ID()) .'">';
			$after = '</' . wp_kses_post(esc_html($instance['option']['html_tag'])) . '></a>';
			
		} else {
			
			$before = '<a href="' . get_permalink(get_the_ID()) .'">';
			$after = '</a>';
			
		}
		
	} else {
		
		if ( $instance['option']['html_tag'] != 'none' ) {
			
			$before = '<' . sanitize_text_field(esc_html($instance['option']['html_tag'])) . '>';
			$after = '</' . sanitize_text_field(esc_html($instance['option']['html_tag'])) . '>';
			
		} else {
			
			$before = '';
			$after = '';
			
		}
		
	}
	
	the_title($before, $after, true);
	
	?>
	
</div>
