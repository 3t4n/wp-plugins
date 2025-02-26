<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Email_Statistics_class extends WClasses {
private $_status=null;
private $_user=null;
private $_mailingO=null;
public function recordSentMail($user,$mailingO,$status,$time){
if(empty($user->uid)) return false;
if(empty($mailingO->mgid)) return false;
$this->_status=$status;
$this->_user=$user;
$this->_mailingO=$mailingO;
$this->_generalStatsSent();
if( WPref::load('PEMAIL_NODE_STATISTICS_PERUSER')){
if(empty($time ))$time=time();
$this->_detailedStatsSent($time );
}
}
public function recordOpenMail($data,$readtime=0){
if(empty($data->mgid) || empty($data->uid)) return false;
$emailStatisticsUserM=WModel::get('email.statisticsuser');
$emailStatisticsUserM->whereE('uid',$data->uid );
$emailStatisticsUserM->whereE('mgid',$data->mgid );
$myTime=0;
if( WExtension::exist('mailing.node')){
if(!empty($data->t)){
$emailStatisticsUserM->whereE('created',$data->t );
}else{
$myTime=$this->_getSendDate($data->mgid, $data->uid );
if(!empty($myTime))$emailStatisticsUserM->whereE('created',$myTime );
}
}
$sentO=$emailStatisticsUserM->load('o',array('htmlsent','textsent','read'));
if(!empty($sentO->read)) return true;
$emailStatisticsUserM->whereE('uid',$data->uid );
$emailStatisticsUserM->whereE('mgid',$data->mgid );
if(!empty($myTime))$emailStatisticsUserM->whereE('created',$myTime );
if(empty($time))$time=time();
$emailStatisticsUserM->setVal('readdate',$time );
$emailStatisticsUserM->setVal('read', 1 );
$emailStatisticsUserM->update();
$emailStatisticsM=WModel::get('email.statistics');
$emailStatisticsM->whereE('mgid',$data->mgid );
$emailStatisticsM->updatePlus('read', 1 );
if(!empty($sentO->htmlsent )){
$emailStatisticsM->updatePlus('htmlread', 1 );
}elseif(!empty($sentO->textsent )){
$emailStatisticsM->updatePlus('textread', 1 );
}
$emailStatisticsM->setVal('modified', time());
$emailStatisticsM->update();
$usersM=WModel::get('users');
$usersM->whereE('uid',$data->uid );
$usersM->where('status','<=', 31 );
$usersM->setVal('status', 5 );
$usersM->update();
}
public function recordActions($action='unsubscribe',$mgid,$uid,$time){
if(empty($mgid) || empty($uid)) return false;
if(empty($time))$time=time();
$repeat=true;
if( WPref::load('PEMAIL_NODE_STATISTICS_PERUSER')){
$emailStatisticsUserM=WModel::get('email.statisticsuser');
$myTime=0;
if( WExtension::exist('mailing.node')){
$myTime=$this->_getSendDate($mgid, $uid );
if(!empty($myTime))$emailStatisticsUserM->whereE('created',$myTime );
}
$sentO=$emailStatisticsUserM->load('o',array('htmlsent','textsent','read'));
if(empty($sentO->read)){
if(!empty($myTime))$emailStatisticsUserM->whereE('created',$myTime );
$emailStatisticsUserM->whereE('uid',$uid );
$emailStatisticsUserM->whereE('mgid',$mgid );
$emailStatisticsUserM->whereE('read', 0 );
$emailStatisticsUserM->setVal('readdate',$time );
$emailStatisticsUserM->setVal('read', 1 );
$emailStatisticsUserM->update();
}
if(empty($sentO->read))
if(!empty($myTime))$emailStatisticsUserM->whereE('created',$myTime );
$emailStatisticsUserM->whereE('uid',$uid );
$emailStatisticsUserM->whereE('mgid',$mgid );
if( in_array($action, array('unsubscribe','bounced'))){
$emailStatisticsUserM->whereE($action, 0 );
$repeat=false;
}
$emailStatisticsUserM->updatePlus($action, 1 );
$emailStatisticsUserM->update();
if(!$repeat){
$repeat=$emailStatisticsUserM->affectedRows();
}
}
if($repeat){
$usersM=WModel::get('users');
$usersM->whereE('uid',$uid );
$usersM->where('status','<=', 10 );
$usersM->setVal('status', 5 );
$usersM->update();
$emailStatisticsM=WModel::get('email.statistics');
$emailStatisticsM->whereE('mgid',$mgid );
$emailStatisticsM->setVal('modified',$time );
$emailStatisticsM->updatePlus($action, 1 );
$emailStatisticsM->update();
}
return true;
}
public function recordLinkHits($uid,$mgid,$time=0){
if(empty($mgid) || empty($uid)) return false;
if(empty($time))$time=time();
$emailStatisticsM=WModel::get('email.statistics');
$emailStatisticsM->whereE('mgid',$mgid );
$emailStatisticsM->setVal('modified',$time );
$emailStatisticsM->updatePlus('hitlinks', 1 );
$emailStatisticsM->update();
if(!WPref::load('PEMAIL_NODE_STATISTICS_PERUSER')) return false;
$emailStatisticsUserM=WModel::get('email.statisticsuser');
$emailStatisticsUserM->whereE('uid',$uid );
$emailStatisticsUserM->whereE('mgid',$mgid );
$emailStatisticsUserM->whereE('read', 0 );
$emailStatisticsUserM->setVal('readdate',$time );
$emailStatisticsUserM->setVal('read', 1 );
$emailStatisticsUserM->update();
$emailStatisticsUserM=WModel::get('email.statisticsuser');
$emailStatisticsUserM->whereE('uid',$uid );
$emailStatisticsUserM->whereE('mgid',$mgid );
$emailStatisticsUserM->setVal('clickdate',$time );
$emailStatisticsUserM->updatePlus('hitlinks', 1 );
$emailStatisticsUserM->update();
$usersM=WModel::get('users');
$usersM->whereE('uid',$uid );
$usersM->where('status','<=', 10 );
$usersM->setVal('status', 5 );
$usersM->update();
}
private function _getSendDate($mgid,$uid){
$emailStatisticsUserM=WModel::get('email.statisticsuser');
$emailStatisticsUserM->whereE('uid',$uid );
$emailStatisticsUserM->whereE('mgid',$mgid );
$emailStatisticsUserM->orderBy('created','DESC');
return $emailStatisticsUserM->load('lr','created');
}
private function _detailedStatsSent($time){
$emailStatisticsUserM=WModel::get('email.statisticsuser');
$emailStatisticsUserM->setVal('uid',$this->_user->uid );
$emailStatisticsUserM->setVal('mgid',$this->_mailingO->mgid );
if($this->_status){
if(!empty($this->_mailingO->html ))$emailStatisticsUserM->setVal('htmlsent', 1 );
else $emailStatisticsUserM->setVal('textsent', 1 );
} else $emailStatisticsUserM->setVal('failed', 1 );
if(!empty($this->_mailingO->sms))$emailStatisticsUserM->setVal('smssent', 1 );
$emailStatisticsUserM->setVal('created',$time );
$emailStatisticsUserM->insertIgnore();
$total=$emailStatisticsUserM->affectedRows();
if(empty($total )){
$this->_updateDetailedStatsSent();
}
}
private function _updateDetailedStatsSent(){
$emailStatisticsUserM=WModel::get('email.statisticsuser');
$emailStatisticsUserM->whereE('uid',$this->_user->uid );
$emailStatisticsUserM->whereE('mgid',$this->_mailingO->mgid );
if($this->_status){
if(!empty($this->_mailingO->html ))$emailStatisticsUserM->updatePlus('htmlsent', 1 );
else $emailStatisticsUserM->updatePlus('textsent', 1 );
} else $emailStatisticsUserM->updatePlus('failed', 1 );
if(!empty($this->_mailingO->sms))$emailStatisticsUserM->updatePlus('smssent', 1 );
$emailStatisticsUserM->update();
}
private function _generalStatsSent(){
$emailStatisticsM=WModel::get('email.statistics');
$emailStatisticsM->whereE('mgid',$this->_mailingO->mgid );
$emailStatisticsM->updatePlus('total', 1 );
if($this->_status){
$emailStatisticsM->updatePlus('sent', 1 );
if(!empty($this->_mailingO->sms))$emailStatisticsM->updatePlus('smssent', 1 );
if(!empty($this->_mailingO->html ))$emailStatisticsM->updatePlus('htmlsent', 1 );
else $emailStatisticsM->updatePlus('textsent', 1 );
}else{
$emailStatisticsM->updatePlus('failed', 1 );
}
$emailStatisticsM->update();
$total=$emailStatisticsM->affectedRows();
if(empty($total )){
$this->_insertGeneralStatsSent();
}
}
private function _insertGeneralStatsSent(){
$emailStatisticsM=WModel::get('email.statistics');
$emailStatisticsM->setVal('mgid',$this->_mailingO->mgid );
$emailStatisticsM->setVal('total', 1 );
$emailStatisticsM->setVal('modified', time());
if($this->_status)$emailStatisticsM->setVal('sent', 1 );
else $emailStatisticsM->setVal('failed', 1 );
if(!empty($this->_mailingO->sms))$emailStatisticsM->setVal('smssent', 1 );
if(!empty($this->_mailingO->html ))$emailStatisticsM->setVal('htmlsent', 1 );
else $emailStatisticsM->setVal('textsent', 1 );
$emailStatisticsM->insertIgnore();
}
}
