<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Translation_Importexec_controller extends WController {
function importexec(){
$translationProcessC=WClass::get('translation.process');
$translationProcessC->setDontForceInsert(true);
$translationProcessC->importexec();
}
}