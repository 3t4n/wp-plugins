<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->get_post_custom( $post->ID );

$optin_forms = $this->GetForms();
$email_lists = $this->GetLists();
?>

<input type="hidden" name="content" value='<?php echo $this->GetShortcode( $post->ID ); ?>' />
	
<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'post_title'; ?>
			<th>
				<label for="<?php echo $nextItem; ?>">Preset Name / Title</label>
			</th>
			<td>
				<input class="widefat inpt_a green_bg the_title" id="<?php echo $nextItem; ?>" type="text" name="<?php echo $nextItem; ?>" value="<?php echo $post->post_title; ?>">
				<span class="howto">Pick a name so you can recognize this preset to use with options in other features of the plugin</span>
			</td>
		</tr>
		<tr>
			<?php $nextItem = 'form_id'; ?>
			<th>
				<label for="<?php echo $nextItem; ?>">Optin Form</label>
			</th>
			<td>
				<select data-placeholder="Choose an Optin Form" name="field_<?php echo $nextItem; ?>" class="chzn-select">
					<option value=""></option> 
					
					<?php
					if( $optin_forms )
					{
						foreach( $optin_forms as $key => $value )
						{
							if( $custom[ $nextItem ] == $value->ID )
								$selected = 'selected="selected"';
							else
								$selected = ''; ?>
					<option <?php echo $selected; ?> value="<?php echo $value->ID; ?>"><?php echo $value->post_title; ?></option>
						<?php
						}
					} ?>
				</select>
				<span class="howto">Choose the Optin Form to use as a visible capture method</span>
			</td>
		</tr>
		<tr>
			<?php $nextItem = 'list_id'; ?>
			<th>
				<label for="<?php echo $nextItem; ?>">Email Lists</label>
			</th>
			<td>
				<select data-placeholder="Choose some Email Lists" name="field_<?php echo $nextItem; ?>[]" class="chzn-select" multiple>
					<option value=""></option> 
					
					<?php
					if( $email_lists )
					{
						foreach( $email_lists as $key => $value )
						{
							if( in_array( $value->ID, maybe_unserialize( $custom[ $nextItem ] ) ) )
								$selected = 'selected="selected"';
							else
								$selected = ''; ?>
					<option <?php echo $selected; ?> value="<?php echo $value->ID; ?>"><?php echo $value->post_title; ?></option>
						<?php
						}
					} ?>
				</select>
				<span class="howto">Choose the Email Lists to opt emails into</span>
			</td>
		</tr>
		<tr>
			<?php $nextItem = 'success_url'; ?>
			<th>
				<label for="<?php echo $nextItem; ?>">Success URL</label>
			</th>
			<td>
				<input class="widefat inpt_a green_bg" id="<?php echo $nextItem; ?>" type="text" name="field_<?php echo $nextItem; ?>" value="<?php echo $custom[ $nextItem ]; ?>">
				<span class="howto">Paste in the url where visitors will be taken to after they opt in</span>
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
