<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Widgetlist_picklist extends WPicklist {
function create() {
	$widgetM = WModel::get( 'main.widget' );
	$widgetM->makeLJ( 'main.widgettype', 'wgtypeid', 'wgtypeid', 0, 1 );
	$widgetM->whereE( 'publish', 1 );
	$widgetM->whereE( 'framework_type', 5 );
	$widgetA = $widgetM->load( 'ol', array( 'widgetid', 'alias' ) );
	if ( empty($widgetA) ) return false;
	foreach( $widgetA as $comm ) {
		$this->addElement( $comm->widgetid, $comm->alias );
	}
	return true;
}}