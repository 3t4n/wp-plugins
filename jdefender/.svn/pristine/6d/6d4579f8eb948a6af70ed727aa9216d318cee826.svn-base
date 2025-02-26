<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Country_picklist extends WPicklist {
function create() {
	$countriesHelperC = WClass::get( 'countries.helper', null, 'class', false );
	if ( empty($countriesHelperC) ) return false;
	$countries = $countriesHelperC->getPicklistDataA( $this->onlyOneValue(), $this->defaultValue );
	if ( !empty($countries) ) {
		$firstLetter = null;
		foreach( $countries as $country ) {
			$countryID = $country->ctyid;
			$countryName = $country->name;
			$countryCode = $country->isocode2;
			if ( WGlobals::checkCandy(50) ) {
				$flagPath = JOOBI_URL_MEDIA .'images/flags/'. strtolower( $countryCode ).'.gif';
				$obj = new stdClass;
				$obj->style = 'background: url('. $flagPath .') no-repeat scroll 0% 0% transparent;text-indent:5px;margin-top:5px;margin-bottom:5px;padding-left:20px;';
				$this->addElement( $countryID, $countryName, $obj );
			} else {
				$this->addElement( $countryID, $countryName );
			}
		}
		return true;
	} else return false;
}}