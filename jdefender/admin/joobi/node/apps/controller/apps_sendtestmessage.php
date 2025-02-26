<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Apps_sendtestmessage_controller extends WController {
function sendtestmessage(){
$mainTestEmailC=WClass::get('main.testemail');
$mainTestEmailC->sendTestEmail();
return true;
}
}