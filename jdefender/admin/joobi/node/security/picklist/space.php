<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Space_picklist extends WPicklist {
function create() {
	$this->addElement( 1, WText::t('1206961849MVDJ') );
	$this->addElement( 250, WText::t('1206732425HINY') );
	return true;
}}