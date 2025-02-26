<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Controllername_filter {
function create() {
	$controllerName = WGlobals::get( 'appuse' );
	if ( !empty($controllerName) ) {
		WGlobals::setSession( 'securityVisitReport', 'ctridname', $controllerName );
	} else {
		$controllerName = WGlobals::getSession( 'securityVisitReport', 'ctridname' );
	}
	if ( empty($controllerName) ) return 0;
	$tempdata = WController::ooController( $controllerName, '', false, false );
	if ( !empty( $tempdata->ctrid ) ) return $tempdata->ctrid;
	return 0;
}}