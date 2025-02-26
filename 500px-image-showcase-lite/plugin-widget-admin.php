<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'Inceptive500pxImageShowcase-locale' ) ?></label>
	<br/>
	<input type="text" class="widefat" value="<?php echo esc_attr( $instance['title'] ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'feature' ); ?>">Feature:</label> 
	<select class="feature" id="<?php echo $this->get_field_id( 'feature' ); ?>" name="<?php echo $this->get_field_name( 'feature' ); ?>" class="widefat" style="width:100%;">
		<option <?php if ( $instance["feature"]=="popular" ) echo 'selected="selected"'; ?> value="popular">Popular</option>
		<option <?php if ( $instance["feature"]=="upcoming" ) echo 'selected="selected"'; ?> value="upcoming">Upcoming</option>
		<option <?php if ( $instance["feature"]=="editors" ) echo 'selected="selected"'; ?> value="editors">Editors Choice</option>
		<option <?php if ( $instance["feature"]=="fresh_today" ) echo 'selected="selected"'; ?> value="fresh_today">Fresh Today</option>
		<option <?php if ( $instance["feature"]=="fresh_yesterday" ) echo 'selected="selected"'; ?> value="fresh_yesterday">Fresh Yesterday</option>
		<option <?php if ( $instance["feature"]=="fresh_week" ) echo 'selected="selected"'; ?> value="fresh_week">Fresh Week</option>
		<option <?php if ( $instance["feature"]=="user" ) echo 'selected="selected"'; ?> value="user">User Photos</option>
		<option <?php if ( $instance["feature"]=="user_favorites" ) echo 'selected="selected"'; ?> value="user_favorites">User Favorites</option>
		<option <?php if ( $instance["feature"]=="user_friends" ) echo 'selected="selected"'; ?> value="user_friends">User Friends Photos</option>
		<option <?php if ( $instance["feature"]=="tag" ) echo 'selected="selected"'; ?> value="tag">Tag</option>
	</select>
</p>
	<div class="username-wrapper" <?php if ( $instance["feature"]!="user" && $instance["feature"]!="user_favorites" && $instance["feature"]!="user_friends" ) echo 'style="display:none;"'; ?>>
		<p>
		<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e( 'Username:', 'Inceptive500pxImageShowcase-locale' ) ?></label>
		<br/>
		<input type="text" class="widefat" value="<?php echo esc_attr( $instance['username'] ); ?>" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" />
		</p>
	</div>
	
	<div class="tag-wrapper" style="display:none;">
		<p>
		<label for="<?php echo $this->get_field_id( 'tag' ); ?>"><?php _e( 'Tag:', 'Inceptive500pxImageShowcase-locale' ) ?></label>
		<br/>
		<input type="text" class="widefat" value="<?php echo esc_attr( $instance['tag'] ); ?>" id="<?php echo $this->get_field_id( 'tag' ); ?>" name="<?php echo $this->get_field_name( 'tag' ); ?>" />
		</p>
	</div>
	
<p>
	<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e( 'Number of photos:', 'Inceptive500pxImageShowcase-locale' ) ?></label>
	<br/>
	<input type="text" class="widefat" value="<?php echo esc_attr( $instance['num'] ); ?>" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" />
</p>	
<p>
	<label for="<?php echo $this->get_field_id( 'row' ); ?>"><?php _e( 'Photos per row:', 'Inceptive500pxImageShowcase-locale' ) ?></label>
	<br/>
	<input type="text" class="widefat" value="<?php echo esc_attr( $instance['row'] ); ?>" id="<?php echo $this->get_field_id( 'row' ); ?>" name="<?php echo $this->get_field_name( 'row' ); ?>" />
</p>	
<p>	
	<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Photo width:', 'Inceptive500pxImageShowcase-locale' ) ?></label>
	<br/>
	<input type="text" class="widefat" value="<?php echo esc_attr( $instance['width'] ); ?>" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" />
</p>	
<p>	
	<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Photo height:', 'Inceptive500pxImageShowcase-locale' ) ?></label>
	<br/>
	<input type="text" class="widefat" value="<?php echo esc_attr( $instance['height'] ); ?>" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" />
</p>	
	<script>
		
		jQuery(document).ready(function(event){			
			
		    jQuery(".feature").click(function(){
			    
			if (jQuery(this).val() == "user" || jQuery(this).val() == "user_favorites" || jQuery(this).val() == "user_friends") {

			    jQuery(".username-wrapper").slideDown("fast");

			} else {

			    jQuery(".username-wrapper").slideUp("fast");

			}
			
			if (jQuery(this).val() == "tag" ) {

			    jQuery(".tag-wrapper").slideDown("fast");

			} else {

			    jQuery(".tag-wrapper").slideUp("fast");

			}
			
		    });
		});

	</script>