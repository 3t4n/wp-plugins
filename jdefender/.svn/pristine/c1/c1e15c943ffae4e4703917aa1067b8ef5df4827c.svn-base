<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Currency_conversion_deletebydate_controller extends WController {
function deletebydate() {
	$curid = WGlobals::get( 'curid' );
	$date = WController::getFormValue( 'date' );
	if ( !empty($date) ) {
		$currencyHistoryM = WModel::get( 'currency.conversionhistory' );
		$currencyHistoryM->where( 'modified', '<=', $date);
		$currencyHistoryM->delete();
	}
	WPages::redirect( 'controller=currency-conversion&task=listing&curid='. $curid);
	return true;
}
}