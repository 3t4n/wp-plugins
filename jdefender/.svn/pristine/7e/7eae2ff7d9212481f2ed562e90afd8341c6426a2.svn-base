<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement( 'form.text' );
class WForm_Coresubmit extends WForm_text {
	protected $inputClass = 'button';
	protected $inputType = 'submit';	
	function create() {
		$this->element->required = false;
		$tmpA = explode( '|', substr( $this->element->map, 2, -1 ) );
		$task = $tmpA[0];
		$getCtrl = ( !empty($tmpA[1]) ? $tmpA[1] : '' );
		$formObject = WView::form( $this->formName );
		$formObject->hidden('task', $task, true );
		$submitrequired = ( isset( $this->element->submitrequired) ) ? true : false;
		$req = ( !empty( $this->reqtask ) ) ? true : false;
		if ( !isset($this->nojsvalid ) ) {
			$paramsArray = array();
			$jscript = WPage::getScript();
			if ( WPref::load( 'PLIBRARY_NODE_AJAXPAGE' ) && empty($this->element->submitnoajax) ) {
				$paramsO = WObject::newObject( 'output.jsaction' );
				$paramsO->form = $this->formName;
				$valueA = array();
				$eid = WGlobals::getEID();
				if ( !empty($eid) ) $valueA['eid'] = $eid;
				if ( !empty($this->yid) ) $valueA['crtyid'] = $this->yid;
				if ( !empty($getCtrl) ) $paramsO->controller = $getCtrl;
								$joobiRun = WPage::jsAction( $task, $paramsO, $valueA );
				$this->extras = ' onClick="return ' . $joobiRun . '"';
			} else {
								if ( $req || $submitrequired || in_array( $task, array( 'apply', 'save', 'register', 'goregister', 'gologin' ) ) ) {
					$paramsArray['validation'] = true;
				}				
				if ( empty( $this->element->noprssenter) ) {
					$paramsArray['enterSubmit'] = true;
				}				
				if ( WGlobals::get( 'is_popup', false, 'global' ) ) {
					if ( !empty($this->element->popclose) ) $paramsArray['popclose'] = true;
					if ( !empty($this->element->poprefresh) ) {
						$paramsArray['refresh'] = true;
						$paramsArray['ajx'] = true;
					}				}				
				if ( empty($getCtrl) ) $getCtrl = WGlobals::get( 'controller' );
				if ( empty($getCtrl) ) {
					WMessage::log( 'Unknown controller for the submit button', 'submit_button_error' );		
					WMessage::log( $this  , 'submit_button_error' );
				}				
				$paramsArray['controller'] = $getCtrl;
				$eid = WGlobals::getEID();
				if ( !empty($eid) ) $paramsArray['eid'] = $eid;
				$paramsArray['disable'] = true;
				$joobiRun = WPage::actionJavaScript( $task, $this->formName, $paramsArray );
				$this->extras = ' onClick="return ' . $joobiRun . '"';
				$joobiRun = 'return ' . $joobiRun;
			}			
		}
				$this->value = $this->element->name;
		if ( !empty( $this->element->themepref ) ) {
			$explodeA = explode( '.', $this->element->themepref );
			$objButtonO = WPage::newBluePrint( 'prefcatalog' );
			$objButtonO->type = $explodeA[1];
		} else {
			$objButtonO = WPage::newBluePrint( 'button' );
			$objButtonO->type = 'button';
		}
		if ( !empty( $this->idLabel ) ) $objButtonO->id = $this->idLabel;
		$objButtonO->text = $this->element->name;
		if ( !empty($this->element->faicon) ) $objButtonO->icon = $this->element->faicon;
		if ( !empty($this->element->color) ) $objButtonO->color = $this->element->color;
		$objButtonO->linkOnClick = $joobiRun;
		if ( !empty( $this->element->themepref) ) {
			$html = WPage::renderBluePrint( 'prefcatalog', $objButtonO );
		} else {
			$html = WPage::renderBluePrint( 'button', $objButtonO );
		}
				if ( !empty($this->element->width) ) {
			$this->content .= '<div style="width:' . $this->element->width . '">'  . $html . '</div>';
		} else {
			$this->content .= $html;
		}
		return true;
	}
	function show() {
		return $this->create();
	}
}