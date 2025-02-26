<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_view_apply_controller extends WController {
function apply() {
	$mainEditC = WClass::get( 'main.edit' );
	if ( !$mainEditC->checkEditAccess() ) return false;
	return parent::apply();
}}