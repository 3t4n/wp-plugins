<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->get_post_custom( $post->ID );
	
$forms = maybe_unserialize( $custom['forms'] );
?>

<input type="hidden" name="content" value="empty" />

<script type="text/javascript">
jQuery(document).ready( function() {
	
	jQuery('#form_code').bind( 'blur keyup keydown ', function(e)
	{
		DetectAndCreateOptinSelects();
	} );
	
	DetectAndCreateOptinSelects();
	
} );
</script>
	
<table class="form-table">
	<tbody>
		<tr>
			<?php $nextItem = 'post_title'; ?>
			<th>
				<label for="<?php echo $nextItem; ?>">List Name / Title</label>
			</th>
			<td>
				<input class="widefat inpt_a green_bg the_title" id="<?php echo $nextItem; ?>" type="text" name="<?php echo $nextItem; ?>" value="<?php echo $post->post_title; ?>">
				<span class="howto">This is only used internally to help you remember which form is which</span>
			</td>
		</tr>
		<tr>
			<?php $nextItem = 'form_code'; ?>
			<th>
				<label for="<?php echo $nextItem; ?>">Generated optin code</label>
			</th>
			<td>
				<textarea style="height:200px;" class="widefat green_bg" id="<?php echo $nextItem; ?>" name="field_<?php echo $nextItem; ?>"><?php echo $custom[ $nextItem ]; ?></textarea>
				<span class="howto">Paste the generated form code from your email marketing service here</span>
			</td>
		</tr>
		<tr>
			<?php $nextItem = 'name_select'; ?>
			<th>
				<label>Name field</label>
			</th>
			<td>
				<select rel="<?php echo $custom['name_select']; ?>" id="<?php echo $nextItem; ?>" name="field_<?php echo $nextItem; ?>"></select>
				<span class="howto">Select the name input from the pasted form code</span>
			</td>
		</tr>
		<tr>
			<?php $nextItem = 'email_select'; ?>
			<th>
				<label>Email field</label>
			</th>
			<td>
				<select rel="<?php echo $custom['email_select']; ?>" id="<?php echo $nextItem; ?>" name="field_<?php echo $nextItem; ?>"></select>
				<span class="howto">Select the email input from the pasted form code</span>
			</td>
		</tr>
	</tbody>
</table>