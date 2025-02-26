<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', $this->widget_text_domain ); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	<small class="howto"><?php _e( 'Note: Leave empty for no title', $this->widget_text_domain ); ?></small>
</p>


<p>
	<label for="<?php echo $this->get_field_id( 'username_hashtag' ); ?>"><?php _e( 'Username or Hashtag', $this->widget_text_domain ); ?>:</label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'username_hashtag' ); ?>" name="<?php echo $this->get_field_name( 'username_hashtag' ); ?>" type="text" value="<?php echo esc_attr( $instance['username_hashtag'] ); ?>" />
	<small class="howto"><?php _e( 'Multiple usernames and hastags are alowed.<br/>Example 1: @geekdidi<br/>Example 2: #easygram<br/>Example 3: @geekdidi, #easygram, @someother', $this->widget_text_domain ); ?></small>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'columns' ); ?>"><?php _e( 'Columns', $this->widget_text_domain ); ?>:</label><br/>
	<select id="<?php echo $this->get_field_id( 'columns' ); ?>" name="<?php echo $this->get_field_name( 'columns' ); ?>" class="widefat">
		<option value="1" <?php selected( $instance['columns'], 1 );?>> 1 </option>
		<option value="2" <?php selected( $instance['columns'], 2 );?>> 2 </option>
		<option value="3" <?php selected( $instance['columns'], 3 );?>> 3 </option>
		<option value="4" <?php selected( $instance['columns'], 4 );?>> 4 </option>
	</select>
	<small class="howto"><?php _e( 'Choose in how many columns you would like to display your photos', $this->widget_text_domain ); ?></small>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'photos_number' ); ?>"><?php _e( 'Number of photos', $this->widget_text_domain ); ?>:</label><br/>
	<input class="easygram-widget-input-slider" type="range" min="1" step= max="" id="<?php echo $this->get_field_id( 'photos_number' ); ?>" name="<?php echo $this->get_field_name( 'photos_number' ); ?>" value="<?php echo absint( $instance['photos_number'] ); ?>">
	<span class="easygram-widget-slider-opt-count"><?php echo absint( $instance['photos_number'] ); ?></span>
</p>


<p>
	<label for="<?php echo $this->get_field_id( 'photo_space' ); ?>"><?php _e( 'Photo spacing', $this->widget_text_domain ); ?>:</label><br/>
	<input class="small-text" type="text" value="<?php echo absint( $instance['photo_space'] ); ?>" id="<?php echo $this->get_field_id( 'photo_space' ); ?>" name="<?php echo $this->get_field_name( 'photo_space' ); ?>" /> px
	<small class="howto"><?php _e( 'Specify a spacing between your photos', $this->widget_text_domain ); ?></small>
</p>


<p>
	<label for="<?php echo $this->get_field_id( 'container_size' ); ?>"><?php _e( 'Widget container size', $this->widget_text_domain ); ?>:</label><br/>
	<input class="small-text widefat" type="text" value="<?php echo absint( $instance['container_size'] ); ?>" id="<?php echo $this->get_field_id( 'container_size' ); ?>" name="<?php echo $this->get_field_name( 'container_size' ); ?>" /> px
	<small class="howto"><?php _e( 'If needed, fine tune the size of the entire widget to match your theme\'s sidebar width', $this->widget_text_domain ); ?></small>
</p>


<p>
	<label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php _e( '"Follow" link text', $this->widget_text_domain ); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" type="text" value="<?php echo esc_attr( $instance['link_text'] ); ?>" />
	<small class="howto"><?php _e( 'Specify a text for your "follow" link, or leave empty if you do not want to display the "follow" link', $this->widget_text_domain ); ?></small>
</p>