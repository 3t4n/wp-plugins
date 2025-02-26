<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement( 'listing.text' );
class WListing_Coretextarea extends WListing_text {
	function create() {
		$this->value = str_replace( array( "\n", "\r" ) , '<br />', $this->value );
		return parent::create();
	}
}