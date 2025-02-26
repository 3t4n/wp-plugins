<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Checkupdate_scheduler extends Scheduler_Parent_class {
	function process() {
				$refreshC = WClass::get( 'apps.refresh' );
		if ( empty($refreshC) ) return false;
		if ( WExtension::exist( 'main.node' ) ) {
			$mainUpdateC = WClass::get( 'main.update' );
			$mainUpdateC->checkDistribChoice();
		}
		$updateCheck = WPref::load( 'PAPPS_NODE_AUTOCHECKUPDATE' );
				if ( $updateCheck ) {
			$status = $refreshC->checkAppsUpdate( true );
		}
				if ( 9 == $updateCheck ) {
			$mainUpdateC = WClass::get( 'main.update' );
			$mainUpdateC->backgroundPackageDownload();
		}
		return $status;
	}
}