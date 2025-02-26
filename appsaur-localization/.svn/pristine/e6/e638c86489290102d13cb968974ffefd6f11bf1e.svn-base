<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_add_map_controller', 'appsaur_localization_add_map_controller' );

	function appsaur_localization_add_map_controller(){
		global $wpdb;
		?>
		<h1>Appsaur Localizations</h1>
		<form id='data-form'>
			<table class='appsaur-localization-table'>
				<tr>
					<td><?php _e('Name','appsaur-localization');?>:</td>
					<td><input type='text' name='name' size='40' placeholder='<?php _e('Map name','appsaur-localization');?>'></td>
				</tr>
				<tr>
					<td><?php _e('Center','appsaur-localization');?>:</td>
					<td><input type='text' name='center' size='40'  placeholder='<?php _e('Center on the map ... e. g. England','appsaur-localization');?>'></td>
				</tr>
				<tr>
					<td><?php _e('Zoom','appsaur-localization');?>:</td>
					<td><input type='text' name='zoom' size='40' placeholder='<?php _e('Map zoom','appsaur-localization');?>'></td>
				</tr>
				<tr>
					<td><?php _e('Height','appsaur-localization');?> (px):</td>
					<td><input type='text' name='height' size='40' placeholder='<?php _e('Map box height','appsaur-localization');?>'></td>
				</tr>
				<tr>
					<td colspan='2'>
						<input class='al-action-btn button' type='button' value='<?php _e('Cancel','appsaur-localization')?>' mth='main' params='' tg='wpbody-content'>
						<input class='al-save-btn button button-primary' type='button' value='<?php _e('Add','appsaur-localization');?>' mth='new_map' params='' tg='wpbody-content'> 
					</td>
				</tr>
			</table>
		</form>
		<?php
		exit();
	}