<?php
/*
Plugin Name: Addons Espania
Description: Core functionality for Espania Theme
Version: 1.00
Author: ILLID
Author URI:
Text Domain: espania
*/

$theme = wp_get_theme();

if ( 'Espania' == $theme->name || 'Espania' == $theme->parent_theme ) {

    // Shortcodes
    include_once( "shortcodes/shortcodes.php" );
    include_once( "shortcodes/shortcodes-init.php" );

    // Widgets
    include_once( "widgets/widget-flickr.php" );
    include_once( "widgets/widget-instagram.php" );
    include_once( "widgets/widget-facebook-box.php" );
    include_once( "widgets/widget-posts.php" );
    include_once( "widgets/widget-comments.php" );
    include_once( "widgets/widget-video.php" );
    include_once( "widgets/widget-social-icons.php" );

    // Custom custom posts types and taxonomies
    include_once( "posts/custom-post-types.php" );

}