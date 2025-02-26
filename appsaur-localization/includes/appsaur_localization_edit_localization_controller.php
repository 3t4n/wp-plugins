<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_edit_localization_controller', 'appsaur_localization_edit_localization_controller' );

	function appsaur_localization_edit_localization_controller(){
		global $wpdb;

		$key=get_option('ALKEY');
		if($key){
			echo "<script async defer src='https://maps.googleapis.com/maps/api/js?key=".$key."&'></script>";
		}else{
			?>
			<div class='cloud-primary'><?php echo _e('Cant find API key','appsaur-localization')?></div>
			<?php
		}
		$sql=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."al_locations` WHERE `id`='".esc_html(@$_POST['id'])."' LIMIT 1");
		if($sql){
			foreach($sql as $row){
				
		
	?>
	<h1>Appsaur Localizations</h1>
	<script type='text/javascript'>
		jQuery(document).ready(function($){
			$(document).on('change','.lf-city,.lf-street,.lf-code',function(){
				street=$('.lf-street').val();
				city=$('.lf-city').val();
				code=$('.lf-code').val();
				var geocoder = new google.maps.Geocoder();
				var address = street+', '+city+' '+code;
				geocoder.geocode( { 'address': address}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						var latitude = results[0].geometry.location.lat();
						var longitude = results[0].geometry.location.lng();
						$('.lf-lat').val(latitude);
						$('.lf-lng').val(longitude);
					} else{
						$('.lf-lat').val('0');
						$('.lf-lng').val('0');
					}
				});
			});
		});

	</script>
		<form id='data-form'>
			<table class='appsaur_localization_table'>
				<tr>
				<td><?php echo _e('Name','appsaur-localization');?>:</td>
				<td><input type='text' size='40' name='name' value='<?php echo esc_html($row->name);?>' /></td>
				</tr>
				<tr>
				<td><?php echo _e('City','appsaur-localization');?>:</td>
				<td><input type='text' class='lf-city' size='40' name='city' value='<?php echo esc_html($row->city);?>' /></td>
				</tr>
				<tr>
				<td><?php echo _e('Street','appsaur-localization');?>:</td>
				<td><input type='text' class='lf-street' size='40' name='street'  value='<?php echo esc_html($row->street);?>' /></td>
				</tr>
				<tr>
				<td><?php echo _e('Code','appsaur-localization');?>:</td>
				<td><input type='text' class='lf-code' size='40' name='code'  value='<?php echo esc_html($row->code);?>' /></td>
				</tr>
				<tr>
				<td><?php echo _e('WWW','appsaur-localization');?>:</td>
				<td><input type='text' size='40' name='link' value='<?php echo esc_html($row->link);?>'  /></td>
				</tr>
				<tr>
				<td><?php echo _e('Description','appsaur-localization');?>:</td>
				<td><textarea name='desc' rows='8' cols='40'><?php echo esc_html($row->desc);?></textarea></td>
				</tr>
				<tr>
					<td>
						<input type='button' class='button al-action-btn' mth='localizations' params='id:<?php echo esc_html(@$_POST['pid']);?>;' tg='wpbody-content' value='<?php _e('Cancel','appsaur-localization');?>' />
						<input type='button' class='button button-primary al-save-btn' mth='save_localization' params='pid:<?php echo esc_html(@$_POST['pid']);?>;id:<?php echo esc_html(@$_POST['id']);?>;' tg='wpbody-content' value='<?php _e('Save','appsaur-localization');?>' />
					</td>
				</tr>
			</table>
			<input type='hidden' class='lf-lat' name='lat' value='<?php echo esc_html($row->lat);?>' />
			<input type='hidden' class='lf-lng' name='lng' value='<?php echo esc_html($row->lng);?>' />
		</form>

		<?php
			}
		}
		exit;
	}

