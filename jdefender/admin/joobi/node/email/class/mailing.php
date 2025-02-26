<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
 class Email_Mailing_class extends WClasses {
 private static $_mailer=null;
var $processTags=true;
var $fromQueue=false;
private $_sendSchedule=false;
private $_parameters=null;
private $_frequency=null;
var $_to=array();
var $_cc=array();
var $_bcc=array();
private $_attachA=array();
private $_sender=array();
var $_replyTo=array();
var $_donotsend=false;
private $_validMailer=false;
private $_setMailFormat=null;
var $_force=false;
private $_trackLinks=null;
private $_trackingParams=null;
private $_trackSent=null;
private $_trackOpenRate=null;
private $_link=null;
private $_reportsA=array();
private function _setMailer($mailerID=0){
if(!isset(self::$_mailer)) self::$_mailer=WClass::get('email.mailer',$mailerID );
$this->_validMailer=self::$_mailer->validMailer();
$this->_link=null;
}
public function setMailFormat($html=true){
$this->_setMailFormat=$html;
}
public function forceSending($force=true){
$this->_force=$force;
}
public function sendSMS($user,$mgid,$report=true){
$status=$this->_sendAnMail($user, $mgid, '','', null, true, $report );
$this->clear();
return $status;
}
public function sendNow($user,$mgid,$report=true,$addTheme=true){
$status=$this->_sendAnMail($user, $mgid, '','', null, false, $report, $addTheme );
$this->clear();
return $status;
}
public function setTracking($track,$trackingParams=null){
$this->_trackLinks=$track;
$this->_trackingParams=$trackingParams;
}
public function setNotificationLink($link){
$this->_link=$link;
}
public function setOpenRate($track=true,$sent=true){
$this->_trackOpenRate=$track;
$this->_trackSent=$sent;
}
private function _sendAnMail($user=null,$mgid=0,$subject='',$bodyText='',$html=false,$onlySMS=false,$report=true,$addTheme=true){
static $mailingM=null;
static $mailingTransM=null;
static $mailInfoA=array();
static $mailTransInfoA=array();
if(empty($user)){
WMessage::log('Can not load the user email in function sendNow in class email/mailing.php for uid : '. print_r($user, true). ' it might simply be because the user has been deleted!!!','mailer-error');
return false;
}
if( is_string($user) && (false !=strpos($user, ',') || false !=strpos($user, "\r" ) || false !=strpos($user, "\n" )  )){
$userStr=strtolower( trim($user));
$userStr=str_replace(' ','',$userStr );
$userStr=str_replace( array( "\r\n", "\n\r", "\r", "\n" ), ',',$userStr );
$userA=explode(',',$userStr );
$user=array();
$usersEmail=WClass::get('users.email');
foreach($userA as $oneU){
if(false !==strpos($oneU, '@')){
if($usersEmail->validateEmail($oneU ))$user[]=$oneU;
}else{
$user[]=$oneU;
}
}
}
if(!empty($user) && is_array($user)){
$this->keepAlive(true);
$status=true;
foreach($user as $oneUser){
$status=$this->_sendAnMail($oneUser, $mgid, $subject, $bodyText, $html, $onlySMS, $report ) && $status;
}$this->keepAlive(false);
return $status;
}
$message=WMessage::get();
if(( is_numeric($user) || is_string($user))){
$userForTrace=$user;
$uid=$user;
$user=WUser::get('data',$uid );
if(empty($user->email) && is_string($uid)){
$user=new stdClass;
$user->email=$uid;
}}
if(empty($user) || empty($user->email)){
WMessage::log('Can not load the user email in function sendNow in class email/mailing.php for uid : '.@$uid.' it might simply be because the user has been deleted!!!','mailer-error');
return false;
}
if(empty($user->uid)){
if( is_numeric($user->email)){
WMessage::log( "The user $user->email is not on the website any more", 'error-wrong-email');
return false;
}
$usersEmail=WClass::get('users.email');
if(!$usersEmail->validateEmail($user->email )){
$EMAIL=$user->email;
if($report){
$message->userE('1443227628BQVB',array('$EMAIL'=>$EMAIL));
}else{
WMessage::log( "The provided email address ($EMAIL ) is not valid!", 'error-wrong-email');
}
$this->_reportsA['failed'][]="The provided email address ($EMAIL ) is not valid!";
WMessage::log('Email is not valid!','mailer-error');
return false;
}else{
$uid=WUser::get('uid',$user->email );
if(!empty($uid))$user->uid=$uid;
}
}else{
if('none' !=WPref::load('PUSERS_NODE_ACTIVATIONMETHOD')){
$confirmed=WUser::get('confirmed',$user->uid );
if(!WPref::load('PEMAIL_NODE_UNCONFIRMED') && empty($confirmed)){
$confEmailA=array('users_email_validation','subscribers_confirm_email','users_self_approval');
$mailName=( is_numeric($mgid)?WModel::getElementData('email',$mgid, 'namekey') : $mgid );
if(!in_array($mailName, $confEmailA )){
if($this->_sendSchedule){
$this->userE('1490197417MTBM');
WMessage::log('Email : '.$user->email.'  , mail : '.$mailName , 'unconfirmed-email-notice');
return false;
}
$this->_sendSchedule=false;
$status=$this->sendSchedule($user, $mgid, ( time() + 120 ), null, 999999999, $report );
if(!$status){
$this->userE('1490197417MTBM');
WMessage::log('Email : '.$user->email.'  , mail : '.$mailName , 'unconfirmed-email-notice');
}
return true;
}
}
}
}
$sentTime=time();
$mailerid=0;
$manualMail=true;if(empty($subject)){
$manualMail=false;
$caching=WPref::load('PLIBRARY_NODE_CACHING');
$caching=($caching > 0 )?'cache' : 'static';
if(!empty($user->uid)){
$lgid=empty($user->lgid)?WUser::get('lgid',$user->uid ) : $user->lgid;
}else{
$lgid=WUser::get('lgid');
}
$tempdata=$this->_loadSQLMail($mgid, $lgid );
if(empty($tempdata ))$tempdata=$this->_loadSQLMail($mgid, 1 );
if(empty($tempdata)){
$message->codeE('The mail does not exist: '.$mgid );
WMessage::log('The mail does not exist: '.$mgid );
return false;
}elseif(!empty($tempdata->params)){
WTools::getParams($tempdata );
}
if($tempdata->publish < 1 && !$this->_force){
if($report){
$MAILING=$tempdata->namekey;
$message->adminW('Mailing not published: '. $MAILING );
}WMessage::log('Mailing not published');
return false;
}
$emailType=WPref::load('PEMAIL_NODE_TYPE');
switch($emailType){
case 'html':
$html=true;
break;
case 'text':
$html=false;
break;
default:
if(!isset($this->_setMailFormat)){
if(empty($tempdata->html) || $tempdata->html=='2' || ! isset($user->html)){
$html=$tempdata->html;
}else{
$html=$user->html;
}}else{
$html=$this->_setMailFormat;
}break;
}
if(empty($tempdata->core)){
if(isset($tempdata->stats)){
$this->_trackOpenRate=$tempdata->stats;
}if(isset($tempdata->track)){
$this->_trackLinks=$tempdata->track;
}}
if(!isset($this->_trackOpenRate)){
$this->_trackOpenRate=WPref::load('PEMAIL_NODE_STATISTICS_READ');
}if(!isset($this->_trackLinks)){
$this->_trackLinks=WPref::load('PEMAIL_NODE_STATISTICS_LINK');
}
if(!empty($user->uid) && !empty($this->_trackLinks) && empty($this->_trackingParams)){
$this->_trackingParams=new stdClass;
$this->_trackingParams->mgid=$mgid;
$this->_trackingParams->uid=$user->uid;
}
if( WExtension::exist('mailing.node')){
if(!empty($tempdata->mailerid)){
$mailerid=$tempdata->mailerid;
}else{
$itemTypeC=WClass::get('mailing.type');
$mailerid=$itemTypeC->loadTypeData($tempdata->type, 'mailerid');
}
}
if($addTheme){
$themDeft=WPref::load('PEMAIL_NODE_THEMEDEFAULT');
if(!empty($themDeft))$this->_replaceThemeDefault($tempdata->chtml, $themDeft );
}else{
$tempdata->chtml=str_replace('{maincontent}','',$tempdata->chtml );
}
$this->_setMailer($mailerid );
if(empty(self::$_mailer)) return false;
self::$_mailer->setParameters($this->_parameters );
self::$_mailer->setTracking($this->_trackLinks, $this->_trackingParams );
$uid=(!empty($user->uid)?$user->uid : 0 );
self::$_mailer->createFromTrans($tempdata, $html, $this->_trackOpenRate, $uid, $tempdata->mgid, $sentTime );
self::$_mailer->processTags=$this->processTags;
}else{
$this->_setMailer();
if(empty(self::$_mailer)) return false;
self::$_mailer->IsHTML($html );
self::$_mailer->Subject=$subject;
self::$_mailer->Body=$bodyText;
}
if(!$this->_validMailer || ! WPref::load('PEMAIL_NODE_ENABLE')){
$this->adminE('Mail functionality is disabled!');
WMessage::log('maling not enabled!','mailer-error');
return false;
}
if(!$onlySMS && 7 !=(int)$html){
self::$_mailer->returnObject($this->_donotsend );
if(!empty($this->_to)){
foreach($this->_to as $to ) self::$_mailer->address($to[0], $to[1] );
}
if(!empty($this->_replyTo)){
foreach($this->_replyTo as $to) self::$_mailer->replyTo($to[0], $to[1] );
}
if(!empty($this->_cc)){
foreach($this->_cc as $to) self::$_mailer->CC($to[0], $to[1] );
}
if(!empty($this->_bcc)){
foreach($this->_bcc as $to) self::$_mailer->BCC($to[0], $to[1] );
}
if(!empty($this->_sender)){
self::$_mailer->addSender($this->_sender[0], $this->_sender[1] );
}
self::$_mailer->addAttach($this->_attachA );
if(empty($user)) return self::$_mailer->sendMail($report, $sentTime, $mgid );
$status=self::$_mailer->sendUser($user, $report, $sentTime, $mgid );
}else{
$status=true;
}
if(!$manualMail && WExtension::exist('main.node')){
if(!isset($tempdata))$tempdata=new stdClass;
$tempdata->subject=self::$_mailer->getSubject();
$tempdata->body=self::$_mailer->getBody();
$tempdata->text=self::$_mailer->getText();
$tempdata->parameters=$this->_parameters;
$this->_sendNotification($user, $tempdata, $this->_link );
}
$enableSMS=WPref::load('PEMAIL_NODE_SMSENABLE');
if($enableSMS && !empty($tempdata->sms)){
$tag=WClass::get('output.process');
$tag->setParameters($this->_parameters );
$tag->replaceTags($tempdata->smsmessage, $user );
$emailSMSC=WClass::get('email.sms');
$emailSMSC->sendSMS($user, $tempdata );
}
if(!$this->fromQueue && WPref::load('PEMAIL_NODE_KEEP_EMAIL')
&& !empty($user->uid) && !empty($tempdata->mgid)){
if($status){
$emailQueueM=WModel::get('email.queue');
if(!empty($mailerid ))$emailQueueM->setVal('mailerid',$mailerid );
$emailQueueM->setVal('uid',$user->uid );
$emailQueueM->setVal('mgid',$tempdata->mgid );
$emailQueueM->setVal('senddate',$sentTime );
$emailQueueM->setVal('publish', 1 );
$emailQueueM->setVal('status', 9 );
$emailQueueM->insertIgnore();
}
}
if(!isset($this->_trackSent))$this->_trackSent=WPref::load('PEMAIL_NODE_STATISTICS_SENT');
if(!isset($this->_trackOpenRate))$this->_trackOpenRate=WPref::load('PEMAIL_NODE_STATISTICS_READ');
if(($this->_trackSent || $this->_trackOpenRate ) && !empty($tempdata)){
$emailStatisticsC=WClass::get('email.statistics');
$tempdata->html=$html;
$emailStatisticsC->recordSentMail($user, $tempdata, $status, $sentTime );
}
$EMAIL=$user->email;
if($status){
$state='success';
$color='green';
$text=str_replace(array('$EMAIL'), array($EMAIL),WText::t('1490197417MTBN'));
}else{
$state='failed';
$color='red';
$text=str_replace(array('$EMAIL'), array($EMAIL),WText::t('1490197417MTBO'));
}
$this->_reportsA[$state][]='<span style="color:'.$color.'">'.$text.'</span>';
$this->clear();
return $status;
}
public function getReportA(){
return $this->_reportsA;
}
public function resetReport(){
$this->_reportsA=array();
}
private function _replaceThemeDefault(&$chtml,$THEME_NAME){
$fileS=WGet::file();
$themePath=str_replace('.','/',$THEME_NAME );
$themeHTML=$fileS->read( JOOBI_DS_THEME . $themePath.'/index.html');
if( strpos($themeHTML, '{maincontent}')===false){
$this->adminE('The theme '.$THEME_NAME.' cannot be used because the main content tag is missing!');
return false; 
}
$chtml=str_replace('{maincontent}',$chtml, $themeHTML );
}
private function _sendNotification($user,$tempdata,$link=''){
if(!WPref::load('PEMAIL_NODE_USENOTIFICATION')){
if(!empty($tempdata->channel) && WRoles::isAdmin('manager')){
$this->adminN('A notification should have been sent, but notification are not turn on!');
}return false;
}
$useMobile=false;
if(!empty($tempdata->channel)){
$channelA=WTools::preference2Array($tempdata->channel );
if(!empty($channelA)){
if( in_array('mobile',$channelA ))$useMobile=true;
$mainCredentialsC=WClass::get('main.credentials', null, 'class', false);
foreach($channelA as $chanel){
if('mobile'==$chanel ) continue;
$data=$mainCredentialsC->loadFromID($chanel );
if(!empty($data)){
$classCommC=WClass::get('main.'.$data->typeNamekey, null, 'class', false);
if($classCommC && method_exists($classCommC, 'sendNotification')){
$classCommC->sendNotification($data, $tempdata, $user, $link );
}}
}
}
}else{
$useMobile=true;
}
if($useMobile){
if(empty($user->uid)) return false;
if( Wuser::get('uid')==$user->uid ) return true;
$mainMessageQueueC=WClass::get('main.messagequeue');
$mainMessageQueueC->addEmailToQueue($user, $tempdata, $link );
}
}
private function _loadSQLMail($mgid,$lgid){
static $mailingM=null;
if( WGet::maintenanceMode()){
if( is_numeric($mgid)) return null;
$expodA=explode('_',$mgid );
$mailInfoO=WGet::loadData($expodA[0].'.'.$mgid, 'mailing');
$mailInfoO->mgid=0;
$mailInfoO->lgid=1;
}else{
$mailingM=WModel::get('email');
$mailInfoO=$mailingM->loadMemory($mgid, $lgid );
}
if(!empty($mailInfoO->mgid))$mailInfoO->id=$mailInfoO->mgid;
return $mailInfoO;
}
public function sendSchedule($user,$mgid,$sendDate=0,$priority=null,$maxDelay=300,$report=false){
$this->_sendSchedule=true;
$hasCronTask=WPref::load('PLIBRARY_NODE_CRON');
if(empty($hasCronTask )){
$this->adminW('The cron task is disabled and the system is trying to send scheduled email. The emails are being sent directly but this could create an overload of the server!');
return $this->sendNow($user, $mgid, $report );
}if($maxDelay > 0){
$schedulerM=WModel::get('scheduler');
$schedulerM->rememberQuery(true);
$schedulerM->whereE('namekey','email.queue.scheduler');
$frequency=$schedulerM->load('lr','frequency');
if($frequency > $maxDelay|| ($sendDate > 0 && $sendDate < time())){return $this->sendNow($user, $mgid, $report );
}}
$emailScheduledC=WClass::get('email.scheduled');
$status=$emailScheduledC->processScheduledMail($user, $mgid, $sendDate, $priority, $this->_parameters, $this->_frequency, $report );
if($report){
if($status){
$message=WMessage::get();
if($maxDelay<1){
$MINUTES=WTExt::translate('few');
}else{
$MINUTES=ceil($maxDelay / 60 );
}$message->userS('1374537510PXRN',array('$MINUTES'=>$MINUTES));
}}
return true;
}
function scheduleAdmin($mgid,$sendDate=0,$priority=null,$maxDelay=300,$report=false){
$hasCronTask=WPref::load('PLIBRARY_NODE_CRON');
if(empty($hasCronTask )){
$this->adminW('The cron task is disabled and the system is trying to send scheduled email. The emails are being sent directly but this could create an overload of the server!');
return $this->sendAdmin($mgid, $report );
}
return $this->sendAdmin($mgid, $report );
}
public function sendAdmin($mgid,$report=false,$onlySMS=false,$addTheme=true){
$this->clear(); 
$sadmin=WUser::getRoleUsers('sadmin',array('email','username','uid'));
if(empty($sadmin)){
$message=WMessage::get();
$message->codeE('There is no super admin on the website');
return false;
}
foreach($sadmin as $i=> $user){
if(empty($i)){
$admin=$user;
}else{
$this->address($user->email, $user->username, $user->uid );
}}
$status=$this->_sendAnMail($admin, $mgid, '','', null, $onlySMS, $report, $addTheme );
$this->clear();
return $status;
}
public function sendTextNow($uid,$subject,$bodyText='',$html=false,$report=true){
$status=$this->_sendAnMail($uid, 0, $subject, $bodyText, $html, false, $report );
$this->clear();
return $status;
}
public function sendTextQueue($uid,$subject,$bodyText='',$html=false,$report=false){
return $this->sendTextNow($uid, $subject, $bodyText, $html, $report );
}
public function sendTextAdmin($subject,$bodyText='',$report=false,$email=null,$name=null){
$this->clear(); 
if(!isset($email)){$email=WPref::load('PEMAIL_NODE_ADMINNOTIF');if(!empty($email )){
if(empty($name))$name=JOOBI_SITE_NAME;
$sadmin=array('email'=> $email, 'name'=>$name );
}else{
$sadmin=WUser::getRoleUsers('sadmin',array('email','username','uid'));
if(!empty($sadmin)){
foreach($sadmin as $user)$this->address($user->email, $user->username, $user->uid );
}else{
$message=WMessage::get();
$message->codeE('There is no super admin on the website');
return false;
}
}}else{if(is_array($email)){
$i=0;
$sadmin=array();
foreach($email as $user){
$sender=(is_array($name))?$name[$i] : $name;
if(empty($name))$name=JOOBI_SITE_NAME;
$this->address($user, $sender );
$sadmin[]=array('email'=> $user, 'name'=>$sender );
}}else{
if(empty($name))$name=JOOBI_SITE_NAME;
$sadmin=array('email'=> $email, 'name'=>$name );
}}
$status=$this->_sendAnMail($sadmin, null, $subject, $bodyText, false, false, false);
$this->clear();
if($report){
$message=WMessage::get();
if($status){
$message->userS('1211280107OPVR');
}else{
$message->userE('1299236985FLIB');
$error=(!empty(self::$_mailer->ErrorInfo)?self::$_mailer->ErrorInfo : '');
$message->userE($error );
}}
return $status;
}
public function onlyReplaceTags($user,$mgid){
$this->_donotsend=true;
return $this->sendNow($user, $mgid, false, false);
}
function addParameter($name,$value=null){
if(empty($name)){
return;
}
if(is_array($name) OR is_object($name)){
foreach($name as $paramName=> $paramValue){
$this->_parameters->$paramName=$paramValue;
}
}else{
$this->_parameters->$name=$value;
}
}
public function setParameters($params){
$this->_parameters=$params;
}
public function setFrequency($frequencyO){
$this->_frequency=$frequencyO;
}
public function keepAlive($alive=true){
if(empty(self::$_mailer)) return false;
self::$_mailer->keepAlive($alive );
}
  public function address($email,$name=''){
$this->_to[]=array($email, $name );
  }
  public function replyTo($email,$name=''){
$this->_replyTo[]=array($email, $name );
  }
  public function CC($email,$name=''){
$this->_cc[]=array($email, $name );
  }
  public function BCC($email,$name=''){
$this->_bcc[]=array($email, $name );
  }
  public function addSender($email,$name=''){
      if( WPref::load('PEMAIL_NODE_STRICTSENDER')){
$emailA=explode('@',$email );
if( strpos( JOOBI_SITE, $emailA[1])===false){
$this->adminW('The sender email is not part of the main domain, therefore the default one will be used instead.');
return false;
}  }
  $this->_sender=array($email, $name );
  }
public function addFile($path,$name='',$encoding='base64',$type='application/octet-stream'){
$this->_attachA[]=array($path, $name, $encoding, $type );
}
  public function getBody(){
  if(empty(self::$_mailer)) return false;
  return self::$_mailer->getBody();
  }
function clear(){
$this->_bcc=array();
$this->_cc=array();
$this->_to=array();
$this->_replyTo=array();
$this->_donotsend=false;
$this->_attachA=array();
}
}
class WDataMail {
var $namekey='';
var $wid=0;
var $rolid=1;
var $type=1;
var $uid=0;
var $publish=1;
var $senddate=0;
var $html=1;
var $alias='';
var $params='';
var $tags='';
var $archive=0;
var $status=0;
var $core=1;
var $sms=0;
var $name='';
var $chtml='';
var $ctext='';
var $intro='';
var $smsmessage='';
var $title='';
var $subtitle='';
}
