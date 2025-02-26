<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement('listing.textlink');
class Design_CoreExportimport_listing extends WListing_textlink {
	function create() {
	if ( empty($this->value ) ) return false;
	return parent::create();
	}}