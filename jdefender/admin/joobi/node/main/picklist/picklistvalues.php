<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Picklistvalues_picklist extends WPicklist {
	function create() {
		$did = WGlobals::get( 'picklistParent', '', 'global' );
		if ( empty($did) ) return false;
		$pickListP = WView::picklist( $did );
		$allValuesA = $pickListP->getValues();
		if ( !empty( $allValuesA ) ) {
			foreach( $allValuesA as $oneKey => $oneValue ) {
				$this->addElement( $oneKey, $oneValue );
			}
		}
		return true;
	}}