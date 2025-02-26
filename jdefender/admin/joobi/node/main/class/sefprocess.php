<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Sefprocess_class extends WClasses {
	public function loadEntryFromController($eid,$controller,$task,$lgid=0) {
		$mainSEFM = WModel::get( 'main.sef' );
		$mainSEFM->whereE( 'lgid', $lgid );
		$mainSEFM->whereE( 'controller', $controller );
		$mainSEFM->whereE( 'task', $task );
		$mainSEFM->whereE( 'eid', $eid );
		$namekey = $mainSEFM->load( 'lr', 'namekey' );
		return $namekey;
	}	
	public function saveSEFEntry($eid,$SHORTLINK,$controller,$task,$lgid=0) {
				$SHORTLINK = str_replace( ':', '-', $SHORTLINK );
		if ( empty($lgid) ) $lgid = WUsers::get( 'lgid' );
		$shortO = WModel::getElementData( 'main.sef', $SHORTLINK, 'data', $lgid );
		if ( empty( $shortO ) ) {
						$mainSEFM = WModel::get( 'main.sef' );
			$mainSEFM->whereE( 'lgid', $lgid );
			$mainSEFM->whereE( 'controller', $controller );
			$mainSEFM->whereE( 'task', $task );
			$mainSEFM->whereE( 'eid', $eid );
			$namekey = $mainSEFM->load( 'lr', 'namekey' );
			if ( empty($namekey) ) {
								$mainSEFM->setVal( 'lgid', $lgid );
				$mainSEFM->setVal( 'controller', $controller );
				$mainSEFM->setVal( 'task', $task );
				$mainSEFM->setVal( 'eid', $eid );
				$mainSEFM->setVal( 'namekey', $SHORTLINK );
				$mainSEFM->insertIgnore();
			} else {
				$mainSEFM->whereE( 'lgid', $lgid );
				$mainSEFM->whereE( 'controller', $controller );
				$mainSEFM->whereE( 'task', $task );
				$mainSEFM->whereE( 'eid', $eid );
				$mainSEFM->setVal( 'namekey', $SHORTLINK );
				$mainSEFM->update();
				return false;
			}			
		} else {
						if ( $shortO->eid == $eid 
				&& $shortO->lgid == $lgid 
				&& $shortO->controller == $controller 
				&& $shortO->task == $task 
			) {
								return false;
			} else {
												$NEW_SHORTLINK = $SHORTLINK . '_' . time();
				$this->userW('1471447746HYWD',array('$SHORTLINK'=>$SHORTLINK,'$NEW_SHORTLINK'=>$NEW_SHORTLINK));
				return $NEW_SHORTLINK;
			}			
		}		
		return false;
	}
}