<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Email_Queue_class extends WClasses {
private $_queueToDeleteA=array();
private $_buildReportA=array();
private $_noMoreEmails=false;
private $_maxEMails=0;
private $_totalEmails=false;
private $_hasFails=false;
public function processQueue($report=false,$mgid=0,$max=50,$manual=false){
if(!WPref::load('PEMAIL_NODE_ENABLE')){
$this->userW('1490709082IQKX');
return false;
}
$emailQueueM=WModel::get('email.queue');
$emailfail=WPref::load('PEMAIL_NODE_EMAILFAIL');
if(!empty($mgid))$emailQueueM->whereE('mgid',$mgid );
$emailQueueM->where('senddate','<', time());
$emailQueueM->whereE('publish', 1 );
if($manual)$emailQueueM->whereE('status', 2 );
else $emailQueueM->whereE('status', 1 );
if(!empty($emailfail))$emailQueueM->where('attempt','<',$emailfail );
$emailQueueM->orderBy('priority','ASC');
$emailQueueM->orderBy('senddate','ASC');
$emailQueueM->orderBy('attempt','ASC');
if($max < 1)$max=50;
$this->_maxEMails=$max;
$emailQueueM->setLimit($max );
$allQueueA=$emailQueueM->load('ol');
if(empty($allQueueA )){
if($report)$this->userN('1455702137KJRR');
return $this->_finishedProcessingQueue();
}else{
$this->_totalEmails=count($allQueueA );
}
WTools::increasePerformance();
@ini_set('default_socket_timeout', 10 );
@ignore_user_abort(true);
$this->_queueToDeleteA=array();
$this->_hasFails=false;
$mail=WMail::get();
$emailQueueparamsO=WObject::get('email.queueparams');
foreach($allQueueA as $oneQueue){
if( 6==$oneQueue->type){
if(!$manual)$this->_endNewsletterSending($oneQueue->qid, $oneQueue->mgid, $oneQueue->uid, $oneQueue->status );
else {
$emailQueueM=WModel::get('email.queue');
$emailQueueM->whereE('qid',$oneQueue->qid );
$emailQueueM->setVal('status', 9 );
$emailQueueM->update();
}
continue;
}
if(empty($oneQueue->uid)){
$this->_queueToDeleteA[]=$oneQueue->qid;
continue;
}
if(!empty($oneQueue->params)){
$emailQueueparamsO->setSQLParams($oneQueue->params );
$emailQueueparamsO->decodeQueue();
$params=$emailQueueparamsO->getMailParams();
$freqeuncyO=$emailQueueparamsO->getMailFrequency();
if(!empty($params))$mail->setParameters($params );
}
$mail->fromQueue=true;
$mail->resetReport();
$mail->setOpenRate( WPref::load('PLIST_NODE_OPEN_RATE'), WPref::load('PLIST_NODE_STATISTICS_SENT'));
$status=$mail->sendNow($oneQueue->uid, $oneQueue->mgid, $report, false);
$reportA=$mail->getReportA();
if($status){
if(!empty($reportA['success'])){
if(!isset($this->_buildReportA['success']))$this->_buildReportA['success']=array();
$this->_buildReportA['success']=array_merge($this->_buildReportA['success'], $reportA['success'] );
}
if(!empty($freqeuncyO)){
$this->_manageFrequency($oneQueue, $freqeuncyO );
}else{
$this->_queueToDeleteA[]=$oneQueue->qid;
}
}else{
if(!empty($reportA['failed'])){
if(!isset($this->_buildReportA['failed']))$this->_buildReportA['failed']=array();
$this->_buildReportA['failed']=array_merge($this->_buildReportA['failed'], $reportA['failed'] );
}
$emailQueueM=WModel::get('email.queue');
$emailQueueM->whereE('uid',$oneQueue->uid );
$emailQueueM->whereE('mgid',$oneQueue->mgid );
$emailQueueM->updatePlus('attempt', 1 );
$emailQueueM->updatePlus('senddate', 3600 );
$emailQueueM->update();
$this->_hasFails=true;
$this->_noMoreEmails=false;
}
}
$this->_deleteQueue();
if(!$this->_hasFails && $this->_totalEmails < $this->_maxEMails ) return $this->_finishedProcessingQueue();
return true;
}
public function getReportA(){
return $this->_buildReportA;
}
public function isFinished(){
return $this->_noMoreEmails;
}
public function hasFails(){
return $this->_hasFails;
}
private function _finishedProcessingQueue(){
$this->_noMoreEmails=true;
return true;
}
private function _endNewsletterSending($qid,$mgid,$uid,$status){
if(!WExtension::exist('mailing.node')) return false;
$mailingM=WModel::get('mailing');
$mailingM->whereE('mgid',$mgid );
$mailingM->setVal('status', 50 );
$mailingM->update();
$emailQueueM=WModel::get('email.queue');
$emailQueueM->noValidate();
$emailQueueM->delete($qid );
$mailingQueueC=WClass::get('mailing.notification');
$mailingQueueC->endSending($mgid, $uid );
}
private function _manageFrequency($oneQueue,$frequencyO){
if(empty($frequencyO) || empty($oneQueue)) return false;
if(!empty($frequencyO->period)){
if(!empty($frequencyO->endDate)){
if(( time() + $frequencyO->period ) > $frequencyO->endDate){
$this->_queueToDeleteA[]=$oneQueue->qid;
return false;
}
}
$newSendDate=$oneQueue->senddate + $frequencyO->period;
$emailQueueM=WModel::get('email.queue');
$emailQueueM->whereE('qid',$oneQueue->qid );
$emailQueueM->setVal('senddate',$newSendDate );
$emailQueueM->update();
}
}
private function _deleteQueue(){
if(empty($this->_queueToDeleteA )) return false;
$emailQueueM=WModel::get('email.queue');
$keep=WPref::load('PEMAIL_NODE_KEEP_EMAIL');
if($keep){
$emailQueueM->whereIn('qid',$this->_queueToDeleteA );
$emailQueueM->setVal('status', 9 );
$emailQueueM->update();
}else{
$emailQueueM->noValidate();
return $emailQueueM->delete($this->_queueToDeleteA );
}
}
}
