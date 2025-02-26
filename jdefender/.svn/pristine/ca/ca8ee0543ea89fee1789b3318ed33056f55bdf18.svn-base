<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_login_controller extends WController {
function login(){
$uid=WUser::get('uid');
$usedOption=WPref::load('PUSERS_NODE_FRAMEWORK_FE');
if(empty($usedOption))$usedOption=WApplication::getFrameworkName();
$usersAddon=WAddon::get('users.'.$usedOption );
if(empty($uid)){
$allowLogin=WPref::load('PUSERS_NODE_LOGINALLOW');
if(empty($allowLogin)){
$this->userW('1402327860NWWL');
return false;
}else{
$usersAddon->goLogin();
}
}else{
$usersAddon->goProfile($uid );
}
return true;
}
}