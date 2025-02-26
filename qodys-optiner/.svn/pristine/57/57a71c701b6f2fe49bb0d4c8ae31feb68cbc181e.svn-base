<?php
global $userData;

$form_presets = $this->GetOverseer()->GetFormPresets();
?>
		
<p>This capture method lets you enter in as many emails as you'd like to have opted into your lists. This 
is basically the same thing as importing them through your email marketing provider, however it removes any 
quantity limitations and allows for mulitple lists at the same time.</p>

<p>You do NOT have to use double opt-in for this to work.</p>
		
<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'import_preset_id'; ?>
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
				<span class="howto">Choose the Form Preset to use for capturing imports</span>
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
