<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Channel_picklist extends WPicklist {
	function create() {
		$this->addElement( 'mobile', 'Mobile Push Notification' );
		$mainCredentialsC = WClass::get( 'main.credentials', null, 'class', false );
		if ( !empty( $mainCredentialsC ) ) $mainCredentialsC->picklistFromCategory( $this, 7, array(), false );			
		return true;
	}	
}