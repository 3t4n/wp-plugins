<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Install_Data_class {
	private $_namekey = '';
	private $_wid = 0;
	private $_folder = '';
	private $_path = ''; 
	private $_libraryReaddataC = null;
	public function processData($namekey='',$type='') {
		if ( empty($namekey) || empty($type) ) return true;
		$this->_namekey = $namekey;
		$this->_libraryReaddataC = WClass::get( 'library.readdata' );
		if ( ! $this->_loadExtension() ) return true;
		switch( $type ) {	
			case 'Extension':
				$this->_insertExtension();
				break;
			case 'Table':
				$this->_insertTable();
				break;
			case 'Model':
				$this->_insertModel();
				break;
			case 'Picklist':
				$this->_insertPicklist();
				break;
			case 'View':
				$status5 = $this->_insertView();
				return $status5;
				break;
			case 'Controller':
				$refYIDC = '';
				$fileS = WGet::file();
				if ( $fileS->exist( JOOBI_DS_TEMP . 'ref_yid.txt' ) ) {
					$refYIDC = $fileS->read( JOOBI_DS_TEMP . 'ref_yid.txt' );
				}
				if ( !empty($refYIDC) ) {
					$refYIDA = unserialize( $refYIDC );
					$elementM = WTable::get( 'layout_multiforms', 'main_library', 'lid' );
					$layoutM = WTable::get( 'layout_node', 'main_library', 'yid' );
					foreach( $refYIDA as $lid => $namekey ) {
						$layoutM->whereE( 'namekey', $namekey );
						$yid = $layoutM->load( 'lr', 'yid' );						
						if ( empty($yid) ) {
							WMessage::log( 'listing element lid : ' . $lid . ' --- view namekey : ' . $namekey , 'missing_ref_yid_error' );
							continue;
						}
						$elementM->whereE( 'fid', $lid );
						$elementM->setVal( 'ref_yid', $yid );
						$elementM->update();
					}
					$fileS->delete( JOOBI_DS_TEMP . 'ref_yid.txt' );
				}
				$this->_insertController();
				$this->_insertMailing();
				$fkQuery = 'DELETE t1 FROM `#__dataset_foreign` AS t1 LEFT JOIN `#__dataset_tables` AS t2 ON t1.`dbtid` = t2.`dbtid` WHERE t2.`dbtid` IS NULL';
				$fltQuery = 'DELETE t1 FROM `#__filters_node` AS t1 LEFT JOIN `#__layout_node` AS t2 ON t1.`yid` = t2.`yid` WHERE t2.`yid` IS NULL';
				$tableT = WTable::get();
				$tableT->load( 'q', $fkQuery );
				$tableT->load( 'q', $fltQuery );
				break;
			default:
				return true;
				break;
		}
		return true;
	}
	private function _isCCAFiles($path,$file) {
		if ( '.cca' == substr( $file, -4 ) ) {
			static $fileS = null;
			if ( ! isset($fileS) ) $fileS = WGet::file();
			if ( $fileS->exist( $path . '/' . $file ) ) {
				$fileS->delete( $path . '/' . $file );
			}
			return true;
		}
		return false;
	}
	private function _insertController() {
		$folderS = WGet::folder();
		$folderS->displayMessage();
		$viewA = $folderS->files( $this->_path . 'controller' );
		if ( empty($viewA) ) return false;
		foreach( $viewA as $file ) {
			if ( 'index.html' == $file ) continue;
			$namekey = substr( $file, 0, -4 );
			if ( $this->_isCCAFiles( $this->_path . 'controller', $file ) )  continue;
			$tempdata = WGet::loadData( $this->_folder . '.' . $namekey, 'controller' );
			if ( !empty($tempdata) ) {
				if ( !empty($tempdata->wid) ) {
					if ( 'apps.installnow.1' == $tempdata->namekey ) {
						$tempdata->wid = $this->_getExtID( 'apps.node' );	
					} else {
						$tempdata->wid = $this->_getExtID( substr($tempdata->wid, 1 ) );
					}
				}
				elseif ( ! is_numeric($tempdata->rolid) ) $tempdata->rolid = WRole::get( substr($tempdata->rolid, 1 ), 'rolid' );
				$yidA = explode( '#', $tempdata->yid );
				$tempdata->yid = array_pop( $yidA );
				$tempdata->id = $tempdata->ctrid;
				$tempdata->created = 0;
				$tempdata->modified = 0;
			}
			$this->_libraryReaddataC->populateController( $tempdata );
		}
	}
	private function _getExtID($hardWID) {
		static $widA = array();
		static $layoutM = null;
		if ( empty($hardWID) ) return 0;
		if ( is_numeric($hardWID) ) $namekey = WExtension::get( $hardWID, 'namekey' );
		else $namekey = $hardWID;
		if ( empty($namekey) ) return 0;
		if ( isset($widA[$namekey]) ) return $widA[$namekey];
		if ( !isset($layoutM) ) $layoutM = WTable::get( 'extension_node', 'main_library', 'wid' );
		$layoutM->whereE( 'namekey', $namekey );
		$wid = $layoutM->load( 'lr', 'wid' );
		if ( empty($wid) ) {
			WMessage::log( ' extension does not exist empty extension_node : ' . $namekey , 'processData__getExtID_error' );
			WMessage::log( debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ) , 'processData__getExtID_error' );
			return 0;
		}
		$widA[$namekey] = $wid;
		return $widA[$namekey];
	}
	private function _insertMailing() {
		$folderS = WGet::folder();
		$folderS->displayMessage();
		$viewA = $folderS->files( $this->_path . 'mailing' );
		if ( empty($viewA) ) return false;
		$mail = WMail::get();
		foreach( $viewA as $file ) {
			if ( 'index.html' == $file ) continue;
			if ( $this->_isCCAFiles( $this->_path . 'mailing', $file ) )  continue;
			if ( strpos( $file, '-' ) !== false ) continue;
			$namekey = substr( $file, 0, -4 );
			$tempdata = WGet::loadData( $this->_folder . '.' . $namekey, 'mailing' );
			if ( !empty($tempdata) ) {
				if ( ! is_numeric($tempdata->wid) ) $tempdata->wid = WExtension::get( substr($tempdata->wid, 1 ), 'wid' );
				if ( ! is_numeric($tempdata->rolid) ) $tempdata->rolid = WRole::get( substr($tempdata->rolid, 1 ), 'rolid' );
				$this->_libraryReaddataC->populateMailing( $tempdata );
			}
		}
	}
	private function _insertView() {
		$folderS = WGet::folder();
		$folderS->displayMessage();
		$viewA = $folderS->files( $this->_path . 'view' );
		if ( empty($viewA) ) return true;
		$status = true;
		$dataViewA = Install_Node_install::accessInstallData( 'get', 'dataView' );
		if ( empty($dataViewA) ) $dataViewA = array();
		$currentTime = time();
		foreach( $viewA as $file ) {
			if ( 'index.html' == $file ) continue;
			if ( in_array( $file, $dataViewA ) ) continue;
			if ( $this->_isCCAFiles( $this->_path . 'view', $file ) )  continue;
			$namekey = substr( $file, 0, -4 );
			$tempdata = WViews::loadDataView( '#' . $this->_folder . '#' . $namekey, false );
			$this->_libraryReaddataC->populateView( $tempdata );
			$dataViewA[] = $file;
			if ( time() > ( $currentTime + 5 ) ) {
				$status = false;
				break;
			}
		}
		if ( $status ) {
			Install_Node_install::accessInstallData( 'delete', 'dataView' );
		} else {
			Install_Node_install::accessInstallData( 'set', 'dataView', $dataViewA );
		}
		$refYIDA = $this->_libraryReaddataC->getRefYID();
		if ( !empty($refYIDA) ) {
			$fileS = WGet::file();
			if ( $fileS->exist( JOOBI_DS_TEMP . 'ref_yid.txt' ) ) {
				$refYIDCold = $fileS->read( JOOBI_DS_TEMP . 'ref_yid.txt' );
			}
			if ( !empty($refYIDCold) ) {
				$loadRefA = unserialize( $refYIDCold );
				foreach( $loadRefA as $k => $v ) {
					$refYIDA[$k] = $v;
				}
			}
			if ( !empty($refYIDA) ) {
				$refYIDC = serialize( $refYIDA );
				$fileS->write( JOOBI_DS_TEMP . 'ref_yid.txt', $refYIDC, 'overwrite' );
			}
		}
		return $status;
	}
	private function _insertPicklist() {
		$folderS = WGet::folder();
		$folderS->displayMessage();
		$pickA = $folderS->files( $this->_path . 'picklist' );
		if ( empty($pickA) ) return false;
		foreach( $pickA as $file ) {
			if ( 'index.html' == $file ) continue;
			if ( $this->_isCCAFiles( $this->_path . 'picklist', $file ) )  continue; 
			$namekey = substr( $file, 0, -4 );
			$tempdata = WViews::loadDataPicklist( '#' . $this->_folder . '#' . $namekey, false );
			if ( !empty( $tempdata ) ) {
				$this->_libraryReaddataC->populatePicklist( $tempdata );
			} else {
				WMessage::log( 'processData PICKLIST 1: ' . '#' . $this->_folder . '#' . $namekey, 'picklist_not_found_debug' );
				WMessage::log( $this->_path . 'picklist' , 'picklist_not_found_debug' );
			}
		}
	}
	private function _insertTable() {
		$folderS = WGet::folder();
		$folderS->displayMessage();
		$modelsA = $folderS->files( $this->_path . 'table' );
		if ( empty($modelsA) ) return false;
		foreach( $modelsA as $file ) {
			if ( 'index.html' == $file ) continue;
			if ( $this->_isCCAFiles( $this->_path . 'table', $file ) )  continue;
			$table = str_replace( '_', '.', substr( $file, 0, -4 ) );
			$tempTable = WModel::loadDataTable( '#' . $this->_folder . '#' . $table );	
			$this->_libraryReaddataC->populateTable( $tempTable );
		}
	}
	private function _insertModel() {
		$folderS = WGet::folder();
		$folderS->displayMessage();
		$modelsA = $folderS->files( $this->_path . 'model' );
		if ( empty($modelsA) ) return false;
		foreach( $modelsA as $file ) {
			if ( 'index.html' == $file ) continue;
			if ( $this->_isCCAFiles( $this->_path . 'model', $file ) )  continue;
			$file = str_replace( '_node.php', '.php', $file );
			$model = str_replace( '_', '.', substr( $file, 0, -4 ) );
			$modelInfoO = WModel::loadDataModel( $model, false, false );
			$sid = $this->_libraryReaddataC->populateModel( $modelInfoO );
			$this->_libraryReaddataC->populateForeign( $modelInfoO );
			$this->_libraryReaddataC->populateContrainst( $modelInfoO );
		}
	}
	private function _loadExtension() {
		$explodeA = explode( '.', $this->_namekey );
		if ( count($explodeA) > 2 ) return false;
		$type = array_pop( $explodeA );
		if ( 'node' != $type && 'application' != $type ) return false;
		$this->_folder = $explodeA[0];
		$this->_path = JOOBI_DS_NODE . $this->_folder . '/data/';
		$installAppsM = Wmodel::get( 'install.apps' );
		$installAppsM->whereE( 'namekey', $this->_namekey );
		$this->_wid = $installAppsM->load( 'lr', 'wid' );
		$data = WGet::loadData( $this->_namekey , 'extension' );
		if ( !empty($this->_wid) ) $data->wid = $this->_wid;
		else $data->wid = 0;
		return true;
	}
	private function _insertExtension() {
		static $widA = array();
		if ( empty($widA[$this->_namekey]) ) {
			$installAppsM = Wmodel::get( 'install.apps' );
			$installAppsM->whereE( 'namekey', $this->_namekey );
			$widA[$this->_namekey] = $installAppsM->load( 'lr', 'wid' );
		}
		$this->_wid = $widA[$this->_namekey];
		$data = WGet::loadData( $this->_namekey , 'extension' );
		if ( !empty($this->_wid) ) $data->wid = $this->_wid;
		else $data->wid = 0;
		$this->_libraryReaddataC->populateExtension( $data, true, false );
		return true;
	}
}
