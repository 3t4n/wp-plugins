<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Translation_installnow_controller extends WController {
function installnow(){
WGet::saveConfig('install', 1 );
$libProgreC=WClass::get('library.progress');
$progressO=$libProgreC->get('translation');
$progressO->run();
$ajaxHTML=$progressO->displayAjax();
echo $ajaxHTML;
$progressO->finish();
exit();
return true;
}
}