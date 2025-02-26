<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Apps_Steps_class extends Library_Progress_class {
var $useAjax=true;
var $userMaxExecTime=0;var $userMaxLoop=0;
protected $_stepDuration=1;
protected $_maxIncrement=500;
protected $_maxTimeRatio=50;protected $_maxExcecutionTime=5;
protected $_showBar=true;
protected $_showProgressStatus=true;
protected $_showError=true;
protected $_showTimeEstimate=true;
protected $_showTimeCompletion=true;
protected $_stepA=array(
0=> 'initialize',1=> 'downloadPackage'
,2=> 'extraPackage'
,3=> 'moveFiles',4=> 'createTables'
,5=> 'installDataExtension'
,6=> 'installDataTable'
,7=> 'installDataModel'
,8=> 'installDataPicklist'
,9=> 'installDataView'
,10=> 'installDataController'
,11=> 'customFunction'
,12=> 'downloadLanguages'
,13=> 'installLanguages'
,14=> 'final'
);
protected $_stepRatioA=array(
'initialize'=> 1
,'downloadPackage'=> 2
,'extraPackage'=> 2
,'moveFiles'=> 1
,'createTables'=> 2
,'installDataExtension'=> 2
,'installDataTable'=> 4
,'installDataModel'=> 10
,'installDataPicklist'=> 12
,'installDataView'=> 50
,'installDataController'=> 3
,'customFunction'=> 2
,'downloadLanguages'=> 1
,'installLanguages'=> 7
,'final'=> 1
);
protected $_stepTotalIncrementA=array(
'initialize'=> 1
,'downloadPackage'=> 50
,'extraPackage'=> 50
,'moveFiles'=> 1
,'createTables'=> 50
,'installDataExtension'=> 50
,'installDataTable'=> 50
,'installDataModel'=> 50
,'installDataPicklist'=> 50
,'installDataView'=> 50
,'installDataController'=> 50
,'customFunction'=> 50
,'downloadLanguages'=> 1
,'installLanguages'=> 1
,'final'=> 1
);
public function init(){
$this->_firstMessage=WText::t('1427652792LBWK');
$this->_showMessage=WPref::load('PINSTALL_NODE_INSTALLDETAILS');
$this->userMaxExecTime=0;
$this->userMaxLoop=0;
return true;
}
public function runStep(){
$this->setStep('inProgress');
$installProcessC=WClass::get('install.processnew');
if(!class_exists('Install_Node_Install')) require_once( JOOBI_DS_NODE.'install/install/install.php');
WPref::get('install.node');
WText::load('install.node');
WText::load('apps.node');
$finishedProcess=false;
$mess='';
Install_Processnew_class::logMessage('Starting Install for step nb : '.$this->_progressO->stepNb.' step name: '.$this->_progressO->currentStep );
Install_Processnew_class::logMessage('Increment value:'.$this->_progressO->increment );
switch($this->_progressO->currentStep){
case 'initialize':
$installRequirementsC=WClass::get('install.requirements');
$status=$installRequirementsC->checkRequirements();
if(true !==$status){
$link=WPages::link('controller=install-requirements');
$link='<br><a href="'.$link.'">'.WText::t('1432597449CAIM'). '</a>';
$this->setReturnedAction('WAjxRefresh', WText::t('1432597449CAIN'). $link, 'html','failed');
$this->setReturnedAction('WAjxAppend', implode('<br>',$status ));
$this->completeProcess();
break;
}
$this->setReturnedAction('','','wait');
$cacheC=WCache::get();
$cacheC->resetCache();
$systemFolderC=WGet::folder();
$systemFolderC->delete( JOOBI_DS_USER.'logs');
Install_Processnew_class::logMessage('Starting Install for step:'.$this->_progressO->currentStep );
Install_Processnew_class::logMessage('Step 1 : Initialization');
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1427652792LBWL'), 'append');
$status=$this->_displayMessage($installProcessC->getListOfPackagesStep());
if(!$status){
Install_Processnew_class::logMessage('The function getListOfPackagesStep() return false');
$this->setReturnedAction('WAjxRefresh', WText::t('1429238504IKNA'), 'html','failed');
$this->completeProcess();
break;
}
$numberPacakges=$installProcessC->getNumberPackage();
Install_Processnew_class::logMessage('Step 1 : Total number of packages: '.$numberPacakges );
if(empty($numberPacakges)){
$this->setReturnedAction('WAjxRefresh', WText::t('1428532729DJHL'), 'html');
$this->completeProcess();
Install_Processnew_class::logMessage('There is no new package to install');
break;
}
$langA=$installProcessC->getLanguages();
$nbLang=count($langA );
if($nbLang <=1 || $langA[0]->code=='en'){
$langA=array();
}
$this->_stepTotalIncrementA['downloadPackage']=$numberPacakges;
$this->_stepTotalIncrementA['extraPackage']=$numberPacakges;
$this->_stepTotalIncrementA['createTables']=$numberPacakges;
$this->_stepTotalIncrementA['customFunction']=$numberPacakges;
$this->_stepTotalIncrementA['downloadLanguages']=$numberPacakges;
$this->_stepTotalIncrementA['installDataExtension']=$numberPacakges;
$this->_stepTotalIncrementA['installDataTable']=$numberPacakges;
$this->_stepTotalIncrementA['installDataModel']=$numberPacakges;
$this->_stepTotalIncrementA['installDataPicklist']=$numberPacakges;
$this->_stepTotalIncrementA['installDataView']=$numberPacakges;
$this->_stepTotalIncrementA['installDataController']=$numberPacakges;
$this->_progressO->maxIncr=$numberPacakges + 2;
if(empty($langA)){
$this->_stepA[12]='final';
unset($this->_stepA[13] );
unset($this->_stepA[14] );
$this->_stepRatioA['customFunction'] +=3;
unset($this->_stepRatioA['downloadLanguages'] );
unset($this->_stepRatioA['installLanguages'] );
unset($this->_stepTotalIncrementA['downloadLanguages'] );
unset($this->_stepTotalIncrementA['installLanguages'] );
}else{
$this->_stepTotalIncrementA['installLanguages']=$nbLang * 22;
}
$this->setStep('complete');
break;
case 'downloadPackage':
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb.'. '.WText::t('1427652792LBWM'), 'append');
Install_Processnew_class::logMessage('call getDownloadPackages increment: '.$this->_progressO->increment, 'install');
$this->_displayMessage($installProcessC->getDownloadPackages($this->_progressO->increment ));
if($this->_progressO->increment==$this->_stepTotalIncrementA[$this->_progressO->currentStep]){
$langM=WClass::get('translation.helper');
$langM->updateLanguages();
$systemFolderC=WGet::folder();
$folder=JOOBI_DS_USER.'installfiles';
if($systemFolderC->exist($folder)){
$systemFolderC->delete($folder );
Install_Processnew_class::logMessage('Delete installfiles folder: '.$folder, 'install');
}
$this->setReturnedAction('WAjxRefresh', WText::t('1427652792LBWN'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1427652813TJJR'), 'html');
}
break;
case 'extraPackage':
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1427652792LBWO'), 'append');
Install_Processnew_class::logMessage('-- Start extraPackage','install');
$this->_displayMessage($installProcessC->extractPackages($this->_progressO->increment ));
Install_Processnew_class::logMessage('-- Finish extraPackage','install');
if($this->_progressO->increment==$this->_stepTotalIncrementA[$this->_progressO->currentStep]){
$this->setReturnedAction('WAjxRefresh', WText::t('1427652792LBWP'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1427652792LBWN'), 'html');
}
break;
case 'moveFiles':
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1427652792LBWP'), 'append');
Install_Processnew_class::logMessage('-- Start moveFiles','install');
$this->_displayMessage($installProcessC->moveFiles($this->_progressO->increment ));
Install_Processnew_class::logMessage('-- Finish moveFiles','install');
$this->setStep('complete');
break;
case 'createTables':
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1427652792LBWR'), 'append');
Install_Processnew_class::logMessage('-- Start createTables','install');
$this->_displayMessage($installProcessC->createTables($this->_progressO->increment ));
Install_Processnew_class::logMessage('-- End createTables','install');
if($this->_progressO->increment==$this->_stepTotalIncrementA[$this->_progressO->currentStep]){
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAM'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1427652812DTKK'), 'html');
}
break;
case 'customFunction':
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1471881669QDAN'), 'append');
Install_Processnew_class::logMessage('-- Start customFunction','install');
$this->_displayMessage($installProcessC->customFunction($this->_progressO->increment ));
Install_Processnew_class::logMessage('-- End customFunction','install');
if($this->_progressO->increment==$this->_stepTotalIncrementA['customFunction']){
$this->setReturnedAction('WAjxRefresh', WText::t('1470758946GHEO'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAO'), 'html');
}
break;
case 'downloadLanguages':
Install_Processnew_class::logMessage('-- Start downloadLanguages','install');
$importLangs=Install_Node_install::accessInstallData('get','importLangs');
Install_Processnew_class::logMessage('Language to install: ','install');
Install_Processnew_class::logMessage($importLangs, 'install');
if(empty($importLangs)){
$this->setStep('complete');
Install_Processnew_class::logMessage('No Language to install: ','install');
break;
}
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1470152233POIR'), 'append');
Install_Processnew_class::logMessage('downloadLanguages : increment '.$this->_progressO->increment, 'install');
$this->_displayMessage($installProcessC->installLanguages($this->_progressO->increment ));
Install_Processnew_class::logMessage('-- End downloadLanguages','install');
if($this->_progressO->increment==$this->_stepTotalIncrementA['downloadLanguages']){
$this->setReturnedAction('WAjxRefresh', WText::t('1427652793DOXN'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAP'), 'html');
}
break;
case 'installLanguages':
$this->_progressO->maxIncr=$this->_stepTotalIncrementA['installLanguages'] + 1;
Install_Processnew_class::logMessage('-- Start installLanguages','install');
$importLangs=Install_Node_install::accessInstallData('get','importLangs');
Install_Processnew_class::logMessage('Language to install: ','install');
Install_Processnew_class::logMessage($importLangs, 'install');
if(empty($importLangs)){
$this->setStep('complete');
Install_Processnew_class::logMessage('No Language to install: ','install');
break;
}
if($this->_progressO->increment==1){
$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1427652793DOXM'), 'append');
}
Install_Processnew_class::logMessage('downloadLanguages : increment '.$this->_progressO->increment, 'install');
$this->_displayMessage($installProcessC->populateLanguages($this->_progressO->increment ));
Install_Processnew_class::logMessage('-- End installLanguages','install');
if($this->_progressO->increment==$this->_stepTotalIncrementA['installLanguages']){
$this->setReturnedAction('WAjxRefresh', WText::t('1470793146KYDI'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAQ'), 'html');
}
break;
case 'installDataExtension':
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1473965946CBHX'), 'append');
Install_Processnew_class::logMessage('-- Start inserting '.$this->_progressO->currentStep, 'install');
$this->_displayMessage($installProcessC->installData($this->_progressO->increment, 'Extension',$finishedProcess ));
Install_Processnew_class::logMessage('-- End inserting '.$this->_progressO->currentStep, 'install');
if($this->_progressO->increment==$this->_stepTotalIncrementA[$this->_progressO->currentStep]){
$this->setReturnedAction('WAjxRefresh', WText::t('1473965946CBHY'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1490462141HARF'), 'html');
}break;
case 'installDataTable': 
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1469206027EZDS'), 'append');
Install_Processnew_class::logMessage('-- Start inserting '.$this->_progressO->currentStep, 'install');
$this->_displayMessage($installProcessC->installData($this->_progressO->increment, 'Table',$finishedProcess ));
Install_Processnew_class::logMessage('-- End inserting '.$this->_progressO->currentStep, 'install');
if($this->_progressO->increment==$this->_stepTotalIncrementA[$this->_progressO->currentStep]){
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAR'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAS'), 'html');
}break;
case 'installDataModel':
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1469206027EZDT'), 'append');
Install_Processnew_class::logMessage('-- Start inserting '.$this->_progressO->currentStep, 'install');
$this->_displayMessage($installProcessC->installData($this->_progressO->increment, 'Model',$finishedProcess ));
Install_Processnew_class::logMessage('-- End inserting '.$this->_progressO->currentStep, 'install');
if($this->_progressO->increment==$this->_stepTotalIncrementA[$this->_progressO->currentStep]){
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAT'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAU'), 'html');
}
break;
case 'installDataPicklist':
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1469206027EZDU'), 'append');
Install_Processnew_class::logMessage('-- Start inserting '.$this->_progressO->currentStep, 'install');
$this->_displayMessage($installProcessC->installData($this->_progressO->increment, 'Picklist',$finishedProcess ));
Install_Processnew_class::logMessage('-- End inserting '.$this->_progressO->currentStep, 'install');
if($this->_progressO->increment==$this->_stepTotalIncrementA[$this->_progressO->currentStep]){
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAV'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAW'), 'html');
}
break;
case 'installDataView':
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1469206027EZDV'), 'append');
Install_Processnew_class::logMessage('-- Start inserting '.$this->_progressO->currentStep.' step : '.$this->_progressO->increment, 'install');
$this->_displayMessage($installProcessC->installData($this->_progressO->increment, 'View',$finishedProcess ));
Install_Processnew_class::logMessage('-- End inserting '.$this->_progressO->currentStep, 'install');
if(!$finishedProcess){
$this->_progressO->increment -=1;
}
$this->setStep('inprogress');
if($this->_progressO->increment==$this->_stepTotalIncrementA[$this->_progressO->currentStep]){
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAX'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAY'), 'html');
}break;
case 'installDataController':
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1469206027EZDW'), 'append');
Install_Processnew_class::logMessage('-- Start inserting '.$this->_progressO->currentStep, 'install');
$this->_displayMessage($installProcessC->installData($this->_progressO->increment, 'Controller',$finishedProcess ));
Install_Processnew_class::logMessage('-- End inserting '.$this->_progressO->currentStep, 'install');
if($this->_progressO->increment==$this->_stepTotalIncrementA[$this->_progressO->currentStep]){
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDAZ'), 'html');
$this->setStep('complete');
}else{
$this->setReturnedAction('WAjxRefresh', WText::t('1471881669QDBA'), 'html');
}
break;
case 'final':
$libInstalled=WPref::load('PINSTALL_NODE_LIBINSTALLED');
if(empty($libInstalled)){
$istlPref=WPref::get('install.node');
$istlPref->updatePref('libinstalled', 1 );
$istlPref->updatePref('skippack', 1 );}
Install_Processnew_class::logMessage('-- Start Final','install');
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1427652793DOXO'), 'append');
$installProcessC->finalizeInstall();
$designModelfieldsC=WClass::get('design.modelfields');
if(!empty($designModelfieldsC))$designModelfieldsC->resetcount();
$installProcessC->clean();
$finalMessage=WText::t('1427652793DOXP');
$namekey=$installProcessC->getLastExtension();
$type=WExtension::get($namekey, 'type');
Install_Processnew_class::logMessage('Last extension: '.$namekey, 'install');
Install_Processnew_class::logMessage('Last extension type: '.$type, 'install');
if($type==1){
$objButtonO=WPage::newBluePrint('button');
$multiple=WGlobals::getSession('installProcess','what','single');
if('single' !=$multiple){
$name=WText::t('1473866946EYYI');
$folder=WExtension::get( JOOBI_MAIN_APP.'.application','folder');
$objButtonO->link=WPage::routeURL('controller=apps&task=refresh','', false, false, false, $folder );
}else{
$name=WText::t('1427833134LQDZ'). ' '.WExtension::get($namekey, 'name');
$folder=WExtension::get($namekey, 'folder');
$objButtonO->link=WPage::routeURL('controller='.$folder, '', false, false, false, $folder );
}
$finalMessage .='<br><br>';
$objButtonO->text=$name;
$objButtonO->type='infoLink';
$objButtonO->color='success';
$html=WPage::renderBluePrint('button',$objButtonO );
Install_Processnew_class::logMessage($html, 'install');
$finalMessage .=$html.'<br>';
}
$this->setReturnedAction('WAjxRefresh',$finalMessage, 'html');
Install_Processnew_class::logMessage('-- End Final','install');
$this->setReturnedAction('','','unwait');
$this->setStep('complete');
$appPref=WPref::get('apps.node');
$appPref->updatePref('hasupdate', 0 );
if( WExtension::exist('main.node')) WGet::saveConfig('install', 0 );
break;
default:
$this->setReturnedAction('WAjxRefresh','Step not defined!','html','failed');
$this->setStep('complete');
break;
}
Install_Processnew_class::logMessage('Step finished : '.$this->_progressO->currentStep );
}
private function _displayMessage($messageA=array()){
if(empty($messageA)) return false;
$status=true;
foreach($messageA as $actionO){
if($actionO->action=='append'){
$this->setReturnedAction('WAjxAppend',$actionO->message, 'append');
}else{
$this->setReturnedAction('WAjxRefresh',$actionO->message, 'html');
}
if(!empty($actionO->status)){
$this->setStep($actionO->status );
if('failed'==$actionO->status)$status=false;
}
}
return $status;
}
}