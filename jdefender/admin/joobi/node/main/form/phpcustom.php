<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class WForm_Corephpcustom extends WForms_default {
	private $_externalClass = '';	
	function create() {
		if ( empty($this->element->codeform) ) return false;
		$code = trim( $this->element->codeform );
		if ( empty($code) ) return false;
		$className = 'phpCustom' . $this->element->map;
		$clNAme = "Design_Core" . $className . "_form";
		$startClass = "class " . $clNAme . " extends WForms_default{";
		if ( false === strpos( $this->element->codeform, 'function create' ) ) {
			$lackFct = true;
			$startClass .= "function create() {";
		}		
		$startClass .= $this->element->codeform;
		if ( $lackFct ) $startClass .= "}";
		$startClass .= "}";
		if ( ! class_exists($clNAme) ) eval( $startClass );
		if ( ! class_exists($clNAme) ) return false;
		$this->_externalClass = new $clNAme;
		if ( empty($this->_externalClass) || !is_object($this->_externalClass) ) return false;
		$funtionName = ( isset($this->show) ? 'show' : 'create' );
		if ( method_exists($this->_externalClass, $funtionName ) ) {
								$allProperties = get_object_vars( $this );
			foreach( $allProperties as $key => $properties ) {
				if ( $key[0] != '_' ) {
					if ( isset($this->$key) ) $this->_externalClass->$key = $this->$key;
				}			}
			$this->_externalClass->content = '';
			$contentHTML = $this->_externalClass->$funtionName();
			if ( $contentHTML===true ) {
				$this->content = $this->_externalClass->content;
			} elseif ( $contentHTML===false ) {
				return false;
			}
		} else {
			return false;
		}		
				if ( !empty($this->_externalClass->elementClassPosition) ) $this->elementClassPosition = $this->_externalClass->elementClassPosition;
		return true;
	}
	function show() {
		$this->show = true;
		return $this->create();
	}
}