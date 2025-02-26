<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_View_model extends WModel {
	function validate() {
		$mainEditC = WClass::get( 'main.edit' );
		if ( ! $mainEditC->checkEditAccess() ) {
			return false;
		}
		$this->core = 0;
		$localYID = ( !empty($this->_yidOrignal) ? $this->_yidOrignal : $this->yid );
								if ( !empty($localYID) ) {
			$librayViewListingM = WModel::get( 'library.view' );
			$librayViewListingM->whereE( 'yid', $localYID );
			$currentParmas = $librayViewListingM->load( 'lr', 'params' );
			$existingParams = new stdClass;
			$existingParams->params = $currentParmas;
			WTools::getParams( $existingParams );
		}		
		if ( !empty($existingParams) ) {
						foreach( $existingParams as $oneKye => $oneP ) {
				if ( !isset( $this->p[$oneKye] ) ) $this->p[$oneKye] = $oneP;
			}		}		
		return true;
	}
	function extra() {
		$extensionHelperC = WCache::get();
		$extensionHelperC->resetCache( 'Views' );
		return true;
	}
	public function copyValidate() {
		$this->_pathOrignal = 0;
				if ( !empty($this->params) ) {
			$copy = new stdClass;
			$copy->params = $this->params;
			WTools::getParams( $copy );
						if ( !empty($copy->phpfile) ) {
				$this->pnamekey = $this->namekey;
				unset( $copy->phpfile );
				$this->params = WTools::setParams( $copy );
				$this->_pathOrignal = 1;	
			}
		}
		$this->_coreOrignal = $this->core;
		$this->_namekeyOrignal = $this->namekey;
		$this->_yidOrignal = $this->yid;
		$this->core = 0;
		$this->custom = 1;
				if ( !empty($this->_pathOrignal) && !empty($this->core) ) {
			$this->pnamekey = $this->namekey;
		}
		return true;
	}
	public function copyExtra() {
		if ( !empty($this->_pathOrignal) ) {
			if ( empty($this->_coreOrignal) ) {
				$path = JOOBI_DS_USER . 'node/';
			} else {
				$path = JOOBI_DS_NODE;
			}
			$folder = WExtension::get( $this->wid, 'folder' );
			$fileNameOrign = $this->_namekeyOrignal . '.php';
			$fileNameDest = $this->namekey . '.php';
			$pathOrignal = $path . $folder . '/view/' . $fileNameOrign;
			$pathDest = JOOBI_DS_USER . 'node/' . $folder . '/view/' . $fileNameDest;
			$fileS = WGet::file();
			$fileS->copy( $pathOrignal, $pathDest );
			WLoadFile( 'design.system.class', JOOBI_DS_NODE );
			$extFileA = WAddon::get( 'design.view' );
			$extendedClass = $extFileA->getExtends( $this->_yidOrignal );
			if ( !empty($extendedClass) ) {
				$originalClass = ucfirst( $folder ) . '_' . ucfirst( $this->_namekeyOrignal ) . '_view';
				$newClass = ucfirst( $folder ) . '_' . ucfirst( $this->namekey ) . '_view';
				$newDeclaration = 'WLoadFile( \'' . $folder . '.view.' . $this->_namekeyOrignal . '\' );';					$newDeclaration .= "\n";
				$newDeclaration .= 'class ' . $newClass . ' extends ' . $originalClass . ' ';
				$content = $fileS->read( $pathDest );
				$posClass = strpos( $content, 'class ' );
				$firstClose = strpos( $content, '{', $posClass );
				$classDeclation = substr( $content, $posClass, $firstClose - $posClass );
				$content = str_replace( $classDeclation, $newDeclaration, $content );
				$fileS->write( $pathDest, $content, 'overwrite' );
			}
		}
		return true;
	}
}