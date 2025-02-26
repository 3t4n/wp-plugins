<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_goregister_controller extends WController {
function goregister(){
$allowRegistration=WPref::load('PUSERS_NODE_REGISTRATIONALLOW');
if(empty($allowRegistration)){
$this->userE('1401855798FZFQ');
WPages::redirect('previous');
return false;
}
$captchaToolsC=WClass::get('main.captcha');
if(!$captchaToolsC->checkProcedure( WPref::load('PUSERS_NODE_USECAPTCHA')) ) return false;
$EMAIL=WController::getFormValue('email','users');
if(empty($EMAIL)){
$this->userE('1379525427BHFS');
WPages::redirect('previous');
}
$needUpdateRole=false;
$usersEmailC=WClass::get('users.email');
if(!$usersEmailC->checkEmailUnique($EMAIL )){
$uid=WUser::get('uid',$EMAIL );
$isRegsitered=WUser::get('registered',$uid );
if($isRegsitered){
$this->userE('1439907527RWCD');
WPages::redirect('previous');
}else{
WController::setFormValue('uid','users',$uid );
$needUpdateRole=true;
}
}
$activationby=WPref::load('PUSERS_NODE_ACTIVATIONBY');
if('mobile'==$activationby){
$MOBILE=WController::getFormValue('mobile','users');
if(empty($MOBILE)){
$this->userE('1484827022PIFL');
WPages::redirect('previous');
}}
$username=WController::getFormValue('username','users');
if(empty($username)){
$this->userE('1476995652EBJO');
WPages::redirect('previous');
}$usernaemUID=$usersEmailC->checkUsernameUnique($username );
if($usernaemUID){
$emailFrmDB=WUser::get('email',$usernaemUID );
if($emailFrmDB !=$EMAIL){
$this->userE('1439907527RWCE');
WPages::redirect('previous');
}
}
$username=WController::getFormValue('username','users');
$x=WController::getFormValue('x','users');
$password=$x['password'];
WGlobals::set('userOnRegister', true, 'global');
$status=parent::save();
if(!$status){
$this->userE('1401908086NTVF');
WPages::redirect('previous');
}
if($needUpdateRole){
WUser::addRole($uid, WPref::load('PUSERS_NODE_REGISTRATIONROLE'));
}
if( WExtension::exist('campaign.node') && 20==$this->status){
WEvent::get('users.register',$this->_model->uid, $this->_model->uid );
}
$activationmethod=WPref::load('PUSERS_NODE_ACTIVATIONMETHOD');
switch($activationmethod){
case 'admin':
$this->userS('1401908086NTVG');
break;
case 'flexible':
$this->userS('1489535858RCXT');
break;
case 'self':
if('mobile'==$activationby){
$this->userW('1484827022PIFM',array('$MOBILE'=>$MOBILE));
}else{
$this->userS('1481476072JQES',array('$EMAIL'=>$EMAIL));
$this->userW('1401908086NTVI');
}break;
default:
if(!empty($username ) && !empty($password )){
$usersCredentialC=WUser::credential();
$usersCredentialC->automaticLogin($username, $password );
$this->userS('1401908086NTVJ');
}else{
$this->userS('1401908086NTVK');
}break;
}
if('self'==$activationmethod && 'mobile'==$activationby){
WPages::redirect('controller=users&task=entercode&uid='.$this->_model->uid );
return true;
}
$url=WGlobals::getSession('login','previousURL');
if(!empty($url)){
WPages::redirect($url );
}else{
$landing=WPref::load('PUSERS_NODE_REGISTRATION_LANDING');
if(!empty($landing )){
WPages::redirect($landing );
}
}
return true;
}
}