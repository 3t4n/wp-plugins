<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_cache_delete_controller extends WController {
	function delete() {
		$FOLDER=WGlobals::get('folder');  
		$FOLDERClass = WGet::folder(); 	
		if (is_string($FOLDER) && !empty($FOLDER) ) {
			if ($FOLDERClass->delete( WApplication::cacheFolder() . '/' . $FOLDER ) ) {
				$mess = WMessage::get();
				$mess->userS('1420121260PTWF',array('$FOLDER'=>$FOLDER));
			}
		}
		WPages::redirect( 'controller=main-cache&task=listing' );			
		return true;
	}
}