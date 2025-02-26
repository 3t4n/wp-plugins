<?php
// PAGINA OPCIONES GDPR
if(!function_exists('wp_get_current_user')) { include(ABSPATH . "wp-includes/pluggable.php"); }

function pymseo_opciones_gdpr(){
	?>
		<table class="form-table">
			<tr>
				<td colspan="2">
					<label for="pymseoGdprEnable"><input type="checkbox" name="pymseoGdprEnable" <?php echo get_option('pymseoGdprEnable')?'checked="checked" ':''; ?>/></label><?php _e('Enable GDPR','pymseo'); ?>
				</td>
			</tr>
		</table>
		<hr>
		<table>
			<tr>
				<th scope="row"><?php _e('Text to close the notification.','pymseo'); ?></th>
				<td><label for="pymseoGdprTextButton"><input type="text" placeholder="" name="pymseoGdprTextButton" size="60" style="width:100%" value="<?php echo get_option('pymseoGdprTextButton') ?>" /></label>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e('Text indicating that your site uses cookies.','pymseo'); ?></th>
				<td><label for="pymseoGdprText"><textarea name="pymseoGdprText" rows="6"><?php echo get_option('pymseoGdprText') ?></textarea></label>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e('Text for the link that will display the page with more information.','pymseo'); ?></th>
				<td><label for="pymseoGdprTextMoreInfo"><input type="text" placeholder="" name="pymseoGdprTextMoreInfo" size="60" style="width:100%" value="<?php echo get_option('pymseoGdprTextMoreInfo') ?>" /></label>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e('Link to the page that contains information about cookies.','pymseo'); ?></th>
				<td><label for="pymseoGdprLinkMoreInfo"><input type="text" placeholder="" name="pymseoGdprLinkMoreInfo" size="60" style="width:100%" value="<?php echo get_option('pymseoGdprLinkMoreInfo') ?>" /></label>
				</td>
			</tr>
		</table>
		<hr>
		
	<?php
}


?>