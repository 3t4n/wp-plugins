<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_User_plugin extends WPlugin {
function onUserLogin($user,$options){
$this->onLoginUser($user, $options );
}
function onUserLogout($user,$remember){
$this->onLogoutUser($user, $remember );
}
function onUserAfterDelete($user,$success,$msg){
$this->onAfterDeleteUser($user, $success, $msg);
}
function onUserAfterDeleteGroup($group,$bool,$msg){
$joobiCoreRolesA=array('allusers','visitor','registered','author','editor','publisher','manager','admin','sadmin','supplier','vendor','customer');
return true;
}
function onUserAfterSaveGroup($group){return true;
}
function onUserAfterSave($user,$isnew,$success,$msg){
$checkUserSyncDone=WGlobals::get('userSyncOnSaveDone', false, 'global');
if($checkUserSyncDone ) return true;
$usersAddon=WAddon::get('api.'. JOOBI_FRAMEWORK.'.user');
$usersAddon->syncUser($user, $isnew, $success, $msg );
WGlobals::set('userSyncOnSaveDone', true, 'global');
if($isnew && WExtension::exist('campaign.node')){
$usersM=WModel::get('users');
$usersM->whereE('email',$user['email'] );
$uid=$usersM->load('lr','uid');
if(!empty($uid )){
$subscribeEvent='register';
$obj=new stdClass;
$obj->event=$subscribeEvent;
WEvent::get('users.register',$uid, $obj );
}}
return true;
}
function onLoginUser($user,$options){
if(!isset($user['id'])){
$user['id']=WUser::cmsMyUser('id');
}
$userO=null;
if(empty($user['id'])){
$usersM=WTable::get('members_node','main_userdata','uid');
$usersM=WModel::get('users','object');
$usersM->whereE('username',$user['username'] );
$userO=$usersM->load('o');
if(!empty($userO->id)){
$user['id']=$userO->id;
}
}
if(empty($user['id'])){
return false;
}
$cacheHandler=WCache::get();
$cacheHandler->resetCache();
$usersSessionC=WUser::session();
$userInfoO=$usersSessionC->setUserSession($user['id'] );
$ip=$usersSessionC->getIP();
$uid=WUser::get('uid');
if(empty($uid) && !empty($userO->uid))$uid=$userO->uid;
$usersM=WModel::get('users');
$usersM->whereE('uid',$uid );
$usersM->setVal('login', time());
if(!empty($ip)){
$usersM->setVal('ip',$ip, 0, null, 'ip');
$ipTrackerC=WClass::get('security.lookup', null, 'class', false);
if(!empty($ipTrackerC)){
if(empty($userO->ctyid ))$usersM->setVal('ctyid',$ipTrackerC->ipInfo($ip, 'ctyid'));
if(isset($userO->timezone ) && $userO->timezone==999)$usersM->setVal('timezone',$ipTrackerC->ipInfo($ip, 'timezone'));
}}
if(!empty($userO) && $userO->status <=30)$usersM->setVal('status', 5 );
$usersM->setVal('modified', time());
$usersM->update();
if( WExtension::exist('campaign.node')){
WEvent::get('users.login',$uid, $uid );
}
if( WRoles::isNotAdmin()){
if( WExtension::exist('cart.node') && WPref::load('PCART_NODE_USENEWCART')){
$basketClearC=WClass::get('cart.clear', null, 'class', false);
if(!empty($basketClearC))$basketClearC->resetBasketAddress();
}
$uid=WUser::get('uid');
if(!empty($uid)){
$itemViewedM=WModel::get('item.viewed');
$itemViewedM->whereE('cookieid', WGlobals::getCookieUser());
$itemViewedM->whereE('uid','0');
$itemViewedM->setVal('uid',$uid );
$itemViewedM->update();
}
}
return true;
}
function onLogoutUser($user,$remember){
if( WExtension::exist('campaign.node')){
$uid=WUser::get('uid');
WEvent::get('users.logout',$uid, $uid );
}
$usersSessionC=WUser::session();
$usersSessionC->resetUser();
$usersSessionC->setGuest();
if( WPref::load('PCART_NODE_USENEWCART')){
$basketClearC=WClass::get('cart.clear', null, 'class', false);
if(!empty($basketClearC))$basketClearC->clearEntireBasket();
}else{
$basketClearC=WClass::get('basket.clear', null, 'class', false);if(!empty($basketClearC))$basketClearC->clearEntireBasket();
}
return true;
}
function onAfterDeleteUser($user,$success,$msg){
if(empty($user['id']) || !$success){
return false;
}
$usersM=WModel::get('users');
$usersM->whereE('id',$user['id'] );
return $usersM->deleteAll();
}
}