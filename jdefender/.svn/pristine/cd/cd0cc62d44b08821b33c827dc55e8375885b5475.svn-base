<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_verifymobile_controller extends WController {
function verifymobile(){
$activation=self::getFormValue('code','x');
$uid=self::getFormValue('uid','x');
$usersM=WModel::get('users');
$usersM->whereE('uid',$uid );
$usersM->whereE('activation',$activation );
$exist=$usersM->load('lr','uid');
if(empty($exist)){
$this->userE('1484827022PIFN');
WPages::redirect('controller=users&task=entercode&uid='.$uid );
return false;
}
$usersM->whereE('uid',$uid );
$usersM->setVal('activation','');
$usersM->update();
$usersAddon=WClass::get('users.api');
$usersAddon->blockUser( 0, $uid );
$subscribeEvent='register';
$obj=new stdClass;
$obj->event=$subscribeEvent;
WEvent::get('users.register',$uid, $obj );
$this->userS('1484827022PIFO');
WPages::redirect('controller=users&task=login');
return true;
return true;
}
}