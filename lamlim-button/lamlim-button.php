<?php
/*
  Plugin Name: Lamlim Button
  Plugin URI: http://lamlim.com/wp-plugin
  Description: Add a "Lamlim" button to your posts and pages to allow your readers easily add your images and links to the arabic social bookmarking website http://lamlim.com. This will get you more visitors from Lamlim to your site.
  Author: bml13
  Version: 0.4
  License: GPLv2
  Author URI: http://profiles.wordpress.org/bml13
  Text Domain: lmlm
  DomainPath: ./lang/
  Copyright 2012-2017 Lamlim.com
*/

require_once( 'lamlim-config.php' );


register_activation_hook( __FILE__, 'lmlm_install' );
// init the settings after plugin activation
function lmlm_install() {
	global $lmlm_options;
	$lmlm_options = get_option( 'lmlm_options' );

    //*
	//Setup default options for values that don't exist and need to be set to 1/true/value (not 0/false/blank)
    //Done this way to preseve options saved in previous versions
    if ( !isset( $lmlm_options['button_style'] ) ) { $lmlm_options['button_style'] = 'user_selected'; }
    if ( !isset( $lmlm_options['display_home_page'] ) ) { $lmlm_options['display_home_page'] = 1; }
    if ( !isset( $lmlm_options['display_front_page'] ) ) { $lmlm_options['display_front_page'] = 1; }
    if ( !isset( $lmlm_options['display_posts'] ) ) { $lmlm_options['display_posts'] = 1; }
    if ( !isset( $lmlm_options['display_archives'] ) ) { $lmlm_options['display_archives'] = 1; }
    if ( !isset( $lmlm_options['display_pages'] ) ) { $lmlm_options['display_pages'] = 1; }
    if ( !isset( $lmlm_options['display_below_content'] ) ) { $lmlm_options['display_below_content'] = 1; }
    if ( !isset( $lmlm_options['display_on_post_excerpts'] ) ) { $lmlm_options['display_on_post_excerpts'] = 1; }
    
    if ( !isset( $lmlm_options['align'] ) ) { $lmlm_options['align'] = 1; }
    
	//Save default option values
	update_option( 'lmlm_options', $lmlm_options );
	//*/
}
?>