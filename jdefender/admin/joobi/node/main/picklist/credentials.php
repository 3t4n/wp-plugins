<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Credentials_picklist extends WPicklist {
function create() {
	$credentialTypeM = WModel::get( 'main.credentialtype' );
	$credentialTypeM->orderBy( 'category' );
	$allTypesA = $credentialTypeM->load( 'ol', array( 'crdidtype', 'alias', 'category' ) );
	$this->addElement( 0, ' -- ' . WText::t('1298294174MWVC') . ' -- ' );
		$credTypeP = WView::picklist( 'main_credential_category' );
	$typeA = $credTypeP->load();
	$currenCat = 0;
	foreach( $allTypesA as $onetype ) {
		if ( $currenCat != $onetype->category ) {
			$currenCat = $onetype->category;
			$this->addElement( '--' . $currenCat . '--', '--' . $typeA[$currenCat] );
		}
		$this->addElement( $onetype->crdidtype, $onetype->alias );	
	}
	return true;
}
}