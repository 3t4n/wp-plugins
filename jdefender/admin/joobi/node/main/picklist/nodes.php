<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Nodes_picklist extends WPicklist {
function create() {
	if ( $this->onlyOneValue() ) {
		return true;
	}
	$appsM = WModel::get( 'apps' );
	$appsM->select(array('name','type','wid'));
	$appsM->whereE( 'publish' , 1 );
	$appsM->whereE( 'type' , 150 );
	$appsM->orderBy('name');
	$appsM->setLimit( 1000 );
	$components = $appsM->load('ol');
	$this->addElement( 0 , WText::t('1443026606FFLW') );
	if ( !empty($components) ) {
		foreach($components as $component)  {
			$this->addElement( $component->wid , $component->name );
		}
	}
}
}