<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
 class Design_Button_tag {
	public function process($object) {
		$replacedTagsA = array();
		foreach( $object as $tag => $myTagO ) {
			if ( empty($myTagO) ) continue;
			$iconO = WPage::newBluePrint( 'button' );
			foreach( $iconO as $key => $oneP ) {
				if ( isset( $myTagO->$key ) ) {
					$iconO->$key = $myTagO->$key;
				}
			}
			$myTagO->wdgtContent = WPage::renderBluePrint( 'button', $iconO );
			$replacedTagsA[$tag] = $myTagO;
		}
		return $replacedTagsA;
	}
}