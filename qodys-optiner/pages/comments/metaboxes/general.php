<?php
global $userData;

$form_presets = $this->GetOverseer()->GetFormPresets();
?>
		
<p>This capture method automatically fetches the emails of users who have commented on your website and opts 
them into your lists over time. The exact mechanics of this aren't important, however the more visitors you get 
to your site the quicker it will happen!</p>
		
<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'comment_preset_id'; ?>
			<th>
				<label for="<?php echo $nextItem; ?>">Form Preset</label>
			</th>
			<td>
				<select data-placeholder="Choose a Form Preset" name="<?php echo $nextItem; ?>" class="chzn-select">
					<option value=""></option> 
					
					<?php
					if( $form_presets )
					{
						foreach( $form_presets as $key => $value )
						{
							if( $this->get_option( $nextItem ) == $value->ID )
								$selected = 'selected="selected"';
							else
								$selected = ''; ?>
					<option <?php echo $selected; ?> value="<?php echo $value->ID; ?>"><?php echo $value->post_title; ?></option>
						<?php
						}
					} ?>
				</select>
				<span class="howto">Choose the Form Preset to use for capturing blog commentors</span>
			</td>
		</tr>
	</tbody>
</table>

<script>
jQuery( function()
{
	jQuery('.chzn-select').chosen();
} );
</script>
