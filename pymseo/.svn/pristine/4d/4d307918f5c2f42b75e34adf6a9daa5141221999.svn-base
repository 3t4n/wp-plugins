<?php
// PAGINA OPCIONES SEGURIDAD
if(!function_exists('wp_get_current_user')) { include(ABSPATH . "wp-includes/pluggable.php"); }

function pymseo_opciones_seguridad(){
	?>
	<h2><?php _e('Steganography','pymseo'); ?></h2>
	<table class="form-table">
		<tr>
			<td><label for="pymseoRemoveWordPressVersion"><input type="checkbox" name="pymseoRemoveWordPressVersion" <?php echo get_option('pymseoRemoveWordPressVersion')?'checked="checked" ':''; ?>/></label><?php _e('Remove the wordPress version number','pymseo'); ?></td>
			<td><label for="pymseoSeguridadDisableServerSignature"><input type="checkbox" name="pymseoSeguridadDisableServerSignature" <?php echo get_option('pymseoSeguridadDisableServerSignature')?'checked="checked" ':''; ?>/></label><?php _e('Disable Server Signature','pymseo'); ?></td>
		<td><label for="pymseoSeguridadBlockAuthor"><input type="checkbox" name="pymseoSeguridadBlockAuthor" <?php echo get_option('pymseoSeguridadBlockAuthor')?'checked="checked" ':''; ?>/></label><?php _e('Blocking Author Scans','pymseo'); ?></td>
		</tr>
</table>
<hr />
<h2><?php _e('Block files','pymseo'); ?></h2>
<table class="form-table">
		<tr>
			<td><label for="pymseoSeguridadBlockConfig"><input type="checkbox" name="pymseoSeguridadBlockConfig" <?php echo get_option('pymseoSeguridadBlockConfig')?'checked="checked" ':''; ?>/></label><?php _e('Block wp-config.php, wp-config-sample.php','pymseo'); ?></td>
		<td><label for="pymseoSeguridadBlockReadmeLicense"><input type="checkbox" name="pymseoSeguridadBlockReadmeLicense" <?php echo get_option('pymseoSeguridadBlockReadmeLicense')?'checked="checked" ':''; ?>/></label><?php _e('Block readme.html, license.txt','pymseo'); ?></td>
		</tr>
	</table>
<hr />
	<h2><?php _e('Login page','pymseo');?></h2>
	<table>
		<tr>
			<th scope="row"><?php _e('Change error text when logging in','pymseo'); ?></th>
			<td><label for="pymseoSeguridadTextoErrorLogin"><input type="text" style="width:100%" placeholder="<?php _e('Something went wrong!','pymseo'); ?>" name="pymseoSeguridadTextoErrorLogin" value="<?php echo get_option('pymseoSeguridadTextoErrorLogin') ?>" /></label></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Change session expire time','pymseo'); ?></th>
			<td><select name="pymseoSeguridadChangeExpireSession">
					<option value="0"<?php echo get_option('pymseoSeguridadChangeExpireSession') == '0' ? ' selected="selected"' : '';?>><?php _e('default','pymseo');?></option>
					<option value="86400"<?php echo get_option('pymseoSeguridadChangeExpireSession') == '86400' ? ' selected="selected"' : '';?>><?php _e('1 day','pymseo');?></option>
					<option value="172800"<?php echo get_option('pymseoSeguridadChangeExpireSession') == '172800' ? ' selected="selected"' : '';?>><?php _e('2 days','pymseo');?></option>
					<option value="604800"<?php echo get_option('pymseoSeguridadChangeExpireSession') == '604800' ? ' selected="selected"' : '';?>><?php _e('1 week','pymseo');?></option>
					<option value="1209600"<?php echo get_option('pymseoSeguridadChangeExpireSession') == '1209600' ? ' selected="selected"' : '';?>><?php _e('2 weeks','pymseo');?></option>
					<option value="2419200"<?php echo get_option('pymseoSeguridadChangeExpireSession') == '2419200' ? ' selected="selected"' : '';?>><?php _e('1 month','pymseo');?></option>
					<option value="7257600"<?php echo get_option('pymseoSeguridadChangeExpireSession') == '7257600' ? ' selected="selected"' : '';?>><?php _e('3 months','pymseo');?></option>
					<option value="14515200"<?php echo get_option('pymseoSeguridadChangeExpireSession') == '14515200' ? ' selected="selected"' : '';?>><?php _e('6 months','pymseo');?></option>
				</select>
			</td>
		</tr>
	</table>
<hr />
	<h2><?php _e('jQuery','pymseo'); ?></h2>
	<table>
		<tr>
			<th scope="row"><?php _e('Update jQuery in the front end','pymseo'); ?></th>
			<td><label for="pymseoSeguridadUpdateJquery"><input type="checkbox" name="pymseoSeguridadUpdateJquery" id="botonpymseoSeguridadUpdateJquery" <?php echo get_option('pymseoSeguridadUpdateJquery')?'checked="checked" ':''; ?>/></label></td>
			<td><?php _e('Version','pymseo'); ?>
				<select name="pymseoSeguridadUpdateJqueryVersion" id="botonpymseoSeguridadUpdateJqueryVersion" disabled>
					<option value="1.12.4"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '1.12.4' ? ' selected="selected"' : '';?>>1.12.4</option>
					<option value="2.0.0"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '2.0.0' ? ' selected="selected"' : '';?>>2.0.0</option>
					<option value="2.1.0"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '2.1.0' ? ' selected="selected"' : '';?>>2.1.0</option>
					<option value="2.2.0"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '2.2.0' ? ' selected="selected"' : '';?>>2.2.0</option>
					<option value="2.2.4"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '2.2.4' ? ' selected="selected"' : '';?>>2.2.4</option>
					<option value="3.0.0"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '3.0.0' ? ' selected="selected"' : '';?>>3.0.0</option>
					<option value="3.1.0"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '3.1.0' ? ' selected="selected"' : '';?>>3.1.0</option>
					<option value="3.2.0"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '3.2.0' ? ' selected="selected"' : '';?>>3.2.0</option>
					<option value="3.3.0"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '3.3.0' ? ' selected="selected"' : '';?>>3.3.0</option>
					<option value="3.4.0"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '3.4.0' ? ' selected="selected"' : '';?>>3.4.0</option>
					<option value="3.4.1"<?php echo get_option('pymseoSeguridadUpdateJqueryVersion') == '3.4.1' ? ' selected="selected"' : '';?>>3.4.1</option>
				</select>
			</td>
			<td><label for="pymseoSeguridadUpdateJqueryVersionSlim"><input type="checkbox"  name="pymseoSeguridadUpdateJqueryVersionSlim" id="botonpymseoSeguridadUpdateJqueryVersionSlim" <?php echo get_option('pymseoSeguridadUpdateJqueryVersionSlim')?'checked="checked" ':''; ?>/></label> <?php _e('Slim - Excludes the ajax and effects modules','pymseo'); ?></td>
		</tr>
	</table>
	<hr />
	<h2><?php _e('Others','pymseo'); ?></h2>
	<table class="form-table">
		<tr>
			<td><label for="pymseoSeguridadDesactivarPingbacks"><input type="checkbox" name="pymseoSeguridadDesactivarPingbacks" <?php echo get_option('pymseoSeguridadDesactivarPingbacks')?'checked="checked" ':''; ?>/></label><?php _e('Disable Self Pingbacks','pymseo'); ?></td>

			<td><label for="pymseoSeguridadDesactivarAutentificarseXMLRPC"><input type="checkbox" name="pymseoSeguridadDesactivarAutentificarseXMLRPC" <?php echo get_option('pymseoSeguridadDesactivarAutentificarseXMLRPC')?'checked="checked" ':''; ?>/></label><?php _e('Disable XML-RPC authentication','pymseo'); ?></td>
		</tr>			
		<tr>
			<td><label for="pymseoDisableXMLRPC"><input type="checkbox" name="pymseoDisableXMLRPC" <?php echo get_option('pymseoDisableXMLRPC')?'checked="checked" ':''; ?>/></label><?php _e('Disable XML-RPC Ping','pymseo'); ?></td>

			<td><label for="pymseoRemoveRESTAPILinks"><input type="checkbox" name="pymseoRemoveRESTAPILinks" <?php echo get_option('pymseoRemoveRESTAPILinks')?'checked="checked" ':''; ?>/></label><?php _e('Remove REST API Links','pymseo'); ?></td>
		</tr>
	</table>
<?php
}
?>