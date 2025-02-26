<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Apps_Apps_listing_view extends Output_Listings_class {
protected function prepareQuery(){
if(!WExtension::exist('main.node')){
$refresh=WClass::get('apps.refresh');
$refresh->firstRefresh();
}
return true;
}
protected function prepareView(){
if(!WExtension::exist('main.node')){
if(!WPref::load('PLIBRARY_NODE_MULTILANG')){
$availableLanguageA=WApplication::availLanguages('lgid');
$code=APIApplication::cmsUserLang(true);
$lang=WLanguage::get($code, 'lgid');
if( count($availableLanguageA) > 1 || ! in_array( 1, $availableLanguageA )){
$libraryPref=WPref::get('library.node');
$libraryPref->updatePref('multilang', 1 );
$langM=WClass::get('translation.helper');
$status=$langM->updateLanguages();
if($status)$this->userW('1473279667ETKF');
}
}
}else{
if(  201608==JOOBI_VERSION){
if( WExtension::get('japps','version') < 5000){
$this->userW('1475770871QKRM');
}}}
if( WPref::load('PLIBRARY_NODE_ADMINENGLISH')){
$availableLanguageA=WApplication::availLanguages('lgid');
$code=APIApplication::cmsUserLang(true);
$lang=WLanguage::get($code, 'lgid');
if( in_array($lang, $availableLanguageA ) && $lang !=WUser::get('lgid')){
$this->userW('1440630075DQTP');
$this->userW('1441038141CRZK');
}
}
$distribserver=WPref::load('PAPPS_NODE_DISTRIBSERVER');
if($distribserver==11){
$this->removeMenus( array('apps_listing_check','apps_listing_divider_check','apps_listing_updateall'));
}elseif($distribserver==99){
$message=WMessage::get();
$BETA_SITE=WPref::load('PINSTALL_NODE_DISTRIB_WEBSITE_BETA');$message->userN('1377368277IDOY',array('$BETA_SITE'=>$BETA_SITE));
}elseif($distribserver==54){
$message=WMessage::get();
$DEV_SITE=WPref::load('PINSTALL_NODE_DISTRIB_WEBSITE_DEV');
$message->userN('1377368277IDOZ',array('$DEV_SITE'=>$DEV_SITE));
}
$allSweetB=false;
$appsInfoC=WCLass::get('apps.info');
$status=$appsInfoC->getPossibleCode('onlyAll',array('token','subtype','supermaintCare'));
if(!$status){
$this->removeMenus( array('apps_listing_updateall'));
$status=$appsInfoC->getPossibleCode('all',array('token','subtype','supermaintCare'));
}else{
if(!empty($status->token) && 109 !=$status->subtype)$allSweetB=true;
}
WGlobals::set('sweetClubTimeFree', WExtension::get( JOOBI_MAIN_APP.'.application','created'));
if( is_bool($status)){
$LINK2CLUB='<a target="_blank" href="https://joobi.co/r.php?l=club">'.WText::t('1389656307QIHM'). '</a>';
$message=WMessage::get();
$message->userN('1389656307QIHN',array('$LINK2CLUB'=>$LINK2CLUB));
}else{
if($allSweetB ) WGlobals::set('sweetClub', true, 'global');
if(!empty($status->subtype)){
WGlobals::set('sweetClubType',$status->subtype, 'global');
WGlobals::set('sweetClubTime',$status->supermaintCare, 'global');
}
}return true;
}
}