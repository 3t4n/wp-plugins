<?php 

/**
 * @package Amp Stories for Wordpress
 * @version 1.3.2
 */
/*
Plugin Name: Amp Stories for Wordpress
Plugin URI: https://wordpress.org/plugins/amp-story
Description: Amp Stories for Wordpress. Amp Story allows you to create a visual storytelling format for the open web. 
Author: Elías Margolis
Version: 1.3.2
Author URI: https://twitter.com/eliasmargolis
License: GPLv2 or later
Text Domain: amp-story
*/

require_once 'vafpress/bootstrap.php';
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function amp_story_init_metaboxes()
{

    // Built path to meta
    $mb_path  = __DIR__ . '/amp-story-repeater.php';
    // Initialize the Metabox's object
    // We can use array or file path to the array specification file.
    $mb = new VP_Metabox(array(
        'id'          => 'amp_story_vp_metabox',
        'types'       => array('post','page'),
        'title'       => __('Amp Stories for Wordpress', 'amp_story_metabox_title'),
        'priority'    => 'high',  
        'is_dev_mode' => false,
        'template'    => $mb_path
    ));
    
}
// the safest hook to use, since Vafpress Framework may exists in Theme or Plugin
add_action( 'after_setup_theme', 'amp_story_init_metaboxes' );

function amp_story_load_frontend()
{
   $amp_story_activated = vp_metabox('amp_story_vp_metabox.amp_story_tg');
   $amp_story_primary = vp_metabox('amp_story_vp_metabox.amp_story_tg_primary');
   if ($amp_story_primary == 1 && $amp_story_activated == 1 && !is_admin() &&  (is_single() ||  is_page() ) ) {
      require_once('amp-frontend.php'); 
      die();
    }
   if (sanitize_text_field($_GET['amp'] == 1)  && $amp_story_activated == 1 ) {
      require_once('amp-frontend.php');
      die();
   }
}
add_action( 'wp', 'amp_story_load_frontend' );

function amp_story_add_headers() {
    global $post;
    $amp_story_activated = vp_metabox('amp_story_vp_metabox.amp_story_tg');
    if ( (is_single() ||  is_page() ) && $amp_story_activated == 1 && !is_admin() ) {
       $amp_url = get_permalink(). "?amp=1";
        echo '<link rel="amphtml" href="' . $amp_url  . '" />' . "\n";
    }
}

add_action( 'wp_head', 'amp_story_add_headers' );


function amp_custom_admin_styles() {
  echo '<style>
    #amp_story_vp_metabox_metabox button.button.insert-media.add_media{
        display:none;   
    }
  </style>';
}

add_action('admin_head', 'amp_custom_admin_styles');


