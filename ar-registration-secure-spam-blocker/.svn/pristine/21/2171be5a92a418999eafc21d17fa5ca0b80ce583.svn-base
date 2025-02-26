<?php
/**
 * Admin functions AR Reg Secure
 **/

//add admin menu page
add_action('admin_menu', 'ar_reg_secure_plugin_settings');

function ar_reg_secure_plugin_settings() {
	add_menu_page('Reg Secure Settings', 'AR Reg Secure', 'administrator', 'ar_reg_secure_settings', 'ar_reg_secure_display_settings');
}

function ar_reg_secure_display_settings() {

	$ars_question = (get_option('ars_question') != '') ? get_option('ars_question') : '';
	$ars_answer = (get_option('ars_answer') != '') ? get_option('ars_answer') : '';

	$html = '
	<div class="ars-container">
		<form action="options.php" method="post" name="options">
			<h2>Enter Registration Question & Answer Required</h2>
			' . wp_nonce_field('update-options') . '
			<div class="ars-row">
				Question to ask on registration page:
			</div>
			<div class="ars-row-input">
				<input name="ars_question" type="text" value="' . $ars_question . '">
			</div>		
			<div class="ars-row">
				Answer you require (case insensitive):
			</div>
			<div class="ars-row-input">
				<input name="ars_answer" type="text" value="' . $ars_answer . '">
			</div>					
			 <input type="hidden" name="action" value="update" />
			 <input type="hidden" name="page_options" value="ars_question,ars_answer" />
			 <input type="submit" name="Submit" value="Update" />
		 </form>
	 </div>
	';

    echo $html;

}

//add settings link 
add_filter("plugin_action_links", 'ars_reg_secure_plugin_action_links', 10, 2 );
 
function ars_reg_secure_plugin_action_links( $links, $file ) {
	$plugin_file = 'ar-registration-secure-spam-blocker/ar-reg-secure.php';
	//make sure it is our plugin we are modifying
	if ( $file == $plugin_file ) {
		$settings_link = '<a href="' .
			admin_url( 'admin.php?page=ar_reg_secure_settings' ) . '">' .
			__( 'Settings', 'ars-reg-secure' ) . '</a>';
		array_unshift( $links, $settings_link );
	}
	return $links;
}

?>