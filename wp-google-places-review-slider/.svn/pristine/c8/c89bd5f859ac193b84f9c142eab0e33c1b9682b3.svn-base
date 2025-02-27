<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://ljapps.com
 * @since      1.0.0
 *
 * @package    WP_Google_Reviews
 * @subpackage WP_Google_Reviews/admin/partials
 */

    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
 
    // add error/update messages
 
    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if (isset($_GET['settings-updated'])) {
        // add settings saved message with the class of "updated"
        add_settings_error('wpfbr_messages', 'wpfbr_message', __('Settings Saved', 'wp-google-reviews'), 'updated');
    }
    // show error/update messages
    settings_errors('wpfbr_messages');
?>
    
<div class="wrap" id="wp_fb-settings">
	<h1><img src="<?php echo plugin_dir_url( __FILE__ ) . 'logo.png'; ?>"></h1>

<?php 
include("tabmenu.php");
?>	
	
	<p><?php _e('The first thing you need to do is create a Google application that this plugin will communicate with to read your Google Places reviews. Don\'t worry it isn\'t hard. First, check out the instructions using the link below. Next, once you have your Google API Key paste it in the box below and click the "Save Settings" button.', 'wp-google-reviews'); ?> </p>
	<div id="createbtns">
		<button id="fb_create_google_app" type="button" class="button button-secondary"><?php _e('Create Google App Here', 'wp-google-reviews'); ?></button>&nbsp;&nbsp;
		<a href="http://ljapps.com/google-places-api-key/" target="_blank" id="fb_create_google_app_help" type="button" class=""><?php _e('Instructions', 'wp-google-reviews'); ?></a>
	</div>
	</br>	
	<form action="options.php" method="post">
		<?php
		// get the value of the setting we've registered with register_setting()
		$options = get_option('wpfbr_google_options');

		// output security fields for the registered setting "wp_fb-google_settings"
		settings_fields('wp_fb-google_settings');
		// output setting sections and their fields
		// (sections are registered for "wp_fb-google_settings", each field is registered to a specific section)
		do_settings_sections('wp_fb-google_settings');
		// output save settings button
		//submit_button('Save Settings');
	?>
	<p class="submit">
		<input name="submit" id="submit" class="button button-primary" value="Save Settings" type="submit">&nbsp;&nbsp;

		<?php
		if( ! empty( $options['google_location_txt'] ) && ! empty( $options['google_api_key'] )) {
		?>
		<button onclick='getgooglereviewsfunction("<?php echo esc_attr( $options['google_location_txt'] ); ?>")' id="wpfbr_getgooglereviews" type="button" class="btn_green">Retrieve Reviews</button><br/>
		<?php _e('Google only allows a max 5 reviews to be downloaded. Use the "Auto Fetch Reviews" above to slowly build up your database.', 'wp-google-reviews'); ?>
		<?php } else if( empty( $options['google_api_key'] )) { ?>
		
		
		<?php } else {?>
		<button onclick='alert("Please enter the Location above and click Save Settings.");' title="Please enter the Location above and click Save Settings." id="wpfbr_getgooglereviews" type="button" class="button button-secondary btn_off">Retrieve Reviews</button><span><i> Please enter the Location above and click Save Settings.</i></span>
		<?php } ?>
	</p>
	</form>

	<div id="popup" class="popup-wrapper wpfbr_hide">
	  <div class="popup-content">
		<div class="popup-title">
		  <button type="button" class="popup-close">&times;</button>
		  <h3 id="popup_titletext"></h3>
		</div>
		<div class="popup-body">
		  <div id="popup_bobytext1"></div>
		  <div id="popup_bobytext2"></div>
		</div>
	  </div>
	</div>
</div>