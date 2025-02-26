<?php
global $userData;

$form_presets = $this->GetOverseer()->GetFormPresets();
?>
		
<p>This capture method cycles through all the users who have a registered account on your site and opts 
them into your lists.  This can be quite useful if you have a membership site full of users, but don't 
have them on a reliable email list - or if you want to make a special list of just the paying customers.</p>
		
<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'account_preset_id'; ?>
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
				<span class="howto">Choose the Form Preset to use for capturing user accounts</span>
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
