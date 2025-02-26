<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Currency_Updateexchangerate_scheduler extends Scheduler_Parent_class {
	function process() {
		$curRateC = WClass::get( 'currency.rate' );
		$curRateC->updateExchangeRate();
		return true;
	}
}