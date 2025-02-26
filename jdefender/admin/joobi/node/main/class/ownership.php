<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Ownership_class extends WClasses {
	protected $modeName = '';
	public function isOwner($eid) {
		if ( empty($eid) ) return false;
				if ( WRole::hasRole( 'admin' ) ) return true;
		return false;
	}
	public function getOwner($showMessage=false) {
		$controller = WGlobals::get( 'controller' );
		if ( empty($controller) ) {
			if ( $showMessage ) $this->codeE( 'The ownership of this element could not be found.' );
		}
		$eid = WGlobals::getEID();
				$exist = WModel::modelExist( $controller, 'sid', null, false );
		if ( !$exist ) return false;
		$modelM = WModel::get( $controller, 'object', null, false );
		$noClass = false;
		if ( empty($modelM) ) {
			if ( $showMessage ) $this->codeE( 'The model does not exist for: ' . $controller );
			$noClass = true;
			return false;
		}
		if ( $modelM->columnExists( 'uid' ) ) {
			$pk = $modelM->getPK();
			$modelM->whereE( $modelM->getPK() , $eid );
			$uid = $modelM->load( 'lr', 'uid' );
		} else {
			if ( $showMessage ) $this->codeE( 'The uid column does not exist for the model: ' . $controller );
			return false;
		}
		$systemF = WGet::file();
		if ( ! $systemF->exist( $controller . '.ownership' ) ) {
			if ( $showMessage ) $this->codeE( 'The ownership class is not defined for the node: ' . $controller );
			return false;
		}
		return $uid;
	}
	public function modelName() {
				if ( !empty($this->modeName) ) {
			$name = WModel::getElementData( 'library.model', $this->modeName, 'name' );
			if ( !empty($name) ) return $name;
		}
				$controller = WGlobals::get( 'controller', '', null, 'task' );
		if ( empty($controller) ) return '';
		$expA = explode( '-', $controller );
		$controller = $expA[0];
		$name = WModel::getElementData( 'library.model', $controller, 'name' );
		if ( !empty($name) ) return $name;
		return '';
	}
}