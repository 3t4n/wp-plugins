<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Countries_Helper_class extends WClasses {
	public function getPicklistDataA($oneValue=false,$default=0) {
		static $countriesM=null;
		if ( empty($countriesM) ) $countriesM = WModel::get( 'countries' );
		if ( $oneValue )  {
			$countriesM->whereE( 'ctyid', $default );
		} else {
			$countriesM->whereE( 'publish', 1 );
			$countriesM->where( 'isocode3', '!=', '' );
			$countriesM->rememberQuery( true, 'Model_country_node' );
			$countriesM->orderBy( 'ordering' );
			$countriesM->orderBy( 'name' );
		}
		$countriesA = $countriesM->load( 'ol', array( 'ctyid', 'name', 'isocode2', 'namekey' ) );
		return $countriesA;
	}
	public function getData($ctyid,$return='object') {
		if ( empty( $ctyid ) || !is_numeric( $ctyid ) ) return false;
		if ( !is_string( $return ) && !is_array( $return ) ) return false;
		static $countriesInfo = array();
		if ( empty( $countriesInfo[ $ctyid ] ) ) {
			$countryM = WModel::get( 'countries' );
			$countriesInfo[ $ctyid ] = $countryM->loadMemory( $ctyid );
		}
		if ( !empty( $countriesInfo[ $ctyid ] ) && !empty( $return ) && is_array( $return ) ) {
			$info = null;
			$country = $countriesInfo[ $ctyid ];
			foreach( $return as $prop ) {
				$info->$prop = ( !empty( $country->$prop ) ) ? $country->$prop : '';
			}
			return $info;
		}
		if ( $return == 'object' ) return $countriesInfo[ $ctyid ];
		elseif ( is_string( $return ) && !empty( $countriesInfo[ $ctyid ]->$return ) ) return  $countriesInfo[ $ctyid ]->$return;
		else return null;
	}
	public function getCountryByCode($isoCode2) {
		return $this->_loadCountriesFromCode( $isoCode2 );
	}
	private function _loadCountriesFromCode($isoCode2) {
		static $reulstA = array();
		if ( !isset($reulstA[$isoCode2]) ) {
			$countryM = WModel::get( 'countries' );
			$countryM->remember( $isoCode2, true, 'Model_country_node' );
			$countryM->whereE( 'isocode2', $isoCode2 );
			$reulstA[$isoCode2] = $countryM->load( 'o' );
		}
		return $reulstA[$isoCode2];
	}
	public function getCountryID($isoCode2) {
		$myCountryO = $this->_loadCountriesFromCode( $isoCode2 );
		if ( !empty($myCountryO) ) return $myCountryO->ctyid;
		return null;
	}
	public function getCountryFlag($ctyid,$link=false,$showCountryName=false) {
		if ( empty($ctyid) ) return '';
		if ( ! WExtension::exist( 'security.node' ) || WGlobals::checkCandy(50,true) ) return '';
		$contryDataO = $this->getData( $ctyid );
		if ( empty($contryDataO) ) return '';
		$name = WGlobals::filter( $contryDataO->name, 'string' );
		$html = '<img hspace="5" align="absmiddle" title="' . $name . '" src="'. JOOBI_URL_MEDIA .'images/flags/' .strtolower($contryDataO->isocode2).'.gif">';
		if ( $showCountryName ) $html .= ' &nbsp;' . $name;
		$html .= ' &nbsp;';
		return $html;
	}
}