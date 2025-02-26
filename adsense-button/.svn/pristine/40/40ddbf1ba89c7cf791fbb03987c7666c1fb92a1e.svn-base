<?php
/*
 Plugin Name: AdSense Button
 Plugin URI: http://www.gameandme.fr
 Description: Add a button for inserting Adsense code in your content
 Version: 1.0
 Author: Yohann Nizon
 Author URI: https://plus.google.com/u/0/115602468150927799102/posts
 */

define('MTMCE_URL', plugins_url('/', __FILE__));
define('MTMCE_DIR', dirname(__FILE__));
define('MTMCE_VERSION', '1.0');

function AdsenseButton_Init() {
	global $adsense;

	// Load translations
	load_plugin_textdomain('mytmceb', false, basename(rtrim(dirname(__FILE__), '/')) . '/languages');

	// Admin
	if (is_admin()) {
		require_once (MTMCE_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'class.admin.php');
		$adsense['admin'] = new adsenseButton_Admin();

		
	}
}

add_action('plugins_loaded', 'AdsenseButton_Init');

/*
 * Register the settings
 */
add_action('admin_init', 'adsense_register_settings');
function adsense_register_settings(){
    //this will save the option in the wp_options table as 'adsense_settings'
    //the third parameter is a function that will validate your input values
	for ($i=1; $i<6;$i++){
		register_setting('adsense_settings', 'adsense_settings'.$i, 'adsense_settings_validate');
		register_setting('adsense_settings', 'adsense_settingsname'.$i, 'adsense_settings_validate');
	}
}

function adsense_settings_validate($args){
    //make sure you return the args
    return $args;
}

/**
Admin Settings
*/
function adsense_settings()
{
	//Modify settings
}


function Adsense_admin_menu()  
{  
    add_menu_page('Adsense Settings', 'Adsense Settings', 'administrator', 'adsense_settings', 'adsense_admin_page_callback');
} 
add_action("admin_menu", "adsense_admin_menu"); 

//The markup for your plugin settings page
function adsense_admin_page_callback(){ 
?>
    <div class="wrap">
		<h2>Adsense code</h2>
		<form action="options.php" method="post"><?php		
			settings_fields( 'adsense_settings' );
			do_settings_sections( __FILE__ );
			
			?>
			
			
			<table class="form-table">
				<?php
				for ($i=1; $i<6;$i++){
					$options = get_option( 'adsense_settingsname'.$i );
					
					?>
					<tr>
						<th scope="row">Name for the Adsense <?php echo $i;?></th>
						<td>
							<fieldset>
								<label>
									<input  type="text" name="adsense_settingsname<?php echo $i;?>" id="adsense_settingsname<?php echo $i;?>" value="<?php echo (isset($options) && $options != '') ? $options : ''; ?>" />									
								</label>
							</fieldset>
						</td>
					</tr>
					<?php
					$options = get_option( 'adsense_settings'.$i );
					?>
					<tr>
						<th scope="row">Adsense code <?php echo $i;?></th>
						<td>
							<fieldset>
								<label>
									<textarea cols="60" rows="5" name="adsense_settings<?php echo $i;?>" id="adsense_settings<?php echo $i;?>"><?php echo (isset($options) && $options != '') ? $options : ''; ?></textarea>
								</label>
							</fieldset>
						</td>
					</tr>
				<?php
				}
				?>
			</table>
			<input type="submit" value="Save" />
		</form>
	</div>
<?php 
}
?>