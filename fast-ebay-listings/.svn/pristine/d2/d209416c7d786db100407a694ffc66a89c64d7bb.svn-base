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
function fuEbayItemRenderCallback($atts)
{
  // Attributes
  extract(shortcode_atts(array(
      'item' => '',
      'variation' => '',
      'picwidth' => -1,
      'customid' => ''
  ), $atts));

  $apicall = new fuEbayBrowseGetItemApiCall($item);
  $apicall->variation = $variation;
  $apicall->picWidth = intval($picwidth);
  $apicall->setCustomId($customid);
  return $apicall->call();
}


/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 */
function fu_ebay_item_block_init() 
{
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) )
		return;

  register_block_type( 
    __DIR__,
    array(
      'render_callback' => 'fuEbayItemRenderCallback',
    ) 
  );
}
add_action( 'init', 'fu_ebay_item_block_init' );
