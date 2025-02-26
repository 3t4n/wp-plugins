<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
WLoadFile('netcom.class.client');
class Email_Netcom_class extends Netcom_Client_class {
public function s($data){
$emailStatisticsC=WClass::get('email.statistics');
$emailStatisticsC->recordOpenMail($data );
return true;
}
public function statistics($data){
$emailStatisticsC=WClass::get('email.statistics');
$emailStatisticsC->recordOpenMail($data );
return true;
}
}
