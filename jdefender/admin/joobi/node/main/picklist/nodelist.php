<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Nodelist_picklist extends WPicklist {
	function create() {
		$appsM = WModel::get( 'apps' );
		$appsM->whereE( 'type', 1 );
		$appsM->orderBy( 'name' );
		$allNodeA = $appsM->load( 'ol', array( 'name', 'wid') );
		foreach( $allNodeA as $oneNode ) {
			$this->addElement( $oneNode->wid, $oneNode->name );
		}
		return true;
	}
}