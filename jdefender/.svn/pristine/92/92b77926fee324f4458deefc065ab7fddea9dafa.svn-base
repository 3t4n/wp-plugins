<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
 class Main_Alias_tag {
 	private $_namekeyA = array();
	public function process($object) {
		static $count=1;
		$this->_namekeyA = array();
		$this->_reverseNamekeyA = array();
		$namekeyToTagA = array();
				foreach( $object as $tag => $parameters ) {
			$tmp = trim( $tag, '{}');
			$explodeA = explode( '|', $tmp );
			if ( !empty($explodeA[1]) ) {
				$id = trim($explodeA[1]);
				if ( 'name=' == substr( $id, 0, 5 ) ) $id = substr( $id, 5 );
				$id = str_replace( '"', '', $id );
				$this->_namekeyA[$tag] = $id;
				$this->_reverseNamekeyA[$id] = $tag;
				$parameters->key = $id;
				$namekeyToTagA[$id] = $tag;
			}
		}
		if ( empty($this->_namekeyA) ) {
			return $this->_returnTagsValues( $object );
		}
		$outputWidgetsC = WClass::get( 'output.widgets' );
		$allWidgetsA = $outputWidgetsC->loadWidgetsFromNamekey( $this->_namekeyA );
		$replacedTagsA = array();
		if ( empty($allWidgetsA) ) return $this->_returnTagsValues( $object );
		$tagProcessC = WClass::get( 'output.process' );
		$skipPropertyA = array( 'useajax', '' );
		foreach( $allWidgetsA as $key => $myTagO ) {
			$myObj = new stdClass();
			if ( !empty($myTagO->params) ) {
				$myObj->params = $myTagO->params;
				WTools::getParams( $myObj );
			}			
			$tagParamString = '|widgetID=' . $myTagO->widgetid;
			foreach( $myObj as $k => $v ) {
								if ( 'useajax' == $k ) continue;
				$myTagO->$k = $v;
				$tagParamString .= '|' . $k . '=' . $v;
			}			
			$name = explode( '.', $myTagO->namekey );
						$convertedTag = '{widget:' . $name[1] . $tagParamString . '}';
			$tagC = WClass::get( 'output.process' );
			$tagC->replaceTags( $convertedTag );
			$myTagO->wdgtContent = $convertedTag;
			if ( isset($this->_reverseNamekeyA[$myTagO->namekeyWidget]) ) $tag = $this->_reverseNamekeyA[$myTagO->namekeyWidget];
			else continue;
			$replacedTagsA[$tag] = $myTagO;
		}
		return $replacedTagsA;
	}
	private function _returnTagsValues($object,$resultA=array()) {
		$tagsA = array();
		foreach( $object as $tag => $parameters ) {
			if ( !empty( $this->_namekeyA[$tag] ) ) {
				$namekey = $this->_namekeyA[$tag];
				if ( !empty($resultA[$namekey]) ) {
					$tagsA[$tag] = $resultA[$namekey];
				} else {
					$parameters->wdgtContent = '';
					$tagsA[$tag] = $parameters;
				}
			} else {
				$parameters->wdgtContent = '';
				$tagsA[$tag] = $parameters;
			}
		}		
		return $tagsA;
	}
}