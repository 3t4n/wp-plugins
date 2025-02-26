<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.lyo.one
 * @since      1.0.0
 *
 * @package    Nilly
 * @subpackage Nilly/admin/partials
 */
?>

<div class="wrap">
	<h2><?php _e('Nilly Settings', 'nilly'); ?></h2>


	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>
		<?php settings_fields($this->plugin_name); ?>

		<?php if ( isset( $_GET['settings-updated'] ) ) {
    echo "<div class='updated'><p>Settings saved successfully!</p></div>";
		} ?>

		<div id="poststuff">
			<div class="postbox">
				<div class="inside">
					<h3><?php _e('Settings', 'nilly'); ?></h3>
					<p><?php _e('In order for the analytics to works, you need to have an account with nilly. <a href="https://nilly.io" target="blank">You can create one here</a>', 'nilly'); ?></p>
					<table class="form-table">

					<tr valign="top">
						<th scope="row"><label for="location_select"><strong><?php _e('Server location', 'nilly'); ?>:</strong><br /></label></th>
						<td>
							<select id="location_select" name="location_select" style="width:120px;">
								<option value="ch" <?php selected(get_option('location_select'), 'ch'); ?>><?php _e('Switzerland', 'nilly') ; ?></option>
								<option value="de" <?php selected(get_option('location_select'), 'de'); ?>><?php _e('Germany', 'nilly') ; ?></option>
							</select>
							<small>ᐊ <?php _e('Choose your preferred server location here.', 'nilly'); ?></small>
						</td>
					</tr>

					</table>

					<p>
						<input type="submit" class="button button-primary" value="<?php _e('Save changes', 'nilly') ?>" />
					</p>
				</div>
			</div>
		</div>
		<p><?php _e('If you have questions or need help, <a href="https://nilly.io/contact" target="blank">contact us here</a>', 'nilly'); ?></p>
	</form>
</div>