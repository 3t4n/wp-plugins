<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Jdefender_Jdefender_main_view extends Output_Mlinks_class {
	function prepareView() {
		if ( WApplication::isEnabled( JOOBI_MAIN_APP ) ) {
			$this->removeElements( array( 'jdefender_main_tools_japps' ) );
		}
		return true;
	}	
}