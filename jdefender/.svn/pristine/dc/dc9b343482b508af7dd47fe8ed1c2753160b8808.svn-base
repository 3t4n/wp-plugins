<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Main_viewmenu_form_view extends Output_Forms_class {
function prepareView() {
	if ( WRoles::isAdmin( 'manager' ) ) {
		$this->removeMenus( 'main_viewmenu_form_save_ajax' );
	} else {
		$this->removeMenus( 'main_viewmenu_form_save_normal' );
	}
	return true;
}}