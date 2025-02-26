<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->Owner()->get_post_custom( $post->ID );
?>

<table class="form-table">
	<tr>
		<?php $nextItem = 'use_outer_border'; ?>
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
				<?php $nextItem = 'outer_border_color'; ?>
				<td>
					<label><strong>Border color</strong></label><br />
					
					<input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:75px;">
					
					<span class="howto">Choose the color of the border.</span>
				</td>
			</tr>
			<tr>
				<td>
					<label><strong>Width & style</strong></label><br />
					
					<?php $nextItem = 'outer_border_width'; ?>
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
					
					<?php $nextItem = 'outer_border_style'; ?>
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