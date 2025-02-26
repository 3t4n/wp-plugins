<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Users_user_tag {
 var $usertag=true;
 var $_excludeA=array('password','question','answer');
function process($object){
static $adminStatus=null;
$replacedTagsA=array();
$message=WMessage::get();
$query=false;
foreach($object as $tag=> $myTagO){
if(empty($myTagO->select))$myTagO->select=$myTagO->_type;
$valeur=strtolower($myTagO->select );
if( in_array($valeur, $this->_excludeA )){
$FIELD=$valeur;
$message->userW('1212843293BKVD',array('$FIELD'=>$FIELD));
$myTagO->wdgtContent='';
$replacedTagsA[$tag]=$myTagO;
continue;
}
if(isset($this->user->$valeur)){
$myTagO->wdgtContent=$this->user->$valeur;
$replacedTagsA[$tag]=$myTagO;
continue;
}else{
if(!isset($adminStatus)){
$roleC=WRole::get();
$adminStatus=WRole::hasRole('admin');
}
if(!$adminStatus){
$myTagO->wdgtContent='';
$replacedTagsA[$tag]=$myTagO;
}
}
switch($valeur){
case 'company':
$name=WPref::load('PMAIN_NODE_COMPANY');
if(empty($name))$name=JOOBI_SITE_NAME;
$myTagO->wdgtContent=$name;
break;
case 'companyaddress':
$name=WPref::load('PMAIN_NODE_ADDRESS');
$myTagO->wdgtContent=$name;
break;
case 'companyphone':
$name=WPref::load('PMAIN_NODE_PHONE');
$myTagO->wdgtContent=$name;
break;
case 'companyemail':
$name=WPref::load('PMAIN_NODE_EMAIL');
$myTagO->wdgtContent=$name;
break;
default:
if(empty($this->user->uid)){
continue;
}
$this->user=WUser::get('data',$this->user->uid );
switch($valeur){
case 'firstname':
$expldeNAmeA=explode(' ',$this->user->name );
$myTagO->wdgtContent=$expldeNAmeA[0];
break;
case 'lastname':
$expldeNAmeA=explode(' ',$this->user->name );
$myTagO->wdgtContent=array_pop($expldeNAmeA );
break;
default:
if(isset($this->user->$valeur)){
$myTagO->wdgtContent=$this->user->$valeur;
}else{
$FIELD=$valeur;
$message->userW('1299148902FYMY',array('$FIELD'=>$FIELD));
continue;
}
break;
}
break;
}
$replacedTagsA[$tag]=$myTagO;
}
return $replacedTagsA;
}
}
