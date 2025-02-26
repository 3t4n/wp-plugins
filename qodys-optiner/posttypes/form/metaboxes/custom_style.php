<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->Owner()->get_post_custom( $post->ID );
?>

<table class="form-table">
	<tr>
		<?php $nextItem = 'custom_style'; ?>
		<td>
			<?php echo htmlentities( '<style>' ); ?>
			<textarea name="field_<?php echo $nextItem; ?>" style="height:100px; width:100%;"><?php echo $custom[ $nextItem ]; ?></textarea>
			<?php echo htmlentities( '</style>' ); ?>
			
			<span class="howto">Add any custom styles you want. Whatever you place in here will already be wrapped in the style tags.</span>
		</td>
	</tr>
</table>