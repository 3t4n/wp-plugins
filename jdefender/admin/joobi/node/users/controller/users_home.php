<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_home_controller extends WController {
function home(){
$isRegistered=WUser::isRegistered();
if(!empty($isRegistered)){
$itemId=WPage::getPageId('users','dashboard');
WPages::redirect('controller=users&task=dashboard',$itemId );
}
$usedOption=WPref::load('PUSERS_NODE_FRAMEWORK_FE');
if(empty($usedOption))$usedOption=WApplication::getFrameworkName();
$usersAddon=WAddon::get('users.'.$usedOption );
$usersAddon->goLogin();
return true;
}
}