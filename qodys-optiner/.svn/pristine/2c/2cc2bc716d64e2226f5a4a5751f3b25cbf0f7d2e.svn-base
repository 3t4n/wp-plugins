<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->Owner()->get_post_custom( $post->ID );
?>

<table class="form-table">
	<tr>
		<?php $nextItem = 'use_secondary_text'; ?>
		<td>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').show(); jQuery('#optiner-optin').contents().find('.secondary_text').show();" type="radio" name="field_<?php echo $nextItem; ?>" value="1" id="<?php echo $nextItem; ?>1" <?php if( $custom[ $nextItem ] == 1 ) echo 'checked="checked"'; ?>>
				Enable
			</label>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').hide(); jQuery('#optiner-optin').contents().find('.secondary_text').hide();" type="radio" name="field_<?php echo $nextItem; ?>" value="-1" id="<?php echo $nextItem; ?>2" <?php if( !$custom[ $nextItem ] || $custom[ $nextItem ] == -1 ) echo 'checked="checked"'; ?>>
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
				<?php $nextItem = 'secondary_text'; ?>
				<td>
					<label for="<?php echo $nextItem; ?>"><strong>Secondary text</strong></label><br />
					
					<input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $this->CleanForInput( $custom[ $nextItem ] ); ?>" class="widefat inpt_a green_bg">
					<span class="howto">Enter in some text telling users to select an optin method (html IS allowed).</span>
				</td>
			</tr>
			<tr>
				<td>
					<label><strong>Text color and size</strong></label><br />
					
					<?php $nextItem = 'secondary_text_color'; ?>
					Color: <input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" rel="something" class="widefat inpt_a green_bg" style="width:65px;">
					
					<?php $nextItem = 'secondary_text_size'; ?>
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
					
					<span class="howto">Set the font size and color of the secondary text.</span>
				</td>
			</tr>
		</tbody>
	</table>
</div>