<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Currency_Pricestyle_picklist extends WPicklist {
	function create() {
		$price = 2437.75;
		$standardPrice = WTools::format( $price, 'moneyCode', null, null, false, '', false );
		$supPrice = WTools::format( $price, 'moneyCode', null, null, false, '', true );
		$this->addElement( 0, $standardPrice );
		$this->addElement( 1, $supPrice );
		return true;
	}	
}