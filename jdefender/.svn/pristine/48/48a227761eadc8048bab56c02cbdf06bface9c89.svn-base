<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_blockpage_controller extends WController {
	function blockpage() {
				$mess = WMessage::get();
		$jbiMess = $mess->getM();
		if ( !empty($jbiMess) ) {
			echo $jbiMess;
		} else {
			$userMessage = WGlobals::getSession( 'security', 'blockMessage', '' );
			if ( !empty($userMessage) ) {
				echo $userMessage;
			}		}
		WGlobals::setSession( 'security', 'blockMessage', '' );
		return true;
	}	
}