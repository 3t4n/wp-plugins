<?php

	//check that the user has the required permissions
	if (!current_user_can('manage_options')){

		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

	// variables
	$hidden_field_name = 'submit_hidden';

	
	// Read in existing option value from database
	$active		 	= get_option( 'active' );
	$panel_width 	= get_option( 'panel_width' );
	$slide_type		= get_option( 'slide_type' );
	

	// See if the user has posted us some information
	// If they did, this hidden field will be set to 'Y'
	if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ){
		
		// Read posted value
		$active			= $_POST[ 'active' ];
		$panel_width	= $_POST[ 'panel_width' ];
		$slide_type		= $_POST[ 'slide_type' ];
		
		// Save the posted value in the database
		update_option( 'active' , $active );
		update_option( 'panel_width' , $panel_width );
		update_option( 'slide_type' , $slide_type );

		
		// Put a settings updated message on the screen
		?>
		<div class="updated"><p><strong><?php _e('Settings saved.', 'menu-test' ); ?></strong></p></div>
		<?php
    }
	
	// If not active, show alert
	if (!isset($active) || !$active){
		?>
		<div class="error"><p><strong><?php _e('The Facebook Panel is currently not active. To activate it, check the checkbox below, set your preferences and hit Save.', 'menu-test' ); ?></strong></p></div>
		<?php
	};

?>



<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div><h2><?php _e('Facebook Panel Settings', 'menu-test'); ?></h2>

	<form name="fbThis_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
	
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="active"><?php _e("Activate panel", 'menu-test' ); ?></label></th>
					<td><input type="checkbox" name="active" id="active" value="active" <?php if(isset($active) && $active){echo "checked";};?>>
					<span class="description">(check to activate or uncheck to deactivate the panel)</span></td>
				</tr>
				
				<tr valign="top">
					<th scope="row"><label for="panel_width"><?php _e("Panel width", 'menu-test' ); ?></label></th>
					<td><input name="panel_width" type="number" id="panel_width" value="<?php echo $panel_width; ?>">
					<p class="description">Set the panel width in pixels.</p></td>
				</tr>
				
				<tr valign="top">
					<th scope="row"><label for="slide_type"><?php _e("Slide type", 'menu-test' ); ?></label></th>
					<td>
						<select name="slide_type" id="slide_type">
							<option <?php if ($slide_type=='over') echo 'selected="selected"'?> value="over">Over</option>
							<option <?php if ($slide_type=='under') echo 'selected="selected"'?> value="under">Under</option>
						</select>
					<p class="description">Choose "over" to have the panel slide in from the left, overlying the page.</p>
					<p class="description">Choose "under" to have the page slide out to the right revealing the panel underneath.</p></td>
				</tr>
				
				<tr valign="top">
					<th scope="row"></th>
					<td>
						<input type="submit" name="submit" id="submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<p><strong><?php _e('For better listing and ranking by Facebook, it is strongly advised 
	that you activate Open Graph tags. You may use the 
	<a href="plugin-install.php?tab=search&type=term&s=Facebook+Revised+Open+Graph+Meta+Tag&plugin-search-input=Search+Plugins">Facebook Open Graph Meta Tag</a> 
	plugin to have this done automatically.', 'menu-test' ); ?></strong></p>

</div>