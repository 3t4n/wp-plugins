<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
ob_start();
define('JOOBI_FRAMEWORK_TYPE','netcom');
define('JOOBI_FRAMEWORK_TYPE_ID', 99 );
define('JOOBI_MAIN_APP','japps');
define('JOOBI_CONFIG_SAVE', false);
define('IS_ADMIN', false);
define('JOOBI_SITE_NAME','Joobi');
define('JOOBI_FORM_METHOD','');
define('JOOBI_FORM_HASOPTION', false);
define('JOOBI_FORM_HASRETURNID', false);
define('JOOBI_FORM_AUTOCOMPLETE', false);
define('JOOBI_APP_DEVICE_TYPE','bw');
define('JOOBI_APP_DEVICE_SIZE','');
define('JOOBI_DB_TYPE','mysqli');
define('JOOBI_USE_SEF', false);
define('JOOBI_SSL_BE', false);
define('JOOBI_SSL_FE', false);
class APIPage {
public static $headerA=array();
public static function setTitle($title){
static $already=false;
if($already ) return;
$already=true;
}
public static function setDescription($title=''){
}
public static function setMetaTag($key='',$value=''){
}
public static function setGenerator($title){
}
public static function setLink($link,$relation,$relType='rel',$extraAttributesA=array()){
}
public static function setType($type){
}
public static function setLanguage($lang='en'){
}
public static function setDirection($dir='ltr'){
}
public static function getTemplate(){
}
public static function isRTL(){
}
public static function getSpoof($alt=null){
return false;
}
public static function addScript($header,$type='text/javascript'){
self::$headerA['js'][$header]=true;
}
public static function addStyleSheet($header,$type='text/css',$media=null,$attributes=array()){
self::$headerA['css'][$header]=true;
}
public static function addCSS($header,$type='text/css'){
}
public static function addJS($header,$type='text/javascript'){
}
public static function encoding(){
return 'utf-8';
}
public static function cmsRoute($link,$SSL=null){
return $link;
}
public static function cmsGetShema(){
WMessage::log('still need to implement this function cmsGetShema  ','development-missing');
return 'https';
}
public static function frameworkToken(){
return JOOBI_SITE_TOKEN;
}
function getMailInfo(){
}
public static function cmsDefaultTheme(){
return 'framework';
}
public static function keepAlive($get=false){
}
}
class APIUser {
public static function getSessionId(){
return session_id();
}
public static function cmsMyUser($property=''){
$user=WGlobals::getSession('JoobiUser');
return ((empty($property))?$user : $user->$property );
}
function cmsMakePassword($password){
}
}
class CMSAPIPage extends APIPage {
public static function routeURL($link,$absoluteLink='',$index=false,$SSL=false,$itemId=true,$foption=null,$noSEF=false){
static $currentOption=null;
static $item=null;
$link=trim($link);
if( substr($link, 0, 4 )==='http') return $link;
$absoluteLink=trim($absoluteLink );
if($link=='previous'){
$url=WGlobals::getReturnId();
if(!empty($url)) return WPage::routeURL($url, '','link',$SSL, false);
$referer=WGlobals::get('HTTP_REFERER','','server','string');
if(empty($referer) || strpos($referer,JOOBI_SITE)===false){
$referer=JOOBI_SITE;
}else{
$referer=str_replace('&amp;','&',$referer );
}return $referer;
}elseif($link=='home'){
return JOOBI_SITE;
}
if($index===false){
$isPopUp=WGlobals::get('is_popup', false, 'global');
if(($isPopUp ))$index='popup';
else $index='default';
}else{
$index=trim(strtolower($index));
}
$home=false;
if($absoluteLink=='smart'){
$absoluteLinkNewLink='';
}elseif($absoluteLink=='home'){
$absoluteLinkNewLink=JOOBI_SITE;
}elseif($absoluteLink=='admin'){
$absoluteLinkNewLink=JOOBI_SITE.'administrator/';
$itemId=false;
}elseif($absoluteLink){
$absoluteLinkNewLink=JOOBI_SITE . $absoluteLink.'/';
}else{
$absoluteLinkNewLink=$absoluteLink;
$noIndex=true;
}
if($index=='default'){
if(strpos($link,'index')!==0){
if(!isset($currentOption) && $foption==null)$currentOption=WApplication::name();
$link=ltrim($link,'&');
$link=$absoluteLinkNewLink . JOOBI_INDEX.'?'.$link;
}else{
$link=$absoluteLinkNewLink . $link;
}
}elseif($index=='popup'){
}elseif($index=='link'){
$link=$absoluteLinkNewLink . (isset($noIndex)?'' : JOOBI_INDEX.'?'). $link;
}
$url=rtrim($link,'&');
return $url;
}
public static function createPopUpRelTag($x=550,$y=400){
return '';
}
public static function cmsGetComponentItemId($component,$view=''){
}
public static function cmsGetLinkBasedItemId($itemid){
}
public static function refreshFrameworkMenu($wid=null,$action='',$recursive=false){
return true;
}
public static function getPageId($page='',$task=''){
}
public static function getSpecificItemId($controller='',$task=''){
return null;
}
function jsPreload(){
}
public static function createPopUpLink($url,$text,$x=550,$y=400,$className='',$idName='',$title='',$justNormalLink=false,$extras=''){
return $text;
}
public static function includeMootools(){
}
public static function includejQuery(){
static $includejQuery=false;
if(!$includejQuery){
$includejQuery=true;
}}
public static function includeRootScript(){
static $includeRootscript=false;
if(!$includeRootscript){
$rootscript=JOOBI_FOLDER.'/node/api/addon/'.JOOBI_FRAMEWORK.'/js/rootscript.1.2.js';
WPage::addScript($rootscript, 'none');
$includeRootscript=true;
}}
public static function includeJoobiBox(){
}
function setToolTips(){
}
function interpretURL($segments){
}
function buildURL(&$query){
}
function parseURL($string,&$vars){
}
public static function linkNoSEF($url='',$type='standard'){
$url=trim($url);
return JOOBI_INDEX . $url;
}
public static function formURL($option='',$controller=''){
return '';
}
public static function clearCache($folder=''){
}
}
abstract class APIApplication {
public static function version($return='short'){
}
public static function cacheFolder(){
return JOOBI_DS_ROOT.'cache';
}
public static function cmsMainLang($location='site'){
return 'en-GB';
}
public static function cmsUserLang(){
return 'en';
}
public static function cmsAvailLang($path=''){
return array('en'=>'en');
}
public static function cmsInitPlugin($obj){
}
public static function extract($file,$dest){
return false;
}
public static function installThemePath(){
define('JOOBI_URL_THEME_JOOBI','/');
define('JOOBI_DS_THEME_JOOBI','/');
}
public static function renderLevel($level){
return '';
}
}
abstract class WApplication extends APIApplication {
public static $cmsName='netcom';
public static $ID=254;
public static function getFrameworkName(){
return self::$cmsName;
}
public static function name($short='default',$wPageID=null,$linkController=null){
return '';
}
public static function getApp($useDefault=true){
return '';
}
public static function mainLanguage($return='lgid',$force=false,$suggestedLang=array(),$location='site'){
static $lang=null;
if(empty($lang) || $force){
$langCode=array( APIApplication::cmsMainLang($location ));
if(!empty($langCode)){
$exA=explode('-',$langCode[0] );
$langCode[]=$exA[0];
$availableLanguageA=WApplication::availLanguages( array('lgid','name','code','locale'));
$foundLanguage=false;
foreach($langCode as $oneLGCode){
foreach($availableLanguageA as $availLang){
if($availLang->code==$oneLGCode){
$foundLanguage=true;
$lang=$availLang;
break;
}}if($foundLanguage ) break;
}
}
if(empty($lang)){
$lang=new stdClass;
$lang->lgid=1;
$lang->name='English';
$lang->code='en';
$lang->locale='en_GB.utf8,en_GB.UTF-8,en_GB,eng_GB,en,english,english-uk,uk,gbr,britain,england,great britain,uk,united kingdom,united-kingdom';
}
}
return $lang->$return;
}
public static function userLanguage(){
$lang=APIApplication::cmsUserLang();
$exA=explode('-',$lang );
$langCode=array($exA[0] );
$location=IS_ADMIN?'admin' : 'site';
$myLang=WApplication::mainLanguage('lgid', false, $langCode, $location );
return $myLang;
}
public static function availLanguages($map='code',$site='current'){
static $results=array();
if(is_array($map)){
$key=serialize($map);
}else{
$key=$map;
}
if(!isset($results[$key.$site])){
$results[$key.$site]=WApplication::_getLanguages($map );
}
return $results[$key.$site];
}
private static function _getLanguages($map){
static $results=array();
$languages=APIApplication::cmsAvailLang();
$bool=WPref::load('PLIBRARY_NODE_EXTLANG');
$availLangs=array();
foreach($languages as $lgKey=> $language){
if($bool){
$availLangs[]=$lgKey;
}else{
$exA=explode('-',$lgKey );
$lter2=$exA[0];
$availLangs[]=$lter2;
}}
$keyG=serialize($availLangs);
$cachedLanguageA=array();
foreach($availLangs as $oneCode){
$cachedLanguageA[]=WLanguage::get($oneCode, array('name','code','lgid','real','locale'));
}
if( is_string($map)){
$a=array();
foreach($cachedLanguageA as $oneLnag){
if(isset($oneLnag->$map))$a[]=$oneLnag->$map;
}return $a;
}elseif(is_array($map)){
$a=array();
foreach($cachedLanguageA as $oneLnag){
$obj=new stdClass;
foreach($map as $myMap){
$obj->$myMap=$oneLnag->$myMap;
}$a[]=$obj;
}return $a;
}else{
}
}
public static function setWidget($object){
}
public static function createMenu($name,$menuParent,$link,$option,$client=1,$access=0,$level=0,$ordering=0){
}
public static function isEnabled($component,$strict=true){
}
public static function enable($extension,$value=1,$type=''){
return true;
}
public static function getComponents($column=null){
}
public static function date($format=null,$time=null){
if(empty($time))$time=time();
if(empty($format))$format=WTools::dateFormat('date-number');
return date($format, $time );
}
public static function dateOffset(){
return 0;
}
public static function stringToTime($date=null){
if(empty($date))$date=time();
return strtotime($date );
}
public static function stringFilter($string,$html=false){
if(!class_exists('JFilterInput')) return $string;
if($html){
$safeHtmlFilter=JFilterInput::getInstance( null, null, 1, 1 );
$cleanString=$safeHtmlFilter->clean($string, 'string');
}else{
$noHtmlFilter=JFilterInput::getInstance();
$cleanString=$noHtmlFilter->clean($string, 'string');
}
return $cleanString;
}
}
class WApplication_netcom {
var $cmsName='netcom';
private function _loadFrameWork(){
if(!defined('JOOBI_DB_TYPE')) define('JOOBI_DB_TYPE','mysqli');
define('JOOBI_DB_PREFIX', self::readConfig('dbPrefix'));
define('JOOBI_DB_NAME', self::readConfig('dbName'));
define('JOOBI_DB_HOSTNAME', self::readConfig('dbHost'));
define('JOOBI_DB_USER', self::readConfig('dbUser'));
define('JOOBI_DB_PASS', self::readConfig('dbPwd'));
define('JOOBI_LIST_LIMIT', self::readConfig('listLimit'));
if(!defined('JOOBI_SESSION_LIFETIME')) define('JOOBI_SESSION_LIFETIME', self::readConfig('sessionTime'));
if(!defined('URL_NO_FRAMEWORK')) define('URL_NO_FRAMEWORK', self::readConfig('ajaxURL'));
define('JOOBI_DEBUGCMS' , self::readConfig('frameworkDebug'));
define('JOOBI_INDEX' , self::readConfig('index'));
define('JOOBI_SITE_PATH' , self::readConfig('sitePath'));
define('JOOBI_SITE' , self::readConfig('siteURL'));
if(!defined('IS_ADMIN')) define('IS_ADMIN', 0 );
define('JOOBI_FORM_NAME','adminForm');
}
public static function getFrameworkName(){
return self::$cmsName;
}
function make($entrypoint=null,$params=null){
static $joobiConf=true;
if($joobiConf){
$joobiConf=false;
$this->_loadFrameWork();
require_once( JOOBI_LIB_CORE.'define.php');
require_once( JOOBI_DS_NODE.'api/addon/'.JOOBI_FRAMEWORK.'/api.php');
define('JOOBI_CHARSET','UTF-8');
define('JOOBI_SITE_TOKEN' , WGet::readConfig('secret','netcom'));
session_name( md5('FRONT'.rand( 1111111, 999999999 )) );
session_start();
$UserSessionInfo=WGlobals::getSession('JoobiUser');
if(empty($UserSessionInfo)){
$tools=WUser::session();
$tools->setGuest();
}
}
$addonName=WGlobals::get('protocol','ixr', null, 'alnum');
$namekey='netcom.node';
$type='150';
$extID=WExtension::get($namekey, 'wid');
WGlobals::set('extensionID',$extID, 'global', true);
WGlobals::set('extensionKEY',$namekey, 'global', true);
$netcom=WClass::get('netcom.dispatcher');
$netcom->receiver($addonName );
exit;
}
private static function readConfig($name=null,$default=null){
static $config=null;
if(!isset($config)){
if(!class_exists('WConfig')){
if(!defined('JOOBI_DS_CONFIG')) define('JOOBI_DS_CONFIG', JOOBI_DS_JOOBI.'/');
if( file_exists( JOOBI_DS_CONFIG.'config.php')){
include_once( JOOBI_DS_CONFIG.'config.php');
}
}
if( class_exists('WConfig')){
$config=new WConfig;}else{
if( class_exists('WMessage')) WMessage::log('Netcom $name : '.$name  , 'readConfig-debug');
echo 'Joobi Configuration file could not be loaded...';
echo '<br>Netcom $name : '.$name  , 'readConfig-debug';
exit;
}}
$config->install=false;
$config->maintenance=false;
if(!empty($name)){
return (isset($config->$name)?$config->$name : $default );
}else{
return $config;
}
}
}
