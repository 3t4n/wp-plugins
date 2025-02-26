<?php
global $userData;

$form_presets = $this->GetOverseer()->GetFormPresets();
?>
		
<p>Integrate your remote form with the Optiner to capture email leads through any form of your choosing;
this can be useful if you like your current setup but want to submit to multiple Email Lists.</p>
		
<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'remote_preset_id'; ?>
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
				<span class="howto">Choose the Form Preset to use for capturing remote submissions</span>
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
