<div class="ampsy-widget" data-url="<?php echo $widgets_url; ?>">
	<p class="error">
		You should connect your site in the <a href="<?php echo $settings_url; ?>">plugin settings</a> first.
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'ampsy_widget_id' ); ?>">Widget</label>
		<select class="widefat"
				id="<?php echo $this->get_field_id( 'ampsy_widget_id' ); ?>"
				name="<?php echo $this->get_field_name( 'ampsy_widget_id' ); ?>"
				data-value="<?php echo esc_attr( $ampsy_widget_id ); ?>">
				<option value=""></option>
		</select>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php _e( 'CSS class:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" type="text" value="<?php echo esc_attr( $class ); ?>">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'Height' ); ?>"><?php _e( 'Height:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>">
	</p>
</div>
