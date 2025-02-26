<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Fieldparent_picklist extends WPicklist {
function create() {
	$count = 9;
	$this->addElement( 0, WText::t('1242179646EPJF') );
	for ($i = 1; $i < $count; $i++) {
		$this->addElement( $i, WText::t('1360240327QUAB') . $i );
	}
	return true;
}}