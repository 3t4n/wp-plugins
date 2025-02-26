<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement( 'form.layout' );
class Main_Corelistingparams_form extends WForm_layout {
function create() {
	$namekey = $this->getValue( 'type' );
	$mainDirectEditC = WClass::get( 'main.directedit' );
	$exist = $mainDirectEditC->getParamsView( $namekey, 'listing' );
	if ($exist) {
		$this->viewID = $exist;
		return parent::create();
	} else {
		return false;
	}
	return true;
}}