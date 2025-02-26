<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Badwords_model extends WModel {
	function validate() {
		if ( empty($this->lgid) ) $this->lgid = WUsers::get( 'lgid' );
		return true;
	}
}