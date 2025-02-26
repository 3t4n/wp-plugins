<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_Attributes_type extends WTypes {
	var $attributes = array(
		'0' => '',
		'1' => 'UNSIGNED',
		'2' => 'UNSIGNED ZEROFILL',
		'4' => 'ZEROFILL',
		'3' => 'ON UPDATE CURRENT_TIMESTAMP',
		'a0' => '-- Only for timestamp',
		'9' => 'CURRENT_TIMESTAMP'
		);
}