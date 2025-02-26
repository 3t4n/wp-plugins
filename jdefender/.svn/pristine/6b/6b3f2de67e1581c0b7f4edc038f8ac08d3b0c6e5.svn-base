<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Deleteactivity_scheduler extends Scheduler_Parent_class  {
	private $_time = 0;
	function process() {
		if ( ! WGlobals::checkCandy(50) ) return true;
						$this->_time = time() - WApplication::dateOffset();
				$this->_deleteActivity( 'activity', 1, WPref::load( 'PSECURITY_NODE_DELETE_ACTIVITY_GUEST' ) );
		$this->_deleteActivity( 'activity', 5, WPref::load( 'PSECURITY_NODE_DELETE_ACTIVITY_REGISTERED' ) );
		$this->_deleteActivity( 'activity', 9, WPref::load( 'PSECURITY_NODE_DELETE_ACTIVITY_ADMIN' ) );
		$this->_deleteActivity( 'activitypages', 1, WPref::load( 'PSECURITY_NODE_DELETE_ACTIVITYPAGES_GUEST' ) );
		$this->_deleteActivity( 'activitypages', 5, WPref::load( 'PSECURITY_NODE_DELETE_ACTIVITYPAGES_REGISTERED' ) );
		$this->_deleteActivity( 'activitypages', 9, WPref::load( 'PSECURITY_NODE_DELETE_ACTIVITYPAGES_ADMIN' ) );
		$this->_deleteActivity( 'incident', 999, WPref::load( 'PSECURITY_NODE_DELETE_INCIDENT' ) );
	}
	private function _deleteActivity($model,$type,$period) {
		if ( empty($period) ) return false;
		switch( $model ) {
			case 'activity':
				$securityActivityM = WModel::get( 'security.activity' );
				$securityActivityM->where( 'login', '=', $type );
				$securityActivityM->where( 'created', '<', $this->_time - 86400 * $period );
				$securityActivityM->deleteAll();
				break;
			case 'activitypages':
				$securityActivityM = WModel::get( 'security.activitypages' );
				$securityActivityM->where( 'login', '=', $type );
				$securityActivityM->where( 'created', '<', $this->_time - 86400 * $period );
				$securityActivityM->delete();
				break;
			case 'incident':
				$securityActivityM = WModel::get( 'security.incident' );
				$securityActivityM->where( 'created', '<', $this->_time - 86400 * $period );
				$securityActivityM->delete();
				break;
				default:
				break;
		}		
	}
}