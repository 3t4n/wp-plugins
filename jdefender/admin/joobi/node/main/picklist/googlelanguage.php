<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Googlelanguage_picklist extends WPicklist {
	function create() {
		$languageM = WModel::get( 'library.languages' );
		$languageM->rememberQuery( true,  'Language' );
		$languageM->whereE( 'main', 1 );
		$languageM->whereE( 'automatic', 1 );
		$languageM->orderBy( 'availsite', 'DESC' );
		$languageM->orderBy( 'availadmin', 'DESC' );
		$languageM->orderBy( 'name', 'ASC' );
		$languagesA = $languageM->load( 'ol', array( 'lgid', 'code', 'name', 'automatic' ) );
		if ( empty($languagesA) ) return false;
		$lang = WGlobals::get( 'googleTranslateMainLg', 'en', 'global' );
		$this->addElement( '', WText::t('1242282416HAQB') );
		$hasAutomatic = false;
		foreach( $languagesA as $oneLang ) {
			if ( !empty($oneLang->automatic) ) {
				$hasAutomatic = true;
				break;
			}		}		
		$useAuto = false;
		foreach( $languagesA as $oneLang ) {
									if ( $hasAutomatic && empty($oneLang->automatic) ) continue;
			$this->addElement( $lang . '|' . $oneLang->code, $oneLang->name );
		}
		return true;
	}
}