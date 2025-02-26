<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Email_type_type extends WTypes {
var $type=array(
1=> 'framework'
,2=> 'phpmailer'
,3=> 'sendmail'
,4=> 'qmail'
,10=> 'smtp'
,11=> 'elasticemail'
,101=> 'bulksms'
,102=> 'callfire'
,103=> 'clickatell'
,104=> 'itagg'
,105=> 'nexmo'
,110=> 'masivos'
,115=> 'zwetext'
,117=> 'mobility'
);
}