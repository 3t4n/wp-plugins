<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Countries_Listpublishedcountries_picklist extends WPicklist {
function create() {
	$countriesHelperC = WClass::get( 'countries.helper', null, 'class', false );
	if ( empty($countriesHelperC) ) return false;
	$countries = $countriesHelperC->getPicklistDataA( $this->onlyOneValue(), $this->defaultValue );
	if ( $this->onlyOneValue() ) {
		if ( empty($countries[0]->name) ) return true;
		$img = '';
		$countryName = $countries[0]->name;
		$iptrackerInstalled = WExtension::exist( 'security.node' );
		if ( $iptrackerInstalled && WGlobals::checkCandy(50) ) {
			$flagPath = JOOBI_URL_MEDIA .'images/flags/'. strtolower( $countries[0]->isocode2 ).'.gif';
			$img = '<img alt="' . WGlobals::filter( $countryName, 'string' ) . '" src="' . $flagPath . '"> ';
		}
		$this->addElement( $countries[0]->ctyid, $img . $countryName );
		return true;
	}
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
}
	function displayOne() {
		return true;
	}
}