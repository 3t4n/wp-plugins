<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
 class Translation_Checktable_class extends WClasses {
 function transTableExist($languageCode,$onlyShortTable=true){
if($onlyShortTable){
$exA=explode('-',$languageCode );
$languageCode=$exA[0];
}
 if($languageCode=='en') return true;
 return ( WModel::modelExist('translation.'.$languageCode ) ?true : false);
 }
 public function createTransTable($languageCode,$onlyShortTable=true){
 if(empty($languageCode)) return false;
 if($onlyShortTable){
 $exA=explode('-',$languageCode );
 $languageCode=$exA[0]; 
 } if($this->transTableExist($languageCode, $onlyShortTable )) return true;
$tableName=JOOBI_DB_PREFIX.'translation_'.$languageCode;
$nameTable=$tableName;
 $realTable='CREATE TABLE IF NOT EXISTS `'.$nameTable.'` (';
$realTable .=' `imac` varchar(20) NOT NULL,';
$realTable .=' `text` text /*!40100 collate utf8_bin */ NOT NULL,';
$realTable .=' `auto` tinyint(3) unsigned NOT NULL default \'1\',';
$realTable .=' PRIMARY KEY  (`imac`),';
$realTable .=' FULLTEXT KEY `FTXT_translation_'.str_replace('-','_',$languageCode ). '_text` (`text`) ';
$realTable .=') ENGINE=MyISAM /*!40100 DEFAULT CHARACTER SET '.JOOBI_DB_CHARSET.' COLLATE '.JOOBI_DB_COLLATE.'*/ ;'; $translationM=WTable::get();
$status=$translationM->load('q',$realTable );
if(!$status ) return false;
$dbName='';
$tableO=WTable::get('translation_'.$languageCode, $dbName );
$createdTabelInfo=$tableO->showTable();
if(empty($createdTabelInfo)) return false;
$table=WModel::get('library.table');
if(!WGet::maintenanceMode()){
$table->whereE('namekey','translation.en');
$refTable=$table->load('o');
if( substr($tableName, 0, strlen( JOOBI_DB_PREFIX ))==JOOBI_DB_PREFIX){
$refTable->name=substr($tableName, strlen( JOOBI_DB_PREFIX ));
}else{
$refTable->name=$tableName;
}
$refTable->namekey='translation.'.$languageCode;
$refTable->suffix=$languageCode;
$refTable->pkey='imac';
$pkey=$table->getPK();
unset($refTable->$pkey );
foreach($refTable as $key=> $val){
if($key=='export')$val=0;
$table->setVal($key, $val );
}
$table->setIgnore();
$table->insert();
if(empty($refTable)) return true;
$table->whereE('namekey','translation.'.$languageCode );
$dbtid=$table->load('lr','dbtid');
if(empty($dbtid)){
$message=WMessage::get();
$message->codeE('Translation table "translation.'.$languageCode.'" was not inserted');
return false;
}
$model=WModel::get('library.model');
$model->whereE('namekey','translation.en');
$refModel=$model->load('o');
if(empty($refModel)) return true;
$refModel->dbtid=$dbtid;
$refModel->namekey=$refTable->namekey;
$refModel->suffix=$languageCode;
$refModel->path=0;
$refModel->folder='translation';
$refModel->pnamekey='translation.en';
unset($refModel->sid);
foreach($refModel as $key=> $val){
if( in_array($key, array('suffix','parentsid','ordering','extstid','totalcustom','created','modified')) ) continue;
$model->setVal($key, $val );
}
if(!$model->insertIgnore()){
$message=WMessage::get();
$message->codeE('Trans Model not inserted');
return false;
}
}else{
$fileS=WGet::file();
$tableFile=JOOBI_DS_NODE.'translation/data/table/translation_en.php';
$content=$fileS->read($tableFile );
$content=str_replace('translation_en','translation_'.$languageCode, $content );
$content=str_replace('translation.en','translation.'.$languageCode, $content );
$content=str_replace( "suffix='en'", "suffix='" . $languageCode . "'", $content );
$languageM=WTable::get('language_node','main_userdata','lgid');
$languageM->whereE('code',$languageCode );
$codelgid=$languageM->load('lr','lgid');
$newDBID=8000000 + $codelgid;
$content=str_replace( "dbtid=713", "dbtid=" . $newDBID, $content );
$newTableFile=JOOBI_DS_NODE.'translation/data/table/translation_'.$languageCode.'.php';
$fileS->write($newTableFile, $content );
$modelFile=JOOBI_DS_NODE.'translation/data/model/translation_en.php';
$content=$fileS->read($modelFile );
$content=str_replace('translation_en','translation_'.$languageCode, $content );
$content=str_replace('translation.en','translation.'.$languageCode, $content );
$newSID=8000000 + $codelgid;
$content=str_replace( "sid=411", "sid=" . $newSID, $content );
$content=str_replace( "path=1;", "path=0;", $content );
$content=str_replace('var $publish=1;','var $publish=1;var $pnamekey="translation.en";',$content );
$newModelFile=JOOBI_DS_NODE.'translation/data/model/translation_'.$languageCode.'.php';
$fileS->write($newModelFile, $content );
WGet::loadData('reset','reset','reset', true);
$tempTable=WModel::loadDataTable('#translation#'.'translation_'.$languageCode );
$libraryReaddata=WClass::get('library.readdata');
$libraryReaddata->populateTable($tempTable );
$modelInfoO=WModel::loadDataModel('translation.'.$languageCode, false, false);
$libraryReaddata=WClass::get('library.readdata');
$sid=$libraryReaddata->populateModel($modelInfoO );
$libraryReaddata->populateForeign($modelInfoO );
}
$cache=WCache::get();
$cache->resetCache('Model','translation.'.$languageCode, 'cache');
WCache::getObject('translation.'.$languageCode, 'Model','cache', true, false, '', null, false, true);
return true;
 }
}