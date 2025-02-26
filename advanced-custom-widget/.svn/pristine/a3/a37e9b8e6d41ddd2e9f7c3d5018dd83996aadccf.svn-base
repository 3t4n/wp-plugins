<?php

/**
 * This file defines the markup for the custom widget select form.
 *
 * @link      http://longvietweb.com
 * @since      1.0.0
 *
 * @package    Advanced_Custom_Widget
 * @subpackage Advanced_Custom_Widget/admin
 */
?>
<div class="custom-widget-options">
	<input class="acw-widget-custom-options-checkbox" id="<?php echo $widget->get_field_id( 'show_options' ); ?>" type="checkbox" name="<?php echo $widget->get_field_name('show_options'); ?>" value="1" <?php checked( 1, $instance['show_options'] ); ?>/>
	<label class="acw-widget-custom-options-label" for="<?php echo $widget->get_field_id( 'show_options' ); ?>"><?php _e( '- Custom Widget -', 'advanced-custom-widget' ); ?></label><br />
				
	<div class="acw-widget-style">
		<p>
			<label class="acw-section-label" for="<?php echo $widget->get_field_id( 'color' ); ?>"><?php _e( 'Widget Text Color', 'advanced-custom-widget' ); ?></label><br>
		</p>
		<span class="acw-image-properties">
			<p class="first acw-options-dropdown">
				<label for="<?php echo $widget->get_field_id( 'color' ); ?>"><?php _e( 'Text Color:', 'advanced-custom-widget' ); ?></label><br />
				<input class="color-picker" id="<?php echo $widget->get_field_id( 'color' ); ?>" name="<?php echo $widget->get_field_name( 'color' ); ?>" type="text" value="<?php echo $instance['color']; ?>" data-default-color=""/>
			</p>
			<p class="acw-options-dropdown">
				<label for="<?php echo $widget->get_field_id( 'widget_text_position' ); ?>"><?php _e( 'Text Position:' ); ?></label><br />
				<select id="<?php echo $widget->get_field_id( 'widget_text_position' ); ?>" name="<?php echo $widget->get_field_name( 'widget_text_position' ); ?>"> <?php
					$position_options = array(
						__( 'Defaults', 'advanced-custom-widget' ) => '',
						__( 'Left', 'advanced-custom-widget' ) => 'left',
						__( 'Center', 'advanced-custom-widget' ) => 'center',
						__( 'Right', 'advanced-custom-widget' ) => 'right',
					);
					foreach ( $position_options as $key => $value ) {
						echo '<option value="' . $value . '" id="' . $value . '"', $instance['widget_text_position'] == $value ? ' selected="selected"' : '', '>', $key, '</option>';
					} ?>
				</select>
			</p>
		</span>
			<hr>
			<p>
				<label class="acw-section-label" for="<?php echo $widget->get_field_id( 'background_color' ); ?>"><?php _e( 'Widget Background', 'advanced-custom-widget' ); ?></label><br>
				<label for="<?php echo $widget->get_field_id( 'background_color' ); ?>"><?php _e( 'Background Color:', 'advanced-custom-widget' ); ?></label><br />
				<input class="color-picker" id="<?php echo $widget->get_field_id( 'background_color' ); ?>" name="<?php echo $widget->get_field_name( 'background_color' ); ?>" type="text" value="<?php echo $instance['background_color']; ?>" data-default-color=""/>
			</p>
					
			<p style="padding: 20px 0;">
				<label for="<?php echo $widget->get_field_id( 'background_image' ); ?>"><?php _e( 'Background Image:', 'advanced-custom-widget' ); ?></label>
				<input type="text" class="widefat custom-media-url" name="<?php echo $widget->get_field_name( 'background_image' ); ?>" id="<?php echo $widget->get_field_id('background_image'); ?>" value="<?php echo $instance['background_image']; ?>" placeholder="<?php _e( 'Enter URL or select image', 'advanced-custom-widget' ); ?>">
				<button type="button" class="button custom-media-button" id="<?php echo $widget->get_field_id('media_button'); ?>" name="<?php echo $widget->get_field_name( 'background_image' ); ?>"><?php _e( 'Select Image', 'advanced-custom-widget' ); ?></button>
			</p>
					
		<span class="acw-image-properties">
						
			<p class="first acw-options-dropdown">
				<label for="<?php echo $widget->get_field_id( 'background_repeat' ); ?>"><?php _e( 'Repeat:' ); ?></label><br />
				<select id="<?php echo $widget->get_field_id( 'background_repeat' ); ?>" name="<?php echo $widget->get_field_name( 'background_repeat' ); ?>"> <?php
					$repeat_options = array(
						__( 'Repeat', 'advanced-custom-widget' ) => 'repeat',
						__( 'Horizontal', 'advanced-custom-widget' ) => 'repeat-x',
						__( 'Vertical', 'advanced-custom-widget' ) => 'repeat-y',
						__( 'No Repeat', 'advanced-custom-widget' ) => 'no-repeat',
					);
					foreach ( $repeat_options as $key => $value ) {
						echo '<option value="' . $value . '" id="' . $value . '"', $instance['background_repeat'] == $value ? ' selected="selected"' : '', '>', $key, '</option>';
				} ?>
				</select>
			</p>
						
			<p class="acw-options-dropdown">
				<label for="<?php echo $widget->get_field_id( 'background_attachment' ); ?>"><?php _e( 'Attachment:' ); ?></label><br />
				<select id="<?php echo $widget->get_field_id( 'background_attachment' ); ?>" name="<?php echo $widget->get_field_name( 'background_attachment' ); ?>"> <?php
					$attachment_options = array(
						__( 'Scroll', 'advanced-custom-widget' ) => 'scroll',
						__( 'Fixed', 'advanced-custom-widget' ) => 'fixed',
					);
					foreach ( $attachment_options as $key => $value ) {
						echo '<option value="' . $value . '" id="' . $value . '"', $instance['background_attachment'] == $value ? ' selected="selected"' : '', '>', $key, '</option>';
				} ?>
				</select>
			</p>
						
			<p class="first acw-options-dropdown">
				<label for="<?php echo $widget->get_field_id( 'background_position' ); ?>"><?php _e( 'Position:' ); ?></label><br />
				<select id="<?php echo $widget->get_field_id( 'background_position' ); ?>" name="<?php echo $widget->get_field_name( 'background_position' ); ?>"> <?php
					$position_options = array(
						__( 'Left Top', 'advanced-custom-widget' ) => 'left top',
						__( 'Left Center', 'advanced-custom-widget' ) => 'left center',
						__( 'Left Bottom', 'advanced-custom-widget' ) => 'left bottom',
						__( 'Right Top', 'advanced-custom-widget' ) => 'right top',
						__( 'Right Center', 'advanced-custom-widget' ) => 'right center',
						__( 'Right Bottom', 'advanced-custom-widget' ) => 'right bottom',
						__( 'Center Top', 'advanced-custom-widget' ) => 'center top',
						__( 'Center', 'advanced-custom-widget' ) => 'center center',
						__( 'Center Bottom', 'advanced-custom-widget' ) => 'center bottom',
					);
					foreach ( $position_options as $key => $value ) {
						echo '<option value="' . $value . '" id="' . $value . '"', $instance['background_position'] == $value ? ' selected="selected"' : '', '>', $key, '</option>';
					} ?>
				</select>
			</p>
						
			<p class="acw-options-dropdown">
				<label for="<?php echo $widget->get_field_id( 'background_size' ); ?>"><?php _e( 'Scale:' ); ?></label><br />
				<select id="<?php echo $widget->get_field_id( 'background_size' ); ?>" name="<?php echo $widget->get_field_name( 'background_size' ); ?>"> <?php
					$size_options = array(
						__( 'None', 'advanced-custom-widget' ) => 'none',
						__( 'Cover', 'advanced-custom-widget' ) => 'cover',
						__( 'Contain', 'advanced-custom-widget' ) => 'contain',
					);
					foreach ( $size_options as $key => $value ) {
						echo '<option value="' . $value . '" id="' . $value . '"', $instance['background_size'] == $value ? ' selected="selected"' : '', '>', $key, '</option>';
				} ?>
				</select>
			</p>
						
		</span>
					
		<hr>
					
		<label class="acw-section-label" style="margin-top:7px;"><?php _e('Widget Margin', 'advanced-custom-widget'); ?></label>
					
		<table class="acw-widget-table">
			<tr>
				<td class="row-content">
					<label class="row-label" for="<?php echo $widget->get_field_id( 'margin_top' ); ?>"><?php _e( 'Top:', 'advanced-custom-widget' ); ?></label>
					<input type="number" step="1" min="0" id="<?php echo $widget->get_field_id( 'margin_top' ); ?>" name="<?php echo $widget->get_field_name( 'margin_top' ); ?>" value="<?php echo $instance['margin_top']; ?>" style="width:50px;" />
					<label for="<?php echo $widget->get_field_id( 'margin_top' ); ?>">px</label>
				</td>
				<td class="row-content">
					<label class="row-label" for="<?php echo $widget->get_field_id( 'margin_bottom' ); ?>"><?php _e( 'BTom:', 'advanced-custom-widget' ); ?></label>
					<input type="number" step="1" min="0" id="<?php echo $widget->get_field_id( 'margin_bottom' ); ?>" name="<?php echo $widget->get_field_name( 'margin_bottom' ); ?>" value="<?php echo $instance['margin_bottom']; ?>" style="width:50px;" />
					<label for="<?php echo $widget->get_field_id( 'margin_bottom' ); ?>">px</label>
				</td>
			</tr>
			<tr>
				<td class="row-content">
					<label class="row-label" for="<?php echo $widget->get_field_id( 'margin_right' ); ?>"><?php _e( 'Right:', 'advanced-custom-widget' ); ?></label>
					<input type="number" step="1" min="0" id="<?php echo $widget->get_field_id( 'margin_right' ); ?>" name="<?php echo $widget->get_field_name( 'margin_right' ); ?>" value="<?php echo $instance['margin_right']; ?>" style="width:50px;" />
					<label for="<?php echo $widget->get_field_id( 'margin_right' ); ?>">px</label>
				</td>
				<td class="row-content">
					<label class="row-label" for="<?php echo $widget->get_field_id( 'margin_left' ); ?>"><?php _e( 'Left:', 'advanced-custom-widget' ); ?></label>
					<input type="number" step="1" min="0" id="<?php echo $widget->get_field_id( 'margin_left' ); ?>" name="<?php echo $widget->get_field_name( 'margin_left' ); ?>" value="<?php echo $instance['margin_left']; ?>" style="width:50px;" />
					<label for="<?php echo $widget->get_field_id( 'margin_left' ); ?>">px</label>
				</td>
			</tr>
		</table>
					
		<hr>
		<label class="acw-section-label" style="margin-top:7px;"><?php _e( 'Widget Padding', 'advanced-custom-widget' ); ?></label>
					
		<table class="acw-widget-table">
			<tr>
				<td class="row-content">
				<label class="row-label" for="<?php echo $widget->get_field_id( 'padding_top' ); ?>"><?php _e( 'Top:', 'advanced-custom-widget' ); ?></label>
					<input type="number" step="1" min="0" id="<?php echo $widget->get_field_id( 'padding_top' ); ?>" name="<?php echo $widget->get_field_name( 'padding_top' ); ?>" value="<?php echo $instance['padding_top']; ?>" style="width:50px;" />
					<label for="<?php echo $widget->get_field_id( 'padding_top' ); ?>">px</label>
				</td>
				<td class="row-content">
					<label class="row-label" for="<?php echo $widget->get_field_id( 'padding_bottom' ); ?>"><?php _e( 'BTom:', 'advanced-custom-widget' ); ?></label>
					<input type="number" step="1" min="0" id="<?php echo $widget->get_field_id( 'padding_bottom' ); ?>" name="<?php echo $widget->get_field_name( 'padding_bottom' ); ?>" value="<?php echo $instance['padding_bottom']; ?>" style="width:50px;" />
					<label for="<?php echo $widget->get_field_id( 'padding_bottom' ); ?>">px</label>
				</td>
			</tr>
			<tr>
				<td class="row-content">
					<label class="row-label" for="<?php echo $widget->get_field_id( 'padding_right' ); ?>"><?php _e( 'Right:', 'advanced-custom-widget' ); ?></label>
					<input type="number" step="1" min="0" id="<?php echo $widget->get_field_id( 'padding_right' ); ?>" name="<?php echo $widget->get_field_name( 'padding_right' ); ?>" value="<?php echo $instance['padding_right']; ?>" style="width:50px;" />
					<label for="<?php echo $widget->get_field_id( 'padding_right' ); ?>">px</label>
				</td>
				<td class="row-content">
					<label class="row-label" for="<?php echo $widget->get_field_id( 'padding_left' ); ?>"><?php _e( 'Left:', 'advanced-custom-widget' ); ?></label>
					<input type="number" step="1" min="0" id="<?php echo $widget->get_field_id( 'padding_left' ); ?>" name="<?php echo $widget->get_field_name( 'padding_left' ); ?>" value="<?php echo $instance['padding_left']; ?>" style="width:50px;" />
					<label for="<?php echo $widget->get_field_id( 'padding_left' ); ?>">px</label>
				</td>
			</tr>
		</table>
					
		<hr>
					
			<p>
				<label class="acw-section-label" for="<?php echo $widget->get_field_id( 'custom_classes' ); ?>"><?php _e( 'Add Your Custom Classes.', 'advanced-custom-widget' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $widget->get_field_id( 'custom_classes' ); ?>" name="<?php echo $widget->get_field_name( 'custom_classes' ); ?>" value="<?php echo $instance['custom_classes']; ?>" placeholder="<?php _e( 'example classes-1 classes-2', 'advanced-custom-widget' ); ?>">
				<span class="description" style="padding-left:2px;"><em><?php _e( 'Add your classes. Customize as you like.', 'advanced-custom-widget' ) ?></em></span>
			</p>
									
	</div>
</div>	