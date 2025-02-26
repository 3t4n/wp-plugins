<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Apps_Info_class extends WClasses {
private $_reason=null;
private $_token=null;
private $_fileName=null;
public function possibleUpdate($eid=0,$allowLocalHost=true,$onlyCLub=false,$showMessage=true){
static $status=null;
if(isset($status)) return $status;
$url=$this->myURL();
$SKIP=false;
if(!empty($eid )){
$namekeyApp=WExtension::get($eid, 'namekey');
$namekeyApp=$this->getRealAppsID($eid, 'namekey');
if( in_array($namekeyApp, array( JOOBI_MAIN_APP.'.application','jst'.'o'.'re.appli'.'cation','jc'.'atal'.'og.appli'.'cation','jne'.'wsletters.appl'.'ication','jne'.'ws.appl'.'ication'))){
return true;
}}
$token='';
if(!$SKIP && ! WPage::validSite($url)){if($allowLocalHost){
$status=true;
}else{
$status=false;
}return $status;
}else{
$this->_fileName='';
$appsQueryC=WClass::get('apps.query');
$this->_fileName=$this->_verifyLocationFile('main');
if( @file_exists($this->_fileName)){
$wid=$this->getRealAppsID( JOOBI_MAIN_APP.'.application');
$token=$appsQueryC->getSweetInfo($this->_fileName, $wid, 'token');
if(!$this->_checkValidToken($token, $showMessage )){
$this->adminE('The API key is not valid, it is not possible to update any more. Please update your API key or get a new one.');
$this->_checkReason();
$status=false;
return false;
}else{
return $token;
}
}elseif(!$onlyCLub){
if(empty($eid )){
$allPossibleUpdateA=$this->_possibleUpdateA();
}else{
$namekeyApp=$this->getRealAppsID($eid, 'namekey');
if( in_array($namekeyApp, array( JOOBI_MAIN_APP.'.application','jst'.'o'.'re.appli'.'cation','jc'.'atal'.'og.appli'.'cation','jne'.'wsletters.appl'.'ication','jne'.'ws.appl'.'ication'))){
return true;
}
$app=new stdClass;
$app->wid=$eid;
$app->created='';
$allPossibleUpdateA=array($app );
}
$hasFile=false;
$hasToken=false;
if(!empty($allPossibleUpdateA )){
foreach($allPossibleUpdateA as $oneApp){
$folder=Wextension::get($oneApp->wid, 'folder');
if(empty($folder)){
$appsM=WModel::get('apps');
$appsM->whereE('wid',$oneApp->wid );
$folder=$appsM->load('lr','folder');
}
if(empty($folder)) continue;
$this->_fileName=$this->_verifyLocationFile($folder );
if( @file_exists($this->_fileName)){
$hasFile=true;
$clubInfoO=$appsQueryC->getSweetInfo($this->_fileName, $oneApp->wid );
if(!empty($clubInfoO->token)){
$token=$clubInfoO->token;
}
if(!empty($clubInfoO->maintenance))$timeStamp=strtotime($clubInfoO->maintenance );
elseif(!empty($clubInfoO->supermaintCare))$timeStamp=strtotime($clubInfoO->supermaintCare );
else $timeStamp=0;
if($timeStamp <=time()){
if($this->_checkValidToken($clubInfoO->token, $showMessage )){
$hasToken=true;
break;
}else{
$this->_checkReason();
}
}else{
$hasToken=true;
break;
}
}
}
if($hasFile && ! $hasToken){
if($showMessage)$this->adminW('The API key is not valid, it is not possible to update any more. Please update your API key or get a new one.');
}
}
if($hasFile && $hasToken){
$status=true;
return $token;
}else{
$mainAppID=$this->getRealAppsID( JOOBI_MAIN_APP.'.application');
$appsM=WModel::get('apps');
$appsM->whereE('wid',$mainAppID );
$firstDemoInstall=$appsM->load('lr','created');
$timelimit=time() - 2678409; if($firstDemoInstall < $timelimit){
if($showMessage)$this->userW('1389439751KWKS');
$status=false;
return false;
}
}
}
}
$status=true;
return true;
}
public function getPossibleCode($kind2Get=true,$return='',$checkStillValid=true,$showMessage=true){
static $alreadyCheckedA=array();
if(!isset($alreadyCheckedA[$kind2Get] )){
$url=$this->myURL();
if(!WPage::validSite($url)){
$alreadyCheckedA[$kind2Get]=true;
return true;
}
$clubInfoO=false;
if( is_numeric($kind2Get)){
$appsM=WModel::get('apps');
$appsM->whereE('wid',$kind2Get );
$folder=$appsM->load('lr','folder');
$filename=$this->_verifyLocationFile($folder );
$appsQueryC=WClass::get('apps.query');
$clubInfoO=$appsQueryC->getSweetInfo($filename, $kind2Get );
if(!empty($clubInfoO) && $checkStillValid){
if(!empty($clubInfoO->maintenance))$timeStamp=strtotime($clubInfoO->maintenance );
elseif(!empty($clubInfoO->supermaintCare))$timeStamp=strtotime($clubInfoO->supermaintCare );
else $timeStamp=0;
if($timeStamp <=time())$clubInfoO=null;
}
$alreadyCheckedA[$kind2Get]=$clubInfoO;
}
$filename=$this->_verifyLocationFile('main');
if(!$clubInfoO && @file_exists($filename)){
$appsQueryC=WClass::get('apps.query');
$wid=$this->getRealAppsID( JOOBI_MAIN_APP.'.application');
$clubInfoO=$appsQueryC->getSweetInfo($filename, $wid );
if(!empty($clubInfoO) && $checkStillValid){
if(!empty($clubInfoO->maintenance))$timeStamp=strtotime($clubInfoO->maintenance );
elseif(!empty($clubInfoO->supermaintCare))$timeStamp=strtotime($clubInfoO->supermaintCare );
else $timeStamp=0;
if($timeStamp <=time())$clubInfoO=null;
}
}
if(empty($clubInfoO)){
if('onlyAll'==$kind2Get ) return false;
$appsQueryC=WClass::get('apps.query');
if( is_numeric($kind2Get)){
$appsM=WModel::get('apps');
$appsM->whereE('wid',$kind2Get );
$folder=$appsM->load('lr','folder');
$filename=$this->_verifyLocationFile($folder );
$clubInfoO=$appsQueryC->getSweetInfo($filename, $kind2Get );
if(!empty($clubInfoO) && $checkStillValid){
if(!empty($clubInfoO->maintenance))$timeStamp=strtotime($clubInfoO->maintenance );
elseif(!empty($clubInfoO->supermaintCare))$timeStamp=strtotime($clubInfoO->supermaintCare );
else $timeStamp=0;
if($timeStamp <=time())$clubInfoO=null;
}
}else{
static $allPossibleUpdateA=null;
if(!isset($allPossibleUpdateA)){
$allPossibleUpdateA=$this->_possibleUpdateA();
}
if(!empty($allPossibleUpdateA )){
$hasToken=false;
foreach($allPossibleUpdateA as $oneApp){
$folder=Wextension::get($oneApp->wid, 'folder');
if(empty($folder)) continue;
$filename=$this->_verifyLocationFile($folder );
if( @file_exists($filename)){
$clubInfoO=$appsQueryC->getSweetInfo($filename, $oneApp->wid );
if(!empty($clubInfoO) && $checkStillValid){
if(!empty($clubInfoO->maintenance))$timeStamp=strtotime($clubInfoO->maintenance );
elseif(!empty($clubInfoO->supermaintCare))$timeStamp=strtotime($clubInfoO->supermaintCare );
else $timeStamp=0;
if($timeStamp <=time())$clubInfoO=null;
}
if(!empty($clubInfoO )){
break;
}}}}
}
}
$alreadyCheckedA[$kind2Get]=$clubInfoO;
}else{
$clubInfoO=$alreadyCheckedA[$kind2Get];
}
if(!empty($clubInfoO )){
if( is_object($clubInfoO)){
if(!isset($clubInfoO->subtype))$clubInfoO->subtype=$clubInfoO->type;
if(!isset($clubInfoO->supermaintCare))$clubInfoO->supermaintCare=$clubInfoO->maintenance;
}
if(empty($return)){
return $clubInfoO;
}elseif(is_array($return)){
$obj=new stdClass;
foreach($return as $oneP){
if(isset($clubInfoO->$oneP))$obj->$oneP=$clubInfoO->$oneP;
}return $obj;
}else{
if(!is_string($return)) return null;
if(isset($clubInfoO->$return)) return $clubInfoO->$return;
}return null;
}
if('jst'.'o'.'re.ap'.'plica'.'tion'==$kind2Get || 'jap'.'ps.ap'.'plica'.'tion'==$kind2Get || 'jne'.'wsletters.appl'.'ication'==$kind2Get || 'jne'.'ws.appl'.'ication'==$kind2Get){
return true;
}
return false;
}
public function requestTest(){
$showMessage=false;
$url=$this->myURL();
$data=new stdClass;
$data->key='q7*5dbljhu934nbg43jlfh()$%';
$data->url=$url; $data->email=WUser::get('email'); 
$data->ip=WGlobals::get('SERVER_ADDR','','server');$data->domain=WPref::load('PAPPS_NODE_DOMAIN');
$data->startDate=WModel::getElementData('apps',  'japps.application','created');
$data->platform=JOOBI_FRAMEWORK_TYPE;
$netcom=WNetcom::get();
$SiteConenct=WPref::load('PAPPS_NODE_REQUEST');
$returned=$netcom->send($SiteConenct, 'license','getFreeTrial',$data, false); 
if(empty($returned) || is_string($returned) || ( is_object($returned) && (empty($returned->status) || $returned->status===false))){
if($showMessage)$this->codeE('Failed communication.');
return false;
}elseif( strtotime($returned->maintenance) < time()){
$this->userE('1474329668DGOW');
return false;
}else{
$this->installSweet($returned, $showMessage );
$this->userS('1456437915KGWI');
$cache=WCache::get();
$cache->resetCache();
}
return true;
}
public function requestCandy(&$type,&$wid,&$level,$token='',$showMessage=true){
if($level<1 && !empty($wid)){return $this->_deleteSweet($wid, $level);
}
$url=$this->myURL();
if(!empty($wid)){
$WIDnamekey=$this->getRealAppsID($eid, 'namekey');
} else $WIDnamekey='';
$data=new stdClass;
$data->key='q7*5dbljhu934nbg43jlfh()$%';
$data->url=$url; $data->email=WUser::get('email'); $data->type=$type;
$data->encoder=0;
$data->namekey=$WIDnamekey;$data->level=$level;$data->token=$token;$data->ip=WGlobals::get('SERVER_ADDR','','server');$data->domain=WPref::load('PAPPS_NODE_DOMAIN');
$data->platform=JOOBI_FRAMEWORK_TYPE;
$data->code='';
if(empty($url)){
if($showMessage)$this->codeE('Please specify a url which is not empty.');
return false;
}
if(empty($WIDnamekey) && empty($token)){
if($showMessage)$this->codeE('An application need to be selected to fetch a license.');
return false;
}
switch ($type){
case 126:case 125:
case 130:
case 150:
case 200:
case 120:
case 18:if(empty($token)){
if($showMessage)$this->userW('1206732393CXVX');
return false;
}break;
case 101:case 102:case 17:case 8:case 9:break;
default:
if(empty($token)) return false;
break;
}
$netcom=WNetcom::get();
$SiteConenct=WPref::load('PAPPS_NODE_REQUEST');
$returned=$netcom->send($SiteConenct, 'license','fetch_new',$data, false); 
if(!$returned || is_string($returned) || ( is_object($returned) && isset($returned->status) && $returned->status===false)){
switch($returned){
case 'notAvailableAnymore':
if($showMessage)$this->userW('1206732393CXVY');
return false;
break;
case 'notLocalhost':
if($showMessage)$this->userW('1251905718PEOQ');
return false;
break;
case 'tokenNotExist':
if($showMessage)$this->userW('1389275707OUAK');
return false;
break;
case 'cancelLicense':
$this->cancelSweet($WIDnamekey );
return false;
break;
case 'noExtensionAvailable':
if($showMessage)$this->userW('1206732394IZGY');
return false;
break;
case 'alreadyEvaluated':
if($showMessage){
$this->userN('1227579883OZMZ');
$this->userN('1213020848LZMA');
}return false;
case 'notValidNonProfitSite':
if($showMessage){
$this->userN('1206732394IZHB');
}return false;
break;
default:
if(empty($returned)){
$data2='test';
$returnedPing=$netcom->send($SiteConenct, 'netcom','ping',$data2, false);
if(empty($returnedPing)){
$SERVER=$SiteConenct;
$this->userE('1453133768ISER',array('$SERVER'=>$SERVER));
}else{
WMessage::log('no license 1','error-api_-key');
WMessage::log($returned , 'error-api_-key');
WMessage::log('sent to server','error-api_-key');
WMessage::log($SiteConenct , 'error-api_-key');
WMessage::log($data , 'error-api_-key');
}}else{
WMessage::log('no license 2','error-api_-key');
WMessage::log($returned , 'error-api_-key');
WMessage::log('sent to server','error-api_-key');
WMessage::log($SiteConenct , 'error-api_-key');
WMessage::log($data , 'error-api_-key');
}
break;
}
if($showMessage){
$this->userW('1213020848LZMB');
$this->userW('1213020848LZMC');
}return false;
}
if(is_array($returned)){
foreach($returned as $oneReturned){
if(empty($oneReturned->data) && $oneReturned->type !=47){
$this->_errorInButton($showMessage);
}else{
$this->installSweet($oneReturned, $showMessage );
}}
}elseif(empty($returned->data) && $returned->type !=47 && ($returned->type < 50 || $returned->type > 79 )){
$this->_errorInButton($showMessage);
return false;
}else{
if($returned->type > 70 && $returned->type < 79){
$mobileKeyC=WClass::get('mobile.key', null, 'class', false);
if(!empty($mobileKeyC)) return $mobileKeyC->updateAPI($returned, $showMessage );
return false;
}else{
$this->installSweet($returned, $showMessage );
}
}
if($showMessage){
$this->userS('1213020848LZMF');
}
return true;
}
function checkValidity($wid,&$reason,$folder=''){
static $validStatus=array();
static $extensionQueryC=null;
if(!isset($validStatus[$wid] )){
if(empty($wid)){
$reason='No ID.';
return false;
}
if(empty($folder)){
$folderArray=explode('.',$this->getRealAppsID($wid, 'namekey'));
$folder=$folderArray[0];
}
$file=$this->_verifyLocationFile($folder );
if(!isset($extensionQueryC))$extensionQueryC=WClass::get('apps.query');
$validStatus[$wid]=$extensionQueryC->checkQuery($file, $wid );
}
return $validStatus[$wid];
}
function cancelSweet($WIDnamekey,$level=0){
return true;
}
public function installSweet($sx1,$showMessage=true){
if(!is_object($sx1)){
WMessage::log($sx1, 'error-receiving-api-key');
WMessage::log( debugB( 7878210871 ) , 'error-receiving-api-key');
return true;
}
if(empty($sx1)) return true;
if(empty($sx1->type)){
$sx1->type=0;
}
if($sx1->type==47 || (!empty($sx1->namekey) && $sx1->namekey=='jnews.application')) return $this->_installAcajoomLicense($sx1);
if($sx1->type >=50 && $sx1->type <=59 ) return $this->_installAPIKeyLicense($sx1 );
$sx1Name=(!empty($sx1->license)?$sx1->license : '');
$level=(!empty($sx1->level)?$sx1->level : '');
$type=(!empty($sx1->type)?$sx1->type : '');
$WIDnamekey=(!empty($sx1->namekey)?$sx1->namekey : '');
$sx1File=(!empty($sx1->data)?$sx1->data : '');
$token=(!empty($sx1->token)?$sx1->token : '');
$expire=(!empty($sx1->expire)?$sx1->expire : '');
$maintenance=(!empty($sx1->maintenance)?$sx1->maintenance : '');
$subtype=(!empty($sx1->subtype)?$sx1->subtype : 0 );
$widExt=$this->getRealAppsID($WIDnamekey );
if(empty($widExt)){$destinationAr=explode('.',$WIDnamekey );
$APPLICATION=$destinationAr[0];
if($showMessage)$this->userN('1251905719IQBZ',array('$APPLICATION'=>$APPLICATION));
return false;
}
$extensionUserInfosM=WModel::get('apps.userinfos');
$extensionUserInfosM->whereE('wid',$widExt );
$extensionUserInfosM->whereE('enabled', 1 );$extensionUserInfosM->setVal('enabled', 0 );
$extensionUserInfosM->update();
$extensionUserInfosM->whereE('wid',$widExt );
$extensionUserInfosM->whereE('level',$level );
$extensionUserInfosM->setVal('license',$sx1Name );
$extensionUserInfosM->setVal('wid',  $widExt ); $extensionUserInfosM->setVal('enabled',  1 );$extensionUserInfosM->setVal('token',$token );
$extensionUserInfosM->setVal('ltype',$type );
$extensionUserInfosM->setVal('subtype',$subtype );
$extensionUserInfosM->setVal('level',$level );
$extensionUserInfosM->setVal('maintenance', strtotime($maintenance ));
$extensionUserInfosM->setVal('expire',$expire );
$extensionUserInfosM->setVal('flag',  0 );
if(!$extensionUserInfosM->replace()){
if($showMessage){
$this->userE('1213020848LZME');
$this->userE('1213020848LZMC');
}return false;
}
if($sx1->type >=100 && $sx1->type <=110){
$destination='main';
}else{
$destinationAr=explode('.',$WIDnamekey );
$destination=$destinationAr[0];
}
$path=$this->_verifyLocationFile($destination );
$applicationName=$this->getRealAppsID($widExt, 'folder');
$statusFile=$this->_writeFille($path, $applicationName, $sx1File );
if(!$statusFile ) return false;
$appsDependencyM=WModel::get('install.appsdependency');
$appsDependencyM->whereE('wid',$widExt );
$appsDependencyM->makeLJ('apps','ref_wid','wid');
$appsDependencyM->whereE('type', 2, 1 );
$appsDependencyM->whereE('publish', 1, 1 );
$appsDependencyM->makeLJ('install.appsdependency','wid','wid',1,2 );$appsDependencyM->makeLJ('apps','ref_wid','wid',2,3 );
$appsDependencyM->whereIn('type',array(25,50),3 );
$appsDependencyM->whereE('publish', 1, 3 );
$appsDependencyM->select('wid',3);
$wids=$appsDependencyM->load('lra');
if(!empty($wids)){
$model=WModel::get('apps.userinfos');
$model->whereIn('wid',$wids);
$exts=$model->load('lra','wid');
if(!empty($exts)){
$model->whereIn('wid',$exts);
$model->update(array('level'=>$level));
}
$exts=array_diff($wids, $exts );
if(!empty($exts)){
$data=array();
foreach($exts as $ext)$data[]=array($ext, $level );
$model->insertMany( array('wid','level'), $data );
}}
$extensionHelperC=WCache::get();
$extensionHelperC->resetCache('Extension');
return true;
}
function checkJoobiCare($wid,$sx1Type=null,$maintenance=null){
if(!$sx1Type &&!$maintenance ) return false;
if($sx1Type < 20 || ($sx1Type > 100 && $sx1Type < 110 )){
$statusLic=true;
}else{
$level=$this->getRealAppsID($eid, 'level');
if(empty($level)) return true;
$reason='';
$statusLic=$this->checkValidity($wid, $reason, '');
if($statusLic){
static $timezone=null;
if(!isset($timezone)){
$timezone=WUser::timezone();
}$time_stamp=(int)$maintenance;
if($time_stamp!=0)$time_stamp +=$timezone;
if(empty($time_stamp) || $time_stamp <=time()){$statusLic=false;
}
}
}
return $statusLic;
}
public function myURL(){
static $website=null;
if(!isset($website)){
$parts=explode('.php',WGlobals::get('SCRIPT_NAME','','server'));
$tempA=explode('/',$parts[0] );
array_pop($tempA);
if( IS_ADMIN ) array_pop($tempA);
$serverName=WGlobals::get('HTTP_HOST','','server');
if(empty($serverName ))$serverName=WGlobals::get('SERVER_NAME','','server');
$website=$serverName. implode('/',$tempA );
if(empty($website )){
$website=( substr( JOOBI_SITE, 0, 5) !='https')?substr( JOOBI_SITE, 7) : substr( JOOBI_SITE, 8); }}
return $website;
}
public function getValidToken($onlyPlan=false,$trialOK=true){
$token='';
$filename=$this->_verifyLocationFile('main');
if( @file_exists($filename)){
$wid=$this->getRealAppsID( JOOBI_MAIN_APP.'.application');
$appsQueryC=WClass::get('apps.query');
$token=$appsQueryC->getSweetInfo($filename, $wid, 'token');
}
return $token;
}
private function _verifyLocationFile($folder){
$fileName=JOOBI_DS_USER.'node/'.$folder.'/li'.'nks.'.'php'; 
$fileNameOld=JOOBI_DS_NODE . $folder.'/li'.'nks.'.'php'; if( @file_exists($fileNameOld )){$fileS=WGet::file();
$fileS->move($fileNameOld, $fileName );
}
return $fileName;
}
private function _checkValidToken($token,$showErrorMessage=true,$showSuccessMessage=false){
$netcomServerC=WClass::get('netcom.server');
$myDistribServer=$netcomServerC->checkOnline();
if($myDistribServer===false) return true;
$sendData=new stdClass;
$sendData->token=$token;
$sendData->url=$this->myURL();
$netcom=WNetcom::get();
$result=$netcom->send($myDistribServer, 'repository','checkValidToken',$sendData );
if(empty($result) || !is_string($result)){
$this->adminE('Problem of communication with the distribution server!');
WMessage::log('Fetch api key failed','error-apikey');
WMessage::log($sendData, 'error-apikey');
WMessage::log($result, 'error-apikey');
return false;
}else{
$this->_reason=$result;
$this->_token=$token;
switch($result){
case 'tokenValid':
$message=WMessage::get();
$message->adminS('The API key is valid!');
return true;
case 'tokenExpired':
$this->adminE('The API key is expired!');
return false;
case 'tokenNotExist':
$this->adminE('The API key was not found, please check it again!');
return false;
case ' tokenNotPublished':
$this->adminE('The API key is not yet published!');
return false;
case 'tokenMismatch':
$this->adminE('The API key mismatch!');
return false;
case 'tokenNotPossibleResult':
$this->adminE('API key error!');
return false;
default:
$this->adminE('API key error or not defined!');
return false;
}
}
return false;
}
private function _checkReason(){
switch($this->_reason){
case 'tokenExpired':
if(!empty($this->_fileName)){
$this->_fileName='';
if(!empty($this->_token)){
$this->_token='';
}
}default:
break;
}
}
private function _possibleUpdateA(){
static $allPossibleUpdateA=null;
if(!isset($allPossibleUpdateA)){
$appsUserinfosM=WModel::get('apps.userinfos');
$appsUserinfosM->whereE('enabled', 1 );
$appsUserinfosM->where('token','!=','');
$allPossibleUpdateA=$appsUserinfosM->load('ol',array('wid','maintenance','ltype','subtype'));
}
return $allPossibleUpdateA;
}
private function _installAPIKeyLicense($sx1){
$widExt=0;
if($sx1->type==51){
$filename=$this->_verifyLocationFile('main');
$widExt=$this->getRealAppsID( JOOBI_MAIN_APP.'.application');
if(!$this->_writeFille($filename, JOOBI_MAIN_APP, $sx1->data )) return false;
}elseif($sx1->type==52){
$expA=explode('.',$sx1->namekey );
$folder=$expA[0];
$path=$this->_verifyLocationFile($folder );
if(!$this->_writeFille($path, $folder, $sx1->data )) return false;
$widExt=$this->getRealAppsID($sx1->namekey );
}
if(!empty($widExt)){
$subtype=(!empty($sx1->subtype)?$sx1->subtype : 0 );
$extensionUserInfosM=WModel::get('apps.userinfos');
$extensionUserInfosM->whereE('wid',$widExt );
$extensionUserInfosM->whereE('enabled', 1 );$extensionUserInfosM->setVal('enabled', 0 );
$extensionUserInfosM->update();
$extensionUserInfosM->whereE('wid',$widExt );
$extensionUserInfosM->setVal('license',$sx1->license );
$extensionUserInfosM->setVal('wid',  $widExt ); $extensionUserInfosM->setVal('enabled',  1 );$extensionUserInfosM->setVal('token',$sx1->token );
$extensionUserInfosM->setVal('ltype',$sx1->type );
$extensionUserInfosM->setVal('subtype',$subtype );
$extensionUserInfosM->setVal('maintenance',$sx1->maintenance );
$extensionUserInfosM->setVal('flag',  '0');
if(!$extensionUserInfosM->replace()){
if($showMessage){
$this->userE('1389275708EKXJ');
$this->userE('1213020848LZMC');
}return false;
}
}else{
return false;
}
return true;
}
private function _writeFille($path,$applicationName,$sx1File){
$handler=WGet::file();
$fileContent='<?php defined("JOOBI_SECURE") or die("...J");class '.strtolower($applicationName).'_icecream_Special{ var $d="'.$sx1File.'";}';
if(!$handler->write($path, $fileContent, 'overwrite')){
if($showMessage){
$APPLICATION=$destination;
$this->userE('1251905719IQCA',array('$APPLICATION'=>$APPLICATION));
}return false;
}
return true;
}
public function getRealAppsID($namekey,$return='wid'){
if(empty($namekey)) return false;
static $appA=array();
if(!isset($appA[$namekey])){
$appsM=WModel::get('apps');
if( is_numeric($namekey)){
$appsM->whereE('wid',$namekey );
$appA[$namekey]=$appsM->load('o');}else{
$appsM->whereE('namekey',$namekey );
$appA[$namekey]=$appsM->load('o');}}
return (isset($appA[$namekey]->$return)?$appA[$namekey]->$return : null );
}
private function _errorInButton($showMessage){
if($showMessage){
$this->userE('1389879769JPHN');
$this->userE('1213020848LZMC');
}}
private function _deleteSweet($wid,$level=0){
}
}
