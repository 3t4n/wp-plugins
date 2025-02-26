<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Models_picklist extends WPicklist {
function create() {
	$modelM = WModel::get( 'library.model' );
	$modelM->makeLJ( 'library.modeltrans', 'sid');
	$modelM->makeLJ( 'library.table', 'dbtid' );
	$modelM->whereLanguage( 1 );
	$modelM->whereE( 'audit', 1 );
	$modelM->where( 'noaudit', '!=', 1, 2 );
	$modelM->orderBy( 'name', 'ASC', 1 );
	$modelM->select( 'namekey', 0 );
	$modelM->select( 'name', 1 );
	$modelM->groupBy( 'sid' );
	$allModelA = $modelM->load( 'ol', array( 'sid' ) );
	$this->addElement( 0, WText::t('1242282448EVJO') );
	if ( !empty($allModelA)) {
		foreach( $allModelA as $mod ) {
			$this->addElement( $mod->sid, $mod->name  . ' ( ' . $mod->namekey. ' )' );
		}
	}
	return true;
}}