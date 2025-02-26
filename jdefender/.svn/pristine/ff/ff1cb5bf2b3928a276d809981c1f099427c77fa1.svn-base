<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Main_Services_class extends WClasses {
 	public function getCredentials() {
 		$data = new stdClass;
 		$appsInfoC = WCLass::get( 'apps.info' );
 		$data->token = $appsInfoC->getPossibleCode( 'all', 'token' );	
 		if ( empty($data->token) ) {
 			return false;
 		}
 		$data->url = $appsInfoC->myURL();
 		return $data;
 	}
}
