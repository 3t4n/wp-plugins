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
function fuEbaySearchRenderCallback($atts){
  // Attributes
  extract(shortcode_atts(array(
      'title' => '',
      'category' => '',
      'query' => '',
      'searchindesc' => false,
      'searchlocation' => fuItemLocation::Internationally,
      'pickuppostcode' => '',
      'pickupradius' => 0,
      'seller' => '',
      'sellertype' => '',
      'buyingoptions' => '',
      'conditionoptions' => '',
      'columns' => -1,
      'rows' => -1,
      'picwidth' => -1,
      'minprice' => -1,
      'maxprice' => -1,
      'minbids' => -1,
      'maxbids' => -1,
      'aspectname' => "",
      'aspectvalue' => "",
      'sort' => '',
      'customid' => '',
      'slideshow' => -1,
      'slides' => -1
  ), $atts));

  $apicall = new fuEbayBrowseSearchApiCall($title);
  $apicall->presentation->setTableSize($columns, $rows);
  $apicall->presentation->setSlideShow($slideshow, $slides);
  $apicall->picWidth = intval($picwidth);
  $apicall->setCustomId($customid);

	$apicall->setQuery($query, $searchindesc);
  $apicall->setSearchLocation($searchlocation);
  $apicall->setPickupOptions($pickuppostcode, $pickupradius);
  $apicall->setCategories($category);
  $apicall->setSellers($seller);
  $apicall->setSellerType($sellertype);
  $apicall->setBuyingOptions($buyingoptions);
  $apicall->setConditionOptions($conditionoptions);
  $apicall->setAspect($aspectname, $aspectvalue);
  $apicall->minPrice = $minprice;
  $apicall->maxPrice = $maxprice;
  $apicall->minBids = $minbids;
  $apicall->maxBids = $maxbids;
  $apicall->setSortOrder($sort);
  return $apicall->call();
}


/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 */
function fu_ebay_search_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) )
		return;

  register_block_type( 
    __DIR__,
    array(
      'render_callback' => 'fuEbaySearchRenderCallback',
    ) 
  );  
}
add_action( 'init', 'fu_ebay_search_block_init' );
