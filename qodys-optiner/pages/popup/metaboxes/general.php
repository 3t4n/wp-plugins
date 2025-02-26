<?php
global $userData;

$form_presets = $this->GetOverseer()->GetFormPresets();
?>
		
<p>This capture method presents a non-obtrusive popup when a visitor interacts with a particular social 
widget found on your site. This allows you to capitalize on the virality of social networks by encouraging 
interaction rather than begging for an optin.</p>

<p>By telling your visitors to hit the "like" button to join or get whatever, it raises the appeal when 
presented with your form for opting in.</p>
		
<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'popup_preset_id'; ?>
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
				<span class="howto">Choose the Form Preset to use for capturing submissions</span>
			</td>
		</tr>
	</tbody>
</table>

<table class="form-table">
	<tr>
		<?php $nextItem = 'set_popup_global'; ?>
		<th>
			<label>On which pages?</label>
		</th>
		<td>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').hide();" type="radio" name="<?php echo $nextItem; ?>" value="1" id="<?php echo $nextItem; ?>1" <?php if( !$this->get_option( $nextItem ) || $this->get_option( $nextItem ) == 1 ) echo 'checked="checked"'; ?>>
				Site-wide
			</label>
			<label>
				<input onclick="jQuery('#<?php echo $nextItem; ?>').show();" type="radio" name="<?php echo $nextItem; ?>" value="-1" id="<?php echo $nextItem; ?>2" <?php if( $this->get_option( $nextItem ) == -1 ) echo 'checked="checked"'; ?>>
				Page specific
			</label>
			
			<span class="howto">Choose which pages for the popup to show up on</span>
		</td>
	</tr>
</table>

<div id="<?php echo $nextItem; ?>" style="display: <?php if( $this->get_option( $nextItem ) == -1 ) echo 'block'; else echo 'none'; ?>; ">
	
	<table class="form-table">
		<tr>
			<?php $nextItem = 'popup_pages'; ?>
			<th>
				<label class="sub_setting_label"> - page</label>
			</th>
			<td>
				<?php 
				$fields = array();
				$fields['name'] = $nextItem;
				$fields['selected'] = $this->get_option( $nextItem );
				
				wp_dropdown_pages( $fields );
				?>
				
				<span class="howto">Choose which page to do the popup integration on</span>
			</td>
		</tr>
	</table>
</div>

<script>
jQuery( function()
{
	jQuery('.chzn-select').chosen();
} );
</script>
