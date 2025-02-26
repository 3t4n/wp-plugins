<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement( 'main.listing.approve' );
class Security_Blocked_listing extends WListing_approve {
function create() {
	$this->value = ( ($this->value > 7 ) ? 0 : 1 );
	return parent::create();
}}