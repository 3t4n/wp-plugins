<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_loginregister_controller extends WController {
function loginregister(){
$isRegistered=WUser::isRegistered();
if(!empty($isRegistered)){
$uid=WUser::get('uid');
$usedOption=WPref::load('PUSERS_NODE_FRAMEWORK_FE');
if(empty($usedOption))$usedOption=WApplication::getFrameworkName();
$usersAddon=WAddon::get('users.'.$usedOption );
$usersAddon->goProfile($uid );
}else{
$frameworkFE=WPref::load('PUSERS_NODE_FRAMEWORK_FE');
if(empty($frameworkFE))$frameworkFE=WApplication::getFrameworkName();
if(!in_array($frameworkFE, array('users','contacts'))){
$this->userE('1481476072JQET');
return false;
}
}
return true;
}
}