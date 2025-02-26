<?php

if(!is_admin()) exit;

function wpda_admin_menu() {
	add_options_page(
			'DealAds Settings',
			'DealAds',
			'manage_options',
			'wpda_settings',
			'wpda_settings_page'
		);
}
add_action('admin_menu', 'wpda_admin_menu');

function wpda_settings_register() {
	register_setting('wpda_settings', 'wpda_region', 'sanitize_text_field');
	register_setting('wpda_settings', 'wpda_legal');
	register_setting('wpda_settings', 'wpda_window', 'sanitize_text_field');
}
add_action('admin_init', 'wpda_settings_register');

function wpda_settings_page() {
	if(isset($_REQUEST['settings-updated']) && $_REQUEST['settings-updated'] == 'true') {
		wpda_cron_exec();
	}

	$region = get_option('wpda_region');
	$legal = esc_html(get_option('wpda_legal'));
	$window = get_option('wpda_window');
?>
	<div class="wrap wpda wpda-settings">
	<a href="http://dealads.net" target="_blank"><img src="<?php echo WPDA_URI; ?>/img/logo.png" alt="DealAds" style="width: 216px;"></a>
	<h1><?php _e('Settings', 'wpda'); ?></h1>
	<p><i><?php _e('Global settings for DealAds. Some of these settings may be altered for each widget or shortcode.', 'wpda'); ?></i></p>
	<form action="options.php" method="POST">
	<?php settings_fields('wpda_settings'); ?>
	<table>
		<tr>
			<td colspan="2">
				<label for="wpda-region"><?php _e('Region', 'wpda'); ?>:</label>
				<select id="wpda-region" name="wpda_region">
					<option value="us"<?php if($region == 'us') echo 'selected'; ?>><?php _e('United States', 'wpda'); ?></option>
					<option value="uk"<?php if($region == 'uk') echo 'selected'; ?>><?php _e('United Kingdom', 'wpda'); ?></option>
					<option value="de"<?php if($region == 'de') echo 'selected'; ?>><?php _e('Germany', 'wpda'); ?></option>
					<option value="at"<?php if($region == 'at') echo 'selected'; ?>><?php _e('Austria', 'wpda'); ?></option>
					<option value="ch"<?php if($region == 'ch') echo 'selected'; ?>><?php _e('Switzerland', 'wpda'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="checkbox" id="wpda-window" name="wpda_window" value="blank"<?php if($window == 'blank') echo ' checked'; ?>> <label for="wpda-window"><?php _e('Open links in new window?', 'wpda'); ?></label>
			</td>
		</tr>
		<tr>
			<td><label for="wpda-legal"><?php _e('Legal note', 'wpda'); ?>:</label></td>
			<td>
				<textarea id="wpda-legal" name="wpda_legal" cols="50" rows="3"><?php echo $legal; ?></textarea>
				<br>&#9758; <?php _e('This note will be shown as a footnote. Leave blank, if not applicable.', 'wpda'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="button" name="" value="<?php _e('Submit', 'wpda'); ?>"></td>
		</tr>
	</table>
	</form>
	<p>
		<?php _e('If you\'ve found any bug or have a suggestion for new features, do not hesitate to <a href="http://dealads.net" target="_blank">contact me</a>. ', 'wpda'); ?><br>
		<?php _e('<b>Did you know?</b> I am already working on a premium version of DealAds with many new features.', 'wpda'); ?><br>
		<?php _e('You may <a href="http://dealads.net" target="_blank">sign up</a> with your E-mail address to get notified and recieve a discount. Stay tuned!', 'wpda'); ?><br>
		<br>
		<i><?php
			_e('Last update of the rotation database', 'wpda');
			$updated = get_option('wpda_updated');
			echo ': '.round((time() - $updated) / 60).' '.__('minutes ago', 'wpda').'.';
		?></i>
	</p>
	</div>
<?php
}
?>
