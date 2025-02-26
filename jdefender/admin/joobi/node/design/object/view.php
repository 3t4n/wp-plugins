<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_View_object extends WClasses {
	private $wid = 0;
	private $controller = '';
	private $access = 0;
	private $myModel = 0;
	private $myColumnA = array();
	private $pkey = 0;
	private $modelName = '';
	private $viewM = null;
	private $viewTM = null;
	private $formID = 0;
	private $listingID = 0;
	private $showID  = 0;
	private $_folderName = '';
	private $_actionGenerateController = true;
	private $_viewO = null;
	private $_viewElementA = array();
	public function generate($modelO) {
		if ( empty( $modelO->sid ) || empty($modelO->wid ) ) {
			$this->codeE( 'Data not defined.' );
			return false;
		}
		$this->wid = $modelO->wid;
		$this->controller = $modelO->controller;
		$this->access = $modelO->access;
				$this->myModel = WModel::get( $modelO->sid );
		$this->_setup();
		if ( !isset($modelO->view) ) $modelO->view = '';
		switch( $modelO->view ) {
			case'listing':
				$this->genViewListing();
				$this->_genElementsListing();
			break;
			case'form':
				$this->genViewForm();
				$this->_genElementsForm();
			break;
			case'show':
				$this->genViewShow();
				$this->_genElementsShow();
			break;
			default:
				$this->genViewListing();
				$this->genViewForm();
				$this->genViewShow();
				$this->_genElementsListing();
				$this->_genElementsForm();
				$this->_genElementsShow();
			break;
		}
		return true;
	}
	public function setModelID($sid) {
		if ( !empty($sid) ) $this->myModel = WModel::get( $sid );
	}
	public function setViewInformation($viewO) {
		if ( empty($viewO) ) return false;
				$this->viewM = WModel::get( 'library.view' );
		$this->viewTM = WModel::get( 'library.viewtrans' );
		$this->viewM->_ck = false;
		foreach( $viewO as $prop => $value ) {
			$this->viewM->$prop = $value;
		}
	}
	public function setViewTranslationInformation($viewO) {
		if ( empty($viewO) ) return false;
		foreach( $viewO as $prop => $value ) {
			$this->viewTM->$prop = $value;
		}
	}
	public function addFormElement($formO) {
		if ( !empty($formO) ) $this->_viewElementA[] = $formO;
	}
	public function generateView() {
		$this->_actionGenerateController = false;
				$this->genViewForm();
		static $formM = null;
		static $formMT = null;
		if ( !isset($formM) ) $formM = WModel::get( 'view.forms' );
		if ( !isset($formMT) ) $formMT = WModel::get( 'view.formstrans' );
				$this->_genMenu( $this->formID, array( 'apply', 'save', 'cancel', 'help' ) );
		$ordering = 1;
				foreach( $this->_viewElementA as $oneForm ) {
			$formM->_ck = false;
			$formMT->_ck = false;
			if ( !empty($this->access) ) $formM->rolid = $this->access;
			else $formM->rolid = 1;
			$formM->yid = $this->formID;
			if ( isset($oneForm->sid) ) $formM->sid = $oneForm->sid;
			else $formM->sid = $this->myModel->getModelID();
			$formM->namekey = $oneForm->namekey;
			$formM->sid = $oneForm->sid;
			$formM->publish = 1;
			$formM->map = $oneForm->map;
			$formM->ordering = $ordering;
			$formM->fid = 0;
			$formM->core = 1;
			$formM->params = '';
			$formM->initial = '';
			$formM->type = '';
			$formM->did = 0;
			$formM->hidden = 0;
			if ( !empty($oneForm->name) ) {
				$formMT->name = $oneForm->name;
			} else {
				$formMT->name = ucfirst($formM->map);
			}			if ( !empty($oneForm->description) ) {
				$formMT->description = $oneForm->description;
			}
			$this->_processFromElement( $formM );
			$formM->returnId();
			$formM->save();
			$formMT->fid = $formM->fid;
			$formMT->lgid = 1;
			$formMT->save();
			$ordering++;
		}
	}
	private function _setup() {
		if ( !$this->myModel->getParam('dbtid',false ) ) return false;
				$columnM = WModel::get( 'library.columns' );
		$columnM->whereE( 'dbtid', $this->myModel->getTableId() );
				$columnM->orderBy( 'ordering' );
		$this->myColumnA = $columnM->load( 'ol' );
		$this->pkey = $this->myModel->getPKs();
		$this->modelName = str_replace( '.', '_', $this->myModel->getModelNamekey() );
		$this->_folderName = WExtension::get( $this->wid, 'folder' );
		$ctrA = explode( '-', $this->controller );
		$this->_shortController = ( count($ctrA) > 1 ? $ctrA[1] : $ctrA[0] );
				$this->viewM = WModel::get( 'library.view' );
		$this->viewTM = WModel::get( 'library.viewtrans' );
		$this->viewM->_ck = false;
		return true;
	}
	function genViewListing() {
				$this->viewM = WModel::get( 'library.view' );
		$this->viewM->setChild( 'library.viewtrans', 'name', ucfirst( str_replace( '_', ' ', $this->modelName ) ) . 's' );
		$this->viewM->namekey = $this->_folderName . '_listing_' . $this->_shortController;
		$this->viewM->icon = 'link';
		$this->viewM->type = 2;
		$this->viewM->menu = 13;
		$this->viewM->sid = $this->myModel->getModelID();
		$this->viewM->wid = $this->wid;
		$this->viewM->pagination = 1;
		$this->viewM->alias = str_replace( '_', ' ', $this->modelName ) . ' Listing';
		$this->viewM->rolid = $this->access;
		$this->viewM->returnId();
		$this->viewM->save();
		$this->listingID = $this->viewM->yid;
						$this->_genController( 'listing', $this->listingID );
	}
	function genViewForm() {
				$this->viewM = WModel::get( 'library.view' );
		$this->viewM->_ck = false;
		$this->viewM->yid = '';
		if ( !isset($this->viewM->namekey) ) $this->viewM->namekey = $this->_folderName . '_form_' . $this->_shortController;
		if ( !isset($this->viewM->icon) ) $this->viewM->icon = 'link';
		if ( !isset($this->viewM->type) ) $this->viewM->type = 51;
		if ( !isset($this->viewM->menu) ) $this->viewM->menu = 13;
		if ( !isset($this->viewM->sid) ) $this->viewM->sid = $this->myModel->getModelID();
		if ( !isset($this->viewM->wid) ) $this->viewM->wid = $this->wid;
		if ( !isset($this->viewM->alias) ) $this->viewM->alias = str_replace( '_', ' ', $this->modelName ) . ' Form';
		if ( !isset($this->viewM->rolid) ) $this->viewM->rolid = $this->access;
		if ( !isset($this->viewM->params) ) $this->viewM->params = 'autosave=1';
		$this->viewM->returnId();
		WGlobals::set( 'shownamekey', $this->viewM->namekey );
		$this->viewM->save();
		$this->formID = $this->viewM->yid;
				$this->viewTM->yid = $this->formID;
		$this->viewTM->name = ucfirst( str_replace( '_', ' ', $this->modelName ) );
		$this->viewTM->save();
		return true;
	}
	function genViewShow() {
				$this->viewM = WModel::get( 'library.view' );
		$this->viewM->_ck = false;
		$this->viewM->yid = '';
		$this->viewM->namekey = $this->_folderName . '_show_' . $this->_shortController;
		$this->viewM->icon = 'link';
		$this->viewM->type = 151;
		$this->viewM->menu = 13;
		$this->viewM->sid = $this->myModel->getModelID();
		$this->viewM->wid = $this->wid;
		$this->viewM->alias = str_replace( '_', ' ', $this->modelName ) . ' Show';
		$this->viewM->rolid = $this->access;
		$this->viewM->returnId();
		WGlobals::set('shownamekey',$this->viewM->namekey);
		$this->viewM->save();
		$this->showID = $this->viewM->yid;
				$this->viewTM->yid = $this->showID;
		$this->viewTM->name = ucfirst( str_replace( '_', ' ', $this->modelName ) );
		$this->viewTM->save();
		return true;
	}
	private function _genController($task='listing',$yid=0) {
		if ( $task == 'help' ) return true;
		static $menu = array();
		if ( isset($menu[$task]) ) return true;
		$menu[$task] = true;
		static $controlM = null;
		if ( !isset($controlM) ) $controlM = WModel::get( 'library.controller' );
		$mytask = $this->_existTask($task);
		if ($mytask->exist) return true;
		$controlM->wid = $this->wid;
		$controlM->yid = $yid;
		$controlM->admin = 1;
		$controlM->trigger = 10;
		$controlM->namekey = $this->controller.'.'.$task;
		$controlM->visible = 9;
		$controlM->path = 0;
		if ($task=='listing')$controlM->premium = 1;
		else $controlM->premium = 0;
		$controlM->app = $this->controller;
		$controlM->task = $task;
		$controlM->rolid = $this->access;
		$controlM->save();
		return true;
	}
	private function _updateController($task='listing',$yid=0) {
		static $controlM = null;
		if ( !isset($controlM) ) $controlM = WModel::get( 'library.controller' );
		$mytask = $this->_existTask($task);
		if (!$mytask->exist){
		}elseif (empty($mytask->yid)) {
			$controlM->whereE('namekey', $this->controller.'.'.$task);
			$controlM->setVal('yid', $yid);
			$controlM->update();
		}
		return true;
	}
	private function _existTask($task='listing') {
		static $controlM = null;
		static $taskA= array();
		if ( !isset($taskA[$task]) ){
			if ( !isset($controlM) ) $controlM = WModel::get( 'library.controller' );
			$controlM->whereE('namekey', $this->controller.'.'.$task);
			$yid = $controlM->load('lr', 'yid');
			if ( !isset($yid) ) {
				if ( !isset( $taskA[$task] ) ) $taskA[$task] = new stdClass;
				$taskA[$task]->exist = false;
			}			else $taskA[$task]->exist = true;
			if (empty($yid)) $taskA[$task]->yid = 0;
			else  $taskA[$task]->yid = $yid;
		}		return $taskA[$task];
	}
	private function _genElementsListing() {
		$listingM = WModel::get( 'design.viewlistings' );	
		$this->_genMenu( $this->listingID, array( 'new', 'edit', 'copyall', 'deleteall', 'help' ) );
		$ordering = 1;
		$listingM->setChild( 'design.viewlistingstrans', 'name', '#' );
		$listingM->yid = $this->listingID;
		$listingM->rolid = $this->access;
		$listingM->ordering = $ordering;
		$listingM->type = 'output.rownumber';
		$listingM->returnId();
		$listingM->save();
		$ordering++;
		$id = new stdClass;
		$id->name = 'id';
		$edit = new stdClass;
		$edit->name = 'edit';
		$editA = array();
		$editA[1] = $edit;
		$listingColumn = $this->myColumnA;
		$listingColumn = array_merge( $editA, $listingColumn );
		array_push( $listingColumn, $id );
		$hidden = array();
		foreach( $listingColumn as $column ) {
			$listingM = WModel::get( 'design.viewlistings' );				$name = '';
			$params = '';
			$listingM->_ck = false;
			$listingM->yid = $this->listingID;
			$listingM->sid = $this->myModel->getModelID();
			$listingM->map = $column->name;
			$listingM->rolid = $this->access;
			$listingM->namekey = '';
			$listingM->ordering = $ordering;
			$listingM->lid = 0;
			$listingM->core = 1;
			$listingM->type = '';
			$listingM->params='';
			$name = ucfirst($listingM->map);
						switch($listingM->map){
				case in_array( $listingM->map, $this->pkey ):
					$listingM->type = 'output.checkbox';
				break;
				case 'publish':
					$listingM->type = 'output.publish';
					$this->_genController('toggle', $this->listingID);
				break;
				case 'core':
				case 'private':
					$listingM->type = 'output.yesno';
				break;
				case 'ordering':
					$listingM->type = 'output.order';
				break;
				case 'rolid':
					$listingM->type = 'output.access';
				break;
				case 'created':
				case 'modified':
					$listingM->type = 'output.datetime';
					$params = 'formatdate=5';
					$listingM->params=$params;
				break;
				case 'filid':
					$listingM->type = 'output.image';
				break;
				case 'modifiedby':
				case 'uid':
					$hidden[$listingM->map] = true;
					$listingM->type = 'output.text';
					$listingM->map = 'name';
					$listingM->sid = WModel::get( 'users', 'sid' );
				break;
				case 'namekey':
					$listingM->type = 'output.text';
					$params = 'lien=controller='.$this->controller.'&task=show(eid='.$this->pkey[0].')';
					$listingM->params=$params;
					$this->_genController('show', $this->showID);
				break;
				case 'edit':
					$listingM->type = 'output.butedit';
					$params = 'lien=controller='.$this->controller.'&task=edit(eid='.$this->pkey[0].')';						$listingM->params= 'width=2%';
					$listingM->map = $this->pkey[0];
					$name = 'Edit';
				break;
				case 'id':
					$listingM->type = 'output.text';
					$listingM->map = $this->pkey[0];
					$params = 'width=2%';
					$listingM->params=$params;
					$name = 'ID';
				break;
				default:
					$listingM->type = 'output.text';
				break;
			}
			$listingM->setChild( 'design.viewlistingstrans', 'name', $name );
			$listingM->returnId();
			$listingM->save();
			$ordering++;
		}
		$listingM->_ck = false;
		$listingM->type = 'output.text';
		$id = 'lid';
				if ( !empty($hidden) ) $this->_genHidden( $hidden, 'design.viewlistings', $id, $this->listingID );
				$this->_updateController('cancel', $this->formID);
		$this->_updateController('deleteall', $this->formID);
		$this->_updateController('save', $this->formID);
		$this->_updateController('copyall', $this->formID);
		return true;
	}
	private function _genHidden($hidden,$modelNamekey,$id,$yid) {
		foreach($hidden as $hiddenmap=>$hide){
			$modelM = WModel::get( $modelNamekey );
			$modelM->setChild( $modelNamekey . 'trans', 'name', 'hidden' );
			$modelM->yid = $yid;
			$modelM->sid = $this->myModel->getModelID();
			switch($hiddenmap){
				case 'modifiedby':
				case 'uid':
					$modelM->sid = WModel::get( 'users', 'sid' );
					$modelM->map = 'uid';
					$this->_insertHidden( $modelM, $id );
				break;
				default:
					$modelM->map = $hiddenmap;
					$this->_insertHidden( $modelM, $id );
				break;
			}		}	}
	private function _insertHidden($modelM,$id) {
		$modelM->_ck = false;
		$modelM->hidden = 1;
		$modelM->$id = '';
		$modelM->rolid = $this->access;
		$modelM->returnId();
		$modelM->save();
		return true;
	}
	private function _genElementsForm() {
		$this->_genMenu( $this->formID, array( 'apply', 'save', 'cancel', 'help' ) );
		$ordering = 1;
		foreach( $this->myColumnA as $column ) {
			$formM = WModel::get( 'design.viewforms' );
			$removeColumn =  array('created', 'modified', 'ordering');
			if ( in_array( $column->name, $removeColumn ) ) continue;
			if ( in_array( $column->name, $this->pkey ) ) continue;
			$formM->_ck = false;
			$formM->setChild( 'design.viewformstrans', 'name', ucfirst($column->name) );
			$formM->rolid = $this->access;
			$formM->yid = $this->formID;
			$formM->sid = $this->myModel->getModelID();
			$formM->namekey = '';
			$formM->publish = 1;
			$formM->map = $column->name;
			$formM->ordering = $ordering;
			$formM->fid = 0;
			$formM->core = 1;
			$formM->params='';
			$formM->initial = '';
			$formM->type = '';
			$formM->did = 0;
			$formM->hidden = 0;
			$this->_processFromElement( $formM );
			$formM->returnId();
			$formM->save();
			$ordering++;
		}
				$this->_updateController( 'add', $this->formID );
		$this->_updateController( 'edit', $this->formID );
		return true;
	}
	private function _processFromElement(&$formM) {
						switch( $formM->map ) {
				case 'publish':
					$formM->type = 'output.publish';
				break;
				case 'core':
				case 'private':
					$formM->type = 'output.yesno';
				break;
				case 'rolid':
					$formM->type = 'output.select';
					$formM->initial = '7';
					$formM->params = "num=1";
					$formM->did = WView::picklist( 'role_user_access', '', null, 'did' );					break;
				default:
					$formM->type = 'output.text';
				break;
			}
			if ( $formM->type==16 ) {
				$formM->type = 'output.textarea';
				$formM->params = 'editor=user';
			}
	}
	private function _genElementsShow() {
				$this->_genMenu( $this->showID, array( 'edit', 'cancel', 'help' ) );
		$ordering = 1;
		$hidden = array();
		$showM = WModel::get( 'design.viewforms' );			
				foreach( $this->myColumnA as $column ) {
			if ( in_array( $column->name, $this->pkey ) ) continue;
			$showM = WModel::get( 'design.viewforms' );				$showM->_ck = false;
			$showM->yid = $this->showID;
			$showM->sid = $this->myModel->getModelID();
			$showM->rolid = $this->access;
			$showM->namekey = '';
			$showM->publish = 1;
			$showM->map = $column->name;
			$showM->ordering = $ordering;
			$showM->fid = 0;
			$showM->initial = '';
			$showM->type = '';
			$showM->core = 1;
			$showM->readonly = 1;
						switch($showM->map){
				case 'publish':
					$showM->type = 'output.publish';
				break;
				case 'core':
				case 'private':
					$showM->type = 'output.yesno';
				break;
				case 'modified':
				case 'created':
					$showM->type = 'output.datetime';
					$showM->params = 'formatdate=5';
				break;
				case 'modifiedby':
				case 'uid':
					$hidden[$showM->map] = true;
					$showM->type = 'output.text';
					$showM->map = 'name';
					$showM->sid = WModel::get( 'users', 'sid' );
				break;
				case 'rolid':
					$showM->type = 'output.select';
					$showM->initial = 7;
					$showM->params = "num=1";
					$showM->did = 40;
				break;
				default:
					$showM->type = 'output.text';
				break;
			}
			$showM->setChild( 'design.viewformstrans', 'name', ucfirst($column->name) );
			$showM->returnId();
			$showM->save();
			$ordering++;
		}
		$showM->_ck = false;
		$showM->type = 'output.text';
		$id='fid';
				if ( !empty($hidden) ) $this->_genHidden( $hidden, 'design.viewforms', $id, $this->showID );
				$this->_updateController('show', $this->showID);
		return true;
	}
	private function _genMenu($yid,$names) {
		$menuM = WModel::get( 'design.viewmenus' );
		$menuMT = WModel::get( 'design.viewmenustrans' );
		$controlM = WModel::get( 'library.controller' );
		$ordering = 1;
		foreach( $names as $name ) {
			$icon = $name;
			$action = $name;
			$title = $name;
			$params = '';
			switch( $name ) {
				case 'new':
					$action = 'add';
					break;
				case 'apply':
					$title = 'Save';
					$icon = 'save';
					$params = 'formvalidation=1';
					break;
				case 'save':
					$title = 'Done';
					$icon = 'done';
					$params = 'formvalidation=1';
					break;
				case 'copy':
				case 'delete':
				case 'copyall':
				case 'deleteall':
					$params = "confirm=1\n\rlslct=1";
					break;
				case 'edit':
					$params = "lslct=1";
					break;
				default:
					break;
			}
			$menuM->_ck = false;
			$menuM->yid = $yid;
			$menuM->icon = $icon;
			$menuM->action = $action;
			$menuType = WType::get( 'view.menus');
			$task = $menuType->getValue( $name, false );
			$menuM->namekey = '';
			$menuM->params = $params;
			$menuM->type = ( $task> 0 ) ? $task : 1;
			$menuM->ordering = $ordering;
			$menuM->mid = 0;
			$menuM->returnId();
			$menuM->save();
			$menuMT->mid = $menuM->mid;
			$menuMT->lgid = 1;
			$menuMT->name = ucfirst( $title );
			$menuMT->insert();
			$ordering++;
			if ( $this->_actionGenerateController ) {
								$arrayListing = array( 'save', 'cancel', 'copyall', 'deleteall' );
				if ( in_array($name, $arrayListing) ) {
					if ( !empty($this->listingID) ) $view = $this->listingID;
					else{
						$mylisting = $this->_existTask('listing');
						$view = $mylisting->yid;
					}
				} else $view = $this->formID;
				$this->_genController( $action, $view );
			}
		}
		return true;
	}}