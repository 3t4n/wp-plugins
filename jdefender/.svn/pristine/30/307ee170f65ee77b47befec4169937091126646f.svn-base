<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Apps_Savepref_class extends WClasses {
function appsSave(&$preferencesA){
$cache=WCache::get();
$cache->resetCache();
if(isset($preferencesA['install.node']['distrib_website']))$preferencesA['install.node']['distrib_website']=trim($preferencesA['install.node']['distrib_website'] );
if(isset($preferencesA['install.node']['distrib_website_beta'])){
$preferencesA['install.node']['distrib_website_beta']=trim($preferencesA['install.node']['distrib_website_beta'] );
$installPref=WPref::get('install.node');
$installPref->updatePref('distrib_website_beta_time', time());
}if(isset($preferencesA['install.node']['distrib_website_dev']))$preferencesA['install.node']['distrib_website_dev']=trim($preferencesA['install.node']['distrib_website_dev'] );
if(isset($preferencesA['library.node']['documentation_site']))$preferencesA['library.node']['documentation_site']=trim($preferencesA['library.node']['documentation_site'] );
if(isset($preferencesA['apps.node']['home_site']))$preferencesA['apps.node']['home_site']=trim($preferencesA['apps.node']['home_site'] );
if(!WPref::load('PUSERS_NODE_FRAMEWORK_BE') && empty($preferencesA['users.node']['framework_be'])){
$preferencesA['users.node']['framework_be']=WApplication::getFrameworkName();
}if(!WPref::load('PUSERS_NODE_FRAMEWORK_FE') && empty($preferencesA['users.node']['framework_fe'])){
$preferencesA['users.node']['framework_fe']=WApplication::getFrameworkName();
}
if(isset($preferencesA['users.node']['framework_be'])){
$userManagement=$preferencesA['users.node']['framework_be'];
if(!empty($userManagement)){
$usersAddon=WAddon::get('users.'.$userManagement );
if( is_object($usersAddon)){
$usersAddon->checkPlugin();
}}}
if(isset($preferencesA['users.node']['framework_fe'])){
$userManagement=$preferencesA['users.node']['framework_fe'];
if(!empty($userManagement)){
$usersAddon=WAddon::get('users.'.$userManagement );
if( is_object($usersAddon)){
$usersAddon->checkPlugin();
}}}
if(isset($preferencesA['apps.node']['distribserver'])){
if( 99==$preferencesA['apps.node']['distribserver']){
$appsPref=WPref::get('apps.node');
$appsPref->updatePref('distribservertime', time());
}}
if(isset($preferencesA['library.node']['cron'])){
if($preferencesA['library.node']['cron']==10){
$schedulerCronC=WClass::get('scheduler.cron');
$result=$schedulerCronC->checkCron();
if($result){
$this->userS('1476239648JSKS');
}else{
$this->userE('1476239648JSKT');
}
}else{
$schedulerCronC=WClass::get('scheduler.cron');
$schedulerCronC->desactivateCron();
}
if($preferencesA['library.node']['cron']==5){
if(isset($preferencesA['scheduler.node']['cronfrequency'])){
if($preferencesA['scheduler.node']['cronfrequency'] < 300)$preferencesA['scheduler.node']['cronfrequency']=300;
}else{
$freq=WPref::load('PSCHEDULER_NODE_CRONFREQUENCY');
if($freq < 300){
$schedulerPref=WPref::get('scheduler.node');
$schedulerPref->updatePref('cronfrequency', 300 );
}}$enabled=true;
} else $enabled=false;
WApplication::enable('scheduler_system_plugin',$enabled, 'plugin');
$ENABLED=($enabled?WText::t('1432423407JSWI') : WText::t('1475196846DLGZ'));
$this->userN('1303354916DPMU',array('$ENABLED'=>$ENABLED));
}
if(isset($preferencesA['library.node']['useminify']) && empty($preferencesA['library.node']['useminify'])){
$mainMinifyC=WClass::get('main.minify');
if(!empty($mainMinifyC)){
if(!$mainMinifyC->getMinifyThemes()){
$this->userE('1470263346HAMF');
$preferencesA['library.node']['useminify']=true;
$prefM=WPref::get('library.node');
$prefM->updatePref('useminify', 1 );
$extensionHelperC=WCache::get();
$extensionHelperC->resetCache('Preference');
return false;
}}
}
return true;
}
}