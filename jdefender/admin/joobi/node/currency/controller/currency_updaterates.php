<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Currency_updaterates_controller extends WController {
function updaterates() {
	$curRateC = WClass::get( 'currency.rate' );
	$result = $curRateC->updateExchangeRate();	
	if ( $result ) {
		$this->userS('1243943350HCQU');
	} else {
		$this->userW('1243943350HCQV');
	}
	return true;
}
}