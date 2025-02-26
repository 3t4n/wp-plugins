<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
 class Wordpress_Menus_tag {	
	public function process($givenTagsA) {
		static $alreadyDoneA = array();
		$replacedTagsA = array();
		foreach( $givenTagsA as $tag => $myTagO ) {
			if ( empty( $myTagO->tag ) ) continue;
			if ( isset($alreadyDoneA[$myTagO->tag]) ) {
				$myTagO->wdgtContent = $alreadyDoneA[$myTagO->tag];
				$replacedTagsA[$tag] = $myTagO;
				continue;
			}
			$alreadyDoneA[$myTagO->tag] = '';
			$myTagO->wdgtContent = JoobiWP::slugToApp( $myTagO->tag );
			$alreadyDoneA[$myTagO->tag] = $myTagO->wdgtContent;
			$replacedTagsA[$tag] = $myTagO;
		}		
		return $replacedTagsA;
	}
}