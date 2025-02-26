<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Translation_Populate_class extends WClasses {
public function updateTranslation($imac,$text,$langCode='en'){
$language=WLanguage::get($langCode, 'data');
if(empty($language)){
$this->userE('1414850052DQVU');
return false;
}
$populateModel=WModel::get('translation.populate');
$populateModel->makeLJ('library.columns','dbcid');
$populateModel->makeLJ('library.table','dbtid','dbtid', 1, 2 );
$populateModel->select('dbtid', 1 );
$populateModel->select('name', 1 );
$populateModel->select('dbcid');
$populateModel->whereE('imac',$imac );
$populateModel->where('dbtid','>', 0, 1 );
$populateModel->where('type','=', 20, 2 );
$populateModel->groupBy('dbcid');
$populateFieldsA=$populateModel->load('ol');
if(empty($populateFieldsA)) return false;
$transTable=array();
foreach($populateFieldsA as $oneField){
if(!isset($transTable[$oneField->dbtid]))$transTable[$oneField->dbtid]=array();
$transTable[$oneField->dbtid][]=$oneField;
}
$this->_prepareUpdate($transTable );
foreach($populateFieldsA as $oneField){
if(empty($oneField->name) || empty($oneField->dbcid)) continue;
if(empty($this->allTables[$oneField->dbtid]->name ) || empty($this->allTables[$oneField->dbtid]->pkey)){
$tableName=WModel::get($oneField->dbtid, 'namekey');
continue;
}else{
$tableNameUpdate=$this->allTables[$oneField->dbtid]->name;
}
if(empty($language->lgid)) continue;
$languageCodeQuery=!empty($language->code )?$language->code : 'en';
$modelTranslation=WModel::get('translation.'.$languageCodeQuery );
if(!method_exists($modelTranslation,'getTableID')) continue;
$transTableName=trim($modelTranslation->makeT());
$tablePopulate=$populateModel->makeT();
if(empty($transTableName) || empty($tablePopulate)) continue;
$transTableName=str_replace('#__', JOOBI_DB_PREFIX, $transTableName );
$tablePopulate=str_replace('#__', JOOBI_DB_PREFIX, $tablePopulate );
$translationPopulateM=WModel::get('translation.populate');
$translationPopulateM->rememberQuery(true);
$translationPopulateM->whereE('dbcid',$oneField->dbcid );
$nbItem=$translationPopulateM->total();
$i=0;
$increment=500;
do {
$query='UPDATE IGNORE '.$this->allTables[$oneField->dbtid]->name.' AS T, (';
$query .='SELECT A.`eid`, B.`text`, B.`auto` FROM '.$tablePopulate.' AS A ';
$query .='LEFT JOIN '.$transTableName.' AS B ';
$query .='ON A.`imac`=B.`imac` ';
$query .='WHERE A.`dbcid`='.(int)$oneField->dbcid.' AND A.`imac`=\''.$imac.'\' AND B.`text` IS NOT NULL';
$query .=' LIMIT '.$i.','.$increment;
$query .=') C ';
$query .='SET T.`'.$oneField->name.'`=C.`text`, T.`auto`=2 ';
$query .='WHERE ';
$query .='T.`'.$this->allTables[$oneField->dbtid]->pkey.'`=C.`eid` AND T.`lgid`='.$language->lgid;
$query .=' AND T.`'.$oneField->name.'` !=C.`text` ';
$populateModel->load('q',$query );
$i +=$increment;
} while($i <=$nbItem );
$query='UPDATE IGNORE '.$tableNameUpdate.' AS A LEFT JOIN '.$tableNameUpdate.' AS B ';
$query .='ON A.`'.$this->allTables[$oneField->dbtid]->pkey.'`=B.`'.$this->allTables[$oneField->dbtid]->pkey.'` AND B.`lgid`=1 ';
$query .='SET A.`'.$oneField->name.'`=B.`'.$oneField->name.'` WHERE A.`lgid` !=1 AND B.`'.$oneField->name.'` !=\'\' AND (A.`'.$oneField->name.'` IS NULL OR A.`'.$oneField->name.'`=\'\')';
$populateModel->load('q',$query );
}
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
return true;
}
private function _loadAllTables($loadDBTID){
static $tableModel=null;
if(!isset($tableModel))$tableModel=WModel::get('library.table');
$tableModel->whereIn('dbtid',$loadDBTID );
$tableModel->select('pkey');
$tableModel->select('dbtid');
$tableModel->select('name',0,'tablename');
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
}
