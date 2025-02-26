<?php
global $post, $custom, $qodys_optiner, $frame_type;

$optin_id = '#optiner-optin-'.$frame_type.'-'.$post->ID;
?>

<script>
jQuery(document).ready( function() {
	
	jQuery('#fb<?php echo $frame_type; ?>_header_text_size').change( function(e) {
		jQuery('<?php echo $optin_id; ?>').contents().find('.header_text').css( 'font-size', jQuery(this).val() + 'px' );		
	} );
	jQuery('#fb<?php echo $frame_type; ?>_secondary_text_size').change( function(e) {
		jQuery('<?php echo $optin_id; ?>').contents().find('.secondary_text').css( 'font-size', jQuery(this).val() + 'px' );		
	} );
	
	jQuery('#fb<?php echo $frame_type; ?>_extra_image_top_padding').change( function(e) {
		jQuery('<?php echo $optin_id; ?>').contents().find('.product_image img').css( 'padding-top', jQuery(this).val() + 'px' );		
	} );
	
	jQuery('#fb<?php echo $frame_type; ?>_outer_border_width').change( function(e) {
		jQuery('<?php echo $optin_id; ?>').contents().find('.optiner-popup').css( 'border-width', jQuery(this).val() + 'px' );		
	} );
	jQuery('#fb<?php echo $frame_type; ?>_outer_border_style').change( function(e) {
		jQuery('<?php echo $optin_id; ?>').contents().find('.optiner-popup').css( 'border-style', jQuery(this).val() );		
	} );

	jQuery('#fb<?php echo $frame_type; ?>_header_text').bind( 'blur focus keyup keydown', function(e) {
		jQuery('<?php echo $optin_id; ?>').contents().find('.header_text').html( jQuery(this).val() );		
	} );
	jQuery('#fb<?php echo $frame_type; ?>_secondary_text').bind( 'blur focus keyup keydown', function(e) {
		jQuery('<?php echo $optin_id; ?>').contents().find('.secondary_text').html( jQuery(this).val() );		
	} );
	jQuery('#fb<?php echo $frame_type; ?>_connect_extra').bind( 'blur focus keyup keydown', function(e) {
		jQuery('<?php echo $optin_id; ?>').contents().find('.connect_extra').html( jQuery(this).val() );		
	} );
	
	jQuery('#fb<?php echo $frame_type; ?>_frame_width').bind( 'blur focus', function(e) {
		AlterFrameWidth( '<?php echo $frame_type; ?>', parseInt(jQuery(this).val()) );
	} );
	jQuery('#fb<?php echo $frame_type; ?>_frame_height').bind( 'blur focus', function(e) {
		AlterFrameHeight( '<?php echo $frame_type; ?>', parseInt(jQuery(this).val()) );
	} );

	AddDefaultColorPicker( '#fb<?php echo $frame_type; ?>_header_text_color', '.header_text', 'color', '<?php echo $frame_type; ?>' );
	AddDefaultColorPicker( '#fb<?php echo $frame_type; ?>_secondary_text_color', '.secondary_text', 'color', '<?php echo $frame_type; ?>' );
	
	AddDefaultColorPicker( '#fb<?php echo $frame_type; ?>_background_color_from', '.optiner-popup', 'background', '<?php echo $frame_type; ?>' );
	AddDefaultColorPicker( '#fb<?php echo $frame_type; ?>_background_color_to', '.optiner-popup', 'background', '<?php echo $frame_type; ?>' );
	
	AddDefaultColorPicker( '#fb<?php echo $frame_type; ?>_outer_border_color', '.optiner-popup', 'border-color', '<?php echo $frame_type; ?>' );
		
} );
</script>

<table class="form-table">
	<tbody>
		<tr>
			<th>
				<label>Container Dimensions</label>
			</th>
			<td>
				<?php $nextItem = 'fb'.$frame_type.'_frame_width'; ?>
				Width: <input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:75px;"> px
				
				<?php $nextItem = 'fb'.$frame_type.'_frame_height'; ?>
				<div style="margin-left:10px; display:inline;">
					Height: <input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:75px;"> px
				</div>
				
				<span class="howto">Set the width and height of the container. If the optin content gets clipped, try increasing these values.</span>
			</td>
		</tr>
	</tbody>
</table>

<table class="form-table">
	<tr>
		<?php $nextItem = 'fb'.$frame_type.'_use_header_text'; ?>
		<th>
			<label for="<?php echo $nextItem; ?>1">Header Text</label>
		</th>
		<td>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').show(); jQuery('<?php echo $optin_id; ?>').contents().find('.header_text').show();" type="radio" name="field_<?php echo $nextItem; ?>" value="1" id="<?php echo $nextItem; ?>1" <?php if( $custom[ $nextItem ] == 1 ) echo 'checked="checked"'; ?>>
				Enable
			</label>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').hide(); jQuery('<?php echo $optin_id; ?>').contents().find('.header_text').hide();" type="radio" name="field_<?php echo $nextItem; ?>" value="-1" id="<?php echo $nextItem; ?>2" <?php if( !$custom[ $nextItem ] || $custom[ $nextItem ] == -1 ) echo 'checked="checked"'; ?>>
				Disable
			</label>
			
			<span class="howto">The text at the top of the optin preview explaining/instructing users on how and why to optin</span>
		</td>
	</tr>
</table>
<div id="<?php echo $nextItem; ?>" style="display: <?php if( $custom[ $nextItem ] == 1 ) echo 'block'; else echo 'none'; ?>; ">
	<table class="form-table" style="margin-top:0px;">
		<tbody>
			<tr>
				<?php $nextItem = 'fb'.$frame_type.'_header_text'; ?>
				<th>
					<label class="sub_setting_label" for="<?php echo $nextItem; ?>">- Header text</label>
				</th>
				<td>
					<input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $this->CleanForInput( $custom[ $nextItem ] ); ?>" class="widefat inpt_a green_bg">
					<span class="howto">Enter in some text telling users why they should connect/register (html IS allowed).</span>
				</td>
			</tr>
			<tr>
				<?php $nextItem = 'fb'.$frame_type.'_header_text_size'; ?>
				<th>
					<label class="sub_setting_label" for="<?php echo $nextItem; ?>">- Size & color</label>
				</th>
				<td>							
					Size: <select id="<?php echo $nextItem; ?>" name="field_<?php echo $nextItem; ?>">
						<?php
						for( $i = 60; $i > 0; $i-- )
						{
							if( $custom[ $nextItem ] == $i )
								$selected = 'selected="selected"';
							else
								$selected = ''; ?>
						<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?>px</option>
						<?php
						} ?>
					</select>
					
					<?php $nextItem = 'fb'.$frame_type.'_header_text_color'; ?>
					Color: #<input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" rel="something" class="widefat inpt_a green_bg" style="width:75px; margin-right:10px">
					
					<span class="howto">Set the font size and color of the instruction text.</span>
				</td>
			</tr>	
		</tbody>
	</table>
</div>

<table class="form-table">
	<tr>
		<?php $nextItem = 'fb'.$frame_type.'_use_secondary_text'; ?>
		<th>
			<label for="<?php echo $nextItem; ?>1">Secondary Text</label>
		</th>
		<td>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').show(); jQuery('<?php echo $optin_id; ?>').contents().find('.secondary_text').show();" type="radio" name="field_<?php echo $nextItem; ?>" value="1" id="<?php echo $nextItem; ?>1" <?php if( $custom[ $nextItem ] == 1 ) echo 'checked="checked"'; ?>>
				Enable
			</label>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').hide(); jQuery('<?php echo $optin_id; ?>').contents().find('.secondary_text').hide();" type="radio" name="field_<?php echo $nextItem; ?>" value="-1" id="<?php echo $nextItem; ?>2" <?php if( !$custom[ $nextItem ] || $custom[ $nextItem ] == -1 ) echo 'checked="checked"'; ?>>
				Disable
			</label>
			
			<span class="howto">The secondary text right above the optin select buttons</span>
		</td>
	</tr>
</table>
<div id="<?php echo $nextItem; ?>" style="display: <?php if( $custom[ $nextItem ] == 1 ) echo 'block'; else echo 'none'; ?>; ">
	<table class="form-table" style="margin-top:0px;">
		<tbody>
			<tr>
				<?php $nextItem = 'fb'.$frame_type.'_secondary_text'; ?>
				<th>
					<label class="sub_setting_label" for="<?php echo $nextItem; ?>">- Secondary text</label>
				</th>
				<td>
					<input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $this->CleanForInput( $custom[ $nextItem ] ); ?>" class="widefat inpt_a green_bg">
					<span class="howto">Enter in some text telling users to select an optin method (html IS allowed).</span>
				</td>
			</tr>
			<tr>
				<?php $nextItem = 'fb'.$frame_type.'_secondary_text_size'; ?>
				<th>
					<label class="sub_setting_label" for="<?php echo $nextItem; ?>">- Size & color</label>
				</th>
				<td>							
					Size: <select id="<?php echo $nextItem; ?>" name="field_<?php echo $nextItem; ?>">
						<?php
						for( $i = 60; $i > 0; $i-- )
						{
							if( $custom[ $nextItem ] == $i )
								$selected = 'selected="selected"';
							else
								$selected = ''; ?>
						<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?>px</option>
						<?php
						} ?>
					</select>
					
					<?php $nextItem = 'fb'.$frame_type.'_secondary_text_color'; ?>
					Color: #<input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" rel="something" class="widefat inpt_a green_bg" style="width:75px; margin-right:10px">
					
					<span class="howto">Set the font size and color of the secondary text.</span>
				</td>
			</tr>
		</tbody>
	</table>
</div>


<table class="form-table">
	<tr>
		<?php $nextItem = 'fb'.$frame_type.'_use_extra_image'; ?>
		<th>
			<label for="<?php echo $nextItem; ?>1">Custom Product Image</label>
		</th>
		<td>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').show(); ShowProductImage( '<?php echo $frame_type; ?>' );" type="radio" name="field_<?php echo $nextItem; ?>" value="1" id="<?php echo $nextItem; ?>1" <?php if( $custom[ $nextItem ] == 1 ) echo 'checked="checked"'; ?>>
				Enable
			</label>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').hide(); HideProductImage( '<?php echo $frame_type; ?>' );" type="radio" name="field_<?php echo $nextItem; ?>" value="-1" id="<?php echo $nextItem; ?>2" <?php if( !$custom[ $nextItem ] || $custom[ $nextItem ] == -1 ) echo 'checked="checked"'; ?>>
				Disable
			</label>
			
			<span class="howto">An image which should represent your product / business shown to the left of the optin options</span>
		</td>
	</tr>
</table>
<div id="<?php echo $nextItem; ?>" style="display: <?php if( $custom[ $nextItem ] == 1 ) echo 'block'; else echo 'none'; ?>; ">
	<table class="form-table" style="margin-top:0px;">
		<tbody>
			<tr>
				<th>
					<label class="sub_setting_label">- Product image</label>
				</th>
				<td>
					<?php $this->m_extra_image->ShowExtraThumbnailControl(); ?>
					<span class="howto">Select a custom image by clicking the "Set extra popup image" link in the image upload preview screen 
					that popups up by clicking the link above.</span>
				</td>
			</tr>	
			<tr>
				<?php $nextItem = 'fb'.$frame_type.'_product_image_position'; ?>
				<th>
					<label class="sub_setting_label">- Image position</label>
				</th>
				<td>
					<?php
					$fields = array();
					$fields[] = 'left';
					$fields[] = 'top';
					//$fields[] = 'bottom';
					$fields[] = 'right';
					
					foreach( $fields as $key => $value )
					{ ?>
					<label>
						<input onclick="ShiftProductImage( '<?php echo $frame_type; ?>', '<?php echo $value; ?>' );" type="radio" name="field_<?php echo $nextItem; ?>" value="<?php echo $value; ?>" id="<?php echo $nextItem; ?><?php echo $key; ?>" <?php if( $custom[ $nextItem ] == $value ) echo 'checked="checked"'; ?>>
						<?php echo ucwords( $value ); ?>
					</label>
					<?php
					} ?>
					
					<span class="howto">Set whether you want the custom image to show above, to the left or to the right of the optin area.</span>
				</td>
			</tr>
			<tr>
				<?php $nextItem = 'fb'.$frame_type.'_extra_image_top_padding'; ?>
				<th>
					<label class="sub_setting_label">- Image top padding</label>
				</th>
				<td>
					<select id="<?php echo $nextItem; ?>" name="field_<?php echo $nextItem; ?>">
						<?php
						for( $i = 120; $i >= 0; $i-- )
						{
							if( $custom[ $nextItem ] == $i )
								$selected = 'selected="selected"';
							else
								$selected = ''; ?>
						<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?>px</option>
						<?php
						} ?>
					</select> px
					<span class="howto">Set how much space (in pixels) you want to put above your product image.</span>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<table class="form-table">
	<tr>
		<?php $nextItem = 'fb'.$frame_type.'_use_background'; ?>
		<th>
			<label for="<?php echo $nextItem; ?>1">Background Fill</label>
		</th>
		<td>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').show(); ShowGradients('<?php echo $frame_type; ?>', null, null);" type="radio" name="field_<?php echo $nextItem; ?>" value="1" id="<?php echo $nextItem; ?>1" <?php if( $custom[ $nextItem ] == 1 ) echo 'checked="checked"'; ?>>
				Enable
			</label>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').hide(); HideGradients('<?php echo $frame_type; ?>');" type="radio" name="field_<?php echo $nextItem; ?>" value="-1" id="<?php echo $nextItem; ?>2" <?php if( !$custom[ $nextItem ] || $custom[ $nextItem ] == -1 ) echo 'checked="checked"'; ?>>
				Disable
			</label>
			
			<span class="howto">The background surrounding the whole optin area</span>
		</td>
	</tr>
</table>
<div id="<?php echo $nextItem; ?>" style="display: <?php if( $custom[ $nextItem ] == 1 ) echo 'block'; else echo 'none'; ?>; ">
	<table class="form-table" style="margin-top:0px;">
		<tbody>
			<tr>						
				<th>
					<label class="sub_setting_label">- Backgound colors</label>
				</th>
				<td>
					<?php $nextItem = 'fb'.$frame_type.'_background_color_from'; ?>
					Background from: #<input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:75px; margin-right:10px">
					
					<?php $nextItem = 'fb'.$frame_type.'_background_color_to'; ?>
					Background to: #<input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:75px;">
					
					<span class="howto">Choose the color gradients of the background.</span>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<table class="form-table">
	<tr>
		<?php $nextItem = 'fb'.$frame_type.'_use_outer_border'; ?>
		<th>
			<label for="<?php echo $nextItem; ?>1">Outer Border</label>
		</th>
		<td>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').show(); ShowOuterBorder('<?php echo $frame_type; ?>');" type="radio" name="field_<?php echo $nextItem; ?>" value="1" id="<?php echo $nextItem; ?>1" <?php if( $custom[ $nextItem ] == 1 ) echo 'checked="checked"'; ?>>
				Enable
			</label>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').hide(); HideOuterBorder('<?php echo $frame_type; ?>');" type="radio" name="field_<?php echo $nextItem; ?>" value="-1" id="<?php echo $nextItem; ?>2" <?php if( !$custom[ $nextItem ] || $custom[ $nextItem ] == -1 ) echo 'checked="checked"'; ?>>
				Disable
			</label>
			
			<span class="howto">The background surrounding the whole optin area</span>
		</td>
	</tr>
</table>
<div id="<?php echo $nextItem; ?>" style="display: <?php if( $custom[ $nextItem ] == 1 ) echo 'block'; else echo 'none'; ?>; ">
	<table class="form-table" style="margin-top:0px;">
		<tbody>
			<tr>
				<?php $nextItem = 'fb'.$frame_type.'_outer_border_color'; ?>
				<th>
					<label class="sub_setting_label">- Border color</label>
				</th>
				<td>
					Background to: #<input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:75px;">
					
					<span class="howto">Choose the color of the border.</span>
				</td>
			</tr>
			<tr>
				<th>
					<label class="sub_setting_label">- Width & style</label>
				</th>
				<td>
					<?php $nextItem = 'fb'.$frame_type.'_outer_border_width'; ?>
					Width: <select id="<?php echo $nextItem; ?>" name="field_<?php echo $nextItem; ?>">
						<?php
						for( $i = 1; $i <= 20; $i++ )
						{
							if( $custom[ $nextItem ] == $i )
								$selected = 'selected="selected"';
							else
								$selected = ''; ?>
						<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?>px</option>
						<?php
						} ?>
					</select>
					
					<?php $nextItem = 'fb'.$frame_type.'_outer_border_style'; ?>
					Style: <select id="<?php echo $nextItem; ?>" name="field_<?php echo $nextItem; ?>">
						<?php
						$fields = $this->GetArrayOfBorderStyles();
						
						foreach( $fields as $key => $value )
						{
							if( $custom[ $nextItem ] == $value )
								$selected = 'selected="selected"';
							else
								$selected = ''; ?>
						<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
						<?php
						} ?>
					</select>
					
					<span class="howto">Set the width and style of the outer border.</span>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'fb'.$frame_type.'_facebook_connect_image'; ?>
			<th>
				<label>Facebook Connect Image</label>
			</th>
			<td>
				<?php
				$fields = array();
				$fields['fb-button.png'] = 'Thumb & glow';
				$fields['fb-button-no-glow.png'] = 'Thumb no glow';
				$fields['fb-button-no-hand.png'] = 'No thumb or glow';
				
				foreach( $fields as $key => $value )
				{ ?>
				<label>
					<input onclick="AlterFacebookConnectImage( this, '<?php echo $frame_type; ?>');" type="radio" name="field_<?php echo $nextItem; ?>" value="<?php echo $key; ?>" <?php if( $custom[ $nextItem ] == $key ) echo 'checked="checked"'; ?>>
					<?php echo $value; ?>
				</label>
				<?php
				} ?>
				<span class="howto">Select the Facebook connect button image that has the right look n' feel for you.</span>
			</td>
		</tr>
	</tbody>
</table>

<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'fb'.$frame_type.'_connect_extra'; ?>
			<th>
				<label>"Connect" Tab Extra</label>
			</th>
			<td>
				<textarea name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" class="widefat inpt_a green_bg"><?php echo $custom[ $nextItem ]; ?></textarea>
				<span class="howto">Any text/html you specify here will show up under the Facebook connect button in the "Connect" tab below.</span>
			</td>
		</tr>
	</tbody>
</table>