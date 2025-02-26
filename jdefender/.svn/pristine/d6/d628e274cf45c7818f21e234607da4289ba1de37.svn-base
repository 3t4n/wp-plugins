<?php 
/** @copyright Copyright (c) 2007-2016 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_model_generateview_controller extends WController {
	function generateview() {
		$sid = WController::getFormValue( 'sid' );
		$wid = WController::getFormValue( 'wid' );
		$controller = WController::getFormValue( 'controller' );
		$rolid = WController::getFormValue( 'rolid' );
		$view = WController::getFormValue( 'view' );
		if ( empty($sid) || empty($wid) || empty($controller) ) {
			return $this->historyE('1434658510PAMO');
			return false;
		}
WMessage::log( '2', 'jdesign-generateview' );
WMessage::log( '2.1', 'jdesign-generateview' );
WMessage::log( ' sid: '.$sid.' wid: '.$wid.' controller: '.$controller, 'jdesign-generateview' );
WMessage::log( '2.2', 'jdesign-generateview' );
		if ( empty($sid) || empty($wid) || empty($controller) ) return false;
		preg_match_all('/[a-zA-Z0-9-]+/', $controller, $result);
		$string = implode('', $result[0]);
		if ( $string !== $controller ) {
			$message->userE('1309938333EEVB');
			WPages::redirect( 'controller=design-model&search='. WGlobals::getEID() );
		}
		$controller = WGlobals::filter( $controller, 'namekey' );
		$modelView = WObject::get( 'design.view' );
		$modelO = new stdClass;
		$modelO->sid = $sid;
		$modelO->wid = $wid;
		$modelO->controller = $controller;
		$modelO->access = $rolid;
		$modelO->view = $view;
		$modelView->generate( $modelO );
		$this->showM( true, 'create', 1, $sid );
		if ( $view=='show' || $view=='form' ) {
			$shownamekey = WGlobals::get('shownamekey');
			$link = str_replace(array('$shownamekey','$controller'), array($shownamekey,$controller),WText::t('1309938333EEVC'));
			$link .= '<a href="' . WPage::routeURL('controller='.$controller) . '">' . WText::t('1309938333EEVD') . '</a>';
		} else $link = '<a href="' . WPage::routeURL('controller='.$controller) . '">' . WText::t('1309938333EEVE') . '</a>';
		$this->userS($link);
		return true;
	}
}