<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->Owner()->get_post_custom( $post->ID );
?>

<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'facebook_connect_image'; ?>
			<th>
				<label>Facebook Connect Image</label>
			</th>
			<td>
				<?php
				$fields = array();
				$fields[$this->Owner()->m_asset_url.'/images/fb-button.png'] = 'Thumb & glow';
				$fields[$this->Owner()->m_asset_url.'/images/fb-button-no-glow.png'] = 'Thumb no glow';
				$fields[$this->Owner()->m_asset_url.'/images/fb-button-no-hand.png'] = 'No thumb or glow';
				
				foreach( $fields as $key => $value )
				{ ?>
				<label>
					<input onclick="AlterFacebookConnectImage( this );" type="radio" name="field_<?php echo $nextItem; ?>" value="<?php echo $key; ?>" <?php if( $custom[ $nextItem ] == $key ) echo 'checked="checked"'; ?>>
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
			<?php $nextItem = 'connect_extra'; ?>
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