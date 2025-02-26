<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Widgetpreferences_picklist extends WPicklist {
function create() {
	$libraryViewM = WModel::get( 'library.view' );
	$libraryViewM->makeLJ( 'library.viewtrans' );
	$libraryViewM->whereLanguage();	
	$libraryViewM->whereE( 'widgets', 1 );
	$libraryViewM->select( 'alias', 0 );
	$libraryViewM->select( 'name', 1 );
	$libraryViewM->select( 'yid' );
	$allViewsA = $libraryViewM->load( 'ol' );
	$this->addElement( 0, ' - ' . WText::t('1450459940OGJG') . ' - ' );
	if ( empty($allViewsA) ) return true;
	foreach( $allViewsA as $oneView ) {
		$this->addElement( $oneView->yid, $oneView->alias );
	}
	return true;
}
}