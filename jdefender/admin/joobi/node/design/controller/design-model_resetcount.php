<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_model_resetcount_controller extends WController {
	function resetcount() {
		$designModelfieldsC = WClass::get( 'design.modelfields' );
		$designModelfieldsC->resetcount();
		$this->userS('1480689097SNHQ');
		return true;
	}	
}