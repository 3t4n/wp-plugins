<?php
/**
* Admin Config Functions
*
* Various functions relating to the various administration screens
*
* @package	Artiss-Vine-Embed
*/

/**
* Add meta to plugin details
*
* Add options to plugin meta line
*
* @since	1.0
*
* @param	string  $links	Current links
* @param	string  $file	File in use
* @return   string			Links, now with settings added
*/

function ave_set_plugin_meta( $links, $file ) {

	if ( strpos( $file, 'artiss-vine-embed.php' ) !== false ) {

		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/donate">' . __( 'Donate', 'artiss-vine-embed' ) . '</a>' ) );
		$links = array_merge( $links, array( '<a href="http://wordpress.org/support/plugin/artiss-vine-embed">' . __( 'Support', 'artiss-vine-embed' ) . '</a>' ) );

	}

	return $links;
}

add_filter( 'plugin_row_meta', 'ave_set_plugin_meta', 10, 2 );

/**
* Detect plugin activation
*
* Upon detection of activation set an option with the current version in it
* This is for potential use in future to identify which version is being
* upgraded from
*
* @since	1.0
*/

function ave_plugin_activate() {

	update_option( 'ave_version', artiss_vine_embed_version );

}

register_activation_hook( WP_PLUGIN_DIR . '/artiss-vine-embed/artiss-vine-embed.php', 'ave_plugin_activate' );

/**
* Admin Screen Initialisation
*
* Set up admin menu
*
* @since	1.1
*/

function ave_menu_initialise() {

	// Add options sub-menu

	global $ave_options_hook;

	$ave_options_hook = add_submenu_page( 'upload.php', __( 'Artiss Vine Embed Options', 'artiss-vine-embed' ),  __( 'Vine Embeds', 'artiss-vine-embed' ), 'edit_posts', 'ave-options', 'ave_options' );

	add_action( 'load-' . $ave_options_hook, 'ave_add_options_help' );

}

add_action( 'admin_menu', 'ave_menu_initialise' );

/**
* Include options screen
*
* XHTML screen to prompt and update settings
*
* @since	1.1
*/

function ave_options() {

	include_once( WP_PLUGIN_DIR . '/artiss-vine-embed/includes/options-general.php' );

}

/**
* Add Options Help
*
* Add help tab to options screen
*
* @since	1.1
*
* @uses     ave_options_help    Return help text
*/

function ave_add_options_help() {

	global $ave_options_hook;
	$screen = get_current_screen();

	if ( $screen->id != $ave_options_hook ) { return; }

	$screen -> add_help_tab( array( 'id' => 'ave-options-help-tab', 'title'	=> __( 'Help', 'artiss-vine-embed' ), 'content' => ave_options_help() ) );
}

/**
* Options Help
*
* Return help text for options screen
*
* @since	1.1
*
* @return	string	Help Text
*/

function ave_options_help() {

	$help_text = '<p>' . __( 'This screen allows you to specify the default output options for the Artiss Vine Embed plugin.', 'artiss-vine-embed' ) . '</p>';
	$help_text .= '<p>' . __( 'Remember to click the Save Settings button at the bottom of the screen for new settings to take effect.', 'artiss-vine-embed' ) . '</p>';
	$help_text .= '<p><strong>' . __( 'For more information:', 'artiss-vine-embed' ) . '</strong></p>';
	$help_text .= '<p><a href="http://wordpress.org/extend/plugins/artiss-vine-embed/">' . __( 'Artiss Vine Embed Documentation', 'artiss-vine-embed' ) . '</a></p>';
	$help_text .= '<p><a href="http://wordpress.org/support/plugin/artiss-vine-embed">' . __( 'Artiss Vine Embed Support', 'artiss-vine-embed' ) . '</a></p>';
	$help_text .= '<h4>' . __( 'This plugin, and all support, is supplied for free, but <a title="Donate" href="http://artiss.co.uk/donate" target="_blank">donations</a> are always welcome.', 'artiss-vine-embed' ) . '</h4>';

	return $help_text;
}
?>