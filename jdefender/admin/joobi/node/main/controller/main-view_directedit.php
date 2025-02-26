<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_view_directedit_controller extends WController {
function directedit() {
	$pref = WPref::get( 'main.node' );
	$modify = WPref::load( 'PMAIN_NODE_DIRECT_MODIFY' );
	if ( 'edit' == $modify ) {
		$pref->updatePref( 'direct_modify', '' );
	} elseif ( empty($modify) ) {
		$pref->updatePref( 'direct_modify', 'edit' );
	}	
	$extensionHelperC = WCache::get();
	$extensionHelperC->resetCache( 'Preference' );
	return true;
}}