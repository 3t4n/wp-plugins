<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Edit_class extends WClasses {
	function checkEditAccess() {
		if ( WRoles::isAdmin( 'manager' ) ) return true;
		if ( 'edit' == WPref::load( 'PMAIN_NODE_DIRECT_MODIFY' ) ) {
			$access = WPref::load( 'PMAIN_NODE_DIRECT_ACCESS' );
			if ( $access < 1 ) return false;
			if ( ! WRole::hasRole( $access ) ) return false;
			return true;
		}
		return false;
	}
	function checkTranslateAccess() {
		if ( WRoles::isAdmin( 'manager' ) ) return true;
		if ( 'translate' == WPref::load( 'PMAIN_NODE_DIRECT_MODIFY' ) ) {
			$access = WPref::load( 'PMAIN_NODE_DIRECT_ACCESS' );
			if ( $access < 1 ) return false;
			if ( ! WRole::hasRole( $access ) ) return false;
			return true;
		}
		return false;
	}
}