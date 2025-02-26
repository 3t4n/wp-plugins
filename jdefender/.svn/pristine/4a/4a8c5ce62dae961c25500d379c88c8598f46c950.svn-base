<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_model_fields_save_controller extends WController {
function save($notUsed=null) {
	$status = parent::save();
		$cache = WCache::get();
	$cache->resetCache( 'Views' );
	WPages::redirect( 'controller=design-model-fields&sid=' . $this->_model->sid );
	return $status;
}
}