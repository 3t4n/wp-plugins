<?php

/**
 * Provide a dashboard settings page
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://jkshoppie.com/product/admin-ads
 * @since      1.0.0
 *
 * @package    AADS
 * @subpackage AADS/admin/partials
 */


if ( ! isset( $_REQUEST['updated'] ) ) $_REQUEST['updated'] = false; ?>
		
	<div>
		<form method="post" action="options.php">
			<h3>Admin Ads - Ad Manager</h3>
			<?php settings_fields( 'aads_settings' ); ?>
			<?php $options = get_option( 'aads_settings' ); ?>
			<?php if (!empty($options['aads_code'])) { ?>
			<?php } ?>
			<table>
				<tr valign="top">
					<td>
					<textarea id="aads_settings[aads_code]" name="aads_settings[aads_code]" rows="5" cols="36" placeholder="Paste your ads code here. You can use any HTML tags." ><?php echo $options['aads_code']; ?></textarea></td>
				</tr>
				
				<tr valign="top">
					<td scope="row"><?php _e( 'Paste your ads code here. You can use any HTML tags.' ); ?></td>
				</tr>
				<tr></tr>
				<tr valign="top">
					<td scope="row"><label for="aads_settings[aads_class]" ><strong>Class </strong></label>
					<input type="text" name="aads_settings[aads_class]" id="aads_settings[aads_class]" placeholder="Ads div class (optional)" value="<?php echo $options['aads_class']; ?>" /></td>
				</tr>
				
			</table>
			<p><input class="button-primary button" name="submit" id="submit" value="Save Changes" type="submit"></p>
		</form>
	
	</div>
