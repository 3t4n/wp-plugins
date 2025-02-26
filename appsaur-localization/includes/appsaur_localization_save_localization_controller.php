<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_save_localization_controller', 'appsaur_localization_save_localization_controller' );

	function appsaur_localization_save_localization_controller(){
		global $wpdb;

		$wpdb->query("UPDATE `".$wpdb->prefix."al_locations` SET `name`='".sanitize_text_field(@$_POST['name'])."', `city`='".sanitize_text_field(@$_POST['city'])."', `street`='".sanitize_text_field(@$_POST['street'])."', `code`='".sanitize_text_field(@$_POST['code'])."', `link`='".sanitize_text_field(@$_POST['link'])."', `desc`='".sanitize_text_field(@$_POST['desc'])."', `lat`='".sanitize_text_field(@$_POST['lat'])."', `lng`='".sanitize_text_field(@$_POST['lng'])."' WHERE `id`='".sanitize_key(@$_POST['id'])."'");
		?>
		<div class='cloud-primary'><?php _e('Saved localization...','appsaur-localization');?></div>
		<div class='al-action-btn run' mth='localizations' params=' id:<?php echo esc_html(@$_POST['pid']);?>;' tg='wpbody-content'></div>
		<?php
		exit();
	}