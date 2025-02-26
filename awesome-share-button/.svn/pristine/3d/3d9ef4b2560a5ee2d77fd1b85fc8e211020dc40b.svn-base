<?php 
// option menu page name 
function awesome_share_button_2339_menu () {
	add_menu_page('Awesome Share Button Options Page', 'Awesome SB', 'manage_options', 'awesome-share-button-2339-options', 'awesome_share_button_2339_options_cb_function');

}
add_action('admin_menu', 'awesome_share_button_2339_menu');



function awesome_share_button_2339_options_cb_function () { 
?>

	<div class="wrap">
		<h2>Awesome Share Button Options</h2>

		<form action="options.php" method="post">


			<?php 

			 settings_fields('awesome_share_button_2339_facebook');
			// settings_fields('r_scrollup_section_2');

			do_settings_sections('awesome-share-button-2339-options'); 

			 submit_button();
			?>

		</form>


	</div>
<?php
}

function awesome_share_button_2339_options_setting_register () {
	add_settings_section('awesome_share_button_2339_facebook', 'Facebook', 'awesome_share_button_2339_facebook_cb', 'awesome-share-button-2339-options' );
	add_settings_section('awesome_share_button_2339_google', 'Google', 'awesome_share_button_2339_facebook_cb', 'awesome-share-button-2339-options' );
	add_settings_section('awesome_share_button_2339_twitter', 'Twitter', 'awesome_share_button_2339_facebook_cb', 'awesome-share-button-2339-options' );
	
	//add_settings_section( $id, $title, $callback, $page );
	add_settings_field('facebook_icon', 'Facebook Icon', 'facebook_icon_cb', 'awesome-share-button-2339-options', 'awesome_share_button_2339_facebook');
	add_settings_field('facebook_icon_color', 'Facebook Icon Color', 'facebook_icon_color_cb', 'awesome-share-button-2339-options', 'awesome_share_button_2339_facebook');

	add_settings_field('google_icon', 'Google Icon', 'google_icon_cb', 'awesome-share-button-2339-options', 'awesome_share_button_2339_google');
	add_settings_field('google_icon_color', 'Facebook Icon Color', 'google_icon_color_cb', 'awesome-share-button-2339-options', 'awesome_share_button_2339_google');

	add_settings_field('twitter_icon', 'Twitter Icon', 'twitter_icon_cb', 'awesome-share-button-2339-options', 'awesome_share_button_2339_twitter');
	add_settings_field('twitter_icon_color', 'Twitter Icon Color', 'twitter_icon_color_cb', 'awesome-share-button-2339-options', 'awesome_share_button_2339_twitter');

 
	//add_settings_field( $id, $title, $callback, $page, $section, $args );
	register_setting('awesome_share_button_2339_facebook', 'asb_2339_option');
	register_setting('awesome_share_button_2339_google', 'asb_2339_option');


}

add_action('admin_init', 'awesome_share_button_2339_options_setting_register');


//Setting section callback
function awesome_share_button_2339_facebook_cb() {	 
}

// ------Settings field Callback-------------//
// facebook
function facebook_icon_cb() {	
	$options = get_option( 'asb_2339_option' );
     
    $html = '<select id="facebook_icon" name="asb_2339_option[facebook_icon]">';
        $html.= '<option value="fa-facebook"'  . selected( $options['facebook_icon'], 'fa-facebook', false) . ' >Facebook</option>';
        $html.= '<option value="fa-facebook-square"' . selected( $options['facebook_icon'], 'fa-facebook-square', false) . '>facebook-square</option>';
    $html.= '</select>';
    $html.= '<p class="description">Change Your Facebook Icon </p>';
     
    echo $html;
}

function facebook_icon_color_cb () {
		$options = get_option('asb_2339_option');
	echo '<input id="facebook_icon_color" class="wp-color-picker-field" name="asb_2339_option[facebook_icon_color]" size="40" type="text" data-default-color="#44609d" value="'.$options['facebook_icon_color'].'"/>
	    <p class="description">Change Your Facebook Icon Color in hex, default is "#44609d".</p>';	
}


// google
function google_icon_cb() {	
	$options = get_option( 'asb_2339_option' );
     
    $html = '<select id="google_icon" name="asb_2339_option[google_icon]">';
    $html.= '<option value="fa-google"'  . selected( $options['google_icon'], 'fa-google', false) . ' >Google</option>';
    $html.= '<option value="fa-google-plus"' . selected( $options['google_icon'], 'fa-google-plus', false) . '>Google Plus</option>';
    $html.= '</select>';
    $html.= '<p class="description">Change Your Google Icon </p>';     
    echo $html;
}

function google_icon_color_cb () {
		$options = get_option('asb_2339_option');
	echo '<input id="google_icon_color" class="wp-color-picker-field" name="asb_2339_option[google_icon_color]" size="40" type="text" data-default-color="#dd4b39" value="'.$options['google_icon_color'].'"/>
	    <p class="description">Change Your Google Icon Color in hex, default is "#dd4b39".</p>';	
}

// twitter 

function twitter_icon_cb() {	
	$options = get_option( 'asb_2339_option' );
     
    $html = '<select id="twitter_icon" name="asb_2339_option[twitter_icon]">';
    $html.= '<option value="fa-twitter"'  . selected( $options['twitter_icon'], 'fa-twitter', false) . ' >Twitter</option>';
    $html.= '<option value="fa-twitter-square"' . selected( $options['twitter_icon'], 'fa-twitter-square', false) . '>twitter-square</option>';
    $html.= '</select>';
    $html.= '<p class="description">Change Your Twitter Icon </p>';     
    echo $html;
}

function twitter_icon_color_cb () {
		$options = get_option('asb_2339_option');
	echo '<input id="twitter_icon_color" class="wp-color-picker-field" name="asb_2339_option[twitter_icon_color]" size="40" type="text" data-default-color="#5eaade" value="'.$options['twitter_icon_color'].'"/>
	    <p class="description">Change Your Twitter Icon Color in hex, default is "#5eaade".</p>';	
}
?>