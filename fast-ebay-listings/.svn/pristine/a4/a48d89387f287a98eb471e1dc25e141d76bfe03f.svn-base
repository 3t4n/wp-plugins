<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Functions to register client-side assets (scripts and stylesheets) for the
 * Gutenberg block.
 *
 * @package fast-ebay-listings
 */

/**
 * Define render callback. 
 *
 */
function fuEbayRssFeedRenderCallback($atts){
  // Attributes
  extract(shortcode_atts(array(
      'title' => '',
      'feed' => '',
      'columns' => -1,
      'rows' => -1,
      'picwidth' => -1,
      'slideshow' => -1,
      'slides' => -1
  ), $atts));

  $apicall = new fuEbayRssFeedCall($title);
  $apicall->picWidth = intval($picwidth);
  $apicall->presentation->setTableSize($columns, $rows);
  $apicall->presentation->setSlideShow($slideshow, $slides);
  $apicall->setFeed($feed);

  return $apicall->call();
}


/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 */
function fu_ebay_rssfeed_block_init() 
{
	// Skip block registration if Gutenberg is not enabled/merged.
  if ( ! function_exists( 'register_block_type' ) )
		return;

  register_block_type( 
    __DIR__,
    array(
      'render_callback' => 'fuEbayRssFeedRenderCallback',
    ) 
  );
}
add_action( 'init', 'fu_ebay_rssfeed_block_init' );
