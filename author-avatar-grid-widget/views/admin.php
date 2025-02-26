<?php
//Widget title field
?>
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'cudathemes'); ?></label><br />
	<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<?php
//Dropdown for choosing role type 
?>
<p>
	<label for="<?php echo $this->get_field_id('role'); ?>"><?php _e('Role:', 'cudathemes');?></label>
	<select class="widefat" id="<?php echo $this->get_field_id('role'); ?>" name="<?php echo $this->get_field_name('role'); ?>" >
		<option value=""><?php _e('All User Roles','cudathemes') ?></option>
		<?php wp_dropdown_roles( $instance['role'] ); ?>
	</select>
</p>

<?php
//Dropdown for choosing the size of the images
?>
<p>
	<label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Gravatar size:', 'cudathemes');?></label>
	<input type="text" class="widefat" style="float:right;width:100px;" id="<?php $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" value="<?php echo $instance['size']; ?>" />
</p><br />

<?php
//Checkbox to allow display of only users with published posts
?>
<p>	
	<input type="checkbox" id="<?php echo $this->get_field_id('postcount'); ?>" name="<?php echo $this->get_field_name('postcount'); ?>" value="1" <?php checked( '1', $instance['postcount'] ); ?> />
	<label for="<?php echo $this->get_field_id('postcount'); ?>"><?php _e('Only display users with published posts','cudathemes'); ?></label>
</p>
