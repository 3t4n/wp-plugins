<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Translation_Steps_class extends Library_Progress_class {
var $useAjax=true;
var $userMaxExecTime=0;var $userMaxLoop=0;
protected $_stepDuration=1;
protected $_maxIncrement=500;
protected $_showBar=true;
protected $_showProgressStatus=true;
protected $_showError=true;
protected $_showTimeEstimate=true;
protected $_showTimeCompletion=true;
protected $_stepA=array(
0=> 'initialize',1=> 'downloadLanguages'
,2=> 'installLanguages'
,3=> 'final'
);
protected $_stepRatioA=array(
'initialize'=> 5
,'downloadLanguages'=> 10
,'installLanguages'=> 80
,'final'=> 5
);
protected $_stepTotalIncrementA=array(
'initialize'=> 1
,'downloadLanguages'=> 1
,'installLanguages'=> 1
,'final'=> 1
);
public function init(){
$this->_firstMessage=WText::t('1469832073QZTR');
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
WText::load('translation.node');
WText::load('output.node');
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
$status=$this->_displayMessage($installProcessC->getListOfApps());
if(!$status){
Install_Processnew_class::logMessage('The function getListOfApps() return false');
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
$langA=Install_Node_install::accessInstallData('get','importLangs');
if( count($langA ) <=1){
if(empty($langA) || $langA[0]->code=='en'){
$langA=array();
}}
$this->_progressO->maxIncr=$numberPacakges + 2;
if(empty($langA)){
$this->_stepA[1]='final';
unset($this->_stepA[2] );
unset($this->_stepA[3] );
unset($this->_stepRatioA['downloadLanguages'] );
unset($this->_stepRatioA['installLanguages'] );
unset($this->_stepTotalIncrementA['downloadLanguages'] );
unset($this->_stepTotalIncrementA['installLanguages'] );
}else{
$nbLang=1;
$this->_stepTotalIncrementA['installLanguages']=$nbLang * 22;
}
$this->setStep('complete');
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
Install_Processnew_class::logMessage('-- End installLanguages','install');
if($this->_progressO->increment==$this->_stepTotalIncrementA['downloadLanguages']){
$this->setReturnedAction('WAjxRefresh', WText::t('1427652793DOXN'), 'html');
$this->setStep('complete');
}
break;
case 'installLanguages':
Install_Processnew_class::logMessage('-- Start installLanguages','install');
$this->_progressO->maxIncr=$this->_stepTotalIncrementA['installLanguages'] + 1;
Install_Processnew_class::logMessage('-- Start installLanguages','install');
$importLangs=Install_Node_install::accessInstallData('get','importLangs');
Install_Processnew_class::logMessage('Language to install: ','install');
Install_Processnew_class::logMessage($importLangs, 'install');
Install_Processnew_class::logMessage('Language to install: ','install');
Install_Processnew_class::logMessage($importLangs, 'install');
if(empty($importLangs)){
$this->setStep('complete');
Install_Processnew_class::logMessage('No Language to install: ','install');
break;
}
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb.'. '.WText::t('1427652793DOXM'), 'append');
Install_Processnew_class::logMessage('downloadLanguages : increment '.$this->_progressO->increment, 'install');
$this->_displayMessage($installProcessC->populateLanguages($this->_progressO->increment ));
Install_Processnew_class::logMessage('-- End installLanguages','install');
if($this->_progressO->increment==$this->_stepTotalIncrementA['installLanguages']){
$this->setReturnedAction('WAjxRefresh', WText::t('1470793146KYDI'), 'html');
$this->setStep('complete');
}
break;
case 'final':
$libInstalled=WPref::load('PINSTALL_NODE_LIBINSTALLED');
if(empty($libInstalled)){
$istlPref=WPref::get('install.node');
$istlPref->updatePref('libinstalled', 1 );
}
Install_Processnew_class::logMessage('-- Start Final','install');
if($this->_progressO->increment==1)$this->setReturnedAction('WAjxAppend','<br>'.$this->_progressO->stepNb. '. '.WText::t('1427652793DOXO'), 'append');
$installProcessC->finalizeInstall();
$installProcessC->clean();
$finalMessage=WText::t('1427652793DOXP');
$name=WText::t('1472687834CDZW');
$finalMessage .='<br><br>';
$objButtonO=WPage::newBluePrint('button');
$objButtonO->text=$name;
$objButtonO->type='infoLink';
$objButtonO->link=WPage::linkAdmin('controller=translation');
$objButtonO->color='success';
$html=WPage::renderBluePrint('button',$objButtonO );
$finalMessage .=$html.'<br>';
$this->setReturnedAction('WAjxRefresh',$finalMessage, 'html');
Install_Processnew_class::logMessage('-- End Final','install');
$this->setStep('complete');
if( WExtension::exist('main.node')) WGet::saveConfig('install', 0 );
$this->setReturnedAction('','','unwait');
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