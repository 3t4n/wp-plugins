<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class WListing_Corephpcustom extends WListings_default{
	private $_fileName = '';
	private $_extnalFunction = null;
	public function create() {
		$this->listingFunctionName = 'create';
		return $this->_customListing();
	}
	public function createHeader() {
		$this->listingFunctionName = 'createHeader';
		return $this->_customListing();
	}
	public function total() {
		$this->listingFunctionName = 'total';
		return $this->_customListing();
	}
	public function advanceSearch() {
		$this->listingFunctionName = 'advanceSearch';
		return $this->_customListing();
	}
	public function searchQuery(&$model,$element,$searchedTerms=null,$operator=null) {
		$this->listingFunctionName = 'searchQuery';
		if ( $extnalFucntion = $this->_checkFunctionExist() ) {
			return $extnalFucntion->searchQuery( $model, $element, $searchedTerms, $operator );
		}
		return false;
	}
	private function _checkFunctionExist() {
		if ( empty($this->element->codelisting) ) return false;
		$code = trim( $this->element->codelisting );
		if ( empty($code) ) return false;
		$className = 'phpCustom' . $this->element->map;
		$clNAme = "Design_Core" . $className . "_listing";
		$lackFct = false;
		$startClass = "class " . $clNAme . " extends WListings_default{";
		if ( false === strpos( $this->element->codelisting, 'function create' ) ) {
			$lackFct = true;
			$startClass .= "function create() {";
		}		$startClass .= $this->element->codelisting;
		if ( $lackFct ) $startClass .= "}";
		$startClass .= "}";
		if ( ! class_exists($clNAme) ) eval( $startClass );
		if ( ! class_exists($clNAme) ) return false;
		$this->_extnalFunction = new $clNAme;
		if ( !is_object($this->_extnalFunction) || empty($this->_extnalFunction) ) return false;
		if ( method_exists( $this->_extnalFunction, $this->listingFunctionName ) ) {
			return $this->_extnalFunction;
		} else {
			return false;
		}
	}
	private function _customListing() {
		if ( $extnalFucntion = $this->_checkFunctionExist() ) {
						$allProperties = get_object_vars( $this );
			foreach( $allProperties as $key => $properties ) {
				if ( $key[0]!='_' ) {
					$extnalFucntion->$key =& $this->$key;
				}			}
			$extnalFucntion->content = '';
			if ( isset($this->maxIndent) ) $extnalFucntion->maxIndent = $this->maxIndent;
			$functionName = $this->listingFunctionName;
			$contentHTML = $extnalFucntion->$functionName();
			if ( isset($extnalFucntion->element->lien) ) $this->element->lien = $extnalFucntion->element->lien;
			if ( $contentHTML===true  ) {
				$this->content = $extnalFucntion->content;
			} elseif ( $contentHTML===false ) {
				return false;
			} else {					$this->content = ( !empty($contentHTML) ) ? $contentHTML : $extnalFucntion->content;
			}
			if ( !empty($this->content) && !is_string($this->content) ) {
				return;
			}
		}
		return ( $this->listingFunctionName =='total' ) ? $this->content : true;
	}
}