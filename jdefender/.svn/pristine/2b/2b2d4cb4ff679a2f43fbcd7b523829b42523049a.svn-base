<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_CoreProfile_edit_button extends WButtons_external {
function create(){
$usedOption=WPref::load('PUSERS_NODE_FRAMEWORK_FE');
if(empty($usedOption))$usedOption=WApplication::getFrameworkName();
$usersAddon=WAddon::get('users.'.$usedOption );
$link=$usersAddon->editUserRedirect( WUser::get('uid'), true);
if(empty($link )) return false;
$this->setAction($link );
return true;
}}