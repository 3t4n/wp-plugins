<?php 

class APK_option_page{

	public function __construct(){
		add_action( 'admin_menu', array($this, 'apk_option_page') );
		add_action( 'admin_enqueue_scripts', array($this, 'apk_admin_enqueue_scripts') );
	}

	public function apk_admin_enqueue_scripts(){
		wp_enqueue_style( 'apk_admin_custom', plugins_url('../css/admin.css', __FILE__) );
	}

	public function apk_option_page(){
		add_menu_page('APK Downloader', 'APK Downloader', 'administrator', 'apk-downloader', array($this, 'apk_downloader_options'), plugins_url( '../images/favicon@2x.png', __FILE__), '61.35');
	}

	public function apk_downloader_options(){ ?>
		<div class="wrap">
			<h2><img src="<?php echo plugins_url( '../images/favicon@2x.png', __FILE__); ?>"> APK Downloader</h2>
			<div style="clear: left"></div>
			<div class="postbox-container" style="width: 100%">
				<div id="poststuff" class="metabox-holder">
					<div id="normal-sortables" class="meta-box-sortables">
						<div id="mdc_yt_opt_page" class="postbox ">
							<div title="Click to toggle" class="handlediv"><br></div>
							<h3 class="hndle"><span>Default Settings</span></h3>
							<div class="inside">
			
								<div class="option_page_left">
									<?php
							        if(get_option('apksupport_setings_updated') != 1){
										update_option('apksupport_form_button_text', 'Generate Download Link');
										update_option('apk_form_placeholder_text', 'Package Name or Google Play URL');
										update_option('apksupport_shortdsc_text', 'Direct download APK file and install the app manually onto your Android devices.');
										update_option('apksupport_shortdsc_yourdevice', 'Download the apk according to your device');
										update_option('apksupport_dsc', '<h3>1. What is Free Online APK Downloader?</h3>
<p>The Free Online APK Downloader is a 3rd-party web tool for APK & OBB downloads from Google Play Store. It provides you with the quickiest and simplest method of downloading the latest versions of any free Android app.</p>');
										update_option('apksupport_setings_updated', 1);
									}

									if(isset($_POST['apkform_update'])){
									if($_POST['apksupport_form_button_text'] != '') update_option('apksupport_form_button_text', $_POST['apksupport_form_button_text']);
								if($_POST['apk_form_placeholder_text'] != '') update_option('apk_form_placeholder_text', $_POST['apk_form_placeholder_text']);
								if($_POST['apksupport_shortdsc_text'] != '') update_option('apksupport_shortdsc_text', $_POST['apksupport_shortdsc_text']);
								if($_POST['apksupport_shortdsc_yourdevice'] != '') update_option('apksupport_shortdsc_yourdevice', $_POST['apksupport_shortdsc_yourdevice']);
								if($_POST['apksupport_dsc'] != '') update_option('apksupport_dsc', $_POST['apksupport_dsc']);
							
									?>

									<div class="updated settings-error" id="setting-error-settings_updated"> 
										<p><strong>Settings saved.</strong></p>
									</div>
									<?php } ?>
									<form action="" method="post">
										<input type="hidden" name="apkform_update" />
										<table class="form-table">
											<tbody>
												<tr valign="top">
													<th scope="row"><label for="apksupport_form_button_text">Form Button Text</label></th>
													<td><input type="text" class="regular-text" value="<?php echo get_option('apksupport_form_button_text');?>" id="apksupport_form_button_text" name="apksupport_form_button_text"  /></td>
												</tr>
											<tr valign="top">
													<th scope="row"><label for="apk_form_placeholder_text">Form Placeholder Text</label></th>
													<td><input type="text" class="regular-text" value="<?php echo get_option('apk_form_placeholder_text');?>" id="apk_form_placeholder_text" name="apk_form_placeholder_text"  /></td>
												</tr>
													<tr valign="top">
													<th scope="row"><label for="apksupport_shortdsc_yourdevice">Your device description Text</label></th>
													<td><input type="text" class="regular-text" value="<?php echo get_option('apksupport_shortdsc_yourdevice');?>" id="apksupport_shortdsc_yourdevice" name="apksupport_shortdsc_yourdevice" /></td>
												</tr>
												<tr valign="top">
													<th scope="row"><label for="apksupport_shortdsc_text">Short Description Text</label></th>
													<td><textarea type="text" class="regular-text" id="apksupport_shortdsc_text" name="apksupport_shortdsc_text" style="height:129px; width: 500px;" /><?php echo get_option('apksupport_shortdsc_text');?></textarea></td>
												</tr>
													<tr valign="top">
													<th scope="row"><label for="apksupport_dsc">Full Description Text</label></th>
													<td><textarea type="text" class="regular-text" id="apksupport_dsc" name="apksupport_dsc" style="height: 400px; width: 600px;" /><?php echo get_option('apksupport_dsc');?></textarea></td>
												</tr>									
											</tbody>
										</table>
										<p class="submit">
											<input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
										</p>
										<div class="clear"></div>
										<hr />
										<p style="font-style: italic"><strong>Notes:</strong></p>
										<ul>
											<li><span class="dashicons dashicons-yes"></span>This Plugin comes with <strike title="Pro Feature">shortcode</strike> <code>[apk_downloader_form]</code>.</li>
											</ul>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
<?php }
}

new APK_option_page;