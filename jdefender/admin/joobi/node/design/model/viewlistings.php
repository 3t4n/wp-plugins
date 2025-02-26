<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_Viewlistings_model extends WModel {
function addValidate() {
	static $namekeyA = array();
	if ( empty($this->namekey) ) {
		$namekey = WView::get( $this->yid, 'namekey' );
		if ( empty($namekey) ) return false;
		$map = ( !empty($this->map) ? $this->map : rand( 11111, 99999 ) );
		$namekey .= '_' . $map;
		$this->namekey = $namekey;
	}
	if ( isset($namekeyA[$this->namekey]) ) {
		$this->namekey .= '_uqk' . rand( 11111, 99999 );
	}	
	$namekeyA[$this->namekey] = true;
	return true;
}
function validate() {
	$YIDRolid = WView::get( $this->yid, 'rolid' );
	$roleC = WRole::get();
	$acceptedR = $roleC->compareRole( $this->rolid, $YIDRolid );
	if ( ! $acceptedR ) $this->rolid = $YIDRolid;
	return true;
}
}