<?php
/**
 * Main plugin file. This plugin adds a stylesheet for social profile icons for the WordPress custom menu - recommended for the use
 * with Genesis Framework child themes.
 *
 * @package   Genesis Social Profiles Menu
 * @author    David Decker
 * @link      http://twitter.com/#!/deckerweb
 * @copyright Copyright 2011-2012, David Decker - DECKERWEB
 *
 * Plugin Name: Genesis Social Profiles Menu
 * Plugin URI: http://genesisthemes.de/en/wp-plugins/genesis-social-profiles-menu/
 * Description: This plugin adds a stylesheet for social profile icons for the WordPress custom menu - recommended for the use with Genesis Framework child themes.
 * Version: 1.2
 * Author: David Decker - DECKERWEB
 * Author URI: http://deckerweb.de/
 * License: GPLv2
 * Text Domain: genesis-social-profiles-menu
 * Domain Path: /languages/
 */

/**
 * Setting constants
 *
 * @since 1.0
 * @version 1.1
 */
define( 'GSPM_VERSION', '1.2' );
define( 'GSPM_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'GSPM_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );


/**
 * The text domain for the plugin
 *
 * @since 1.0
 */
define( 'GSPM_DOMAIN' , 'genesis-social-profiles-menu' );


add_action( 'init', 'ddw_gspm_init' );
/**
 * Load the text domain for translation of the plugin
 * 
 * @since 1.0
 * @version 1.1
 */
function ddw_gspm_init() {

	load_plugin_textdomain( 'genesis-social-profiles-menu', false, GSPM_PLUGIN_BASEDIR . '/languages' );
}


register_activation_hook( __FILE__, 'ddw_gspm_activation_check' );
/**
 * Checks for activated Genesis Framework and its minimum version before allowing plugin to activate
 *
 * @author Nathan Rice
 * @uses ddw_gspm_truncate()
 * @since 1.0
 * @version 1.1
 */
function ddw_gspm_activation_check() {

	$latest = '1.7';

	$theme_info = get_theme_data( get_template_directory() . '/style.css' );

	if ( basename( get_template_directory() ) != 'genesis' ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );  // Deactivate ourself
		wp_die( sprintf( __( 'Sorry, you can&rsquo;t activate unless you have installed the %1$sGenesis Framework%2$s', GSPM_DOMAIN ), '<a href="http://deckerweb.de/go/genesis/" target="_new">', '</a>' ) );
	}

	$version = ddw_gspm_truncate( $theme_info['Version'], 3 );

	if ( version_compare( $version, $latest, '<' ) ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );  // Deactivate ourself
		wp_die( sprintf( __( 'Sorry, you can&rsquo;t activate without %1$sGenesis Framework %2$s%3$s or greater', GSPM_DOMAIN ), '<a href="http://deckerweb.de/go/genesis/" target="_new">', $latest, '</a>' ) );
	}
}


/**
 * Used to cutoff a string to a set length if it exceeds the specified length
 *
 * @author Nick Croft
 * @link http://designsbynickthegeek.com/
 *
 * @since 1.0
 * @version 0.2
 * @param string $str Any string that might need to be shortened
 * @param string $length Any whole integer
 * @return string
 */
function ddw_gspm_truncate( $str, $length=10 ) {

	if ( strlen( $str ) > $length ) {
		return substr( $str, 0, $length );

	} else {
		$res = $str;
	}

	return $res;
}


add_action( 'wp_enqueue_scripts', 'ddw_gspm_styles' );
/**
 * Enqueue social profiles menu style sheet
 * 
 * @since 1.0
 * @version 1.1
 */
function ddw_gspm_styles() {

	wp_enqueue_style( 'genesis-social-profiles-menu', plugins_url( 'css/gspm-styles.css', __FILE__ ), false, GSPM_VERSION, 'all' );

}


add_filter( 'body_class', 'ddw_gspm_body_classes' );
/**
 * Add additional body class for better styling
 * 
 * @since 1.0
 */
function ddw_gspm_body_classes( $gspm_classes ) {
	$gspm_classes[] = 'gspm';
	return $gspm_classes;
}


add_action( 'contextual_help', 'ddw_gspm_contextual_help', 10, 3 );
/**
 * Add contextual help to menu admin page
 * 
 * @since 1.0
 */
function ddw_gspm_contextual_help( $contextual_help, $screen_id, $screen ) {

	if ( strcmp($screen->base, 'nav-menus' ) == 0 ) {
 
		$gspm_customized_help = $contextual_help . '<hr style="border: solid #ddd 1px; height: 1px; margin-top: 15px;" />' . sprintf( __( '<br /><p><strong>Plugin: Genesis Social Profiles Menu</strong> - %1$shttp://genesisthemes.de/en/wp-plugins/genesis-social-profiles-menu/%2$s<p>You can add social menu links/icons to your custom menu via a new custom link. Then you just add the proper css class and you are good to go.</p><p>These networks/services are available: Email, Facebook, RSS/ATOM Feed, Flickr, GitHub, Google Plus, LinkedIn, Twitter, Youtube, Xing.</p><p>Scheme for the css classes: <code>email-prl-s16</code> &mdash; "prl" just stands for the creator of the icon set (Paul Robert Loyd; maybe more sets follow later on and this the slug to set them apart...) and "s16" for the size (16x16 pixel in that case), you can also change this to "s24" (24x24 pixel) or "s32" (32x32 pixel).</p><p><em>Example:</em> if you want to add a twitter icon with a 24x24 pixel size to the menu, then just add the following css class to the menu: <code>twitter-prl-s24</code> &mdash; Got it? It is that easy ;-)</p><p><em>Credit where credit is due:</em> Icon set by Paul Robert Loyd, License: %3$sAttribution-Share Alike 2.0 UK: England & Wales Licence%4$s, %5$sdownload/website%6$s', GSPM_DOMAIN ), '<a href="', '" target="_new">Info</a></p>', '<a href="http://creativecommons.org/licenses/by-sa/2.0/uk/" target="_new" title="Attribution-Share Alike 2.0 UK: England & Wales Licence ...">', '</a>', '<a href="http://paulrobertlloyd.com/2009/06/social_media_icons/" target="_new">', '</a></p>' );
		
		return $gspm_customized_help;
	}

	// Let the default WP Dashboard help stuff through on other Admin pages
	return $contextual_help;
}


add_filter( 'plugin_row_meta', 'ddw_gspm_plugin_links', 10, 2 );
/**
 * Add various support links to plugin page
 *
 * @since 1.1
 */
function ddw_gspm_plugin_links( $gspm_links, $gspm_file ) {

	if ( !current_user_can( 'install_plugins' ) )
		return $gspm_links;

	if ( $gspm_file == GSPM_PLUGIN_BASEDIR . '/genesis-social-profiles-menu.php' ) {
		$gspm_links[] = '<a href="http://wordpress.org/extend/plugins/genesis-social-profiles-menu/faq/" target="_new" title="' . __( 'FAQ', GSPM_DOMAIN ) . '">' . __( 'FAQ', GSPM_DOMAIN ) . '</a>';
		$gspm_links[] = '<a href="http://wordpress.org/tags/genesis-social-profiles-menu?forum_id=10" target="_new" title="' . __( 'Support', GSPM_DOMAIN ) . '">' . __( 'Support', GSPM_DOMAIN ) . '</a>';
		$gspm_links[] = '<a href="http://genesisthemes.de/en/donate/" target="_new" title="' . __( 'Donate', GSPM_DOMAIN ) . '">' . __( 'Donate', GSPM_DOMAIN ) . '</a>';
	}

	return $gspm_links;
}
