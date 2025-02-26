<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_edit_controller extends WController {
function edit(){
$eid=WGlobals::getEID();
$frameworkUsed=WRoles::isAdmin()?WPref::load('PUSERS_NODE_FRAMEWORK_BE') : WPref::load('PUSERS_NODE_FRAMEWORK_FE');
if(empty($frameworkUsed))$frameworkUsed=WApplication::getFrameworkName();
$usersAddon=WAddon::get('users.'.$frameworkUsed );
if(!empty($usersAddon))$usersAddon->editUserRedirect($eid );
return parent::edit();
}
}