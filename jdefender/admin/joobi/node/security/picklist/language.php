<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Language_picklist extends WPicklist {
	function create() {
		if ( $this->onlyOneValue() ) {
			$this->addElement( $this->defaultValue, WLanguage::get( $this->defaultValue, 'name' ) );
			return true;
		}		
		$ListOfLanguages = WGlobals::getSession( 'ListOfLanguages', 'joomfish',  null );
		if ( !empty( $ListOfLanguages ) ) {
			$code = WGlobals::get( 'code', null );
			if ( empty($code) ) $code = WGlobals::getSession( 'JoobiUser', 'langcodeused', null );
			if ( !empty($code) ) {
				$this->setDefault( $code, true );
			}
			static $languageCodeA = array();
			static $countryCodeA = array();
			foreach( $ListOfLanguages as $language ) {
				$langCodeA = explode( '-', $language->code );
				$languageCodeA[] = $langCodeA[0];
				$countryCodeA[] = $langCodeA[1];
			}
			$languageCodeA = array_unique($languageCodeA);
			$countryCodeA = array_unique($countryCodeA);
			static $ipClass = null;
			if ( empty($ipClass) ) $ipClass = WClass::get( 'security.lookup' );
			$languageNameA = $ipClass->getLanguageData( $languageCodeA, 'code', 'name', 'lra', 'languages', 'code', true );
			if ( empty($ipClass) ) $ipClass = WClass::get( 'security.lookup' );
			$countryNameA = $ipClass->getLanguageData( $countryCodeA, 'isocode2', 'name', 'lra', 'countries', 'isocode2', true );
			foreach( $ListOfLanguages as $language ) {
				$langCodeA = explode( '-', $language->code );
				$code = $langCodeA[0];
				$country = $langCodeA[1];
				$flag = $language->flag;
				$this->addElement( $language->code, $languageNameA[$code] .' ('. $countryNameA[$country] .')', 'style="background: url('. $flag .') no-repeat scroll 0% 0% transparent;text-indent:20px;"' );
			}
		} else {
			$lgid = WGlobals::get( 'lgid' );
			if ( empty($lgid) ) {
				$code = WGlobals::get( 'lang' );
				static $ipClass = null;
				if ( empty($ipClass) ) $ipClass = WClass::get( 'security.lookup' );
				$valueA = $ipClass->getLanguageData( $code, 'code', 'lgid' );
				if ( !empty($valueA) ) $lgid = $valueA[0];
			}			
			if ( !empty($lgid) ) $this->setDefault( $lgid, true );
			$allLang = WApplication::availLanguages( array('lgid','name','code','real'), 'site' );
			if ( !empty($allLang) ) {
				foreach($allLang as $oneLang) {
					$lgid = $oneLang->lgid;
					$code = $oneLang->code;
					$name = $oneLang->name;
					$this->addElement( $lgid, $name );
				}
			} else {
				return false;
			}
		}
		return true;
	}}