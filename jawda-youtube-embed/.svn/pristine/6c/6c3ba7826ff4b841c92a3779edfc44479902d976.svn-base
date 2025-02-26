<?php

/*
 * Plugin Name: Jawda YouTube Embed - SEO Friendly - Schema - Speed
 * Plugin URI: https://wordpress.org/plugins/jawda-youtube-embed/
 * Description: Lazyload YouTube Embed Plugin | Embed a responsive SEO Friendly YouTube video , adds video schema according to Schema.org guidelines to structure your site for SEO, supports Lazy Loading feature  to speed up sites page load speed.
 * Version: 0.1
 * Author: Jawda
 * Author URI: https://jawdadesigns.com/
 * License: GPL3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: jawda-youtube-embed
 */


// include yt.php file
require_once( dirname(__FILE__) . '/yt.php' );

/* ------------------------------------------------------------------
* Classic editor button
------------------------------------------------------------------ */

// Filter Functions with Hooks

if ( !function_exists('jyte_mce_button') )
{

  function jyte_mce_button() {
    // Check if WYSIWYG is enabled
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
      add_filter( 'mce_external_plugins', 'jyte_mce_plugin' );
      add_filter( 'mce_buttons', 'jyte_register_mce_button' );
    }
  }

  // add_action
  add_action('admin_head', 'jyte_mce_button');

}


// Function for new button
if ( !function_exists('jyte_mce_plugin') )
{
  function jyte_mce_plugin( $plugin_array ) {
    $plugin_array['jyte-button'] = plugin_dir_url(__FILE__) .'/js/classic_editor.js';
    return $plugin_array;
  }
}

// Register new button in the editor
if ( !function_exists('jyte_register_mce_button') )
{
  function jyte_register_mce_button( $buttons ) {
    array_push( $buttons, 'jyte-button' );
    return $buttons;
  }
}



/* ------------------------------------------------------------------
* Gutenberg Block
------------------------------------------------------------------ */

if ( !function_exists('jyte_block_editor') )
{

 function jyte_block_editor() {
 	$dir        = dirname( __FILE__ );
 	$block_js   = 'js/gutenberg_block.js';
 	wp_enqueue_script(
 		'jawda-youtube-embed', plugins_url( $block_js, __FILE__ ), array(
 			'wp-blocks',
 			'wp-i18n',
 			'wp-element',
 		), filemtime( "$dir/$block_js" )
 	);
 }
add_action( 'enqueue_block_editor_assets', 'jyte_block_editor' );

}

/* ------------------------------------------------------------------
* jawda block category
------------------------------------------------------------------ */
if ( !function_exists('jyte_block_category') )
{

function jyte_block_category( $categories, $post ) {
 	return array_merge(
 		$categories,
 		array(
 			array(
 				'slug' => 'jawda-blocks',
 				'title' => __( 'Jawda Blocks', 'jawda-blocks' ),
 			),
 		)
 	);
 }
 add_filter( 'block_categories', 'jyte_block_category', 10, 2);

}
