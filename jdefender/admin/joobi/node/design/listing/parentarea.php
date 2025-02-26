<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement( 'listing.select' );
class Design_Parentarea_listing extends WListing_select {
function create() {
	$fdid = $this->getValue( 'fdid', 'design.viewfields' );
	if ( empty($fdid) ) return false;
	$yid = $this->getValue( 'yid' );
	WGlobals::set( 'parentAReaYID', $yid, 'global' );
	return parent::create();
}}