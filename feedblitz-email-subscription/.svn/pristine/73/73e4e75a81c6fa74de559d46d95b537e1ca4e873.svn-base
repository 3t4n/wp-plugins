<?php
add_action('admin_menu', 'feedblits_plugin_settings');
function feedblits_plugin_settings() {    
    add_menu_page('Feedlitz Settings', 'Feedlitz Settings', 'administrator', 'feedblitz_settings', 'feedblitz_display_settings');
}
function feedblitz_display_settings() {
	
 $feed_id = (get_option('FEEDID') != '') ? get_option('FEEDID') : '';
 $publisher_id = (get_option('PUBLISHER') != '') ? get_option('PUBLISHER') : '';
 
 
    $html = '<form method="post" name="feedblitz-options" action="options.php">
			<h3>Select Your Settings For Feedblitz</h3>' . wp_nonce_field('update-options') . '
			<label>Feed ID :</label><input type="text" placeholder="Enter Feed ID" name="FEEDID" value="' .  $feed_id . '" />            <label>Publisher ID : </label><input type="text" placeholder="Enter Publisher ID"name="PUBLISHER" 
			value="' . $publisher_id . '" /> 
				<input type="hidden" name="action" value="update" />  
				<input type="hidden" name="page_options" value="FEEDID,PUBLISHER" /> 
				<input type="submit" name="Submit" value="Update" />
			</form>';         
   echo $html;
}
?>