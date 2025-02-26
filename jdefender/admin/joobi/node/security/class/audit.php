<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Audit_class extends WClasses {
	private $_sid = 0;
	private $_eid = 0;
	private $_namekeyValue = '';
	private $_deletedEIDA = array();
	private $_savedEIDA = array();
	public function beforeSave($sid,$count,$localObj) {
		$newValue = $localObj->_new;
		if ( !$this->_checkNeedAuditing( !$newValue, $sid ) ) return true;
				$listValuesA = array();
		$currentValueO = new stdclass;
		foreach( $localObj as $key => $val ) {
			if ( $key[0] != '_' ) {
				if ( $key[0] != 'C' ) $listValuesA[] = $key;
				$currentValueO->$key = $val;
				if ( 'namekey' == $key ) $namekeyvalue = $val;
			}		}
		if ( !$newValue ) {
						if ( $localObj->multiplePK() ) {
			} else {
				$modeM = WModel::get( $sid );
				if ( empty($modeM) ) return false;
				$pk = $localObj->getPK();
				$eid = $localObj->$pk;
				$existingValuesO = $modeM->load( $eid, $listValuesA );
				if ( !empty($existingValuesO) ) $beforeValues = $existingValuesO;
			}
		}
				$obj = new stdClass;
		$obj->sid = $sid;
		$obj->new = $newValue;
		$obj->action = $localObj->getAudit();
		if ( !empty($eid) ) $obj->eid = $eid;
		if ( !empty($namekeyvalue) ) $obj->namekeyValue = $namekeyvalue;
		if ( !empty($beforeValues) ) $obj->beforeValue = $beforeValues;
		else $obj->beforeValue = '';
		$obj->afterValue = $currentValueO;
		$this->_savedEIDA[$count] = $obj;
	}
	public function afterSave($count) {
		if ( empty($this->_savedEIDA[$count]) ) return false;
		$action = ( !empty($this->_savedEIDA[$count]->new) ? 18 : 27 );
		if ( is_string($this->_savedEIDA[$count]->action) ) {
			if ( 'copy' == $this->_savedEIDA[$count]->action ) $action = 45;
			elseif ( 'toggle' === $this->_savedEIDA[$count]->action ) $action = 54;
		}
		$this->_eid = ( !empty($this->_savedEIDA[$count]->eid) ? $this->_savedEIDA[$count]->eid : 0 );
		$this->_namekeyValue = ( !empty($this->_savedEIDA[$count]->namekeyValue) ? $this->_savedEIDA[$count]->namekeyValue : '' );
		$this->_sid = $this->_savedEIDA[$count]->sid;
		$this->_saveAuditInformation( $this->_savedEIDA[$count]->beforeValue, $this->_savedEIDA[$count]->afterValue, $action );
		$this->_sid = 0;
	}
	public function beforeDelete($eid,$sid,$extra=null) {
		if ( !$this->_checkNeedAuditing( true, $sid ) ) return true;
		if ( empty($extra) ) {
			if ( !empty( $eid ) && is_numeric($eid) ) {
				$value = $eid;
								$modelM = WModel::get( $sid );
				if ( !empty($modelM) ) {
					$allData = $modelM->load( $eid );
					if ( !empty($allData) ) $value = json_encode($allData);
				}
				$this->_deletedEIDA[$sid][$eid] = $value;
			}		} else {
						$serializedExtra = json_encode($extra);
			$this->_deletedEIDA[$sid][$serializedExtra] = $serializedExtra;
		}
	}
	public function afterDelete($eid,$sid,$extra=null) {
		if ( !$this->_checkNeedAuditing( true, $sid ) ) return true;
		if ( !empty($extra) ) {
						$serializedExtra = json_encode($extra);
			$namekeyA = array();
			if ( !empty($extra) && is_array( $extra ) ) {
				foreach( $extra as $oneExtra ) {
					if ( !isset($oneExtra->value) || !isset($oneExtra->value) ) continue;
					$namekeyA[] = $oneExtra->champ . '=' . $oneExtra->value;
				}			}			$namekey = implode( ' | ', $namekeyA );
		}
		if ( ( !empty($this->_deletedEIDA[$sid][$eid]) && is_numeric($eid) ) || ( !empty($extra) ) ) {
			static $securityAuditM = null;
			if ( !isset($securityAuditM) ) $securityAuditM = WModel::get( 'security.audit' );
			$securityAuditM->setVal( 'uid', WUser::get( 'uid' ) );
			$securityAuditM->setVal( 'created', time() );
			$securityAuditM->setVal( 'sid', $sid );
			$securityAuditM->setVal( 'action', 36 );
			$securityAuditM->setVal( 'eid', $eid );
			if ( !empty($namekey) ) $securityAuditM->setVal( 'namekeyvalue', $namekey );
			elseif ( !is_numeric($this->_deletedEIDA[$sid][$eid]) ) $securityAuditM->setVal( 'before_text', $this->_deletedEIDA[$sid][$eid] );
			$securityAuditM->insert();
		}
	}
	public function toggleUpdate($sid,$eid,$property,$value) {
		if ( empty($sid) || !$this->_checkNeedAuditing( true, $sid ) ) return true;
				$modelM = WModel::get( $sid );
		if ( empty($modelM) ) return false;
		$previousValue = $modelM->load( $eid, $property );
		$auditOldO = new stdClass;
		$auditOldO->$property = $previousValue;
		$auditNewO = new stdClass;
		$auditNewO->$property = $value;
		$this->_sid = $sid;
		$this->_eid = $eid;
		$this->_saveAuditInformation( $auditOldO, $auditNewO, 54 );	
	}
	private function _checkNeedAuditing($update=true,$sid=0) {
		static $auditNow = null;
		$audit = PLIBRARY_NODE_AUDIT;
		if ( empty($audit) ) return false;
		if ( !isset($auditNow) ) {
			$auditNow = false;
						$location = WPref::load( 'PSECURITY_NODE_AUDIT_SPACE' );
			switch( $location ) {
				case 4:
					$auditNow = true;
					break;
				case 3:
					if ( WRoles::isNotAdmin() ) $auditNow = true;
					break;
				case 2:						if ( WRoles::isAdmin() ) $auditNow = true;
					break;
				case 1:
				default:
					break;
			}
			$modification = WPref::load( 'PSECURITY_NODE_AUDIT_MODIFICATION' );
			if ( $update && $modification == 2 ) $auditNow = false;
			elseif ( !$update && $modification == 1 ) $auditNow = false;
		}
				if ( $auditNow && !empty($sid) ) {
			$noAudit = WModel::get( $sid, 'noaudit' );
			if ( !empty($noAudit) ) return false;
			$modelAudit = WModel::get( $sid, 'audit' );
			if ( empty($modelAudit) ) return false;
		}
		return $auditNow;
	}
	private function _saveAuditInformation($auditOldO,$auditNewO,$action=0) {
		$securityAuditM = WModel::get( 'security.audit' );
		$securityAuditM->setVal( 'uid', WUser::get( 'uid' ) );
		$securityAuditM->setVal( 'created', time() );
		$securityAuditM->setVal( 'sid', $this->_sid );
		$securityAuditM->setVal( 'action', $action );
		if ( !empty($this->_namekeyValue) ) $securityAuditM->setVal( 'namekeyvalue', $this->_namekeyValue );
		if ( !empty($this->_eid) ) $securityAuditM->setVal( 'eid', $this->_eid );
		if ( !empty($auditOldO) ) $securityAuditM->setVal( 'before_text', json_encode( $auditOldO ) );
		if ( !empty($auditNewO) ) $securityAuditM->setVal( 'after_text', json_encode( $auditNewO ) );
		$securityAuditM->insert();
	}
}