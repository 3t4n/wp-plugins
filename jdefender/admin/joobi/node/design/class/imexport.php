<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Design_Imexport_class extends WClasses {
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
	private $_pk = '';
	private $_columnsReadableA = array();
	private $_columnsFieldTypeA = array();
	public function allColumns2ProcessA($sid) {
		if ( ! is_numeric($sid) ) $sid = WModel::get( $sid, 'sid' );
		$libraryColumnsM = WModel::get( 'library.columns' );
		$libraryColumnsM->rememberQuery( true );
		$libraryColumnsM->makeLJ( 'library.model', 'dbtid' );
		$libraryColumnsM->whereE( 'sid', $sid, 1 );
		$libraryColumnsM->whereE( 'export', 1 );	
		$libraryColumnsM->select( array( 'name', 'readable', 'fieldtype' ) );
		$columnsA = $libraryColumnsM->load( 'ol' );
		if ( empty($columnsA) ) return array();
		$lraColumnA = array();
		foreach( $columnsA as $column ) {
			$lraColumnA[] = $column->name;
			if ( !empty($column->readable) ) $this->_columnsReadableA[$sid][$column->name] = $column->readable;
			if ( !empty($column->fieldtype) ) $this->_columnsFieldTypeA[$sid][$column->name] = $column->fieldtype;
		}
		$modelM = WModel::get( $sid );
		$dontExportA = $modelM->dontExportA();
		if ( !empty($dontExportA) ) $this->_dontExportA = array_merge( $this->_dontExportA, $dontExportA );
		if ( !empty($this->_dontExportA) ) {
			$lraColumnA = array_diff( $lraColumnA, $this->_dontExportA );
		}
		return $lraColumnA;
	}
	public function getReadableA($sid,$reverse=false) {
		if ( isset( $this->_columnsReadableA[$sid]) ) {
			if ( $reverse ) {
				return array_flip( $this->_columnsReadableA[$sid] );
			} else {
				return $this->_columnsReadableA[$sid];
			}
		}
		return array();
	}
	public function getFieldTypeA($sid) {
		if ( isset( $this->_columnsFieldTypeA[$sid]) ) return $this->_columnsFieldTypeA[$sid];
		return array();
	}
	public function getPKColumnsA(&$FKcolumnsNameA,&$FKcolumnsSIDA,$columnsA,$pk) {
		$libraryColumnsM = WModel::get( 'library.columns' );
		$libraryColumnsM->makeLJ( 'library.model', 'dbtid' );
		$libraryColumnsM->makeLJ( 'library.table', 'dbtid', 'dbtid', 1, 2 );
		$libraryColumnsM->whereIn( 'name', $columnsA );
		$libraryColumnsM->whereNotIn( 'name', $this->_specialColumnA );
		$libraryColumnsM->where( 'name', '!=', $pk );
		$libraryColumnsM->whereE( 'pkey', 1 );
		$libraryColumnsM->whereE( 'type', 1, 2 );
		$libraryColumnsM->whereE( 'publish', 1, 1 );
		$libraryColumnsM->select( array( 'sid', 'namekey' ), 1 );
		$libraryColumnsM->select( 'name' );
		$libraryColumnsM->groupBy( 'dbtid', 1 );
		$pkColumnsA = $libraryColumnsM->load( 'ol' );
		if ( !empty($pkColumnsA ) ) {
			foreach( $pkColumnsA as $col ) {
				$FKcolumnsNameA[$col->name] = $col->sid;
				$FKcolumnsSIDA[$col->sid] = $col->name;
			}
		}
	}
	public static function loadFormElement($typeNode,$typeName) {
		if ( empty($typeName) || empty($typeNode) ) return false;
		$className = 'WForm_Core' . $typeName;
		WLoadFile( 'output.class.forms' );
		WPage::renderBluePrint( 'form' ); 
		WView::includeElement( $typeNode . '.form.' . $typeName );
		$colum = new $className;
		return $colum;
	}
}
