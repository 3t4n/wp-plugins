<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Type_class extends WClasses {
	var $typeModelName = 'main.widgettype';
	var $typeModelPK = 'wgtypeid';
	var $itemModelName = 'main.widget';
	var $itemModelPK = 'widgetid';
	var $designationNode = 'main';
	var $cacheFolder = 'Type';
	var $designationMap = 'designation';
	public function resetCacheDesignation() {
		$cacheHandler = WCache::get();
		$cacheHandler->resetCache( $this->cacheFolder );
	}
	public function loadTypeData($typeID,$return='data') {
		if ( empty( $typeID ) ) return null;
		if ( empty( $this->typeModelName ) ) return false;
		$topicTypeM = WModel::get( $this->typeModelName );
		$typeInfoO = $topicTypeM->loadMemory( $typeID );
		if ( $return=='data' ) {
						return $typeInfoO;
		} elseif ( $return =='designation' ) {
			if ( isset($typeInfoO->designation) ) {
				return $typeInfoO->designation;
			} else {
								$itemTypeT = WType::get( $this->designationNode . '.designation' );
				if ( !empty($typeInfoO->type) ) return $itemTypeT->getName( $typeInfoO->type );
				else return '';
			}
		} elseif ( isset($typeInfoO->$return) ) {
			return $typeInfoO->$return;
		} else {
			return null;
		}
	}
	public function getDefaultType($designation='topic') {
		if ( empty( $designation ) ) $designation='topic';
		static $resultA = array();
		if ( !isset( $resultA[ $designation ] ) ) {
						$productTypeT = WType::get( $this->designationNode . '.designation' );
			$idType = $productTypeT->getValue( $designation, false );
			$productTypeM = WModel::get( $this->typeModelName );
			$productTypeM->remember( $idType, true, $this->cacheFolder );
				$productTypeM->whereE( $this->designationMap, $idType );
			$productTypeM->orderBy( 'publish', 'DESC' );
			$productTypeM->orderBy( $this->typeModelPK, 'ASC' );
			$resultA[ $designation ] = $productTypeM->load( 'lr', $this->typeModelPK );
						if ( empty($resultA[ $designation ]) ) {
								$TYPE = $designation;
				$this->userW('1410185409ETKT',array('$TYPE'=>$TYPE));
				$productTypeM = WModel::get( $this->typeModelName );
				$productTypeM->orderBy( 'core', 'DESC' );
				$productTypeM->orderBy( 'publish', 'DESC' );
				$productTypeM->orderBy( $this->typeModelPK, 'ASC' );
				$resultA[ $designation ] = $productTypeM->load( 'lr', $this->typeModelPK );
			}
		}
		return  $resultA[ $designation ];
	}
public function loadTypeFromID($eid,$return='data') {
	static $typeInfoO = array();
	if ( !isset($typeInfoO[$eid]) ) {
		$itemM = WModel::get( $this->itemModelName );
		$itemM->makeLJ( $this->typeModelName );
		$itemM->select( $this->typeModelPK, 1 );
		$itemM->checkAccess();
		$itemM->whereE( $this->itemModelPK, $eid );
		$typeInfoO[$eid] = $itemM->load( 'lr' );
				if ( !isset($typeInfoO[$eid]) ) $typeInfoO[$eid] = false;
	}
	return $this->loadTypeData( $typeInfoO[$eid], $return );
}
	public function loadAllTypesFromDesignation($designation) {
		if ( empty( $designation ) ) return '';
		static $resultA = array();
		$key = serialize( $designation );
		if ( !isset( $resultA[ $key ] ) ) {
			static $productTypeM = null;
						if ( is_string($designation) ) {
								$productTypeT = WType::get( $this->designationNode . '.designation' );
				$designation = $productTypeT->getValue( $designation, false );
			} elseif ( is_array($designation) ) {
				$productTypeT = WType::get( $this->designationNode . '.designation' );
				$newDisignation = array();
				foreach( $designation as $oneD ) {
					if ( is_string($oneD) ) {
						$newDisignation[] = $productTypeT->getValue( $oneD, false );
					} else {
						$newDisignation[] = $oneD;
					}				}				$designation = $newDisignation;
			}
						$productTypeM = WModel::get( $this->typeModelName );
			$productTypeM->rememberQuery( true, $this->cacheFolder );
			if ( !is_array($designation) ) $designation = array( $designation );
			$productTypeM->whereIn( $this->designationMap, $designation );
			$productTypeM->whereE( 'publish', 1 );
			$productTypeM->checkAccess();
			$resultA[ $key ] = $productTypeM->load( 'lra', $this->typeModelPK );
		}
		return $resultA[ $key ];
	}
	public function countTypes($designation='') {
		static $resultA = array();
		$key = serialize( $designation );
		if ( !isset( $resultA[ $key ] ) ) {
			static $productTypeM = null;
						$productTypeM = WModel::get( $this->typeModelName );
			$productTypeM->rememberQuery( true, $this->cacheFolder );
			if ( !is_array($designation) ) $designation = array( $designation );
			$productTypeM->whereIn( $this->designationMap, $designation );
			$productTypeM->whereE( 'publish', 1 );
			$PKA = $productTypeM->load( 'lra', $this->typeModelPK );
			$resultA[ $key ] = count($PKA);
		}	
		return $resultA[ $key ];
	}	
}