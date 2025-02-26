<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Install_Widgets_class {
	public function installWidgetType($namekey,$alias,$name,$description,$groupId,$rolid=null,$publish=1) {
		$widgetypeM = WModel::get( 'install.widgetype' );
		$widgetypeM->whereE( 'namekey', $namekey );
		if ( $widgetypeM->exist() ) return true;
		$widgetypeM->namekey = $namekey;
		$widgetypeM->core = 1;
		$widgetypeM->alias = $alias;
		$widgetypeM->setChild( 'install.widgetypetrans', 'name', $name );
		$widgetypeM->setChild( 'install.widgetypetrans', 'description', $description );
		$widgetypeM->groupid = $groupId;
		if ( empty($rolid) ) $rolid = 'allusers';
		$widgetypeM->rolid = WRole::getRole( $rolid, 'rolid' );
		$widgetypeM->publish = $publish;
		$widgetypeM->created = time();
		$widgetypeM->save();
		return true;
	}
	public function installTable($modelName,$valuesA) {
				$selectA = array();
		foreach( $valuesA[0] as $key => $val ) {
			$selectA[] = $key;
		}
		$totalData = count( $valuesA );
		$maxQuery = 20;
		$count = 0;
		do {
			$modelM = WModel::get( $modelName );
			if ( empty( $modelM ) ) break;
			$datosA = array();
			for( $i = 0; $i < $maxQuery; $i++ ) {
				$datosA[] = $valuesA[$count];
				$count++;
				if ( $count >= $totalData ) break;
			}
			$modelM->setIgnore();
			$status = $modelM->insertMany( $selectA, $datosA );
		} while( $count < $totalData );
	}
	public function installWidgets($extensionNamekey) {
		if ( empty($extensionNamekey) ) return false;
		$allWidgetsA = $this->_loadWidgetsA( $extensionNamekey );
		if ( empty($allWidgetsA) ) return false;
				foreach( $allWidgetsA as $oneWidget ) {
			$this->installOneWidget( $oneWidget );
		}
		return true;
	}
	public function installViewWidgets($yid) {
		$viewNamekey = $this->_loadViewInfo( $yid, 'namekey' );
		if ( empty($viewNamekey) ) return false;
				$wid = $this->_loadViewInfo( $yid, 'wid' );
		$allWidgetsA = $this->_loadWidgetsA( $wid );
		if ( empty($allWidgetsA) ) return false;
		$installedForms = false;
				foreach( $allWidgetsA as $oneWidget ) {
			if ( !empty($oneWidget->view) && $viewNamekey != $oneWidget->view ) continue;
			if ( !empty($oneWidget->formElement) ) {
				$formElement = $oneWidget->formElement;
				unset( $oneWidget->formElement );
			} else {
				$formElement = null;
			}
						$oneWidget->widgetid = $this->installOneWidget( $oneWidget, $yid );
						if ( !empty($formElement) ) {
				$this->_installFormElement( $oneWidget, $yid, $formElement );
				$installedForms = true;
			}
		}
		if ( $installedForms ) {
						$extensionHelperC = WCache::get();
			$extensionHelperC->resetCache( 'Views' );
		}
		return true;
	}
	public function addWidgetsToView($allWidgetsA) {
		$viewNamekeyA = array();
		foreach( $allWidgetsA as $widget ) {
			if ( !empty($widget->view) ) $viewNamekeyA[$widget->view] = true;
		}
		if ( empty($viewNamekeyA) ) return false;
		$installedForms = false;
		foreach( $viewNamekeyA as $viewNamekey => $usedNow ) {
			$layoutM = WModel::get( 'library.view' );
			$layoutM->whereE( 'namekey', $viewNamekey );
			$yid = $layoutM->load( 'lr', 'yid' );
						foreach( $allWidgetsA as $oneWidget ) {
				if ( !empty($oneWidget->view) && $viewNamekey != $oneWidget->view ) continue;
				if ( !empty($oneWidget->formElement) ) {
					$formElement = $oneWidget->formElement;
					unset( $oneWidget->formElement );
				} else {
					$formElement = null;
				}
								$oneWidget->widgetid = $this->installOneWidget( $oneWidget, $yid );
								if ( !empty($formElement) ) {
					$this->_installFormElement( $oneWidget, $yid, $formElement );
					$installedForms = true;
				}
			}
		}
				if ( $installedForms ) {
			$extensionHelperC = WCache::get();
			$extensionHelperC->resetCache( 'Views' );
		}
		return true;
	}
	private function _loadViewInfo($namekey,$return='yid') {
		static $viewA = array();
		if ( !isset( $viewA[$namekey] ) ) {
			$viewM = WModel::get( 'library.view' );
			if ( is_numeric($namekey) ) {
				$viewM->whereE( 'yid', $namekey );
			} else {
				$viewM->whereE( 'namekey', $namekey );
			}			$viewsO = $viewM->load('o' );
			$viewA[$namekey] = $viewsO;
		} else {
			$viewsO = $viewA[$namekey];
		}
		if ( isset( $viewsO->$return ) ) {
			return $viewsO->$return;
		}
	}
	private function _loadWidgetsA($extensionID) {
		if ( empty($extensionID) ) return false;
		$folder = WExtension::get( $extensionID, 'folder' );
		if ( empty($folder) ) return false;
						if ( !class_exists('Install_Node_install') ) WLoadFile( 'install.class.install' );
		$className = ucfirst( $folder ) . '_Node_install';
		if ( ! class_exists($className) ) {
			WLoadFile( $folder . '.install.install' );
			if ( !class_exists( $className ) ) return false;
		}
		WText::load( $extensionID );
		$installClassC = new $className();
		if ( empty($installClassC) ) return false;
		if ( ! method_exists( $installClassC, 'addWidgets' ) ) return false;
		$allWidgetsA = $installClassC->addWidgets();
				$this->_checkViewExist( $allWidgetsA );
		return $allWidgetsA;
	}
	private function _checkViewExist($allWidgetsA) {
		if ( empty( $allWidgetsA ) ) return false;
		foreach( $allWidgetsA as $widget ) {
			if ( !empty($widget->view) ) {
				$yid = $this->_loadViewInfo( $widget->view, 'yid' );
				if ( empty($yid) ) $this->_createView( $widget );
			}		}
	}
	private function _createView($view) {
		$namekey = $view->view;
		$mainViewM = WModel::get( 'library.view' );
		$mainViewM->whereE( 'namekey', $namekey );
		if ( $mainViewM->exist() ) return true;
		if ( empty($view->viewName) ) $view->viewName = 'View: ' . $namekey;
		if ( empty($view->viewAlias) ) $view->viewAlias = 'View: ' . $namekey;
		$mainViewM->namekey = $namekey;
		$mainViewM->wid = WExtension::get( 'catalog.node' );
		$mainViewM->setChild( 'library.viewtrans', 'name', $view->viewName );
		if ( !empty($view->viewDesc ) ) $mainViewM->setChild( 'library.viewtrans', 'description', $view->viewDesc );
		$mainViewM->alias = $view->viewAlias;
		$mainViewM->type = 109;
		$mainViewM->frontend = 1;
		$mainViewM->widgets = 1;
		$mainViewM->useredit = 1;
		$mainViewM->rolid = WRoles::getRole( 'allusers' );
		$mainViewM->core = 0;
		$mainViewM->publish = 1;
		$mainViewM->save();
	}
	private function _installFormElement($oneWidget,$yid,$formElement) {
		$mainViewFormM = WModel::get( 'design.viewforms' );
		$parent = 0;
		$namekeyStart = $this->_loadViewInfo( $yid, 'namekey' )  . '_' . $oneWidget->namekey;
		$ordering = ( !empty($formElement->ordering) ? $formElement->ordering : 1 );
				if ( !empty($formElement->container) ) {
			$namekeyContainer = $namekeyStart . '_container';
			if ( ! ( $parent = $this->_checkFromAlreadyInstalled( $namekeyContainer ) ) ) {
				$mainViewFormM->setChild( 'design.viewformstrans', 'name', $oneWidget->name );
				if ( !empty($oneWidget->description) ) $mainViewFormM->setChild( 'main.viewformtrans', 'description', $oneWidget->description );
				$mainViewFormM->yid = $this->_loadViewInfo( $yid, 'yid' );
				$mainViewFormM->type = $formElement->container;
				if ( !empty($formElement->position) )$mainViewFormM->area = $formElement->position;
				$mainViewFormM->ordering = $ordering;
				$mainViewFormM->namekey = $namekeyContainer;
				$mainViewFormM->core = 0;
				$mainViewFormM->publish = 1;
				$mainViewFormM->returnId();
				$mainViewFormM->fid = null;
				$mainViewFormM->save();
				$parent = $mainViewFormM->fid;
			} else {
			}
			$ordering += 500;
		}
		$namekeyWidget = $namekeyStart . '_widget';
		$myWidgetParams = 'notitle=1
spantit=1
widgetid=' . $oneWidget->widgetid;
		$fid = $this->_checkFromAlreadyInstalled( $namekeyWidget, $yid );
		if ( ! $fid ) {
						$mainViewFormM->fid = null;
			$mainViewFormM->setChild( 'design.viewformstrans', 'name', $oneWidget->name );
							$mainViewFormM->yid = $this->_loadViewInfo( $yid, 'yid' );
			$mainViewFormM->type = 'main.widget';
			if ( !empty($formElement->position) )$mainViewFormM->area = $formElement->position;
			$mainViewFormM->ordering = $ordering;
			$mainViewFormM->namekey = $namekeyWidget;
			$mainViewFormM->parent = $parent;
			$mainViewFormM->core = 0;
			$mainViewFormM->publish = 1;
						$mainViewFormM->params = $myWidgetParams;
			$mainViewFormM->save();
		} else {
			$mainViewFormM->whereE( 'fid', $fid );
			$mainViewFormM->setVal( 'params', $myWidgetParams );
			$mainViewFormM->update();
		}
	}
	private function _checkFromAlreadyInstalled($namekey,$yid) {
		$libraryViewFormM = WModel::get( 'library.viewforms' );
		$libraryViewFormM->whereE( 'namekey', $namekey );
		$findO = $libraryViewFormM->load( 'o', array( 'fid', 'yid' ) );
		if ( empty($findO) ) return null;
		if ( $findO->yid != $yid ) {
						$libraryViewFormM->whereE( 'namekey', $namekey );
			$libraryViewFormM->setVal( 'yid', $yid );
			$libraryViewFormM->update();
		}
		return $findO->fid;
	}
	public function installOneWidget($oneWidget,$yid=0) {
		static $mainWidgetC = null;
		static $allusers = 0;
		if ( empty($allusers) ) {
			$allusers = WRole::getRole( 'allusers' );
		}
				$widgetM = WModel::get( 'main.widget' );
		$widgetM->whereE( 'namekey', $oneWidget->namekey );
		$widgetid = $widgetM->load( 'lr', 'widgetid' );
		if ( !empty($widgetid) ) return $widgetid;
		$widgetM->namekey = $oneWidget->namekey;
		$widgetM->alias = $oneWidget->alias;
		$widgetM->framework_type = ( !empty($oneWidget->framework_type) ? $oneWidget->framework_type : 5 );		if ( empty( $yid ) && !empty($oneWidget->view) ) {
			$yid = $this->_loadViewInfo( $oneWidget->view, 'yid' );
		}		$widgetM->framework_id = $yid;
		$widgetM->core = ( !empty($oneWidget->core) ? $oneWidget->core : 0 );			$widgetM->publish = ( isset($oneWidget->publish) ? $oneWidget->publish : 1 );
		if ( WExtension::exist( 'main.node' ) ) {
			if ( !empty($oneWidget->widgetType) ) {
				if ( empty($mainWidgetC) ) $mainWidgetC = WClass::get( 'main.widget', null, 'class', false );
				$widgetM->wgtypeid = $mainWidgetC->getWidgetTypeID( $oneWidget->widgetType );
			}		}
		if ( empty($widgetM->wgtypeid) ) {
			WMessage::log( 'widget type not defined : ' . $oneWidget->widgetType, 'install_widget' );
			return false;
		}
				if ( empty($oneWidget->name) ) $oneWidget->name = $oneWidget->alias;
		$widgetM->setChild( 'main.widgettrans', 'name', $oneWidget->name );
		if ( !empty($oneWidget->description) ) $widgetM->setChild( 'main.widgettrans', 'description', $oneWidget->description );
		$widgetM->rolid = ( !empty($oneWidget->rolid) ? $oneWidget->rolid : $allusers );
		if ( !empty($oneWidget->params) ) $widgetM->params = $oneWidget->params;
		$widgetM->returnId();
		$widgetM->setIgnore();
		$status = $widgetM->save();
		if ( $status ) return $widgetM->widgetid;
		else return false;
	}
}