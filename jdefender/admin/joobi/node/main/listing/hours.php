<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class WListing_Corehours extends WListings_default{
	function create() {
		if ( empty($this->value) || $this->value == 0 ) return false;
		$time = round( $this->value / 3600 );
		if ( empty($time) ) return false;
		$this->content = $time;
		$this->content .= ' ' . WText::t('1206732357ILFL');
		return true;
	}
}