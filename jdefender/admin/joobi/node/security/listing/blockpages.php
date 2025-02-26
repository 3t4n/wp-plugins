<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement('listing.textlink');
class Security_CoreBlockpages_listing extends WListing_textlink {
function create() {
if (  5 != $this->getValue( 'status' ) ) return false;
	return parent::create();
}}