<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Apps_Node_install extends WInstall {
public function install($object){
$pref=WPref::get('install.node');
$appsUserinfosM=WModel::get('apps.userinfos');
$appsUserinfosM->makeLJ('apps','wid');
$appsUserinfosM->where('expire','>', time());
$appsUserinfosM->whereE('enabled', 1 );
$appsUserinfosM->whereE('type', 1, 1 );
$appsUserinfosM->select('name', 1 );
$appsUserinfosM->orderBy('name','ASC', 1 );
$allAppsA=$appsUserinfosM->load('lra');
if(!empty($allAppsA)){
$appsInstallC=WClass::get('apps.install');
$count=1;
foreach($allAppsA as $oneApp){
$appsInstallC->createDashboardMenu($oneApp, $count );
$count++;
}
}
if(!empty($this->newInstall) || (property_exists($object, 'newInstall') && $object->newInstall)){
$this->_checkMultiLanguageSite();
}else{
$joptionVal=array('com_jiptracker','com_jnotes','com_jprojects','com_jlinks','com_jdesign','com_jfaq','com_jdiscuss','com_jservicesprovider','com_jdefender','com_japps','jstore','com_jfeedback','com_jcomment','com_jtickets','com_jcloner','com_jaffiliates','com_japplication','com_jbackup','com_jstudio','com_jmobile','com_jmarket','com_jauction','com_jvouchers','jsubscription','com_jtestcases','com_jcontacts','com_jcatalog','com_jdownloads','com_jdloads','com_jclassifieds','com_jdatabase','com_jtodo','com_jchecklist','com_jdocumentation','com_jdistribution','com_jbounceback','com_jdictionary','com_jforum','com_jlicense','com_jnewsletters','com_jcampaign','com_joomfusion');
$componentM=WModel::get('joomla.extensions');
$componentM->whereIn('element',$joptionVal );
$comtIDA=$componentM->load('lra','extension_id');
if(!empty($comtIDA)){
$joomlaMenuM=WModel::get('joomla.menu');
$joomlaMenuM->whereIn('component_id',$comtIDA );
$joomlaMenuM->whereE('type','component');
$joomlaMenuM->whereE('client_id', 1 );
$joomlaMenuM->whereE('menutype','menu');
$joomlaMenuM->setVal('menutype','main');
$joomlaMenuM->update();
}
}
$appsM=WModel::get('apps');
$appsM->where('type','>=', 60 );
$appsM->where('type','<=', 80 );
$appsM->deleteAll();
}
public function addExtensions(){
$extension=new stdClass;
$extension->namekey='apps.system.plugin';
$extension->name='Joobi - Debug Traces';
$extension->folder='system';
$extension->type=50;
$extension->publish=1;
$extension->certify=1;
$extension->destination='node|apps|plugin';
$extension->core=1;
$extension->params='publish=1';
$extension->description='This is a plugin to see all the debug traces at the bottom of the page.';
if($this->insertNewExtension($extension ))$this->installExtension($extension->namekey );
}
private function _checkMultiLanguageSite(){
$languagesCMS=APIApplication::cmsAvailLang();
$languagesA=WApplication::availLanguages('lgid','all');
if( count($languagesCMS ) > 1){
$pref=WPref::get('library.node');
$pref->updatePref('multilang', 1 );
$cache=WCache::get();
$cache->resetCache('Preference');
}
}
}