<?php

function asmt83_post_meta_fields()
	{
	    $screens = ['post', 'page', 'asmt83_cpt'];
		foreach ($screens as $screen) {
			add_meta_box(
				'asmt83_box_id',           // Unique ID
				'Social Meta Tags Options',  // Box title
				'asmt83_custom_post_meta_fields',  // Content callback, must be of type callable
				$screen                   // Post type
			);
		}
	}
	
	function asmt83_custom_post_meta_fields($post)
	{  
		$value = get_post_meta($post->ID, 'asmt83_og_type', true);
		?>
		<label for="asmt83_og_type">Meta og:type</label>
		<select name="asmt83_og_type" id="asmt83_og_type" class="postbox">
			<option value="article" <?php selected($value, 'article'); ?>>Article</option>
			<option value="book" <?php selected($value, 'book'); ?>>Book</option>
			<option value="profile" <?php selected($value, 'profile'); ?>>Profile</option>
			<option value="website" <?php selected($value, 'website'); ?>>Website</option>
			<option value="video" <?php selected($value, 'video'); ?>>Video</option>
			<option value="music" <?php selected($value, 'music'); ?>>Music</option>
		</select>
		<?php
	}
	
	function asmt83_save_postdata($post_id)
	{
		if (array_key_exists('asmt83_og_type', $_POST)) {
		    
		    $value = sanitize_text_field( $_POST['asmt83_og_type'] );
		    
		    $valid_values = array(
		        'article', 'book',
		        'profile', 'website',
		        'music', 'video'
		    );
		    
		    if(!in_array( $value, $valid_values ) ) {
		        $value = 'article';
		    }
		    
			update_post_meta(
				$post_id,
				'asmt83_og_type',
			    $value
			);
		}
	}
	
?>
