<?php
/*

@package affiliation-decitre
@since 0.1

*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* Options management */

function affiliation_decitre_options_page() {
    add_options_page( __('Decitre Affiliation','affiliation-decitre') , __('Decitre Affiliation','affiliation-decitre') , 'manage_options' , 'affiliation_decitre' , 'affiliation_decitre_options_page_html' );
}

function affiliation_decitre_options_page_html() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<h1>'.__('Your Decitre Affiliation environment','affiliation-decitre').'</h1>';
	echo '<h2>'.__('Documentation','affiliation-decitre').'</h2>';
	echo '<p>'.__('This plug-in is designed to help you link your Wordpress web site to your Decitre affiliation based web shop by providing shortcodes for your ordering pages.','affiliation-decitre').'</p>';
	echo '<p>'.__('Short code usage example for product link: <code>[affiliation_decitre_link product="9782908766684"]</code>','affiliation-decitre').'</p>';
	echo '<p>'.__('Short code usage example for product link with text: <code>[affiliation_decitre_link product="9782908766684" text="Title of the book"]</code>','affiliation-decitre').'</p>';
	echo '<p>'.__('CSS example: <code>.decitreaffiliationbutton { background-color: lightgrey; border-radius: 5px; font-size: 85%; font-weight: bold; color: black; }</code>','affiliation-decitre').'</p>';
	echo '<h2>'.__('Settings','affiliation-decitre').'</h2>';
	echo '<form method="post" action="options.php">';
	settings_fields( 'affiliation-decitre' );
	echo '<table>';
	echo '<tr><td><label for="affiliation_decitre_campaign">'.__('Your Decitre affiliation campaign','affiliation-decitre').'</td><td><input name="affiliation_decitre_campaign" type="text" id="affiliation_decitre_campaign" value="'. esc_html( get_option( 'affiliation_decitre_campaign' ) ) .'" /></label></td></tr>';
	echo '<tr><td><label for="affiliation_decitre_affiliate">'.__('Your Decitre affiliation ID (without #)','affiliation-decitre').'</td><td><input name="affiliation_decitre_affiliate" type="text" id="affiliation_decitre_affiliate" value="'. esc_html( get_option( 'affiliation_decitre_affiliate' ) ) .'" /></label></td></tr>';
	echo '<tr><td><label for="affiliation_decitre_link_text">'.__('Your Decitre affiliation link default text','affiliation-decitre').'</td><td><input name="affiliation_decitre_link_text" type="text" id="affiliation_decitre_link_text" value="'. esc_html( get_option( 'affiliation_decitre_link_text' ) ) .'" /></label></td></tr>';
	echo '<tr><td><label for="affiliation_decitre_button_text">'.__('Your Decitre affiliation button default text','affiliation-decitre').'</td><td><input name="affiliation_decitre_button_text" type="text" id="affiliation_decitre_button_text" value="'. esc_html( get_option( 'affiliation_decitre_button_text' ) ) .'" /></label></td></tr>';
	echo '<tr><td><label for="affiliation_decitre_button_css">'.__('Your Decitre affiliation button CSS','affiliation-decitre').'</td><td><textarea name="affiliation_decitre_button_css" cols="80" id="affiliation_decitre_button_css">'. esc_html( get_option( 'affiliation_decitre_button_css' ) ) .'</textarea></label></td></tr>';
	echo '<tr><td colspan="2"><h3>'.__('Link options','affiliation-decitre').'</h3></td></tr>';
	echo '<tr><td><label for="affiliation_decitre_link_target">'.__('Open links in a new window','affiliation-decitre').'</td><td><input name="affiliation_decitre_link_target" type="checkbox" id="affiliation_decitre_link_target" value="1" ' . checked( 1, get_option( 'affiliation_decitre_link_target' ), false ) . '" /></label></td></tr>';
	echo '<tr><td><label for="affiliation_decitre_link_nofollow">'.__('Adds nofollow attribute to links','affiliation-decitre').'</td><td><input name="affiliation_decitre_link_nofollow" type="checkbox" id="affiliation_decitre_link_nofollow" value="1" ' . checked( 1, get_option( 'affiliation_decitre_link_nofollow' ), false ) . '" /></label></td></tr>';
	echo '<tr><td colspan="2"><h3>'.__('Click tracking','affiliation-decitre').'</h3></td></tr>';
	echo '<tr><td><label for="affiliation_decitre_link_google_analytics">'.__('Track clicks with Google Analytics','affiliation-decitre').'</td><td><input name="affiliation_decitre_link_google_analytics" type="checkbox" id="affiliation_decitre_link_google_analytics" value="1" ' . checked( 1, get_option( 'affiliation_decitre_link_google_analytics' ), false ) . '" /></label></td></tr>';
	echo '<tr><td><label for="affiliation_decitre_link_google_tag_manager">'.__('Track clicks with Google Tag Manager','affiliation-decitre').'</td><td><input name="affiliation_decitre_link_google_tag_manager" type="checkbox" id="affiliation_decitre_link_google_tag_manager" value="1" ' . checked( 1, get_option( 'affiliation_decitre_link_google_tag_manager' ), false ) . '" /></label></td></tr>';
	echo '</table>';
	submit_button();
	echo '</form>';
	echo '<a href="https://affilae.com/fr/login"><button>'.__('Connect to dashboard','affiliation-decitre').'</button></a>';
	echo '</div>';
}

function register_affiliation_decitre_settings() {
	register_setting( 'affiliation-decitre', 'affiliation_decitre_campaign', 'affiliation_decitre_options_sanitize_text_field' );
	register_setting( 'affiliation-decitre', 'affiliation_decitre_affiliate', 'affiliation_decitre_options_sanitize_text_field' );
	register_setting( 'affiliation-decitre', 'affiliation_decitre_button_css', 'affiliation_decitre_options_sanitize_text_field' );
	register_setting( 'affiliation-decitre', 'affiliation_decitre_button_text', 'affiliation_decitre_options_sanitize_text_field' );
	register_setting( 'affiliation-decitre', 'affiliation_decitre_link_text', 'affiliation_decitre_options_sanitize_text_field' );
	register_setting( 'affiliation-decitre', 'affiliation_decitre_link_target' );
	register_setting( 'affiliation-decitre', 'affiliation_decitre_link_nofollow' );
	register_setting( 'affiliation-decitre', 'affiliation_decitre_link_google_analytics' );
	register_setting( 'affiliation-decitre', 'affiliation_decitre_link_google_tag_manager' );
}

function affiliation_decitre_options_sanitize_text_field( $input ) {
	$input = sanitize_text_field( $input );
	return $input;
}