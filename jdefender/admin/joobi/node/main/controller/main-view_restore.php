<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_view_restore_controller extends WController {
	function restore() {
		$mainViewC = WClass::get( 'main.view' );
		$mainViewC->reRestoreView();
		return true;
	}
}