<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Currency_CoreXmlform_listing extends WListings_default{
function create() {
	$url = WPage::linkPopUp('controller=currency-exchangesite&task=xmlform&eid='. $this->value );
	$this->content = WPage::createPopUpLink( $url, WText::t('1246516644MMDQ'), 800, 600 );
	return true;
}
}