<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_module_query_controller extends WController {
	function query() {
			$dbgqry = WPref::load( 'PLIBRARY_NODE_DBGQRY' );
		$pref = WPref::get( 'library.node' );
		$pref->updateUserPref( 'dbgqry', ! $dbgqry );
		WPages::redirect( 'previous' );
		return true;
	}
}