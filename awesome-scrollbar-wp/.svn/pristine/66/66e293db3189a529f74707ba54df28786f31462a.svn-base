<?php 
/*
 * Admin Page Options Settings
 * @author nasir2015
 */
/*===============================================
  Awesome Scroll To Top Options admin page init
=================================================*/
function nnf_scrollbar_framework(){
add_options_page(__('Scrollbar Options', 'wp-scrollbar'), __('Scrollbar Options', 'wp-scrollbar'), 'manage_options', 'scrollbar-option-page', 'nnf_scrollbar_options_page_function' );			 
}
add_action('admin_menu','nnf_scrollbar_framework');

/*===============================================
   Add setting option by used function. 
=================================================*/
function nnf_scrollbar_register_settings() {
	// Register settings and call sanitation functions
	// Add register setting. 
	register_setting( 'nnf_scrollbar_p_options', 'nnf_scrollbar_default_options', 'nnf_scrollbar_validate_options' );
}
add_action( 'admin_init', 'nnf_scrollbar_register_settings' );


function nnf_scrollbar_options_page_function(){?>
	<?php // Add settings API hook under form action.  ?>
	<?php global $nnf_scrollbar_default_options;
	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. 
	?>
	
   <div class="wrap">
		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' ,'wp-scrollbar' ); ?></strong></p></div>
		<?php endif; //  If the form has just been submitted, this shows the notification ?>	
				  
		<form action="options.php" method="post">  
		
			<?php //  Add settings API hook under form action.  ?>
			<?php $settings = get_option( 'nnf_scrollbar_default_options', $nnf_scrollbar_default_options ); ?>
			
			
			<?php settings_fields( 'nnf_scrollbar_p_options' );
			/* This function outputs some hidden fields required by the form,
			including a nonce, a unique number used to ensure the form has been submitted from the admin page and not somewhere else, very important for security */ ?>
		
			<table class="form-table">
				<tbody>
					<h2><strong><?php _e( 'Scrollbar Basic Color Settings' ,'wp-scrollbar' ); ?></strong></h2>
					<tr valign="top">
						<th scope="row"><label for="scrollbar_color"><?php _e( 'Scrollbar Color' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" class="my-color-field" value="<?php echo stripslashes($settings['scrollbar_color']); ?>" id="scrollbar_color" name="nnf_scrollbar_default_options[scrollbar_color]"/><p class="description"><?php _e( 'Select scrollbar color from here.<br/> You can also add HTML HEX color code.<br/> Default scrollbar color is <strong>#000000</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_bg"><?php _e( 'Scrollbar Background' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" class="my-color-field" value="<?php echo stripslashes($settings['scrollbar_bg']); ?>" id="scrollbar_bg" name="nnf_scrollbar_default_options[scrollbar_bg]"/><p class="description"><?php _e( 'Select scrollbar background from here.<br/> You can also add HTML HEX color code.<br/> Default scrollbar background is <strong>#81D742</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
				</tbody>
			</table>

			<table class="form-table">
				<tbody>
					<h2><strong><?php _e( 'Scrollbar Opacity Settings' ,'wp-scrollbar' ); ?></strong></h2>
					<tr valign="top">
						<th scope="row"><label for="scrollbar_minopactiy"><?php _e( 'Scrollbar Minimum Opacity' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_minopactiy']); ?>" id="scrollbar_minopactiy" name="nnf_scrollbar_default_options[scrollbar_minopactiy]"/><p class="description"><?php _e( 'You can change scrollbar minimum opacity  <br/> from here like 0 , 0.1 , 0.2 , 0.6 <br/> Default Scrollbar Minimum Opacity is <strong>0</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_maxopactiy"><?php _e( 'Scrollbar Maximum Opacity' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_maxopactiy']); ?>" id="scrollbar_maxopactiy" name="nnf_scrollbar_default_options[scrollbar_maxopactiy]"/><p class="description"><?php _e( 'You can change scrollbar maximum opacity  <br/> from here like 0 , 0.1 , 0.2 , 0.6  <br/> Default Scrollbar maximum opacity is <strong>1</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
				</tbody>
			</table>

			
			<table class="form-table">
				<tbody>
					<h2><strong><?php _e( 'Scrollbar Border Style Settings' ,'wp-scrollbar' ); ?></strong></h2>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_border"><?php _e( 'Scrollbar Border Width' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_border']); ?>" id="scrollbar_border" name="nnf_scrollbar_default_options[scrollbar_border]"/><p class="description"><?php _e( 'You can change scrollbar border width <br/> from here like 1px, 5px, 10px, 5px <br/> Default Scrollbar Border Width is <strong>1px</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr> 
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_border_style"><?php _e( 'Scrollbar Border Style' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_border_style']); ?>" id="scrollbar_border_style" name="nnf_scrollbar_default_options[scrollbar_border_style]"/><p class="description"><?php _e( 'You can change scrollbar border style <br/> from here like solid, dashed, dotted <br/> Default Scrollbar Border Sytle is <strong>solid</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr> 
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_border_color"><?php _e( 'Scrollbar Border Color' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" class="my-color-field" value="<?php echo stripslashes($settings['scrollbar_border_color']); ?>" id="scrollbar_border_color" name="nnf_scrollbar_default_options[scrollbar_border_color]"/><p class="description"><?php _e( 'Select scrollbar border color from here.<br/> You can also add HTML HEX color code.<br/> Default scrollbar border color is <strong>#FFFFFF</strong>' ,'wp-scrollbar' ); ?>
						</td>
					</tr> 
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_border_radius"><?php _e( 'Scrollbar Border Radius' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_border_radius']); ?>" id="scrollbar_border_radius" name="nnf_scrollbar_default_options[scrollbar_border_radius]"/><p class="description"><?php _e( 'You can change scrollbar border radius <br/> from here like 5px , 10px , 15px , 20px <br/> Default Scrollbar Border Radius is <strong>5px</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
				</tbody>
			</table>
			
			
			<table class="form-table">
				<tbody>
					<h2><strong><?php _e( 'Scrollbar Basic Style Settings' ,'wp-scrollbar' ); ?></strong></h2>
					<tr valign="top">
						<th scope="row"><label for="scroll_bar_width"><?php _e( 'Scrollbar Width' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scroll_bar_width']); ?>" id="scroll_bar_width" name="nnf_scrollbar_default_options[scroll_bar_width]"/><p class="description"><?php _e( 'You can change scrollbar width <br/> from here like   5px , 10px , 15px , 20px <br/> Default scrollbar width is <strong>5px</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_zindex"><?php _e( 'Scrollbar Zindex' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_zindex']); ?>" id="scrollbar_zindex" name="nnf_scrollbar_default_options[scrollbar_zindex]"/><p class="description"><?php _e( 'You can change scrollbar zindex <br/> from here like 111 , 999 , auto <br/> Default Scrollbar zindex is <strong>auto</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_railalign"><?php _e( 'Show Scrollbar' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_railalign']); ?>" id="scrollbar_railalign" name="nnf_scrollbar_default_options[scrollbar_railalign]"/><p class="description"><?php _e( 'You can change Show scrollbar <br/> from here like left , right <br/> Default Show Scrollbar is <strong>right</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
				</tbody>
			</table>	

			<table class="form-table">
				<tbody>
					<h2><strong><?php _e( 'Scrollbar General Settings' ,'wp-scrollbar' ); ?></strong></h2>
					<tr valign="top">
						<th scope="row"><label for="scrollbar_speed"><?php _e( 'Scrollbar Speed' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_speed']); ?>" id="scrollbar_speed" name="nnf_scrollbar_default_options[scrollbar_speed]"/><p class="description"><?php _e( 'You can change scrollbar speed <br/> from here like 10 , 30 , 50 , 80 <br/> Default Scrollbar speed is <strong>60</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_mousestep_speed"><?php _e( 'Scrollbar Mouse Step Speed' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_mousestep_speed']); ?>" id="scrollbar_mousestep_speed" name="nnf_scrollbar_default_options[scrollbar_mousestep_speed]"/><p class="description"><?php _e( 'You can change scrollbar Mouse Step Speed <br/> from here like 10 , 30 , 50 , 80 <br/> Default scrollbar speed is <strong>40</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_touchbehavior"><?php _e( 'Scrollbar Touchbehavior' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_touchbehavior']); ?>" id="scrollbar_touchbehavior" name="nnf_scrollbar_default_options[scrollbar_touchbehavior]"/><p class="description"><?php _e( 'You can change scrollbar touchbehavior <br/> from here like true , false <br/>Default Scrollbar touchbehavior is <strong>false</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_autohide"><?php _e( 'Scrollbar Autohide Mode' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_autohide']); ?>" id="scrollbar_autohide" name="nnf_scrollbar_default_options[scrollbar_autohide]"/><p class="description"><?php _e( 'You can change scrollbar autohide mode <br/> from here like true , false <br/> Default Scrollbar autohide mode is <strong>true</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_hidecursordelay"><?php _e( ' Scrollbar HideCursorDelay' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_hidecursordelay']); ?>" id="scrollbar_hidecursordelay" name="nnf_scrollbar_default_options[scrollbar_hidecursordelay]"/><p class="description"><?php _e( 'You can change scrollbar hidecursordelay <br/> from here like 400 , 500 , 600 , 700 <br/> Default Scrollbar hidecursordelay is <strong>400</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_smoothscroll"><?php _e( ' Scrollbar SmoothScroll' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_smoothscroll']); ?>" id="scrollbar_smoothscroll" name="nnf_scrollbar_default_options[scrollbar_smoothscroll]"/><p class="description"><?php _e( 'You can change scrollbar smoothScroll <br/> from here like true , false  <br/> Default Scrollbar smoothscroll is <strong>true</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_enablemousewheel"><?php _e( ' Scrollbar EnableMouseWheel' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_enablemousewheel']); ?>" id="scrollbar_enablemousewheel" name="nnf_scrollbar_default_options[scrollbar_enablemousewheel]"/><p class="description"><?php _e( 'You can change scrollbar EnableMouseWheel <br/> from here like true , false  <br/> Default Scrollbar EnableMouseWheel is <strong>true</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_cursorfixedheight"><?php _e( ' Scrollbar CursorFixedHeight' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_cursorfixedheight']); ?>" id="scrollbar_cursorfixedheight" name="nnf_scrollbar_default_options[scrollbar_cursorfixedheight]"/><p class="description"><?php _e( 'You can change scrollbar CursorFixedHeight <br/> from here like true , false  <br/> Default Scrollbar CursorFixedHeight is <strong>false</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_cursorminheight"><?php _e( ' Scrollbar CursorMinHeight' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_cursorminheight']); ?>" id="scrollbar_cursorminheight" name="nnf_scrollbar_default_options[scrollbar_cursorminheight]"/><p class="description"><?php _e( 'You can change scrollbar CursorMinHeight <br/> from here like 30 , 40 , 50 , 60  <br/> Default Scrollbar CursorMinHeight is <strong>32</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="scrollbar_enablekeyboard"><?php _e( ' Scrollbar EnableKeyboard' ,'wp-scrollbar' ); ?></label></th>
						<td>
							<input type="text" value="<?php echo stripslashes($settings['scrollbar_enablekeyboard']); ?>" id="scrollbar_enablekeyboard" name="nnf_scrollbar_default_options[scrollbar_enablekeyboard]"/><p class="description"><?php _e( 'You can change scrollbar EnableKeyboard <br/> from here like true , false   <br/> Default Scrollbar EnableKeyboard is <strong>true</strong>' ,'wp-scrollbar' ); ?></p>
						</td>
					</tr>
				</tbody>
			</table>

			<p class="submit">
				<input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
			</p>

      </form> 
    </div>
	 
	 
	<?php 
	 }
/*===============================================
    Add validate options
=================================================*/
function nnf_scrollbar_validate_options( $input ) {
	global $nnf_scrollbar_default_options;

	$settings = get_option( 'nnf_scrollbar_default_options', $nnf_scrollbar_default_options );
	
	$input['scrollbar_color']=wp_filter_post_kses($input['scrollbar_color']);
	$input['scrollbar_bg']=wp_filter_post_kses($input['scrollbar_bg']);
	$input['scrollbar_minopactiy']=wp_filter_post_kses($input['scrollbar_minopactiy']);
	$input['scrollbar_maxopactiy']=wp_filter_post_kses($input['scrollbar_maxopactiy']);
	$input['scroll_bar_width']=wp_filter_post_kses($input['scroll_bar_width']);
	$input['scrollbar_border']=wp_filter_post_kses($input['scrollbar_border']);
	$input['scrollbar_border_style']=wp_filter_post_kses($input['scrollbar_border_style']);
	$input['scrollbar_border_color']=wp_filter_post_kses($input['scrollbar_border_color']);
	$input['scrollbar_border_radius']=wp_filter_post_kses($input['scrollbar_border_radius']);
	$input['scrollbar_zindex']=wp_filter_post_kses($input['scrollbar_zindex']);
	$input['scrollbar_speed']=wp_filter_post_kses($input['scrollbar_speed']);
	$input['scrollbar_mousestep_speed']=wp_filter_post_kses($input['scrollbar_mousestep_speed']);
	$input['scrollbar_touchbehavior']=wp_filter_post_kses($input['scrollbar_touchbehavior']);
	$input['scrollbar_autohide']=wp_filter_post_kses($input['scrollbar_autohide']);
	$input['scrollbar_railalign']=wp_filter_post_kses($input['scrollbar_railalign']);
	$input['scrollbar_hidecursordelay']=wp_filter_post_kses($input['scrollbar_hidecursordelay']);
	$input['scrollbar_smoothscroll']=wp_filter_post_kses($input['scrollbar_smoothscroll']);
	$input['scrollbar_enablemousewheel']=wp_filter_post_kses($input['scrollbar_enablemousewheel']);
	$input['scrollbar_cursorfixedheight']=wp_filter_post_kses($input['scrollbar_cursorfixedheight']);
	$input['scrollbar_cursorminheight']=wp_filter_post_kses($input['scrollbar_cursorminheight']);
	$input['scrollbar_enablekeyboard']=wp_filter_post_kses($input['scrollbar_enablekeyboard']);
	

 return $input;
}

?>