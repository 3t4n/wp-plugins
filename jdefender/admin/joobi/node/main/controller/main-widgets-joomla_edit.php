<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_widgets_joomla_edit_controller extends WController {
	function edit() {
		$libraryCMSMenuC = WAddon::get( 'api.' . JOOBI_FRAMEWORK . '.cmsmenu' );
		$status = $libraryCMSMenuC->editExtensionPreferences();
		if ( empty($status) ) return false;
		return parent::edit();
	}
}