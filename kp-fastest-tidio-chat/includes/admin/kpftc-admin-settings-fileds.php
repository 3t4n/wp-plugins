<?php

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

function kpftc_settings_view()
{

    if (isset($_POST['kpftc_submit'])){
    update_option('kpftc_chat_enabled', $_POST['kpftc_chat_enabled']);
	update_option('kpftc_chat_link', $_POST['kpftc_chat_link']);
	update_option('kpftc_delay_time', $_POST['kpftc_delay_time']);
	update_option('kpftc_excluded_pages', $_POST['kpftc_excluded_pages']);
	update_option('kpftc_admin_disabled', $_POST['kpftc_admin_disabled']);
    }

    $kpftc_chat_enabled = get_option('kpftc_chat_enabled');
	$kpftc_chat_link = get_option('kpftc_chat_link');
	$kpftc_delay_time = get_option('kpftc_delay_time');
	$kpftc_excluded_pages = get_option('kpftc_excluded_pages');
	$kpftc_admin_disabled = get_option('kpftc_admin_disabled');
	
    ?>
	<form method="POST">
		<?php wp_nonce_field('kpftc', 'kpftc-settings-form'); ?>
		<table class="form-table" role="presentation">
		<tbody>
			<tr>
				<th scope="row"><label>Enable Plugin</label></th>
				<td>
					<input type="hidden" name="kpftc_chat_enabled" value="no">
					<input type="checkbox" id="kpftc_chat_enabled" name="kpftc_chat_enabled" <?php if($kpftc_chat_enabled == "yes") { echo "checked"; } ?> value="<?php if($kpftc_chat_enabled == "yes") { echo "yes"; } else { echo "no"; } ?>"><label for="kpftc_chat_enabled">Enable/Disable Plugin Without Actually Deactivating</label><br>
					
				</td>
			</tr>
			<tr>
				<th scope="row"><label>Tidio Chat ID</label></th>
				<td>
					<input type="text" id="kpftc_chat_link" name="kpftc_chat_link" style="width:350px;" value="<?php echo $kpftc_chat_link; ?>"><br>
					<small class="description">Tidio Chat Code with Your Tidio Chat ID written in <code>src=""</code> field.</small><br>
				</td>
			</tr>
			<tr>
				<th scope="row"><label>Delay Time</label></th>
				<td>
					<input type="text" id="kpftc_delay_time" name="kpftc_delay_time" style="width:350px;" value="<?php echo $kpftc_delay_time; ?>"><br>
					<small class="description">Delay in Milliseconds. Example: 10 Seconds = 10000 Milliseconds</small><br>
				</td>
			</tr>
			<tr>
				<th scope="row"><label>Pages to Exclude</label></th>
				<td>
					<input type="text" id="kpftc_excluded_pages" name="kpftc_excluded_pages" style="width:350px;" value="<?php echo $kpftc_excluded_pages; ?>"><br>
					<small class="description">Page IDs to Exclude Chat. Example: 520 or 523,526,563</small><br>
				</td>
			</tr>
			<tr>
				<th scope="row"><label>Disable for Admins</label></th>
				<td>
					<input type="hidden" name="kpftc_admin_disabled" value="no">
					<input type="checkbox" id="kpftc_admin_disabled" name="kpftc_admin_disabled" <?php if($kpftc_admin_disabled == "yes") { echo "checked"; } ?> value="<?php echo $kpftc_admin_disabled; ?>"><label for="kpftc_admin_disabled">Enable/Disable for Logged-in WordPress users.</label><br>
				</td>
			</tr>
		</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="kpftc_submit" id="kpftc_submit" class="button button-primary" value="Save Changes">
		</p>
	</form>
	<?php
}