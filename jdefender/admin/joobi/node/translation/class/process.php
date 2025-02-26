<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Translation_Process_class extends WClasses {
var $importStep=0;
private $_dontForceInsert=false;
var $finish_tag=true;
var $tag=true;
var $autoFieldInit=-1;
var $allTables=array();
var $handleMessage=true;
var $importLangs=null;
function __construct(){
parent::__construct();
if(isset($_SESSION['joobi']['import_step'])){
$this->importStep=(int)$_SESSION['joobi']['import_step'];
}
if(!defined('ERROR_STEP')) define('ERROR_STEP', 99 );
if(!defined('FINISH_STEP')) define('FINISH_STEP', 10 );
}
public function setDontForceInsert($bool=true){
$this->_dontForceInsert=$bool;
}
public function setTag($bool=true){
$this->tag=$bool;
}
public function setHandleMessage($bool=true){
$this->handleMessage=$bool;
}
function setFinishTag($bool=true){
$this->finish_tag=$bool;
}
public function setStep($step){
$this->importStep=$step;
}
public function setImportLang($obj=null){
if(!empty($obj ) && !is_array($obj ))$obj=array($obj );
if( class_exists('Install_Node_install')) Install_Node_install::accessInstallData('set','importLangs',$obj );
}
public function importexec(){
switch($this->importStep){
case 0:$this->_dictionnaryImport();
break;
case 1:$this->populateTranslation();
break;
default:
break;
}
}
private function _dictionnaryImport(){
$autotrigger=WGlobals::get('run', 0 );
$file=JOOBI_DS_TEMP . $autotrigger;
$fileHandler=WGet::file();
if(!$fileHandler->exist($file)){
$this->_message('Could not find the translation file '.$file );
return false;
}
$translationHandler=WClass::get('translation.importlang');
if(!$translationHandler->importDictionary($fileHandler->read($file))){
if(!empty($translationHandler->message ))$this->_message($translationHandler->message );
else $this->_message('Could not import the translation file '.$file);
}
$codeLanguage=$translationHandler->getLanguage();
$this->_setLanguages($codeLanguage );
$this->_message( WText::t('1240842525LJTR') , 1 );
}
private function _setLanguages($codeLanguage){
$languages=WLanguage::get($codeLanguage, array('code','lgid'));
$this->importLang=array($languages );
}
private function _loadAllTables($loadDBTID){
static $tableModel=null;
if(!isset($tableModel))$tableModel=WModel::get('library.table');
$tableModel->whereIn('dbtid',$loadDBTID );
$tableModel->select('pkey');
$tableModel->select('dbtid');
$tableModel->select('name', 0, 'tablename');
$tableModel->setDistinct();
$allTables=$tableModel->load('ol');
foreach($allTables as $myTable){
$name='`'. JOOBI_DB_PREFIX . $myTable->tablename .'`';
if(empty($this->allTables[$myTable->dbtid]))$this->allTables[$myTable->dbtid]=new stdClass;
$this->allTables[$myTable->dbtid]->name=$name;
$explode6=explode(',',$myTable->pkey);
$arraDiifA=array_diff($explode6, array('lgid'));
$this->allTables[$myTable->dbtid]->pkey=reset($arraDiifA );
}
}
public function populateTranslation(){
static $time=0;
if( 0==$time)$time=time();
$elapse=time() - $time;
$delay=20;if($elapse > $delay){
sleep( 2 );
return false;
}
$populateModel=WModel::get('translation.populate');
$populateModel->rememberQuery(true);
$populateModel->makeLJ('library.columns','dbcid');
$populateModel->makeLJ('library.table','dbtid','dbtid', 1, 2 );
$populateModel->select('dbtid', 1 );
$populateModel->select('name', 1 );
$populateModel->select('dbcid');
$populateModel->where('dbtid','>', 0, 1 );
$populateModel->where('type','=', 20, 2 );$populateModel->groupBy('dbcid');
$populateFieldsA=$populateModel->load('ol');
if(empty($populateFieldsA)) return false;
if( class_exists('Install_Node_install'))$languageStep=Install_Node_install::accessInstallData('get','languageStep');
if(empty($languageStep ))$languageStep=0;
$transTable=array();
foreach($populateFieldsA as $oneField){
if(!isset($transTable[$oneField->dbtid]))$transTable[$oneField->dbtid]=array();
$transTable[$oneField->dbtid][]=$oneField;
}
$this->_prepareUpdate($transTable );
if(empty($this->importLangs )){
$languageModel=WModel::get('library.languages');
$languageModel->rememberQuery(true);
$languageModel->whereE('availadmin', 1 );
$languageModel->operator('OR');
$languageModel->whereE('availsite', 1 );
$languageModel->setLimit( 500 );
$this->importLangs=$languageModel->load('ol',array('code','lgid'));
}
$tablePopulate=$populateModel->makeT();
$priority2directedit=true;
if(empty($priority2directedit))$this->_dontForceInsert=true;
if(empty($populateFieldsA[$languageStep])){
if( class_exists('Install_Node_install')){
$importLangs=Install_Node_install::accessInstallData('get','importLangs');
array_pop($importLangs );
Install_Node_install::accessInstallData('set','importLangs',$importLangs );
Install_Node_install::accessInstallData('delete','languageStep');
}return true;
}
$oneField=$populateFieldsA[$languageStep];
if(empty($oneField->name) || empty($oneField->dbcid)) return false;
if(empty($this->allTables[$oneField->dbtid]->name ) || empty($this->allTables[$oneField->dbtid]->pkey)){
$tableName=WModel::get($oneField->dbtid, 'namekey');
return false;
}
$stillHasMore=false;
foreach($this->importLangs as $language){
if(empty($language->lgid)) continue;
$languageCodeQuery=!empty($language->code )?$language->code : 'en';
$modelTranslationM=WModel::get('translation.'.$languageCodeQuery );
if(!method_exists($modelTranslationM,'getTableID')) return false;
$transTableName=trim($modelTranslationM->makeT());
$transTableName=str_replace('#__', JOOBI_DB_PREFIX, $transTableName );
$tablePopulate=str_replace('#__', JOOBI_DB_PREFIX, $tablePopulate );
if(empty($transTableName) || empty($tablePopulate)) return false;
$translationPopulateM=WModel::get('translation.populate');
$translationPopulateM->rememberQuery(true);
$translationPopulateM->whereE('dbcid',$oneField->dbcid );
$nbItem=$translationPopulateM->total();
if( class_exists('Install_Node_install')){
$i=Install_Node_install::accessInstallData('get','languageIncrementStep', 0 );
}else{
$i=0;
}
$increment=500;
do {
$query='UPDATE IGNORE '.$this->allTables[$oneField->dbtid]->name.' AS T, (';
$query .='SELECT A.`eid`, B.`text`, B.`auto` FROM '.$tablePopulate.' AS A ';
$query .='LEFT JOIN '.$transTableName.' AS B ';
$query .='ON A.`imac`=B.`imac` ';
$query .='WHERE A.`dbcid`='.(int)$oneField->dbcid.' AND B.`text` IS NOT NULL';
$query .=' LIMIT '.$i.','.$increment;
$query .=') C ';
$query .='SET T.`'.$oneField->name.'`=C.`text`, T.`auto`=C.`auto` ';
$query .='WHERE ';
if(!empty($this->_dontForceInsert))$query .='T.`auto` <=1 AND ';
else $query .='T.`auto` >=2 AND ';
$query .='T.`'.$this->allTables[$oneField->dbtid]->pkey.'`=C.`eid` AND T.`lgid`='.$language->lgid;
$query .=' AND T.`'.$oneField->name.'` !=C.`text` ';
$populateModel->load('q',$query );
$i +=$increment;
$elapse=time() - $time;
$delay=25;if($elapse > $delay){
if( class_exists('Install_Node_install')) Install_Node_install::accessInstallData('set','languageIncrementStep',$i );
$stillHasMore=true;
break;
}
} while($i <=$nbItem );
break;
}
if(!$stillHasMore){
if( class_exists('Install_Node_install')) Install_Node_install::accessInstallData('set','languageIncrementStep', 0 );
}
$query='UPDATE IGNORE '.$this->allTables[$oneField->dbtid]->name.' AS A LEFT JOIN '.$this->allTables[$oneField->dbtid]->name.' AS B ';
$query .='ON A.`'.$this->allTables[$oneField->dbtid]->pkey.'`=B.`'.$this->allTables[$oneField->dbtid]->pkey.'` AND B.`lgid`=1 ';
$query .='SET A.`'.$oneField->name.'`=B.`'.$oneField->name.'` WHERE A.`lgid` !=1 AND B.`'.$oneField->name.'` !=\'\' AND (A.`'.$oneField->name.'` IS NULL OR A.`'.$oneField->name.'`=\'\')';
$populateModel->load('q',$query );
if(!$stillHasMore){
$languageStep++;
if( class_exists('Install_Node_install')) Install_Node_install::accessInstallData('set','languageStep',$languageStep );
}
return false;
}
public function populateTranslationLang($lgid=0){
if(empty($lgid)) return false;
$populateModel=WModel::get('translation.populate');
$populateModel->rememberQuery(true);
$populateModel->makeLJ('library.columns','dbcid');
$populateModel->makeLJ('library.table','dbtid','dbtid', 1, 2 );
$populateModel->select('dbtid', 1 );
$populateModel->select('name', 1 );
$populateModel->select('dbcid');
$populateModel->where('dbtid','>', 0, 1 );
$populateModel->where('type','=', 20, 2 );$populateModel->groupBy('dbcid');
$populateFieldsA=$populateModel->load('ol');
if(empty($populateFieldsA)) return false;
$transTable=array();
foreach($populateFieldsA as $oneField){
if(!isset($transTable[$oneField->dbtid]))$transTable[$oneField->dbtid]=array();
$transTable[$oneField->dbtid][]=$oneField;
}
$this->_prepareUpdate($transTable );
if(empty($lgid)){
if(empty($this->importLangs )){
$languageModel=WModel::get('library.languages');
$languageModel->rememberQuery(true);
$languageModel->whereE('availadmin', 1 );
$languageModel->operator('OR');
$languageModel->whereE('availsite', 1 );
$languageModel->setLimit( 500 );
$this->importLangs=$languageModel->load('ol',array('code','lgid'));
}
}else{
$languageModel=WModel::get('library.languages');
$languageModel->rememberQuery(true);
$languageModel->whereE('lgid',$lgid );
$this->importLangs=$languageModel->load('ol',array('code','lgid'));
}
$tablePopulate=$populateModel->makeT();
$priority2directedit=true;
if(empty($priority2directedit))$this->_dontForceInsert=true;
foreach($populateFieldsA as $oneField){
if(empty($oneField->name) || empty($oneField->dbcid)) return false;
if(empty($this->allTables[$oneField->dbtid]->name ) || empty($this->allTables[$oneField->dbtid]->pkey)){
$tableName=WModel::get($oneField->dbtid, 'namekey');
return false;
}
$stillHasMore=false;
foreach($this->importLangs as $language){
if(empty($language->lgid)) continue;
$languageCodeQuery=!empty($language->code )?$language->code : 'en';
$modelTranslationM=WModel::get('translation.'.$languageCodeQuery );
if(!method_exists($modelTranslationM,'getTableID')) return false;
$transTableName=trim($modelTranslationM->makeT());
$transTableName=str_replace('#__', JOOBI_DB_PREFIX, $transTableName );
$tablePopulate=str_replace('#__', JOOBI_DB_PREFIX, $tablePopulate );
if(empty($transTableName) || empty($tablePopulate)) return false;
$translationPopulateM=WModel::get('translation.populate');
$translationPopulateM->rememberQuery(true);
$translationPopulateM->whereE('dbcid',$oneField->dbcid );
$nbItem=$translationPopulateM->total();
$query='UPDATE IGNORE '.$this->allTables[$oneField->dbtid]->name.' AS T, (';
$query .='SELECT A.`eid`, B.`text`, B.`auto` FROM '.$tablePopulate.' AS A ';
$query .='LEFT JOIN '.$transTableName.' AS B ';
$query .='ON A.`imac`=B.`imac` ';
$query .='WHERE A.`dbcid`='.(int)$oneField->dbcid.' AND B.`text` IS NOT NULL AND B.`auto`=2';
$query .=') C ';
$query .='SET T.`'.$oneField->name.'`=C.`text`, T.`auto`=C.`auto` ';
$query .='WHERE ';
$query .='T.`'.$this->allTables[$oneField->dbtid]->pkey.'`=C.`eid` AND T.`lgid`='.$language->lgid;
$query .=' AND T.`'.$oneField->name.'` !=C.`text` ';
$populateModel->load('q',$query );
}
$populateModel->load('q',$query );
 }
return true;
}
private function _prepareUpdate($fields){
$queries=array();
if(empty($fields)) return false;
$sqlForeignM=WModel::get('library.foreign');
$sqlForeignM->whereE('publish', 1 );
$sqlForeignM->where('map','!=','lgid');
$sqlForeignM->where('map2','!=','lgid');
$sqlForeignM->whereIn('dbtid', array_keys($fields));
$sqlForeignM->select('dbtid');
$sqlForeignM->select('ref_dbtid');
$sqlForeignM->groupBy('dbtid');
$tableHandle=$sqlForeignM->load('ol');
if(empty($tableHandle)){
WMessage::log($fields, 'translation-update-error');
return true;
}
foreach($tableHandle as $oneTable){
$loadDBTID[$oneTable->ref_dbtid]=$oneTable->ref_dbtid;
$loadDBTID[$oneTable->dbtid]=$oneTable->dbtid;
}
$this->_loadAllTables($loadDBTID );
$languageModel=WModel::get('library.languages');
foreach($tableHandle as $oneTable){
if(!isset($this->allTables[$oneTable->ref_dbtid]->name) || empty($this->allTables[$oneTable->ref_dbtid]->name)) continue;
$columns='';
$values='';
$columnsList=array($this->allTables[$oneTable->dbtid]->pkey, 'lgid','auto','fromlgid');
foreach($fields[$oneTable->dbtid] as $field){
if(!in_array($field->name,$columnsList)){
$columns .=',`'.$field->name.'`';
$values.=',\'\'';
$columnsList[]=$field->name;
}}
$query1='INSERT IGNORE '.$this->allTables[$oneTable->dbtid]->name.' (`'.$this->allTables[$oneTable->dbtid]->pkey.'`,`lgid`,`auto`,`fromlgid`'.$columns.')';
$query2='( SELECT A.`'.$this->allTables[$oneTable->dbtid]->pkey.'`,B.`lgid`,'.$this->autoFieldInit.',1'.$values.' FROM '.$this->allTables[$oneTable->ref_dbtid]->name.' AS A, '.$languageModel->makeT().' AS B WHERE B.publish=1 ) ';
$query=$query1. $query2;
$languageModel->load('q',$query );
}
return true;
}
private function _message($text,$step=99){
return true;
}
}