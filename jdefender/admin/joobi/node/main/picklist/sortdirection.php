<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Sortdirection_picklist extends WPicklist {
function create() {
	$this->addElement( 0, 'Ascendant' );
	$this->addElement( 1, 'Descendant' );
}}