<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Design_Export_class extends WClasses {
	private $_sid = 0;
	private $_ln = "\n";
	private $_tab = "\t";
	private $_specialColumnA = array(
		'namekey'
		,'modified'
		,'created'
		,'rolid'
		,'type'
		,'uid'
		,'author'
		,'modifiedby'
		,'parent'
		,'filid'
		,'lgid'
	);
	private $_dontExportA = array( 'fromlgid', 'auto' );
	private $_FKcolumnsNameA = array();
	private $_FKcolumnsSIDA = array();
	private $_columnsReadableA = array();
	private $_columnsFieldTypeA = array();
	private $_pk = '';
	private $_multiLang = false;
	public function countElements($sid) {
		if ( empty($sid) ) return false;
		$exportModelM = WModel::get( $sid );
		if ( $exportModelM->columnExists( 'rolid' ) ) $exportModelM->checkAccess();
		$count = $exportModelM->total();
		WGlobals::setSession( 'designExport', 'total', $count );
		if ( empty( $count ) ) return false;
		else return $count;
	}
	public function processExport($sid,$start,$maxElementExport) {
		$this->_sid = $sid;
		$modelM = WModel::get( $sid );
		$this->_pk = $modelM->getPK();
		if ( $modelM->columnExists( 'rolid' ) ) $modelM->checkAccess();
		$designImexportC = WClass::get( 'design.imexport' );
		$columnsA = $designImexportC->allColumns2ProcessA( $sid );
		$this->_multiLang = WPref::load( 'PLIBRARY_NODE_MULTILANG' );
		$transExist = false;
		if ( ! $this->_multiLang ) {
			$transNamekey = WModel::get( $this->_sid, 'namekey' ) . 'trans';
			$transExist = WModel::modelExist( $transNamekey );
			if ( $transExist ) {
				$modelM->makeLJ( $transNamekey, $this->_pk );
				$modelM->whereLanguage();
				$modelM->select( '*', 1 );
			}
		}
		if ( !empty($columnsA) ) $modelM->select( $columnsA );
		else $modelM->select( '*' );
		$modelM->setLimit( $maxElementExport, $start );
		$dataA = $modelM->load( 'ol' );
		if ( empty( $dataA ) ) {
			$this->_closeFile();
			return false;
		}
		$designImexportC->getPKColumnsA( $this->_FKcolumnsNameA, $this->_FKcolumnsSIDA, $columnsA, $this->_pk );
		$transNamekey = WModel::get( $this->_sid, 'namekey' ) . 'trans';
		if ( $this->_multiLang ) $transModelM = WModel::get( $transNamekey );
		$pk = $this->_pk;
		$this->_columnsReadableA = $designImexportC->getReadableA( $this->_sid );
		$this->_columnsFieldTypeA = $designImexportC->getFieldTypeA( $this->_sid );
		foreach( $dataA as $item ) {
			if ( $this->_multiLang ) {
				$transModelM->whereE( $pk, $item->$pk );
				$item->$transNamekey = $transModelM->load( 'ol' );
			}
			$pk = $this->_pk;
			$eid = $item->$pk;
			$this->_getChildModelsData( $item, $this->_sid, $eid, $transNamekey );
		}
		$string = $this->_convertIntoXML( $dataA );
		if ( !empty($string) ) {
			$this->_saveIntoFile( $string );
		}
		$max = WGlobals::getSession( 'designExport', 'total', 0 );
		if ( ( $start + $maxElementExport ) > $max ) {
			$this->_closeFile();
			return false;
		} else {
			return true;
		}
	}
	private function _getChildModelsData(&$item,$sid,$eid,$dontProcess='') {
		static $otherModelA = array();
		$mainModelM = WModel::get( $sid );
		$pk = $mainModelM->getPK();
		if ( !isset($otherModelA[$sid]) ) {
			$namekey = WModel::get( $sid, 'namekey' );
			$dbtid = WModel::get( $sid, 'dbtid' );
			$libraryForeignM = WModel::get( 'library.foreign', 'object' );
			$libraryForeignM->makeLJ( 'library.table', 'dbtid', 'dbtid', 0, 1 );
			$libraryForeignM->makeLJ( 'library.model', 'dbtid', 'dbtid', 1, 2 );
			$libraryForeignM->where( 'dbtid', '!=', $dbtid );
			$libraryForeignM->whereE( 'ref_dbtid', $dbtid );
			$libraryForeignM->where( 'map2', '=', $pk );
			$libraryForeignM->where( 'namekey', 'LIKE', "$namekey%", 2 );
			if ( !empty($dontProcess) ) $libraryForeignM->where( 'namekey', '!=', $dontProcess, 2 );
			$libraryForeignM->select( 'namekey', 2, 'modelNamekey' );
			$libraryForeignM->select( 'sid', 2 );
			$libraryForeignM->groupBy( 'sid', 2 );
			$otherModelA[$sid] = $libraryForeignM->load( 'ol', array( 'dbtid', 'map', 'map2' ) );	
		}
		if ( empty( $otherModelA[$sid] ) ) return;
		foreach( $otherModelA[$sid] as $FKInfoO ) {
			$map = $FKInfoO->map2;
			$fkM = WModel::get( $FKInfoO->sid );
			$fkM->whereE( $map, $item->$map );
			$inofA = $fkM->load( 'ol' );
			if ( !empty( $inofA ) ) {
				$property = $FKInfoO->modelNamekey;
				$item->$property = $inofA;
			}
		}
	}
	private function _generateXmlFromArray($dataA,$nodeName,$indent=1) {
		$xml = '';
		if ( is_array($dataA) || is_object($dataA) ) {
			$indent++;
			$count = count( $dataA );
			foreach ( $dataA as $key => $value ) {
				if ( is_array($value) ) {
					if ( is_numeric($key) ) $key = $nodeName;
					$tag = $key . 's';
					$extra = $this->_ln;
				} else {
					if ( is_numeric($key) ) {
						$key = $nodeName;
						$tag = $key;
					} else {
						if ( isset($this->_columnsReadableA[$key]) ) {
							$tag = $this->_columnsReadableA[$key];
						} else {
							$tag = $key;
						}
					}
					$extra = '';
				}
				if ( is_numeric($key) ) {
				} else {
					if ( ! $this->_multiLang && 'lgid' == $key ) continue;
					if ( in_array( $key, $this->_dontExportA ) ) continue;
					if ( in_array( $key, $this->_FKcolumnsSIDA ) ) {
						$value = WModel::getElementData( $this->_FKcolumnsNameA[$key], $value, 'namekey' );
					} else {
						$value = $this->_checkOnSpecialColumn( $key, $value );
					}
				}
				if ( $indent > 1 && $key == $this->_pk ) continue;
				$xmlTabs = '';
				for ( $i = 0; $i < $indent; $i++ ) {
					$xmlTabs .= $this->_tab;
				}
				$xml .= $xmlTabs;
				$extraTabs = ( !empty($extra) ? $xmlTabs : '' );
				$xml .= '<' . $tag . '>' . $extra . $this->_generateXmlFromArray( $value, $key, $indent ) . $extraTabs . '</' . $tag . '>' . $this->_ln;
			}
		} else {
			$xml = htmlspecialchars( $dataA, ENT_QUOTES );
		}
		return $xml;
	}
	private function _checkOnSpecialFieldType($key,$value) {
		if ( empty($value) ) return $value;
		if ( isset($this->_columnsFieldTypeA[$key]) ) {
			$keyA = explode( '.', $this->_columnsFieldTypeA[$key] );
			$designImexportC = WClass::get( 'design.imexport' );
			$instance = $designImexportC->loadFormElement( $keyA[0], $keyA[1] );
			if ( method_exists( $instance, 'exportConversion' ) ) return $instance->exportConversion( $value );
			return $value;
		} else {
			return $value;
		}
	}
	private function _checkOnSpecialColumn($key,$value) {
		if ( ! in_array( $key, $this->_specialColumnA ) ) return $this->_checkOnSpecialFieldType( $key, $value );
		switch( $key ) {
			case 'created':
			case 'modified':
				if ( !empty($value) ) $value = WApplication::date( WTools::dateFormat( 'time-unix' ), $value );
				break;
			case 'rolid':
				$value = WRole::getRole( $value, 'namekey' );
				break;
			case 'uid':
			case 'author':
			case 'modifiedby':
				$value = WUser::get( $value, 'email' );
				break;
			case 'parent':
				$value = WModel::getElementData( $this->_sid, $value, 'namekey' );
				break;
			case 'filid':
				$filesHelperC = WClass::get( 'files.helper' );
				$value = $filesHelperC->getPath( $value, true, false );
				break;
			case 'lgid':
				$value = WLanguage::get( $value, 'code' );
				break;
			default:
				$value = $value;
				break;
		}
		return $value;
	}
	private function _convertIntoXML($dataA) {
		$xml = '';
		$namekey = WModel::get( $this->_sid, 'namekey' );
		foreach( $dataA as $d ) {
			$arr = get_object_vars( $d );
			$xml .= $this->_tab . '<item>' . $this->_ln;
			$xml .= $this->_generateXmlFromArray( $arr, $namekey, 1 );
			$xml .= $this->_tab . '</item>' . $this->_ln;
		}
		return $xml;
	}
	public function getExportURL() {
		$fileName = WGlobals::getSession( 'designExport', 'filename' );
		$link = str_replace( JOOBI_DS_ROOT, '', $fileName );
		return JOOBI_SITE . $link;
	}
	private function _closeFile() {
		$namekey = WModel::get( $this->_sid, 'namekey' );
		$fileName = $this->_getFileName();
		$xml = '</items>' . $this->_ln;
		$xml .= '</sitename>' . $this->_ln;
		$fileS = WGet::file();
		$fileS->write( $fileName, $xml, 'append' );
	}
	private function _getFileName() {
		$fileName = WGlobals::getSession( 'designExport', 'filename' );
		if ( empty( $fileName ) ) {
			$namekey = WModel::get( $this->_sid, 'namekey' );
			$fileName = 'export_' . str_replace( '.', '_', $namekey ) . '_' . time() . '.xml';
			$radom = WTools::randomString( 100 );
			$radom = WGlobals::filter( $radom, 'path' );
			$radom = substr( $radom, 0, 70 );
			$path = JOOBI_DS_EXPORT . $radom . '/';	
			$fileName = $path . $fileName;
			WGlobals::setSession( 'designExport', 'filename', $fileName );
			$xml = '<?xml version="1.0" encoding="UTF-8"?>' . $this->_ln;
			$xml .= '<sitename name=">' . htmlspecialchars( JOOBI_SITE_NAME, ENT_QUOTES ) . '">' . $this->_ln;
			$xml .= '<site>' . htmlspecialchars( JOOBI_SITE, ENT_QUOTES ) . '</site>' . $this->_ln;
			$xml .= '<user>' . htmlspecialchars( WUser::get( 'username' ), ENT_QUOTES ) . '</user>' . $this->_ln;
			$xml .= '<date>' . WApplication::date( WTools::dateFormat( 'time-unix' ) ) . '</date>' . $this->_ln;
			$xml .= '<model>' . $namekey . '</model>' . $this->_ln;
			if ( ! $this->_multiLang ) {
				$langCode = WLanguage::get( WUser::get( 'lgid' ), 'code' );
				$xml .= '<language>' . $langCode . '</language>' . $this->_ln;
			}
			$xml .= '<items>' . $this->_ln;
			$fileS = WGet::file();
			$fileS->write( $fileName, $xml, 'write' );
		}
		return $fileName;
	}
	private function _saveIntoFile($string) {
		$fileName = $this->_getFileName();
		$fileS = WGet::file();
		$fileS->write( $fileName, $string, 'append' );
	}
}
