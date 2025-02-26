<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Themedefault_picklist extends WPicklist {
	function create() {
		$ThemeM = WModel::get( 'theme' );
		$ThemeM->makeLJ( 'themetrans' );
		$ThemeM->select( 'name', 1 );
		$ThemeM->whereE( 'type', 106 );
		$ThemeM->whereE( 'publish', 1 );
		$ThemeM->select( 'namekey' );
		$listA = $ThemeM->load( 'ol' , 'tmid' );
		$this->addElement( '', ' - ' . WTExt::translate( 'Choose a Theme' ) . ' - ' );
		if ( empty($listA) ) return true;
		foreach( $listA as $list ) {
			if ( substr( $list->namekey, 0, 5 )  != 'mail.' ) $namekey = 'mail.' . $list->namekey;
			else $namekey = $list->namekey;
			$this->addElement( $namekey, $list->name );
		}		
		return true;
	}
}