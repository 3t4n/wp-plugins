<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->Owner()->get_post_custom( $post->ID );
?>

<table class="form-table">
	<tr>
		<?php $nextItem = 'import_code'; ?>
		<td>
			<textarea name="field_<?php echo $nextItem; ?>" style="height:100px; width:100%;"></textarea>
			
			<span class="howto">Paste a Form's export code into here for pre-made configurations. This will erase all current settings on this 
			form and replace them with the provided import preset.</span>
		</td>
	</tr>
</table>