<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Space_Apikeynotvalid_form extends WForms_default {
function show() {
	$trans = WGlobals::get( 'text' );
	$this->content = urldecode( $trans );
	return true;
}}