<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_localizations_controller', 'appsaur_localization_localizations_controller' );

	function appsaur_localization_localizations_controller(){
		global $wpdb;
		$map=$wpdb->get_results("SELECT `name` FROM `".$wpdb->prefix."al_maps` WHERE `id`='".sanitize_key(@$_POST['id'])."' LIMIT 1");
		$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."al_locations` WHERE `parent`='".sanitize_key(@$_POST['id'])."' ORDER BY `name` ASC");

		?>	
			<h1>Appsaur Localizations</h1>
		<?php 
			if($map){
				foreach($map as $row){
					?>
					<div class='appsaur-localization-caption'><?php echo $row->name;?></div>
					<?php
				}
			}
			?>
			
			<div class='appsaur-localization-submenu'>
				<input type='button' class='button al-action-btn' mth='main' params='' tg='wpbody-content' value='<?php _e('Back','appsaur-localization')?>' />
				<button class='button al-action-btn' mth='add_localization' params='id:<?php echo esc_html(@$_POST['id']);?>;' tg='wpbody-content' style='background:#5cb85c;color:#fff;'><?php _e('New localization','appsaur-localization')?></button>
				<input type='button' class='button al-action-btn' mth='delete_map' params='id:<?php echo esc_html(@$_POST['id']);?>;' tg='wpbody-content' value='<?php _e('Delete map','appsaur-localization')?>' />
			</div>
			<div class='row-flexible'>
				<div class='tfl tcol-lg-2 appsaur-localization-th'><?php _e('Name','appsaur-localization');?></div>
				<div class='tfl tcol-lg-2 appsaur-localization-th'><?php _e('Street','appsaur-localization');?></div>
				<div class='tfl tcol-lg-2 appsaur-localization-th'><?php _e('City','appsaur-localization');?></div>
				<div class='tfl tcol-lg-2 appsaur-localization-th'><?php _e('Code','appsaur-localization');?></div>
				<div class='tfl tcol-lg-2 appsaur-localization-th'><?php _e('Edit','appsaur-localization');?></div>
				<div class='tfl tcol-lg-2 appsaur-localization-th'><?php _e('Delete','appsaur-localization');?></div>
			</div>
			<?php
		if($sql){
			
			foreach($sql as $row){
				?>
				<div class='row-flexible trow'>
					<div class='tfl tcol-lg-2 appsaur-toolbox-first-col overflow'><i class='dashicons dashicons-location-alt'></i><?php echo esc_html($row->name);?></div>
					<div class='tfl tcol-lg-2 overflow'><?php echo esc_html($row->street);?></div>
					<div class='tfl tcol-lg-2 overflow'><?php echo esc_html($row->city);?></div>
					<div class='tfl tcol-lg-2 overflow'><?php echo esc_html($row->code);?></div>
					<div class='tfl tcol-lg-2 overflow'><i class='dashicons dashicons-edit al-action-btn' mth='edit_localization' params='pid:<?php echo esc_html(@$_POST['id']);?>;id:<?php echo esc_html($row->id);?>;' tg='wpbody-content'></i></div>
					<div class='tfl tcol-lg-2 overflow'><i class='dashicons dashicons-trash al-action-btn' mth='delete_localization' params='pid:<?php echo esc_html(@$_POST['id']);?>;id:<?php echo esc_html($row->id);?>;' tg='wpbody-content'></i></div>
				</div>
				<?php
			}
		}
		?>
			<div class='row-flexible'>

			</div>	
		<?php
		exit();
	}