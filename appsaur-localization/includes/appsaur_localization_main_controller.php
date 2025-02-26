<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_main_controller', 'appsaur_localization_main_controller' );

	function appsaur_localization_main_controller(){
		global $wpdb;
		?>
		<h1>Appsaur Localizations</h1>
		<div class='appsaur-localization-caption'>
		<button class='button al-action-btn' mth='add_map' params='' tg='wpbody-content' style='background:#5cb85c;color:#fff;'><?php _e('Add Map','appsaur-localization');?> + </button>
		<button class='button button-primary al-action-btn' mth='settings' params='' tg='wpbody-content' style='color:#fff;'><?php _e('Settings','appsaur-localization');?><i class='dashicons dashicons-admin-generic' style='margin-top:3px;margin-left:4px;'></i></button>
		</div>
		<?php
		$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."al_maps`");
		if($sql){
			foreach($sql as $row){
				?>
					<div class='a1 appsaur-localization-map-btn appsaur-localization-icon-btn'><i class='dashicons dashicons-trash al-action-btn' mth='delete_map' params='id:<?php echo $row->id;?>;' tg='wpbody-content'></i><i class='dashicons dashicons-edit al-action-btn' mth='edit_map' params='id:<?php echo $row->id;?>;' tg='wpbody-content'></i><span>[al_map id='<?php echo $row->id?>']</span><span class='al-action-btn' mth='localizations' params='id:<?php echo $row->id;?>;' tg='wpbody-content'><?php echo $row->name;?></span></div>
				<?php
			}
		}
		?>
		
		

		
		<?php
		exit();
	};;