<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_add_controller extends WController {
function add(){
$userFrame=WPref::load('PUSERS_NODE_FRAMEWORK_BE');
if(empty($userFrame))$userFrame=WApplication::getFrameworkName();
$usersAddon=WAddon::get('users.'.$userFrame );
if(!empty($usersAddon))$usersAddon->addUserRedirect();
return parent::add();
}
}