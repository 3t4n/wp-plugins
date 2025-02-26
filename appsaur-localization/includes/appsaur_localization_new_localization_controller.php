<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_new_localization_controller', 'appsaur_localization_new_localization_controller' );

	function appsaur_localization_new_localization_controller(){
		global $wpdb;
		
		$wpdb->query("INSERT INTO `".$wpdb->prefix."al_locations` (`name`,`city`,`street`,`code`,`link`,`desc`,`parent`,`lat`,`lng`) VALUES ('".sanitize_text_field(@$_POST['name'])."','".sanitize_text_field(@$_POST['city'])."','".sanitize_text_field(@$_POST['street'])."','".sanitize_text_field(@$_POST['code'])."','".sanitize_text_field(@$_POST['link'])."','".sanitize_text_field(@$_POST['desc'])."','".sanitize_key(@$_POST['pid'])."','".sanitize_text_field(@$_POST['lat'])."','".sanitize_text_field(@$_POST['lng'])."')");

		?>
		<div class='cloud-primary'><?php _e('Added localization...','appsaur-localization');?></div>
		<div class='al-action-btn run' mth='localizations' params=' id:<?php echo esc_html(@$_POST['pid']);?>;' tg='wpbody-content'></div>
		<?php
		exit();
	}