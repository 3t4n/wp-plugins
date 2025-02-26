<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
 class Design_Icon_tag {
	public function process($object) {
		$replacedTagsA = array();
		foreach( $object as $tag => $myTagO ) {
			if ( empty($myTagO) ) continue;
			$iconO = WPage::newBluePrint( 'icon' );
			$allMapA = array( 'icon', 'text', 'size', 'color', 'animation' );
			foreach( $allMapA as $oneP ) {
				if ( isset( $myTagO->$oneP ) ) {
					$iconO->$oneP = $myTagO->$oneP;
				}
			}
			if ( !empty($iconO->animation) ) WPage::renderBluePrint( 'initialize', 'font-awesome-animation' );
			else WPage::renderBluePrint( 'initialize', 'font-awesome' );
			$myTagO->wdgtContent = WPage::renderBluePrint( 'icon', $iconO );
			$replacedTagsA[$tag] = $myTagO;
		}
		return $replacedTagsA;
	}
}