<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','simple-news-ticker' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'ntax' ); ?>"><?php _e( 'Categories to show, use slugs separated by commas:','simple-news-ticker' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'ntax' ); ?>" name="<?php echo $this->get_field_name( 'ntax' ); ?>" type="text" value="<?php echo esc_attr( $ntax ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'exclude' ); ?>"><?php _e( 'Categories to hide, use ids separated by commas:','simple-news-ticker' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'exclude' ); ?>" name="<?php echo $this->get_field_name( 'exclude' ); ?>" type="text" value="<?php echo esc_attr( $exclude ); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'offset' ); ?>"><?php _e( 'Offset, number:','simple-news-ticker' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'offset' ); ?>" name="<?php echo $this->get_field_name( 'offset' ); ?>" type="number" value="<?php echo esc_attr( $offset ); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'titlewords' ); ?>"><?php _e( 'Title Words, number:','simple-news-ticker' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'titlewords' ); ?>" name="<?php echo $this->get_field_name( 'titlewords' ); ?>" type="number" value="<?php echo esc_attr( $titlewords ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'showposts' ); ?>"><?php _e( 'Number of posts to show:','simple-news-ticker' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'showposts' ); ?>" name="<?php echo $this->get_field_name( 'showposts' ); ?>"  type="number" value="<?php echo esc_attr( $showposts ); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'posttype' ); ?> "><?php _e('Post Type to use:', 'simple-news-ticker'); ?></label>
		<select id="<?php echo $this->get_field_id( 'posttype' ); ?>" name="<?php echo $this->get_field_name( 'posttype' ); ?>" value="<?php echo esc_attr( $posttype ); ?>" type="select">
		      <?php $mmargs = array(
				   'public'   => true,
				   '_builtin' => false
				);

				$output = 'names'; // names or objects, note names is the default
				$operator = 'and'; // 'and' or 'or'

				$posttypes = get_post_types( $mmargs, $output, $operator );
				array_unshift($posttypes, 'post'); 
				$imageoptions = $posttypes;
				  foreach ($imageoptions as $option) {
					  
					  echo '<option value="' . $option . '" id="' . $option . '"', $posttype == $option ? ' selected="selected"' : '', '>', $option, '</option>'; } ?>

		</select>
	</p>