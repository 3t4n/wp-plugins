<?php
/*
*    Plugin Name: Analog Clock
*    Plugin URI: http://www.selcukkutuk.com/wordpress-eklenti-analog-saat-11
*    Description: Temanıza şık analog saatler eklemenizi sağlar. Temanızın index.php yada header.php de uygun bir yere <code>&lt;?php anolog_saati_goster(); ?&gt;</code> kodunu ekleyin.
*    Author: Selçuk Kütük
*    Author URI: http://www.selcukkutuk.com
*    Version: 1.1
*/

add_action('plugins_loaded', 'analog_clock_dil_yukle');

	function analog_clock_dil_yukle() {
		load_plugin_textdomain('analog_clock', '/wp-content/plugins/analog-clock-10');
	}

function anolog_saati_goster() {
if (get_option('wpAnalogSaatRastgele')) {
$input = array(1,2,3,4,5,6,7,8);
$rand_keys = array_rand($input,2);

echo'
<embed src="' . get_bloginfo('wpurl') . '/wp-content/plugins/analog-clock-10/saatswf/'. $input[$rand_keys[0]] . '.swf" width="'.  get_option('wpAnalogSaatGenislik')  .'" height="'.  get_option('wpAnalogSaatYukseklik')  .'" style="" wmode="transparent" scale="noborder" type="application/x-shockwave-flash"></embed>
';

}else{

echo'
<embed src="' . get_bloginfo('wpurl') . '/wp-content/plugins/analog-clock-10/saatswf/'. get_option('wpAnalogSaatTipi') . '.swf" width="'.  get_option('wpAnalogSaatGenislik')  .'" height="'.  get_option('wpAnalogSaatYukseklik')  .'" style="" wmode="transparent" scale="noborder" type="application/x-shockwave-flash"></embed>
';
}

}


	//Called upon activation of the plugin. Sets some options.
	function kurAnalogSaat(){
		add_option('wpAnalogSaatTipi', '1'); // saat tipi
		add_option('wpAnalogSaatRastgele', false); // her defasında farkı bir saat
		add_option('wpAnalogSaatYukseklik', '100'); // yükseklik
		add_option('wpAnalogSaatGenislik', '100'); // genişlik
	}


	//Called upon deactivation of the plugin. Cleans our mess.
	function kaldirAnalogSaat(){

		delete_option('wpAnalogSaatTipi');
		delete_option('wpAnalogSaatRastgele');
		delete_option('wpAnalogSaatYukseklik');
		delete_option('wpAnalogSaatGenislik');
	}


	//Admin güncelleme işlemi için gerekli form
	function adminFormWpAnalogSaat(){
		if($_POST['action'] == 'save'){
			$ok = false;
				
			if($_POST['wpAnalogSaatTipi']){
				update_option('wpAnalogSaatTipi', $_POST['wpAnalogSaatTipi']);
				$ok = true;
			}
			
			if($_POST['wpAnalogSaatYukseklik']){
				update_option('wpAnalogSaatYukseklik', $_POST['wpAnalogSaatYukseklik']);
				$ok = true;
			}
			
			if($_POST['wpAnalogSaatGenislik']){
				update_option('wpAnalogSaatGenislik', $_POST['wpAnalogSaatGenislik']);
				$ok = true;
			}
			
			if($_POST['wpAnalogSaatRastgele'] == 1){
				update_option('wpAnalogSaatRastgele', true);
			}
			else{
				update_option('wpAnalogSaatRastgele', false);
			}	
			
			
			if($ok){
				?>
				<div id="message" class="updated fade">
					<p><?php _e('Saved Settings','analog_clock'); ?></p>
				</div>
				<?php 
			}
			else{
				?>
				<div id="message" class="error fade">
					<p><?php _e('An error occurred while saving the settings!','analog_clock'); ?></p>
				</div>
				<?php 
			}
		}
		
		// ayarları getir
		$wpAnalogSaatTipi = get_option('wpAnalogSaatTipi');
		$wpAnalogSaatRastgele = get_option('wpAnalogSaatRastgele');
		$wpAnalogSaatYukseklik = get_option('wpAnalogSaatYukseklik');
		$wpAnalogSaatGenislik = get_option('wpAnalogSaatGenislik');
		?>
		<div class="wrap">
			<div id="icon-options-general" class="icon32"><br /></div>
			<h2><?php _e('Analog Clock Settings','analog_clock'); ?></h2>
			<form method="post">
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<label for="wpAnalogSaatTipi"><?php _e('Clock Type','analog_clock'); ?></label>
						</th>
						<td>
							<select name="wpAnalogSaatTipi" id="wpAnalogSaatTipi">
								<option value="1" <?php if($wpAnalogSaatTipi == '1'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>1</option>
								<option value="2" <?php if($wpAnalogSaatTipi == '2'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>2</option>
								<option value="3" <?php if($wpAnalogSaatTipi == '3'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>3</option>
								<option value="4" <?php if($wpAnalogSaatTipi == '4'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>4</option>
								<option value="5" <?php if($wpAnalogSaatTipi == '5'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>5</option>
								<option value="6" <?php if($wpAnalogSaatTipi == '6'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>6</option>
								<option value="7" <?php if($wpAnalogSaatTipi == '7'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>7</option>
								<option value="8" <?php if($wpAnalogSaatTipi == '8'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>8</option>
								<option value="9" <?php if($wpAnalogSaatTipi == '9'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>9</option>
								<option value="10" <?php if($wpAnalogSaatTipi == '10'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>10</option>
								<option value="11" <?php if($wpAnalogSaatTipi == '11'){ echo 'selected="true"'; } ?>><?php _e('Type','analog_clock'); ?>11</option>
							</select>
							<span class="setting-description"><?php _e('Default','analog_clock'); ?> <code>1</code></span>
						</td>
					</tr>
					
					<tr>
						<th scope="row" class="th-full" colspan="2">
							<label for="wpAnalogSaatRastgele">
								<input type="checkbox" id="wpAnalogSaatRastgele" name="wpAnalogSaatRastgele" value="1" <?php if($wpAnalogSaatRastgele){ echo 'checked="checked"'; } ?> />
								<?php _e('Show a different time in each refresh','analog_clock'); ?>
							</label>
						</th>
					</tr>
										<tr valign="top">
						<th scope="row">
							<label for="wpAnalogSaatYukseklik"><?php _e('Height','analog_clock'); ?></label>
						</th>
						<td>
							<input name="wpAnalogSaatYukseklik" type="text" id="wpAnalogSaatYukseklik" value="<?php echo $wpAnalogSaatYukseklik ;?>" class="regular-text code" />
							<span class="setting-description"><?php _e('Default','analog_clock'); ?> <code>100</code></span>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="wpAnalogSaatGenislik"><?php _e('Width','analog_clock'); ?></label>
						</th>
						<td>
							<input name="wpAnalogSaatGenislik" type="text" id="wpAnalogSaatGenislik" value="<?php echo $wpAnalogSaatGenislik ;?>" class="regular-text code" />
							<span class="setting-description"><?php _e('Default','analog_clock'); ?> <code>100</code></span>
						</td>
					</tr>
				</table>
				<p class="submit">
					<input type="hidden" name="action" value="save" />
					<input type="submit" name="Submit" class="button-primary" value="<?php _e('Saved Settings','analog_clock'); ?>" />
				</p>
			</form>
		</div>
		<?php 
	}
	
	// Eklenti aktifleşirken data ayarlarını oluştur
	register_activation_hook(__FILE__, 'kurAnalogSaat');
	// Eklenti pasifleşirken data ayarlarını kaldır
	register_deactivation_hook(__FILE__, 'kaldirAnalogSaat');
	

	//Admin ekranına alt sayfa
	function adminMenuWpAnalogSaat(){
		add_options_page('Analog Saat Yönetimi', 'WP Analog Saat', 'manage_options', __FILE__, 'adminFormWpAnalogSaat');
	}
	// admin ekranına alt menü
	add_action('admin_menu', 'adminMenuWpAnalogSaat');
?>