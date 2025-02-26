<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_Picklist_model extends WModel {
	function addValidate() {
		if ( empty( $this->type ) ) $this->type = 1;
		if ( empty( $this->publish ) ) $this->publish = 1;
		$this->core = 0;
		if ( !empty( $this->x['sidmemory']) ) {
			$this->sid = $this->x['sidmemory'];
		}
		if ( !empty( $this->sid ) ) {
			$modelName = WModel::get( $this->sid, 'namekey' );
			$this->wid = WExtension::get( $modelName, 'wid' );
		}
		if ( empty( $this->wid ) ) $this->wid = WExtension::get( 'design.node', 'wid' );
		if ( empty( $this->namekey ) ) $this->namekey = str_replace( '.', '_', WExtension::get( $this->wid, 'namekey' ) ) . '_' . WGlobals::filter( $this->getChild( 'design.picklisttrans', 'name' ), 'alnum' );
		$this->namekey = strtolower( $this->namekey );
		return true;
	}
	function validate() {
				if ( !empty( $this->parent ) ) {
			$picklistM = WModel::get( 'library.picklist' );
			$picklistM->whereE( 'namekey', $this->parent );
			$picklistM->setVal( 'isparent', 1 );
			$picklistM->update();
		}
		if ( !empty($this->x['code']) ) {
						$this->external = str_replace( 'design_node_', '', strtolower( $this->namekey ) );
		}		
		return true;
	}
	function editExtra() {
		if ( !empty($this->_x['code']) ) {
			$extensionFolder = 'design';				$location = JOOBI_DS_USER . 'custom/' . $extensionFolder . '/picklist/' . $this->external . '.php';
			$content = "<?php defined('JOOBI_SECURE') or die('J....');
class Design_" . $this->external . "_picklist extends WPicklist {";
			$content .= "\n\r";
			$content .= $this->_x['code'];
			$content .= "\n\r";
			$content .= '}';
			$fileS = WGet::file();
			$status = $fileS->write( $location, $content, 'overwrite' );
		}		
		return true;
	}	
	function extra() {
				$extensionHelperC = WCache::get();
		$extensionHelperC->resetCache( 'picklist' );
		return true;
	}	
	function deleteValidate($eid=0) {
		$this->_x = $this->load( $eid );
		return true;
	}	
	function deleteExtra($eid=null) {
		$fielName = str_replace( 'design_node_', '', strtolower( $this->_x->namekey ) );
		$location = JOOBI_DS_USER . 'code/picklist/' . $fielName . '.php';
		$fileC = WGet::folder();
		if ( $fileS->exist( $location ) ) $fileC->delete( $location );
		return true;
	}	
}