<?php 
global $post, $custom;

if( !$custom )
	$custom = $this->Owner()->get_post_custom( $post->ID );
?>

<table class="form-table">
	<tr>
		<?php $nextItem = 'form_type'; ?>
		<td>
			<label>
				<input onclick="ShowOdinForm('<?php echo $this->m_pre; ?>');" type="radio" name="field_<?php echo $nextItem; ?>" value="odin" id="<?php echo $nextItem; ?>1" <?php if( $custom[ $nextItem ] == 'odin' ) echo 'checked="checked"'; ?>>
				Odin's Pride
			</label>
			<label>
				<input onclick="ShowTraditionalForm('<?php echo $this->m_pre; ?>');" type="radio" name="field_<?php echo $nextItem; ?>" value="traditional" id="<?php echo $nextItem; ?>2" <?php if( $custom[ $nextItem ] == 'traditional' ) echo 'checked="checked"'; ?>>
				Traditional
			</label>
			
			<span class="howto">Select the type/style of form to use.</span>
			
			<script>
			jQuery(document).ready( function() {
				
				<?php
				if( $custom[ $nextItem ] == 'odin' )
				{ ?>
				ShowOdinForm('<?php echo $this->m_pre; ?>');
				<?php
				}
				else
				{ ?>
				ShowTraditionalForm('<?php echo $this->m_pre; ?>');
				<?php
				} ?>
				
			} );
			</script>
		</td>
	</tr>
</table>
