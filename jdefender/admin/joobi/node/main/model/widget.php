<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Widget_model extends WModel {
	public function secureTranslation($sid,$eid) {
		$uid = WUser::get( 'uid' );
		if ( empty($uid) ) return false;
				$roleHelper = WRole::get();
		if ( WRole::hasRole( 'admin' ) ) return true;
		return false;
	}	
	function addValidate() {
		if ( !isset($this->core) ) $this->core = 0;
		if ( !empty( $this->wgtypeid ) ) {
			$mainWidgetC = WClass::get( 'main.widget' );
			$initialParamsO = $mainWidgetC->getWidgetDefaultValue( $this->wgtypeid );
			if ( !empty($initialParamsO) ) {
				foreach( $initialParamsO as $key => $val ) {
					if ( empty( $this->p[$key] ) ) {
						$this->p[$key] = $val;
					}
				}
			}
		}
		if ( empty( $this->namekey ) ) {
			$name = $this->getChild( 'main.widgettrans', 'name' );
			if ( !empty($name) ) {
				$namekey = WGlobals::filter( $name, 'namekey' );
				$widgetM = WModel::get( 'main.widget' );
				$widgetM->whereE( 'namekey', $namekey );
				if ( $widgetM->exist() ) {
					$namekey .= '_' . time();
				}
				$this->namekey = $namekey;
			}
		}
		$name = $this->getChild( 'main.widgettrans', 'name' );
		if ( empty($name) ) {
			if ( !empty( $this->wgtypeid ) ) {
				$appsM = WModel::get( 'main.widgettype' );
				$appsM->makeLJ( 'main.widgettypetrans' );
				$appsM->whereLanguage();
				$appsM->select( 'name', 1 );
				$appsM->whereE( 'wgtypeid', $this->wgtypeid );
				$appsM->checkAccess();
				$name = $appsM->load( 'lr' );
			}
			if ( !empty($name) ) $name .= ' ';
			if ( empty($this->namekey) ) {
				$this->namekey = $this->genNamekey();
			}
			$this->setChild( 'main.widgettrans', 'name', $name . $this->namekey );
		}
		return parent::addValidate();
	}
	function editValidate() {
		if ( !empty($this->framework_id) && !empty( $this->framework_type ) && 5 == $this->framework_type ) {
			$name = $this->getChild( 'main.widgettrans', 'name' );
			if ( !empty($name) ) {
				$mainViewFormM = WModel::get( 'design.viewformstrans' );
				$mainViewFormM->whereE( 'fid', $this->framework_id );
				$mainViewFormM->whereE( 'lgid', WUsers::get( 'lgid' ) );
				$mainViewFormM->setVal( 'name', $name );
				$mainViewFormM->update();
			}
		}
		return parent::editValidate(); 
	}
	function validate() {
		$cacheC = WCache::get();
		$cacheC->resetCache( 'Widgets' );
		return parent::validate();
	}
}