<?php 
/** @copyright Copyright (c) 2007-2016 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Currency_exchangesite_controller extends WController {
function exchangesite()
{
	WPages::redirect( 'controller=currency-exchangesite&task=listing' );
	return true;
}
}