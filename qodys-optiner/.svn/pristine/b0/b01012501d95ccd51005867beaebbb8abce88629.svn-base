<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->get_post_custom( $post->ID );
?>

<table class="form-table">
	<tr>
		<?php $nextItem = 'use_extra_image'; ?>
		<td>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').show(); ShowProductImage();" type="radio" name="field_<?php echo $nextItem; ?>" value="1" id="<?php echo $nextItem; ?>1" <?php if( $custom[ $nextItem ] == 1 ) echo 'checked="checked"'; ?>>
				Enable
			</label>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').hide(); HideProductImage();" type="radio" name="field_<?php echo $nextItem; ?>" value="-1" id="<?php echo $nextItem; ?>2" <?php if( !$custom[ $nextItem ] || $custom[ $nextItem ] == -1 ) echo 'checked="checked"'; ?>>
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
				<td>
					<label><strong>Product image</strong></label><br />
					
					<?php $this->Owner()->m_extra_image->ShowExtraThumbnailControl(); ?>
					<span class="howto">Select a custom image by clicking the "Set extra popup image" link in the image upload preview screen 
					that popups up by clicking the link above.</span>
				</td>
			</tr>	
			<tr>
				<?php $nextItem = 'product_image_position'; ?>
				<td>
					<label><strong>Image position</strong></label><br />
					
					<?php
					$fields = array();
					$fields[] = 'left';
					$fields[] = 'top';
					//$fields[] = 'bottom';
					$fields[] = 'right';
					
					foreach( $fields as $key => $value )
					{ ?>
					<label>
						<input onclick="ShiftProductImage( '<?php echo $value; ?>' );" type="radio" name="field_<?php echo $nextItem; ?>" value="<?php echo $value; ?>" id="<?php echo $nextItem; ?><?php echo $key; ?>" <?php if( $custom[ $nextItem ] == $value ) echo 'checked="checked"'; ?>>
						<?php echo ucwords( $value ); ?>
					</label>
					<?php
					} ?>
					
					<span class="howto">Set whether you want the custom image to show above, to the left or to the right of the optin area.</span>
				</td>
			</tr>
			<tr>
				<?php $nextItem = 'extra_image_top_padding'; ?>
				<td>
					<label><strong>Image top padding</strong></label><br />
					
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
			<tr>
				<td>
					<label><strong>Image dimensions</strong></label><br />
					
					<?php $nextItem = 'extra_image_width'; ?>
					Width: <input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:55px;"> px
					
					<!--<?php $nextItem = 'extra_image_height'; ?>
					<div style="margin-left:10px; display:inline;">
						Height: <input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:55px;"> px
					</div>-->
					
					<span class="howto">Set the width of the image.</span>
				</td>
			</tr>
		</tbody>
	</table>
</div>