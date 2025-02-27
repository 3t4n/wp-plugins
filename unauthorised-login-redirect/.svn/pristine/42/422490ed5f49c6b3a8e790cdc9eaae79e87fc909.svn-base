<?php

if( !defined( 'ABSPATH' ) ) { exit; }

function rs_ulr_redirect_select_options() {
	$array = array(
		array( 'title' => get_bloginfo( 'name' ).' Home', 'url' => home_url( '/' ), ),
		array( 'title' => 'Google', 'url' => 'http://www.google.com/', ),
		array( 'title' => 'Yahoo!', 'url' => 'http://www.yahoo.com/', ),
		array( 'title' => 'Facebook', 'url' => 'http://www.facebook.com/', ),
		array( 'title' => 'Twitter', 'url' => 'http://www.twitter.com/', ),
	);
	return $array;
}

function rs_ulr_destination_options( $url ) {
	$options = rs_ulr_redirect_select_options();
	if( ( is_array( $options ) ) && ( !empty( $options ) ) ) {
		foreach( $options as $key => $value ) {
			if( $value['url'] == $url ) { $sel = ' selected="selected"'; } else { $sel = ''; }
			echo '<option value="'.$value['url'].'"'.$sel.'>'.$value['title'].'</option>';
			unset( $sel );
		}
	}
}

function rs_ulr_admin_init() {
	$update = rs_ulr_update_settings();
	$option = rs_ulr_get_option();
	echo '<div class="wrap">';
		echo '<h1>'.RS_ULR__PLUGIN_NAME.'</h1>';
		if( $update == TRUE ) { echo '<div id="message" class="updated notice is-dismissible"><p>Settings updated.</p></div>'; }
		echo '<form method="post" action="'.RS_ULR__PLUGIN_ADMIN_URL.'">';
			echo '<table class="form-table">';
				echo '<tr>';
					echo '<th scope="row"><label for="redirect_status">Redirect status</label></th>';
					echo '<td><p><label><input name="redirect_status" type="radio" value="on" class="tog"'; if( $option['redirect_status'] == 'on' ) { echo ' checked="checked"'; } echo ' /> On</label></p>';
					echo '<p><label><input name="redirect_status" type="radio" value="off" class="tog"'; if( $option['redirect_status'] == 'off' ) { echo ' checked="checked"'; } echo ' /> Off</label></p></td>';
				echo '</tr>';
				echo '<tr>';
					echo '<th scope="row"><label for="login_path">Secret login path</label></th>';
					echo '<td><p>This defines the URL you\'ll be visiting to log in to your site.</p>';
					echo '<p><strong>NOTE:</strong> This should not be a path for a page which already exists.</p>';
					echo '<input name="login_path" type="text" id="login_path" value="'.esc_html( stripslashes( $option['login_path'] ) ).'" class="regular-text" />';
					echo '<p>Current redirect login URL: <strong>'.home_url().esc_html( stripslashes( $option['login_path'] ) ).'</strong> (you should bookmark this)</p></td>';
				echo '</tr>';
				echo '<tr>';
					echo '<th scope="row"><label for="secret_get_key">Secret GET key</label></th>';
					echo '<td><p>This is the parameter part of your new login URL. Without this parameter and the corresponding value below, anyone trying to access your login page will be redirected to the site you select below.</p>';
					echo '<input name="secret_get_key" type="text" id="secret_get_key" value="'.esc_html( stripslashes( $option['secret_get_key'] ) ).'" class="regular-text" />';
					echo '<p>Current login URL: '.wp_login_url().'?<strong>'.esc_html( stripslashes( $option['secret_get_key'] ) ).'</strong>='.esc_html( stripslashes( $option['secret_get_value'] ) ).'</p></td>';
				echo '</tr>';
				echo '<tr>';
					echo '<th scope="row"><label for="secret_get_value">Secret GET value</label></th>';
					echo '<td><p>This is the value required for the parameter set above.</p>';
					echo '<input name="secret_get_value" type="text" id="secret_get_value" value="'.esc_html( stripslashes( $option['secret_get_value'] ) ).'" class="regular-text" />';
					echo '<p>Current login URL: '.wp_login_url().'?'.esc_html( stripslashes( $option['secret_get_key'] ) ).'=<strong>'.esc_html( stripslashes( $option['secret_get_value'] ) ).'</strong></td>';
				echo '</tr>';
				echo '<tr>';
					echo '<th scope="row"><label for="redirect_url">Redirect destination</label></th>';
					echo '<td><select name="redirect_url" id="redirect_url">'; rs_ulr_destination_options( $option['redirect_url'] ); echo '</select></td>';
				echo '</tr>';
				echo '<tr>';
					echo '<th scope="row">Delete settings on deactivation?</th>';
					echo '<td><label for="delete_option_on_deactivate"><input name="delete_option_on_deactivate" type="checkbox" id="delete_option_on_deactivate" value="1"'; if( $option['delete_option_on_deactivate'] == '1' ) { echo ' checked="checked"'; } echo ' /> Check this box to delete your settings above when you deactivate the plugin.</label></td>';
				echo '</tr>';
			echo '</table>';
			echo '<p class="beer">Do you find this plugin useful? If you do and you\'d like to buy me a beer to say thanks, <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VXYAWTLPZYE7E" onclick="window.open( this ); return false;">click here</a>. Thanks!</p>';
			wp_nonce_field( 'rs_ulr_update_settings' );
			submit_button();
		echo '</form>';
	echo '</div>';
}