<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_resetpwd_controller extends WController {
function resetpwd(){
$oneEmail=WController::getFormValue('email','x');
if(empty($oneEmail )){
$this->userE('1410373233CVZL');
return $this->_finished();
}
$usersEmail=WClass::get('users.email');
$EMAIL=trim($oneEmail );
if(!$usersEmail->validateEmail($EMAIL)){
$message->userE('1410373233CVZM',array('$EMAIL'=>$EMAIL));
return $this->_finished();
}
$blocked=WUsers::get('blocked',$EMAIL );
if($blocked){
$this->userW('1493078527CFHF');
return $this->_finished();
}
$uid=WUser::get('uid',$EMAIL );
if(empty($uid )){
$this->userE('1410373233CVZN');
return $this->_finished();
}
$usersRegsiterC=WClass::get('users.register');
do {
$password=WTools::randomString( 20, true);
$status=$usersRegsiterC->checkPassword($password, WPref::load('PUSERS_NODE_PWD_STRENGTH_REGISTER'));
} while($status );
$usersM=WModel::get('users');
$usersM->whereE('uid',$uid );
$usersM->load('o');
if(!isset($usersM->x ))$usersM->x=array();
$usersM->x['password']=$password;
$usersM->x['password_confirmed']=$password;
$usersM->save();
$usersRegisterC=WClass::get('users.register');
$usersRegisterC->emailPassword($uid, $password, true);
$this->userN('1490728569CSEN');
$usedOption=WPref::load('PUSERS_NODE_FRAMEWORK_FE');
if(empty($usedOption))$usedOption=WApplication::getFrameworkName();
$usersAddon=WAddon::get('users.'.$usedOption );
$usersAddon->goLogin();
return true;
}
private function _finished(){
$usedOption=WPref::load('PUSERS_NODE_FRAMEWORK_FE');
if(empty($usedOption))$usedOption=WApplication::getFrameworkName();
$usersAddon=WAddon::get('users.'.$usedOption );
$usersAddon->goLogin();
return true;
}}