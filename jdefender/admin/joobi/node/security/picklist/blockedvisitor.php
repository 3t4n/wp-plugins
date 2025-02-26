<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Blockedvisitor_picklist extends WPicklist {
function create() {
	$this->addElement( 6, WText::t('1242282446GIMB') );
	$this->addElement( 9, WText::t('1382669588FBKS') );
	return true;
}}