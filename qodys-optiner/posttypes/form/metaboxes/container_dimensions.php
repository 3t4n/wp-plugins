<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->Owner()->get_post_custom( $post->ID );
?>

<table class="form-table">
	<tbody>
		<tr>
			<td>
				<?php $nextItem = 'frame_width'; ?>
				Width: <input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:55px;"> px
				
				<?php $nextItem = 'frame_height'; ?>
				<div style="margin-left:10px; display:inline;">
					Height: <input type="text" name="field_<?php echo $nextItem; ?>" id="<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>" class="widefat inpt_a green_bg" style="width:55px;"> px
				</div>
				
				<span class="howto">Set the width and height of the container. If the optin content gets clipped, try increasing these values.</span>
			</td>
		</tr>
	</tbody>
</table>