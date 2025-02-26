<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->Owner()->get_post_custom( $post->ID );
?>

<table class="form-table">
	<tr>
		<?php $parentItem = $nextItem = 'button_style'; ?>
		<th>
			<label>Submit button style</label>
		</th>
		<td>
			<label>
				<input onclick="jQuery('#<?php echo $parentItem; ?>1').hide(); jQuery('#<?php echo $parentItem; ?>2').show(); HideCustomSubmitButton();" type="radio" name="field_<?php echo $nextItem; ?>" value="odin" <?php if( $custom[ $nextItem ] == 'odin' || !$custom[ $nextItem ] ) echo 'checked="checked"'; ?>>
				Odin's button generator
			</label>
			<label>
				<input onclick="jQuery('#<?php echo $parentItem; ?>1').show(); jQuery('#<?php echo $parentItem; ?>2').hide(); ShowCustomSubmitButton();" type="radio" name="field_<?php echo $nextItem; ?>" value="custom" <?php if( $custom[ $nextItem ] == 'custom' ) echo 'checked="checked"'; ?>>
				Custom image upload
			</label>
			
			<span class="howto">The text at the top of the optin preview explaining/instructing users on how and why to optin</span>
		</td>
	</tr>
</table>

<div id="<?php echo $parentItem; ?>1" style="display: <?php if( $custom[ $nextItem ] == 'custom' ) echo 'block'; else echo 'none'; ?>; ">
	<table class="form-table" style="margin-top:0px;">
		<tbody>
			<tr>
				<th>
					<label class="sub_setting_label"> - Button image</label>
				</th>
				<td>
					<?php $this->Owner()->m_button_image->ShowExtraThumbnailControl(); ?>
					<span class="howto">Select a custom image by clicking the "Set custom button image" link in the image upload preview screen 
					that popups up by clicking the link above.</span>
				</td>
			</tr>	
		</tbody>
	</table>
</div>

<div id="<?php echo $parentItem; ?>2" style="display: <?php if( $custom[ $nextItem ] == 'odin' || !$custom[ $nextItem ] ) echo 'block'; else echo 'none'; ?>; ">
	<table class="form-table" style="margin-top:0px;">
		<tbody>
			<tr>
				<?php $nextItem = 'submit_button_text'; ?>
				<th>
					<label for="<?php echo $nextItem; ?>" class="sub_setting_label"> - Button text</label>
				</th>
				<td>				
					<input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg">
					<span class="howto">Enter in some text to have on the submit button.</span>
				</td>
			</tr>
			<tr>
				<th>
					<label class="sub_setting_label"> - Background and text colors</label>
				</th>
				<td>
						
					<?php $nextItem = 'submit_button_background_color'; ?>
					Background color: <input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:65px;">
					
					<?php $nextItem = 'submit_button_text_color'; ?>
					Text color: <input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:65px;">
					
					<span class="howto">Set the color of the button background and it's text.</span>
				</td>
			</tr>
			<tr>
				<th>
					<label class="sub_setting_label"> - Text and button size</label>
				</th>
				<td>
					<?php $nextItem = 'submit_button_size'; ?>
					Button size: <select id="<?php echo $nextItem; ?>" name="field_<?php echo $nextItem; ?>">
						<?php
						for( $i = 1; $i < 60; $i++ )
						{
							if( $custom[ $nextItem ] == $i )
								$selected = 'selected="selected"';
							else
								$selected = ''; ?>
						<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?>px</option>
						<?php
						} ?>
					</select>
					
					<?php $nextItem = 'submit_button_text_size'; ?>
					Text size: <select id="<?php echo $nextItem; ?>" name="field_<?php echo $nextItem; ?>">
						<?php
						for( $i = 1; $i < 60; $i++ )
						{
							if( $custom[ $nextItem ] == $i )
								$selected = 'selected="selected"';
							else
								$selected = ''; ?>
						<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?>px</option>
						<?php
						} ?>
					</select>
					
					<span class="howto">Set the size of the button's text and the button itself.</span>
				</td>
			</tr>	
		</tbody>
	</table>
</div>



