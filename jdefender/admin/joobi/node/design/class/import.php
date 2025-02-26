<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Design_Import_class extends WClasses {
	private $_sid = 0;
	private $_ln = "\n";
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
	private $_endofFile = false;
	private $_object2insertO = null;
	private $_file2SaveA = array();
	private $_errorReason = '';
	public function XMLError() {
		return $this->_errorReason;
	}
	public function loadXMLFile() {
		$path = WGlobals::get( 'fileLoaction', '' );
		if ( empty($path) ) {
			$this->_errorReason = WText::t('1468618390MVNN');
			return false;
		}
		$handle = @fopen( $path, 'r' );
		if ( ! $handle ) {
			$this->_errorReason = WText::t('1468618390MVNO');
			return false;
		}
		$objInfoO = new stdClass;
		$objInfoO->path = $path;
			$maLineLenght = 4096;
			$buffer = '';
			$pointer = 0;
			$dataA = array();
			$nextItem = false;
			while ( ( $buffer = fgets($handle, $maLineLenght ) ) !== false ) {
				$line = substr( $buffer, 0, -1 );	
				$dataA[] = $line;
				if ( '<items>' == $line ) {
					$nextItem = true;
					$objInfoO->pointer = ftell( $handle );
					break;
				}
			}
			if ( ! feof($handle) && ! $nextItem ) {
				$this->_errorReason = WText::t('1468618390MVNP');
				return false;
			}
			fclose($handle);
			array_pop( $dataA );
			$simple = implode( '', $dataA );
			$valsA = array();
			$p = xml_parser_create();
			xml_parse_into_struct( $p, $simple, $valsA, $index );
			xml_parser_free($p);
			$dataA[] = '</sitename>';
			foreach( $valsA as $val ) {
				$tag = strtolower($val['tag']);
				if ( isset($val['value']) ) {
					$value = $val['value'];
				} elseif ( isset($val['attributes']['NAME']) ) {
					$value = $val['attributes']['NAME'];
				} else {
					continue;
				}
				$objInfoO->$tag = $value;
			}
		if ( empty($objInfoO->model) ) {
			$this->_errorReason = WText::t('1468618390MVNQ');
			$objInfoO = false;
		}
		return $objInfoO;
	}
	public function endOfFile() {
		return $this->_endofFile;
	}
	public function processImport($objInfoO,$pointer) {
		$handle = @fopen( $objInfoO->path, 'r' );
		if ( ! $handle ) return false;
		$maLineLenght = 4096;
		$buffer = '';
		fseek( $handle, $pointer );
		$stringXML = '';
		$nextItem = false;
		while ( ( $buffer = fgets($handle, $maLineLenght ) ) !== false ) {
			$line = substr( $buffer, 0, -1 );
			$pos = strpos( $line, '<' );
			if ( $pos !== false ) {
				$line = substr( $line, $pos );
			} else {
				$line = "\n" . $line;
			}
			$stringXML .= $line;
			if ( '</item>' == $line ) {
				$nextItem = true;
				$pointer = ftell( $handle );
				break;
			}
		}
		if ( ! feof($handle) && ! $nextItem ) {
			return false;
		}
		if ( feof($handle) ) {
			$this->_endofFile = true;
		}
		fclose($handle);
		$XMLO = @simplexml_load_string( $stringXML );
		if ( ! $XMLO ) {
			return false;
		}
		$this->_importData( $XMLO, $objInfoO );
		return $pointer;
	}
	private function _importData($XMLObject,$objInfoO) {
		if ( empty($objInfoO->model) ) return false;
		$XMLO = new stdClass;
		foreach( $XMLObject as $k => $v ) {
			if ( is_object($v) ) {
				$XMLO->$k = (string)$v;
			} else {
				$XMLO->$k = (string)$v;
			}
		}
		$this->_object2insertO = new stdClass;
		if ( !empty( $objInfoO->language ) ) {
			$this->_multiLang = false;
		} else {
			$this->_multiLang = WPref::load( 'PLIBRARY_NODE_MULTILANG' );
		}
		$this->_sid = WModel::get( $objInfoO->model, 'sid' );
		$designImexportC = WClass::get( 'design.imexport' );
		$modelM = WModel::get( $this->_sid );
		$this->_pk = $modelM->getPK();
		if ( ! $this->_multiLang ) {
			$transNamekey = WModel::get( $this->_sid, 'namekey' ) . 'trans';
			$transExist = WModel::modelExist( $transNamekey );
			if ( $transExist ) {
				$transColumnsA = $designImexportC->allColumns2ProcessA( $transNamekey );
				foreach( $transColumnsA as $transP ) {
					if ( isset( $XMLO->$transP ) ) {
						$modelM->setChild( $transNamekey, $transP, $XMLO->$transP );
						unset( $XMLO->$transP );
					}
				}
			}
		}
		$columnsA = $designImexportC->allColumns2ProcessA( $this->_sid );
		$sortedFirstA = array( 'vendid', 'uid' );
		foreach( $sortedFirstA as $srtMe ) {
			if ( ( $key = array_search( $srtMe, $columnsA ) ) !== false ) {
				unset( $columnsA[$key] );
				array_unshift( $columnsA, $srtMe );
			}
		}
		$this->_columnsReadableA = $designImexportC->getReadableA( $this->_sid );
		$this->_columnsFieldTypeA = $designImexportC->getFieldTypeA( $this->_sid );
		$designImexportC->getPKColumnsA( $this->_FKcolumnsNameA, $this->_FKcolumnsSIDA, $columnsA, $this->_pk );
		foreach( $columnsA as $column ) {
			if ( isset($this->_columnsReadableA[$column]) ) {
				$columnReadable = $this->_columnsReadableA[$column];
			} else {
				$columnReadable = $column;
			}
			if ( ! isset( $XMLO->$columnReadable ) ) continue;
			if ( in_array( $column, $this->_FKcolumnsSIDA ) ) {
				$value = WModel::getElementData( $this->_FKcolumnsNameA[$column], $XMLO->$columnReadable, $column );
			} else {
				$value = $this->_checkOnSpecialColumn( $column, $XMLO->$columnReadable, $this->_sid );
			}
			if ( false === $value ) continue;
			$modelM->$column = $value;
			if ( !isset($this->_object2insertO->$column) ) $this->_object2insertO->$column = $value;
		}
		$pk = $this->_pk;
		if ( !empty( $XMLO->namekey ) || !empty( $XMLO->uniqueID ) ) {
			$modelUniqueM = WModel::get( $this->_sid );
			$namekey = ( !empty( $XMLO->namekey ) ? !empty( $XMLO->namekey ) : $XMLO->uniqueID );
			$modelUniqueM->whereE( 'namekey', $namekey );
			$id = $modelUniqueM->load( 'lr', $this->_pk );
			if ( !empty($id) ) {
				$modelM->$pk = $id;
			}
		}
		$modelM->setIgnore();
		$modelM->returnId();
		$modelM->save();
		if ( !empty( $this->_file2SaveA ) ) {
			$this->_processFiles( $pk, $modelM->$pk );
		}
	}
	private function _processFiles($pk,$id) {
		foreach( $this->_file2SaveA as $sid => $dataA ) {
			foreach( $dataA as $key => $path ) {
				$modelM = WModel::get( $sid );
				if ( !empty($this->_object2insertO->uid) ) $modelM->uid = $this->_object2insertO->uid;
				if ( !empty($this->_object2insertO->vendid) ) $modelM->vendid = $this->_object2insertO->vendid;
				$modelM->$pk = $id;
				$modelM->saveItemMoveFile( JOOBI_DS_ROOT . $path, '', false, $key );
			}
		}
	}
	private function _checkOnSpecialFieldType($key,$value,$sid) {
		if ( isset($this->_columnsFieldTypeA[$key]) ) {
			$keyA = explode( '.', $this->_columnsFieldTypeA[$key] );
			$designImexportC = WClass::get( 'design.imexport' );
			$instance = $designImexportC->loadFormElement( $keyA[0], $keyA[1] );
			if ( method_exists( $instance, 'importConversion' ) ) {
				$value = $instance->importConversion( $value );
				if ( 'filid_WZX_filid' == $value ) {
					$this->_file2SaveA[$sid]['filid'] = $value;
					$value = 0;
				}
				return $value;
			}
			return $value;
		}
		return $value;
	}
	private function _checkOnSpecialColumn($key,$value,$sid) {
		if ( ! in_array( $key, $this->_specialColumnA ) ) return $this->_checkOnSpecialFieldType( $key, $value, $sid );
		switch( $key ) {
			case 'created':
			case 'modified':
				if ( !empty($value) ) $value = strtotime( $value );
				break;
			case 'rolid':
				$value = WRole::getRole( $value, 'rolid' );
				break;
			case 'uid':
			case 'author':
			case 'modifiedby':
				$value = WUser::get( $value, 'uid' );
				break;
			case 'parent':
				$value = WModel::getElementData( $sid, $value, $this->_pk );
				break;
			case 'filid':
				$this->_file2SaveA[$sid]['filid'] = $value;
				$value = 0;
				break;
			case 'lgid':
				$value = WLanguage::get( $value, 'lgid' );
				break;
			default:
				$value = $value;
				break;
		}
		return $value;
	}
}
