<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_credentials_apply_controller extends WController {
	function apply() {
		$this->returnId();
		parent::save();
		WPages::redirect( 'controller=main-credentials&task=edit&eid=' . $this->_eid );
		return true;
	}
}