<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Countries_Node_model extends WModel {
	function validate() {
		$this->core = 0;
		return true;
	}
}