<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_settings_controller', 'appsaur_localization_settings_controller' );

	function appsaur_localization_settings_controller(){
		global $wpdb;
			$key=get_option('ALKEY');
		?>
		<h1>Appsaur Localizations</h1>
		<form id='data-form'>
			<table class='appsaur-localization-table'>
				<tr>
					<td><?php _e('Google Maps API Key','appsaur-localization');?>:</td>
					<td><input type='text' name='alkey' size=40 value='<?php echo $key;?>'/></td>
				</tr>
				<tr>
					<td></td>
					<td colspan='1'>
						<a href='https://console.developers.google.com/' target='_blank'>Google API Console</a>
					</td>
				</tr>
				<tr>
					<td class='table-btn-bar' colspan='2'>
						<input type='button' class='al-action-btn button' mth='main' params='' tg='wpbody-content' value='<?php _e('Cancel','appsaur-localization');?>'>
						<input type='button' class='al-save-btn button button-primary' mth='save_settings' params='' tg='wpbody-content' value='<?php _e('Save','appsaur-localization');?>'>
					</td>
				</tr>
			</table>
		</form>
		<?php
		exit();
	}
