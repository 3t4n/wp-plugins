<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_View_class extends WClasses {
	public function uncoreView() {
		$eidA = WGlobals::get( true );
		if ( empty( $eidA ) ) return true;
		foreach( $eidA as $oneView ) {
			$this->_unCoreView( $oneView );
		}
	}
	public function recoreView() {
		$eidA = WGlobals::getEID( true );
		if ( empty( $eidA ) ) return true;
		foreach( $eidA as $oneView ) {
			$this->_recoreView( $oneView );
		}
		if ( count($eidA) > 1 ) {
			$this->userS('1408059813TBDS');
		} else {
			$this->userS('1408059813TBDT');
		}
		$this->userS('1420854481TJBT');
	}
	public function reRestoreView() {
		$eidA = WGlobals::getEID( true );
		if ( empty( $eidA ) ) return true;
		foreach( $eidA as $yid ) {
						$this->_reRestoredView( $yid );
		}
		if ( count($eidA) > 1 ) {
			$this->userS('1420854481TJBU');
		} else {
			$this->userS('1420854481TJBV');
		}
	}
	private function _reRestoredView($yid) {
		$folder = WExtension::get( WView::get( $yid, 'wid' ), 'folder' ); 
		$namekey = WView::get( $yid, 'namekey' );
		$vocabExist = WGet::loadData( $folder . '.vocab', 'translation' );
		WText::$vocab = array_merge( WText::$vocab, $vocabExist->translationA );
				$this->_deleteView( $yid );
		$tempdata = WViews::loadDataView( '#' . $folder . '#' . $namekey, false );
		$libraryReaddata = WClass::get( 'library.readdata' );
		$libraryReaddata->populateView( $tempdata );
				$mainViewM = WModel::get( 'main.view' );
				$mainViewM->whereE( 'yid', $yid );
		$mainViewM->setVal( 'core', 1 );
		$mainViewM->update();		
		return true;
	}
	private function _deleteView($yid) {
		$viewsA = array();
		$viewsA[] = 'main.view';
		$viewsA[] = 'main.viewform';
		$viewsA[] = 'main.viewlisting';
		$viewsA[] = 'main.viewmenu';
		$viewsA[] = 'library.viewfilters';
		$viewsA[] = 'view.picklist';
		foreach( $viewsA as $model ) {
			$mainViewM = WModel::get( $model );
						$mainViewM->whereE( 'yid', $yid );
			$mainViewM->deleteAll();
		}	
	}	
	private function _recoreView($yid) {
	$viewsA = array();
	$viewsA[] = 'main.view';
	$viewsA[] = 'main.viewform';
	$viewsA[] = 'main.viewlisting';
	$viewsA[] = 'main.viewmenu';
	foreach( $viewsA as $model ) {
		$mainViewM = WModel::get( $model );
		$mainViewM->whereE( 'yid', $yid );
		if ( in_array( $model, array( 'main.viewform', 'main.viewlisting' ) ) ) $mainViewM->where( 'fdid', '=', 0 );
		$mainViewM->setVal( 'core', 1 );
		$mainViewM->update();
	}
	}
	private function _unCoreView($yid) {
		$viewsA = array();
		$viewsA[] = 'main.view';
		$viewsA[] = 'main.viewform';
		$viewsA[] = 'main.viewlisting';
		$viewsA[] = 'main.viewmenu';
		foreach( $viewsA as $model ) {
			$mainViewM = WModel::get( $model );
			$mainViewM->whereE( 'yid', $yid );
			$mainViewM->setVal( 'core', 0 );
			$mainViewM->update();
		}
	}	
}