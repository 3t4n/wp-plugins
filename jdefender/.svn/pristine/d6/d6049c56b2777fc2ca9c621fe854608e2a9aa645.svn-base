<?php 
/** @copyright Copyright (c) 2007-2016 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_CoreLanguage_module extends WModule {
function create() {
	if ( isset($this->ipcss) ) WPage::addCSSScript( $this->ipcss );
	$showCountryName = ( isset( $this->ipctyname ) && $this->ipctyname == 1 ) ? true : false;
	$showLanguageName = ( isset( $this->iplangname ) && $this->iplangname == 1 ) ? true : false;
	$showCountryLink = ( isset( $this->ipctyredirect ) && $this->ipctyredirect == 1 ) ? true : false;
	$showLanguageLink = ( isset( $this->iplangredirect ) && $this->iplangredirect == 1 ) ? true : false;
	$showLanguageLink = ( isset( $this->iplangredirect ) && $this->iplangredirect == 1 ) ? true : false;
	$showLanguagePicklist = ( isset( $this->ippicklist ) && $this->ippicklist == 1 ) ? true : false;
	$showLanguagePicklistLink = ( isset( $this->ippicklistredirect ) && $this->ippicklistredirect == 1 ) ? true : false;
	$ipmoduleObj = new stdClass;
	$ipmoduleObj->showCountryName = $showCountryName;
	$ipmoduleObj->showLanguageName = $showLanguageName;
	$ipmoduleObj->showCountryLink = $showCountryLink;
	$ipmoduleObj->showLanguageLink = $showLanguageLink;
	$ipmoduleObj->showLanguagePicklist = $showLanguagePicklist;
	$ipmoduleObj->showLanguagePicklistLink = $showLanguagePicklistLink;
	$display = '<div class="clearfix">' . $this->_showDisplay( $ipmoduleObj ) . '</div>';
	$this->content = $display;
	return true;
}
function _showDisplay($ipmoduleObj) {
	$showCountryName = ( isset( $ipmoduleObj->showCountryName ) ) ? $ipmoduleObj->showCountryName : false;
	$showLanguageName = ( isset( $ipmoduleObj->showLanguageName ) ) ? $ipmoduleObj->showLanguageName : false;
	$showCountryLink = ( isset( $ipmoduleObj->showCountryLink ) ) ? $ipmoduleObj->showCountryLink : false;
	$showLanguageLink = ( isset( $ipmoduleObj->showLanguageLink ) ) ? $ipmoduleObj->showLanguageLink : false;
	$showLanguagePicklist = ( isset( $ipmoduleObj->showLanguagePicklist ) ) ? $ipmoduleObj->showLanguagePicklist : false;
	$showLanguagePicklistLink = ( isset( $ipmoduleObj->showLanguagePicklistLink ) ) ? $ipmoduleObj->showLanguagePicklistLink : false;
	$HTML = null;
	$ipInfoO = WGlobals::getSession( 'secureip', 'localization', null );
	if ( !empty( $ipInfoO ) ) {
		$ctyCode = ( isset( $ipInfoO->country->isocode2 ) ) ? $ipInfoO->country->isocode2 : null;
		if ( !empty($ctyCode) ) {
			$ctyName = ( isset( $ipInfoO->country->name ) ) ? $ipInfoO->country->name : null;
			$ip = ( isset( $ipInfoO->ip ) ) ? $ipInfoO->ip : '0.0.0.0';
			$caption = WText::t('1206961922ESPA'). ' : ';
			$caption .= $ctyName .' ( '. $ctyCode .' ) ( '. $ip .' )';
			$imgPath = JOOBI_URL_MEDIA .'images/flags/'. strtolower( $ctyCode ).'.gif';
			$img = '<img src="'. $imgPath .'" title="'. WGlobals::filter( $caption, 'string' ) .'"> ';
			if ( $showCountryName ) $img .=  $ctyName;
		} else $img = null;
		$ctyID = ( isset( $ipInfoO->country->ctyid ) ) ? $ipInfoO->country->ctyid : 0;
		$langID = ( isset( $ipInfoO->language[0]->lgid ) ) ? $ipInfoO->language[0]->lgid : 0;
		if ( $showCountryLink ) {
			$url = $this->_getFlagUrl( $ctyID, $langID );
			if ( !empty( $url ) ) $img = '<a href="'. $url .'">'. $img .'</a>';
		}
		$HTML .= ' <div class="ipinfo">'. $img .'</div>';
	}
	$langCode = WGlobals::getSession( 'iptrack', 'langcodeused', null );
	if ( !empty( $langCode ) ) {
		$langCodeA = explode( '-', $langCode );
		static $ipClass = null;
		if ( empty($ipClass) ) $ipClass = WClass::get( 'security.lookup' );
		$langName = $ipClass->getLanguageData( $langCodeA[0], 'code', 'name', 'lr', 'languages', true, true );
		$caption = WText::t('1206732405TIXE'). ' : ';
		$caption .= $langName .' ( '. strtoupper( $langCodeA[0] ) .' )';
		$imgPath = JOOBI_URL_MEDIA .'images/flags/'. strtolower( $langCodeA[1] ).'.gif';
		$img = '<img src="'. $imgPath .'"> ';
		if ( $showLanguageName ) $img .=  $langName;
		if ( $showLanguageLink ) {
			$url = $this->_getFlagUrl( $langCodeA[1], $langCodeA[0] );
			if ( !empty( $url ) ) $img = '<a href="'. $url  .'">'. $img .'</a>';
		}
		$HTML .= ' <div class="langinfo" title="'. $caption .'">'. $img .'</div>';
	}
	if ( $showLanguagePicklist ) {
		if ( empty($ipClass) ) $ipClass= WClass::get( 'security.lookup' );
	}
	return $HTML;
}
function _getFlagUrl($ctyCode,$langCode) {
	$url = null;
	static $ipClass = null;
	if ( empty($ipClass) ) $ipClass = WClass::get( 'security.lookup' );
	$langID = ( !is_numeric( $langCode ) ) ? $ipClass->getLanguageData( $langCode, 'code', 'lgid', 'lr', 'languages', 'code', true ) : $langCode;
	$ctyID = ( !is_numeric( $ctyCode ) ) ? $ipClass->getLanguageData( $ctyCode, 'isocode2', 'ctyid', 'lr', 'countries', 'isocode2', true ) : $ctyCode;
	if ( empty( $langID ) || empty( $ctyID ) ) return null;
	static $result = array();
	if ( !isset( $result[$langID][$ctyID] ) ) {
		static $ctyLangM = null;
		if ( empty($ctyLangM) ) $ctyLangM = WModel::get( 'countries.language' );
		$ctyLangM->whereE( 'lgid', $langID );
		$ctyLangM->whereE( 'ctyid', $ctyID );
		$result[$langID][$ctyID] = $ctyLangM->load( 'lr', 'url' );
	}
	$url = ( isset( $result[$langID][$ctyID] ) ) ? $result[$langID][$ctyID] : null;
	return $url;
}
}
