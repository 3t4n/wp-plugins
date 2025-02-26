<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_export_doexport_controller extends WController {
	function doexport() {
		$libProgreC = WClass::get( 'library.progress' );
		$progressO = $libProgreC->get( 'design' );
		$progressO->run();
		$ajaxHTML = $progressO->displayAjax();
		echo $ajaxHTML;
		$progressO->finish();
		exit();
		return true;
	}	
}