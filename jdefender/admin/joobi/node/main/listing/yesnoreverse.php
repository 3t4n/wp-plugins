<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
WView::includeElement( 'listing.yesno' );
class WListing_Coreyesnoreverse extends WListing_yesno {
	function create() {
		$this->value = !$this->value;
		return parent::create();
	}
}
