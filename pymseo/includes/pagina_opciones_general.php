<?php
// PAGINA OPCIONES GENERAL
if(!function_exists('wp_get_current_user')) { include(ABSPATH . "wp-includes/pluggable.php"); }


function pymseo_opciones_general(){
	?>
<h2>Metatags</h2>
		<table class="form-table">
			<tr>
				<td><label for="pymseoDisableEmbeds"><input type="checkbox" name="pymseoDisableEmbeds" <?php echo get_option('pymseoDisableEmbeds')?'checked="checked" ':''; ?>/></label><?php _e('Disable Embeds','pymseo'); ?></td>
			</tr>			
			<tr>
				<td><label for="pymseoRemoveRSDLink"><input type="checkbox" name="pymseoRemoveRSDLink" <?php echo get_option('pymseoRemoveRSDLink')?'checked="checked" ':''; ?>/></label><?php _e('Remove RSD Link','pymseo'); ?></td>
			</tr>			
			<tr>
				<td><label for="pymseoRemoveShortlink"><input type="checkbox" name="pymseoRemoveShortlink" <?php echo get_option('pymseoRemoveShortlink')?'checked="checked" ':''; ?>/></label><?php _e('Remove ShortLink','pymseo'); ?></td>
			</tr>			
			<tr>
				<td><label for="pymseoRemoveWlwmanifestLink"><input type="checkbox" name="pymseoRemoveWlwmanifestLink" <?php echo get_option('pymseoRemoveWlwmanifestLink')?'checked="checked" ':''; ?>/></label><?php _e('Remove wlwmanifest Link','pymseo'); ?></td>
            </tr>

</table>
<h2>Upload file types</h2>
		<table class="form-table">
			<tr>
				<td colspan="4"><label for="pymseoUploadFile"><input type="checkbox" name="pymseoUploadFile" <?php echo get_option('pymseoUploadFile')?'checked="checked" ':''; ?>/></label><?php _e('Enable upload file types','pymseo'); ?></td>
			</tr>
			<tr>
				<td><label for="pymseoUploadFileSvg"><input type="checkbox" name="pymseoUploadFileSvg" <?php echo get_option('pymseoUploadFileSvg')?'checked="checked" ':''; ?>/></label><?php _e('.svg','pymseo'); ?></td>
				<td><label for="pymseoUploadFileJson"><input type="checkbox" name="pymseoUploadFileJson" <?php echo get_option('pymseoUploadFileJson')?'checked="checked" ':''; ?>/></label><?php _e('.json','pymseo'); ?></td>
				<td><label for="pymseoUploadFileRar"><input type="checkbox" name="pymseoUploadFileRar" <?php echo get_option('pymseoUploadFileRar')?'checked="checked" ':''; ?>/></label><?php _e('.rar','pymseo'); ?></td>
				<td><label for="pymseoUploadFile7z"><input type="checkbox" name="pymseoUploadFile7z" <?php echo get_option('pymseoUploadFile7z')?'checked="checked" ':''; ?>/></label><?php _e('.7z','pymseo'); ?></td>
            </tr>
</table>
	<?php
}





?>