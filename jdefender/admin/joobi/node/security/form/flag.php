<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_CoreFlag_form extends WForms_default {
function show(){
	$img=WGlobals::get('ipIsoCode2');
	if (!empty($img)){
		$this->content="<img src='". JOOBI_URL_MEDIA .'images/flags/' .strtolower($img).".gif'";
	} else {
		$this->content='';
	}
	WGlobals::set('ipIsoCode2',null );
	return true;
}
}