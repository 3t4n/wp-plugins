<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Countries_List_picklist extends WPicklist {
function create() {
	$countriesHelperC = WClass::get( 'countries.helper', null, 'class', false );
	if ( empty($countriesHelperC) ) return false;
	$countries = $countriesHelperC->getPicklistDataA( $this->onlyOneValue(), $this->defaultValue );
	$this->addElement( 0, WText::t('1428415779LUNN') );
	if ( !empty($countries) ) {
		$firstLetter = null;
		$iptrackerInstalled = WExtension::exist( 'security.node' );
		$controller = WGlobals::get( 'controller' );
		if ( $iptrackerInstalled
		&& WRoles::isNotAdmin( 'manager' )
		&& WGlobals::checkCandy(50)
		) {
			$iptrackerLookupC = WClass::get( 'security.lookup' );
			$localCTYID = $iptrackerLookupC->ipInfo( null, 'ctyid' );
			if ( !empty($localCTYID) ) $this->setDefault( $localCTYID );
		}
		foreach( $countries as $country ) {
			$countryID = $country->ctyid;
			$countryName = $country->name;
			$countryCode = $country->isocode2;
			if ( $iptrackerInstalled ) {
				$flagPath = JOOBI_URL_MEDIA .'images/flags/'. strtolower( $countryCode ).'.gif';
					$objFlag = new stdClass;
					$objFlag->style = "background: url('" . $flagPath . "') no-repeat scroll 0% 0% transparent;text-indent:5px;margin-top:5px;margin-bottom:5px;padding-left:20px;";
					$this->addElement( $countryID, $countryName, $objFlag );
			} else {
				$this->addElement( $countryID, $countryName );
			}
		}
		return true;
	} else return false;
}}