<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Apps_CorePlan_listing extends WListings_default{
function create(){
if($this->getValue('publish')){
$namekey=$this->getValue('namekey');
if( JOOBI_MAIN_APP.'.application'==$namekey){
$this->content .='<span class="label label-success">'.WText::t('1206961869IGNE'). '</span>';
return true;
}
$club=WGlobals::get('sweetClub', false, 'global');
$maintenance=0;
if('jst'.'ore.appl'.'ication'==$namekey || 'jne'.'wsletters.appl'.'ication'==$namekey || 'jne'.'ws.appl'.'ication'==$namekey){
$this->content .='<span class="label label-danger">'.WText::t('1206961944PEUR'). '</span>';
}elseif($club){
$subStype=WGlobals::get('sweetClubType','','global');
if(!empty($subStype)){
$hT=WType::get('apps.clubsubtype');
$nH=$hT->getName($subStype);
if(empty($nH))$nH='Joobi Care';
$colorT=WType::get('apps.clubcolor');
$color=$colorT->getName($subStype );
$this->content .='<span class="label label-'.$color.'"><big>'.$nH.'</big></span>';
}
}else{
if($this->getValue('enabled','apps.userinfos')){
$appsInfoC=WCLass::get('apps.info');
$status=$appsInfoC->getPossibleCode($this->getValue('wid'));
if(!empty($status) && isset($status->subtype) && isset($status->epytype)){
$subStype=$status->subtype;
$sweetClubType=$status->epytype;
}else{
$subStype=$this->getValue('subtype','apps.userinfos');
$sweetClubType=WGlobals::get('sweetClubType', 0, 'global');
}
if(!empty($sweetClubType) && 109==$sweetClubType){
$this->content .='<span class="label label-warning">'.WText::t('1206732398LZJO'). '</span>';
$maintenance=WGlobals::get('sweetClubTime', 0, 'global');
}elseif(!empty($subStype)){
$hT=WType::get('apps.clubsubtype');
$nH=$hT->getName($subStype);
if(empty($nH))$nH='Joobi Care';
$colorT=WType::get('apps.clubcolor');
$color=$colorT->getName($subStype);
$this->content .='<span class="label label-'.$color.'"><big>'.$nH.'</big></span>';
}else{
$this->content .='<span class="label label-info">'.WText::t('1357059110IPWM'). '</span>';
}
}else{
$this->content .='<span class="label label-danger">'.WText::t('1235461988ERWP'). '</span>';
}
}
$this->content .='<br/>';
if($club){
$maintenance=WGlobals::get('sweetClubTime','','global');
}else{
if(empty($maintenance))$maintenance=$this->getValue('maintenance');
if(empty($maintenance)){
$maintenance=$this->getValue('expire');
if($maintenance > ( time() + 63072000 )){
$maintenance -=283824000;}}
if(empty($maintenance))$maintenance=WGlobals::get('sweetClubTimeFree') + 86400*29;
}
if(!is_numeric($maintenance))$maintenance=strtotime($maintenance );
if($namekey !=JOOBI_MAIN_APP.'.application' && $namekey !='jst'.'ore.application' && $namekey !='jca'.'talog.application' && 'jne'.'wsletters.appl'.'ication' !=$namekey && 'jne'.'ws.appl'.'ication' !=$namekey){
if($maintenance > 2506000){
$maintenance +=86400;
if($maintenance < time()){
$color='red';
$text=WText::t('1235461988ERWP'). ': ';
}else{
$color='green';
$text='';
}
$this->content .='<small><span style="color:'.$color.';">'.$text . WApplication::date( WTools::dateFormat('date'), $maintenance ). '</span></small>';
}
}
}else{
return false;
}
return true;
}
}