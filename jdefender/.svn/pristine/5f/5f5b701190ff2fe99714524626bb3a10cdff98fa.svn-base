<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Library_Readdata_class {
private static $_ref_yidA=array();
public function getRefYID(){
return self::$_ref_yidA;
}
public function populateModel($data){
if(empty($data) || empty($data->tablename)) return false;
$modelM=WTable::get('model_node','main_library','sid');
$modelM->rememberQuery(true);
$modelM->whereE('namekey',$data->namekey );
$alreadyExistO=$modelM->load('o',array('sid','core'));
if(!empty($alreadyExistO)){
if(empty($alreadyExistO->core)) return false;
$sid=$alreadyExistO->sid;
}
if(!empty($sid))$modelM->sid=$sid;
else {
if(!is_numeric($data->dbtid)){
$modelM->dbtid=$this->_getTableIDfromDB($data->tablename );
}else{
$modelM->dbtid=$data->dbtid;
}if(empty($modelM->dbtid)){
WMessage::log(  'Library_Readdata_class 1 '  , 'Library_Readdata_class');
WMessage::log(  $data  , 'Library_Readdata_class');
}}
$pk=$modelM->getPK();
foreach($data as $p=> $v){
if($pk==$p ) continue;
if( in_array($p, array('dbtid','name','description','id','tablename','tableprefix','tablegroup','pkey',
'type','dbid','dbtidSAFE','domain','dbname','addon','cachedata','autofld','parentmap','skipdepth','mainmodel',
'ordrg','grpmap','verifld','corecfld','prtname','validtoggle','grptable','premmap','premgroup','premtable','ftype',
'veriunic','corunic','updunic','silunic','samepk','categorymodel','parentmap','parentname','verifyFields',
'childRemoveNotPresent','childOnlyAddNew','uniqueSilent','mpk'
)) ) continue;
$modelM->$p=$v;
}
$modelM->returnId();
if(!empty($sid)){
$modelM->whereE('sid',$sid );
$modelM->update();
}else{
$modelM->insertIgnore();
}
if(empty($alreadyExistO)){
$fixFolder=( substr($data->namekey, -5 )=='trans'?substr($data->namekey, 0, -5 ) : $data->namekey );
$exA=explode('.',$fixFolder );
if(empty($exA[0] )){
WMessage::log(  $data , 'Model_folder_not_defined');
}
$folder=$exA[0].'.node';
if(!empty($modelM->sid)){
$appstransM=WTable::get('model_trans','main_library','sid,lgid');
if(!empty($appstransM)){
$auto=1;
if(!empty($alreadyExistO)){
$appstransM->whereE('sid',$modelM->sid );
$appstransM->whereE('lgid', 1 );
$auto=$appstransM->load('lr','auto');
}
if($auto <=1){
WText::load($folder );
$appstransM->sid=$modelM->sid;
$appstransM->lgid=1;
$myTxt=$this->getTranslation($data->name, $folder, $modelM->sid, 'model_trans','name');
$appstransM->name=WText::t($myTxt );
$appstransM->save();
}
}
}
}
return (isset($modelM->sid )?$modelM->sid : 0 );
}
public function populateTable($data){
if(empty($data)) return false;
$installModelM=WTable::get('dataset_tables','main_library','dbtid');
$installModelM->whereE('namekey',$data->namekey );
$dbtid=$installModelM->load('lr','dbtid');
$pk=$installModelM->getPK();
$doNotINcA=array('columnsA','foreignsA','contraintsA','contraintsItemsA','id','rolid','sid','dbtid');
foreach($data as $p=> $v){
if($pk==$p ) continue;
if( in_array($p, $doNotINcA )) continue;
$installModelM->$p=$v;
}
if(!empty($dbtid))$installModelM->dbtid=$dbtid;
$installModelM->returnId();
$installModelM->setIgnore();
$installModelM->save();
if(!empty($installModelM->dbtid)){
if(!empty($data->columnsA)){
foreach($data->columnsA as $column){
if(empty($column) || empty($column['name'])) continue;
$columnM=WTable::get('dataset_columns','main_library','dbcid');
$columnM->whereE('dbtid',$installModelM->dbtid );
$columnM->whereE('name',$column['name'] );
$dbcid=$columnM->load('lr','dbcid');
if(!empty($dbcid)) continue;
$pk=$columnM->getPK();
foreach($column as $p=> $v){
if($pk==$p ) continue;
if( in_array($p, array('rolid')) ) continue;
$columnM->$p=$v;
}
$columnM->dbtid=$installModelM->dbtid;
$columnM->setIgnore();$columnM->save();
unset($columnM->dbcid );
}
}
}
return (isset($installModelM->dbtid )?$installModelM->dbtid : 0 );
}
public function populateContrainst($data){
if(empty($data)) return false;
$otherTable=WModel::loadDataTable($data->dbtid );
if(empty($otherTable)) return false;
$dbtid=$otherTable->dbtid;
if(!empty($dbtid)){
if(!empty($otherTable->contraintsA)){
$newdbtid=$this->_getTableIDfromDB($otherTable->name );
$foreignM=WTable::get('dataset_constraints','main_library','ctid');
$itemsM=WTable::get('dataset_constraintsitems','main_library','dbcid,ctid');
foreach($otherTable->contraintsA as $column){
if($column['type']==3 || $column['type']==2 ) continue;
$foreignM->whereE('namekey',$column['namekey'] );
$ctid=$foreignM->load('lr','ctid');
if(empty($ctid)){
$foreignM->dbtid=$newdbtid;
$foreignM->namekey=$column['namekey'];
$foreignM->type=$column['type'];
$foreignM->modified=time();
$foreignM->returnId();
$foreignM->setIgnore();$foreignM->save();
$ctid=$foreignM->ctid;
}
if(!empty($ctid)){
foreach($otherTable->contraintsItemsA as $item){
if($column['ctid'] !=$item['ctid'] ) continue;
$colName='';
foreach($otherTable->columnsA as $colnO){
if($colnO['dbcid']==$item['dbcid']){
$colName=$colnO['name'];
break;
}}
if(empty($colName )) continue;
$itemsM->whereE('ctid',$ctid );
$itemsM->delete();
$itemsM->dbcid=$this->_getTableColumnID($otherTable->name, $colName );
$itemsM->ctid=$ctid;
$itemsM->ordering=$item['ordering'];
$itemsM->sort=(isset($item['sort'])?$item['sort'] : 0 );
$itemsM->setReplace();
$itemsM->save();
}
unset($foreignM->ctid );
}
}
}
}
}
public function populateForeign($data){
if(empty($data)) return false;
$otherTable=WModel::loadDataTable($data->dbtid );
if(empty($otherTable)) return false;
$dbtid=$otherTable->dbtid;
if(!empty($dbtid)){
if(!empty($otherTable->foreignsA)){
$newdbtid=$this->_getTableIDfromDB($otherTable->name );
$foreignM=WTable::get('dataset_foreign','main_library','fkid');
$datasetTablesM=WTable::get('dataset_tables','main_library','dbtid');
foreach($otherTable->foreignsA as $column){
if($column['dbtid'] !=$data->dbtidSAFE ) continue;
if($column['dbtid']==$dbtid){
$foreignM->dbtid=$newdbtid;
$datasetTablesM->whereE('name',$this->_getTableName($column['ref_table'] ));
$foreignM->ref_dbtid=$datasetTablesM->load('lr','dbtid');
}elseif($column['ref_dbtid']==$dbtid){
$foreignM->ref_dbtid=$newdbtid;
$datasetTablesM->whereE('name',$this->_getTableName($column['ref_table'] ));
$foreignM->dbtid=$datasetTablesM->load('lr','dbtid');
}
$pk=$foreignM->getPK();
foreach($column as $p=> $v){
if($pk==$p ) continue;
if('name'==$p){
$foreignM->map=$v;
continue;
}if('name2'==$p){
$foreignM->map2=$v;
continue;
}
if( in_array($p, array('dbtid','ref_dbtid','ref_table')) ) continue;
$foreignM->$p=$v;
}
$foreignM->setReplace();$foreignM->save();
unset($foreignM->fkid );
}
}
}
}
public function populatePicklist($data){
if(empty($data)) return false;
$installModelM=WTable::get('dropset_node','main_library','did');
$installModelM->whereE('namekey',$data->namekey );
$alreadyExistO=$installModelM->load('o',array('did','core'));
if(!empty($alreadyExistO)){
if(empty($alreadyExistO->core)) return false;
$did=$installModelM->did=$alreadyExistO->did;
}
$pk=$installModelM->getPK();
foreach($data as $p=> $v){
if($pk==$p ) continue;
if( in_array($p, array('name','description','id')) ) continue;
if(!empty($v)){
if('wid'==$p){
$v=$this->_getExtID($data->wid );
if(empty($v))$v=$data->wid;
if(empty($v)){
WMessage::log(  $data->wid  , 'empty_wid_in_picklist');
WMessage::log(  WExtension::get($data->wid , 'namekey')  , 'empty_wid_in_picklist');
WMessage::log(  $data  , 'empty_wid_in_picklist');
}
}elseif('sid'==$p){
$v=$this->_getModelID($data->sid );
}elseif('ref_sid'==$p){
$v=$this->_getModelID($data->ref_sid );
}elseif('rolid'==$p){
if( is_numeric($data->rolid))$v=$data->rolid;
else $v=WRole::get( substr($data->rolid, 1 ), 'rolid');
}}
$installModelM->$p=$v;
}
if(empty($did)){
$installModelM->returnId();
$installModelM->save();
}else{
$installModelM->whereE('did',$did );
$installModelM->update();
}
if( is_numeric($data->wid))$folder=$data->wid;
else $folder=WExtension::get( substr($data->wid, 1 ), 'wid');
if(empty($folder)){
WMessage::log(' processData populatePicklist 1 : '.$data->wid.'  --  '.$folder , 'processDataPicklist_error');
WMessage::log($data , 'processDataPicklist_error');
WMessage::log( debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ) , 'processDataPicklist_error');
}
if(!empty($installModelM->did) && empty($did)){
$appstransM=WTable::get('dropset_trans','main_library','did,lgid');
if(!empty($appstransM)){
$appstransM->did=$installModelM->did;
$appstransM->lgid=1;
$appstransM->name=WText::t($this->getTranslation($data->name, $folder, $appstransM->did, 'dropset_trans','name'));
$appstransM->description=WText::t($this->getTranslation($data->description, $folder, $appstransM->did, 'dropset_trans','description'));
$appstransM->save();
}
}
if(!empty($data->valuesA)){
foreach($data->valuesA as $column){
$elementM=WTable::get('dropset_values','main_library','vid');
$elementM->whereE('namekey',$column['namekey'] );
$alreadyExistO=$elementM->load('o',array('vid','core'));
if(!empty($alreadyExistO)){
if(empty($alreadyExistO->core)) continue;
$elementM->vid=$alreadyExistO->vid;
}
$pk=$elementM->getPK();
foreach($column as $p=> $v){
if($pk==$p ) continue;
if( in_array($p, array('name')) ) continue;
if('rolid'==$p){
if( is_numeric($column['rolid']))$v=$column['rolid'];
else $v=WRole::get( substr($column['rolid'], 1 ), 'rolid');
}
$elementM->$p=$v;
}
$elementM->did=$installModelM->did;
$elementM->returnId();
$elementM->replace();
if(!empty($elementM->vid)){
$layoutTransM=WTable::get('dropset_valuestrans','main_library','vid,lgid');
if(!empty($layoutTransM)){
$auto=1;
if(!empty($alreadyExistO)){
$layoutTransM->whereE('vid',$elementM->vid );
$layoutTransM->whereE('lgid', 1 );
$auto=$layoutTransM->load('lr','auto');
$layoutTransM->vid=$elementM->vid;
}
if($auto <=1){
$layoutTransM->vid=$elementM->vid;
$layoutTransM->lgid=1;
$layoutTransM->name=WText::t($this->getTranslation($column['name'], $folder, $elementM->vid, 'dropset_valuestrans','name'));
$layoutTransM->save();
}}}
unset($elementM->vid );
}
}
}
public function getTranslation($imac,$wid,$eid,$model,$map){
static $imacA=array();
static $translationM=null;
static $populateM=null;
if(empty($imac)) return '';
if(empty($wid) || empty($eid) || empty($model) || empty($map)){
WMessage::log(' processData $wid : '.$wid.' - $eid '.$eid.' - $model '.$model.' - $map '.$map.' - $imac '.$imac , 'translation_imac_empty');
return $imac;
}
$newWid=$this->_getExtID($wid );
$dbcid=$this->_getTableColumnID($model, $map );
if(!empty($dbcid)){
if(!isset($populateM))$populateM=WTable::get('translation_populate','main_translation','dbcid,eid');
$populateM->setVal('eid',$eid );
$populateM->setVal('wid',$newWid );
$populateM->setVal('imac',$imac );
$populateM->setVal('dbcid',$dbcid );
$populateM->replace();
}
return $imac;
}
public function populateView($data){
if(empty($data)) return false;
$layoutM=WTable::get('layout_node','main_library','yid');
$layoutM->whereE('namekey',$data->namekey );
$alreadyExistO=$layoutM->load('o',array('yid','core'));
if(!empty($alreadyExistO)){
if(empty($alreadyExistO->core)) return false;
$yid=$alreadyExistO->yid;
}
$pk=$layoutM->getPK();
if(!empty($yid))$layoutM->yid=$yid;
foreach($data as $p=> $v){
if($pk==$p ) continue;
if( in_array($p, array('listingsA','formsA','menusA','filtersA','id','name','description','wname','wdescription','seotitle','seodescription','seokeywords')) ) continue;
if(!empty($v)){
if('sid'==$p){
$v=$this->_getModelID($data->sid );
}elseif('rolid'==$p){
if( is_numeric($data->rolid))$v=$data->rolid;
else $v=WRole::get( substr($data->rolid, 1 ), 'rolid');
}
}
$layoutM->$p=$v;
}
$layoutM->returnId();
$layoutM->save();
if( is_numeric($data->wid))$folder=$data->wid;else $folder=WExtension::get( substr($data->wid, 1 ), 'wid');
if(empty($folder)){
WMessage::log($data , 'processData_view_folder_empty');
}
$dbcid=0;
if(!empty($layoutM->yid)){
$layoutTransM=WTable::get('layout_trans','main_library','yid,lgid');
if(!empty($layoutTransM)){
$auto=1;
if(!empty($alreadyExistO)){
$layoutTransM->whereE('yid',$yid );
$layoutTransM->whereE('lgid', 1 );
$auto=$layoutTransM->load('lr','auto');
$layoutM->yid=$yid;
}
if($auto <=1){
$layoutTransM->yid=$layoutM->yid;
$layoutTransM->lgid=1;
$layoutTransM->name=WText::t($this->getTranslation($data->name, $folder, $layoutM->yid, 'layout_trans','name'));
$layoutTransM->description=WText::t($this->getTranslation($data->description, $folder, $layoutM->yid, 'layout_trans','description'));
$layoutTransM->wname=WText::t($this->getTranslation($data->wname, $folder, $layoutM->yid, 'layout_trans','wname'));
$layoutTransM->wdescription=WText::t($this->getTranslation($data->wdescription, $folder, $layoutM->yid, 'layout_trans','wdescription'));
$layoutTransM->seotitle=WText::t($this->getTranslation($data->seotitle, $folder, $layoutM->yid, 'layout_trans','seotitle'));
$layoutTransM->seodescription=WText::t($this->getTranslation($data->seodescription, $folder, $layoutM->yid, 'layout_trans','seodescription'));
$layoutTransM->seokeywords=WText::t($this->getTranslation($data->seokeywords, $folder, $layoutM->yid, 'layout_trans','seokeywords'));
$layoutTransM->save();
}
}
$this->_populateViewElements($data, 'listingsA','layout_listings','lid',$layoutM->yid, $folder );
$this->_populateViewElements($data, 'formsA','layout_multiforms','fid',$layoutM->yid, $folder );
$this->_populateViewElements($data, 'menusA','layout_mlinks','mid',$layoutM->yid, $folder );
if(!empty($data->filtersA)){
$elementM=WTable::get('filters_node','main_library','flid');
$elementM->whereE('yid',$layoutM->yid );
$elementM->delete();
foreach($data->filtersA as $column){
$elementM=WTable::get('filters_node','main_library','flid');
$pk=$elementM->getPK();
foreach($column as $p=> $v){
if($pk==$p ) continue;
if(!empty($v)){
if('sid'==$p){
$v=$this->_getModelID($v );
}elseif('ref_sid'==$p){
$v=$this->_getModelID($v );
if(empty($v)){
WMessage::log($column  , 'ref_sid_filter');
}
}elseif('rolid'==$p){
if(!is_numeric($v))$v=WRole::get( substr($v, 1 ), 'rolid');
}}
$elementM->$p=$v;
}
$elementM->yid=$layoutM->yid;
$elementM->replace(); 
unset($elementM->flid );
}
}
if(!empty($data->picklistA)){
$elementM=WTable::get('layout_dropset','main_library','did,yid');
$elementM->whereE('yid',$layoutM->yid );
$elementM->delete();
foreach($data->picklistA as $column){
if(empty($column->did)){
WMessage::log(  'Picklist did not defined : '  , 'pikclist_layout_debug'  );
WMessage::log(  $column  , 'pikclist_layout_debug'  );
continue;
}
$elementM=WTable::get('layout_dropset','main_library','did,yid');
$elementM->ordering=$column->ordering;
$elementM->yid=$layoutM->yid;
$namekeyDID=WView::picklist($column->did, '', null, 'namekey');
$elementM->did=$this->_getPicklistID($namekeyDID );
if(empty($elementM->did)){
WMessage::log(  'Picklist 1 : '.$column->did  , 'pikclist_layout_debug'  );
WMessage::log(  $namekeyDID  , 'pikclist_layout_debug'  );
WMessage::log(  'Picklist 2 : '.$column->did  , 'pikclist_layout_debug'  );
WMessage::log(  $elementM->did  , 'pikclist_layout_debug'  );
}
$elementM->setReplace(); $elementM->save();
}
}
}
}
private function _populateViewElements($data,$map,$table,$id,$yid,$folder){
if(!empty($data->$map)){
$currentElementA=array();
foreach($data->$map as $column){
$elementM=WTable::get($table, 'main_library',$id );
$elementM->makeLJ($table.'trans','main_library',$id );
$elementM->whereLanguage();
$elementM->select('auto', 1 );
$elementM->whereE('namekey',$column->namekey );
$alreadyExistO=$elementM->load('o',array($id, 'core'));
$elementM=WTable::get($table, 'main_library',$id );
$currentElementA[]=$column->namekey;
$lid=0;
if(!empty($alreadyExistO)){
if(empty($alreadyExistO->core)) continue;
$elementM->$id=$lid=$alreadyExistO->$id;
}$pk=$elementM->getPK();
$ref_yid='';
foreach($column as $p=> $v){
if($pk==$p ) continue;
if( in_array($p, array('name','description','textlink','parentnamekey','parent')) ) continue;
if(!empty($v)){
if('sid'==$p){
$v=$this->_getModelID($v );
}elseif('rolid'==$p){
if(!is_numeric($v))$v=WRole::get( substr($v, 1 ), 'rolid');
}elseif('did'==$p){
if(!is_numeric($v))$v=$this->_getPicklistID($v );
else {
$pickNamekey=WView::picklist($v, '', null, 'namekey');
$v=$this->_getPicklistID($pickNamekey );
}
}elseif('ref_yid'==$p){
$yrefA=explode('#',$v );
$refNakey=array_pop($yrefA );
$refv=$this->_getViewID($refNakey );
if(empty($refv)){
$ref_yid=$refNakey;
$v='';
}else{
$v=$refv;
}}}
$elementM->$p=$v;
}
if(!empty($column->parentnamekey )){
$elementM->parent=$this->_getParentID($table, $id, $column->parentnamekey );
}else{
$elementM->parent=0;
}
$elementM->yid=$yid;
$elementM->returnId();
$elementM->save();
if(!empty($elementM->$id)){
if(!empty($ref_yid)){
self::$_ref_yidA[$elementM->$id]=$ref_yid;
}
$layoutTransM=WTable::get($table.'trans','main_library',$id.',lgid');
if(!empty($layoutTransM)){
$auto=1;
if(!empty($alreadyExistO)){
$auto=$alreadyExistO->auto;
$layoutTransM->$id=$elementM->$id;
}
if($auto <=1){
if(isset($column->name))$layoutTransM->name=WText::t($this->getTranslation($column->name, $folder, $elementM->$id, $table.'trans','name'));
if(isset($column->description))$layoutTransM->description=WText::t($this->getTranslation($column->description, $folder, $elementM->$id, $table.'trans','description'));
if(isset($column->textlink))$layoutTransM->textlink=WText::t($this->getTranslation($column->textlink, $folder, $elementM->$id, $table.'trans','textlink'));
if(!empty($lid)){
$layoutTransM->whereE($id, $elementM->$id );
$layoutTransM->whereE('lgid', 1 );
$layoutTransM->update();
}else{
$layoutTransM->$id=$elementM->$id;
$layoutTransM->lgid=1;
$layoutTransM->insertIgnore();
}
}}}
unset($elementM->$id );
}
$elementM=WTable::get($table, 'main_library',$id );
$elementM->whereE('yid',$yid );
$elementM->whereE('core', 1 );
$elementM->whereNotIn('namekey',$currentElementA );
$elementM->delete();
}
}
public function populateController($data){
if(empty($data)) return false;
$installModelM=WTable::get('eguillage_node','main_library','ctrid');
$installModelM->whereE('namekey',$data->namekey );
$alreadyExistO=$installModelM->load('o',array('ctrid','core'));
if(!empty($alreadyExistO)){
if(empty($alreadyExistO->core)) return false;
$ctrid=$installModelM->ctrid=$alreadyExistO->ctrid;
}
$pk=$installModelM->getPK();
foreach($data as $p=> $v){
if($pk==$p ) continue;
if( in_array($p, array('name','description','id','created','modified','actionsA')) ) continue;
if(!empty($v)){
if('yid'==$p){
$v=$this->_getViewID($data->yid );
}
elseif('rolid'==$p){
if(!is_numeric($data->rolid))$v=WRole::get( substr($data->rolid, 1 ), 'rolid');
}
}
$installModelM->$p=$v;
}
if(empty($ctrid)){
$installModelM->returnId();
$installModelM->insertIgnore();
}else{
$installModelM->returnId();
$installModelM->whereE('ctrid',$ctrid );
$installModelM->update();
}
if(!empty($installModelM->ctrid) && empty($ctrid)){
if( is_numeric($data->wid))$folder=$data->wid;
else $folder=WExtension::get( substr($data->wid, 1 ), 'wid');
$appstransM=WTable::get('eguillage_trans','main_library','ctrid,lgid');
if(!empty($appstransM)){
$appstransM->ctrid=$installModelM->ctrid;
$appstransM->lgid=1;
$appstransM->name=$this->getTranslation($data->name, $folder, $appstransM->ctrid, 'eguillage_trans','name');
$appstransM->description=$this->getTranslation($data->description, $folder, $appstransM->ctrid, 'eguillage_trans','description');
$appstransM->save();
}
}
if(!empty($installModelM->ctrid) && !empty($data->actionsA)){
$actionTriggerM=WModel::get('library.controlleraction');
if(empty($alreadyExistO)){
foreach($data->actionsA as $action){
foreach($action as $p=> $v){
if('ctr_action_id'==$p ) continue;
elseif('actid'==$p)$actionTriggerM->$p=$this->_loadActionId($action['action'] );
else {
$actionTriggerM->$p=$v;
}}
if(empty($actionTriggerM->actid)) continue;
$actionTriggerM->ctrid=$installModelM->ctrid;
$actionTriggerM->insertIgnore();
}
}else{
foreach($data->actionsA as $action){
$actionTriggerM->whereE('namekey',$action['namekey'] );
$trigggerExist=$actionTriggerM->load('lr','ctr_action_id');
foreach($action as $p=> $v){
if('ctr_action_id'==$p ) continue;
elseif('actid'==$p)$actionTriggerM->$p=$this->_loadActionId($action['action'] );
else {
$actionTriggerM->$p=$v;
}}
$actionTriggerM->ctrid=$installModelM->ctrid;
if(empty($actionTriggerM->actid)) continue;
if($trigggerExist){
$actionTriggerM->whereE('ctr_action_id',$trigggerExist );
$actionTriggerM->update();
}else{
$actionTriggerM->insertIgnore();
}
}
}
}
}
private function _loadActionId($namekey){
static $actionA=array();
if(!isset($actionA[$namekey] )){
if(!empty($namekey )){
$libraryActionM=WModel::get('library.action');
$libraryActionM->rememberQuery(true);
$libraryActionM->whereE('namekey',$namekey );
$actionA[$namekey]=$libraryActionM->load('lr','actid');
}else{
$actionA[$namekey]=0;
}
}
return $actionA[$namekey];
}
public function populateMailing($data){
if(empty($data)) return false;
$installModelM=WTable::get('mailing_node','main_userdata','mgid');
$installModelM->whereE('namekey',$data->namekey );
$alreadyExistO=$installModelM->load('o',array('mgid','core'));
if(!empty($alreadyExistO)){
if(empty($alreadyExistO->core)) return false;
$installModelM->mgid=$mgid=$alreadyExistO->mgid;
}
if(empty($mgid)){
$pk=$installModelM->getPK();
foreach($data as $p=> $v){
if($pk==$p ) continue;
if( in_array($p, array('name','ctext','chtml','intro','smsmessage','title','subtitle')) ) continue;
if(!empty($v)){
if('wid'==$p){
}elseif('rolid'==$p){
if(!is_numeric($v))$v=WRole::get( substr($v, 1 ), 'rolid');
}
}
$installModelM->$p=$v;
}
if(!empty($mgid))$installModelM->mgid=$mgid;
$installModelM->returnId();
$installModelM->save();
}
if(!empty($installModelM->mgid)){
if( is_numeric($data->wid))$folder=$data->wid;
else $folder=WExtension::get( substr($data->wid, 1 ), 'wid');
$appstransM=WTable::get('mailing_trans','main_userdata','mgid,lgid');
if(!empty($appstransM)){
$auto=1;
if(!empty($alreadyExistO)){
$appstransM->whereE('mgid',$installModelM->mgid );
$appstransM->whereE('lgid', 1 );
$auto=$appstransM->load('lr','auto');
}
if($auto <=1){
$appstransM->mgid=$installModelM->mgid;
$appstransM->lgid=1;
$appstransM->name=WText::t($this->getTranslation($data->name, $folder, $appstransM->mgid, 'mailing_trans','name'));
$appstransM->ctext=WText::t($this->getTranslation($data->ctext, $folder, $appstransM->mgid, 'mailing_trans','ctext'));
$appstransM->chtml=WText::t($this->getTranslation($data->chtml, $folder, $appstransM->mgid, 'mailing_trans','chtml'));
$appstransM->intro=WText::t($this->getTranslation($data->intro, $folder, $appstransM->mgid, 'mailing_trans','intro'));
$appstransM->smsmessage=WText::t($this->getTranslation($data->smsmessage, $folder, $appstransM->mgid, 'mailing_trans','smsmessage'));
$appstransM->title=WText::t($this->getTranslation($data->title, $folder, $appstransM->mgid, 'mailing_trans','title'));
$appstransM->subtitle=WText::t($this->getTranslation($data->subtitle, $folder, $appstransM->mgid, 'mailing_trans','subtitle'));
$appstransM->save();
}}
}
}
public function populateExtension($data,$update=false,$onlyExtension=true){
if(empty($data)) return false;
$installModelM=WTable::get('extension_node','main_library','wid');
if( 1==$data->type){
$installModelM->whereE('namekey',$data->namekey );
$wid=$installModelM->load('lr','wid');
}else{
$wid=0;
}
$pk=$installModelM->getPK();
foreach($data as $p=> $v){
if(!$update && $pk==$p ) continue;
if( in_array($p, array('description','descriptionTxt','userversion','userlversion','author','level','application')) ) continue;
$installModelM->$p=$v;
}
$installModelM->setIgnore();
$installModelM->returnId();
$installModelM->save();
if(!empty($data->description) && !empty($installModelM->wid)){
$appstransM=WTable::get('extension_trans','main_library','wid,lgid');
if(!empty($appstransM)){
$appstransM->wid=$installModelM->wid;
$appstransM->lgid=1;
if(!empty($data->descriptionTxt)){
$appstransM->description=$data->descriptionTxt;
}else{
$appstransM->description='';
}$appstransM->save();
}}
if( 1==$data->type && !empty($data->userversion) && !empty($installModelM->wid)){
$installAppsinfoM=WTable::get('extension_info','main_library','wid');
$installAppsinfoM->setVal('userversion',$data->userversion );
$installAppsinfoM->setVal('userlversion',$data->userlversion );
$installAppsinfoM->setVal('author',$data->author );
if(!empty($wid)){
$installAppsinfoM->whereE('wid',$installModelM->wid );
$installAppsinfoM->update();
}else{
$installAppsinfoM->setVal('wid',$installModelM->wid );
$installAppsinfoM->insertIgnore();
}
}
if($onlyExtension ) return true;
$vocabA=WGet::loadData($data->folder.'.vocab','translation','', false, false);
$refA=WGet::loadData($data->folder.'.reference','translation','', false, false);
if(!empty($installModelM->wid) && !empty($refA)){
static $translationM=null;
static $transREfT=null;
WExtension::get($data->namekey );
$transREfT=WTable::get('translation_reference','main_translation','wid,imac');
$refDataA=array();
$transDataA=array();
foreach($refA->referenceA as $imac=> $load){
$refDataA[]=array($installModelM->wid, $imac, $load );
$text=WText::t($imac );
}
$transREfT->setIgnore(true);
$transREfT->insertMany( array('wid','imac','load') , $refDataA );
}
if(!empty($installModelM->wid) && !empty($data->actionsA)){
$libraryActionM=WModel::get('library.action');
foreach($data->actionsA as $action){
$libraryActionM->whereE('namekey',$action['namekey'] );
$trigggerExist=$libraryActionM->load('lr','actid');
foreach($action as $p=> $v){
if('actid'==$p ) continue;
else {
$libraryActionM->$p=$v;
}}
$libraryActionM->wid=$installModelM->wid;
if($trigggerExist){
$libraryActionM->whereE('namekey',$action['namekey'] );
$libraryActionM->update();
}else{
$libraryActionM->insertIgnore();
}
}
}
if(!empty($installModelM->wid) && !empty($data->dependancyA)){
$appsA=WModel::get('apps');
foreach($data->dependancyA as $depend){
$appsA->whereE('namekey',$depend['namekey'] );
$refWID=$appsA->load('lr','wid');
if($refWID){
$appsA->whereE('wid',$refWID );
$appsA->setVal('version',$depend['version'] );
$appsA->update();
}else{
$appsA->setVal('namekey',$depend['namekey'] );
$appsA->setVal('version',$depend['version'] );
$appsA->setVal('type',$depend['type'] );
$appsA->setVal('publish', 1 );
$appsA->setVal('core', 1 );
$appsA->insertIgnore();
}
}
}
if(!empty($vocabA)){
$i=0;
if(!isset($translationM))$translationM=WTable::get('translation_en','main_translation','imac');
foreach($vocabA->translationA as $imac=> $text){
$i++;
$transDataA[]=array($imac, $text, 1 );
if($i > 200){
$translationM->setIgnore(true);
$translationM->insertMany( array('imac','text','auto') , $transDataA );
$i=0;
$transDataA=array();
}
}
if(!empty($transDataA )){
$translationM->setIgnore(true);
$translationM->insertMany( array('imac','text','auto') , $transDataA );
}
}
}
private function _getViewID($hardYID){
static $yidA=array();
static $layoutM=null;
if( is_numeric($hardYID))$namekey=WView::get($hardYID, 'namekey');
else $namekey=$hardYID;
if(isset($yidA[$namekey])) return $yidA[$namekey];
if(!isset($layoutM))$layoutM=WTable::get('layout_node','main_library','yid');
$layoutM->whereE('namekey',$namekey );
$yid=$layoutM->load('lr','yid');
if(empty($yid)){
WMessage::log('This happens because of controller calling this view '.$namekey , 'controller-_getViewID_error');
return 0;
}
$yidA[$namekey]=$yid;
return $yidA[$namekey];
}
private function _getPicklistID($namekey){
static $yidA=array();
static $layoutM=null;
if(isset($yidA[$namekey])) return $yidA[$namekey];
if(!isset($layoutM))$layoutM=WTable::get('dropset_node','main_library','did');
$layoutM->whereE('namekey',$namekey );
$yid=$layoutM->load('lr','did');
if(empty($yid)) return 0;
$yidA[$namekey]=$yid;
return $yidA[$namekey];
}
private function _getExtID($hardWID){
static $widA=array();
static $layoutM=null;
if(empty($hardWID)) return 0;
if( is_numeric($hardWID))$namekey=WExtension::get($hardWID, 'namekey');
else $namekey=$hardWID;
if(empty($namekey)) return 0;
if(isset($widA[$namekey])) return $widA[$namekey];
if(!isset($layoutM))$layoutM=WTable::get('extension_node','main_library','wid');
$layoutM->whereE('namekey',$namekey );
$wid=$layoutM->load('lr','wid');
if(empty($wid)){
WMessage::log(' extension does not exist empty extension_node : '.$namekey , 'processData__getExtID_error');
WMessage::log( debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ) , 'processData__getExtID_error');
return 0;
}
$widA[$namekey]=$wid;
return $widA[$namekey];
}
private function _getModelID($hardSID){
static $sidA=array();
static $layoutM=null;
$namekey=WModel::get($hardSID, 'namekey');
if(isset($sidA[$namekey])) return $sidA[$namekey];
if(!isset($layoutM))$layoutM=WTable::get('model_node','main_library','sid');
$layoutM->whereE('namekey',$namekey );
$sid=$layoutM->load('lr','sid');
if(empty($sid)) return 0;
$sidA[$namekey]=$sid;
return $sidA[$namekey];
}
private function _getTableIDfromDB($table){
static $dbtidA=array();
static $tableT=null;
if(isset($dbtidA[$table])) return $dbtidA[$table];
$datasetTablesM=WTable::get('dataset_tables','main_library','dbtid');
$datasetTablesM->whereE('name',$table );
$dbtid=$datasetTablesM->load('lr','dbtid');
if(empty($dbtid)){
WMessage::log(  '_getTableIDfromDB 2 '  , 'Library_Readdata_class');
WMessage::log(  $table  , 'Library_Readdata_class');
WMessage::log(  $dbtid  , 'Library_Readdata_class');
return 0;
}
$dbtidA[$table]=$dbtid;
return $dbtidA[$table];
}
private function _getParentID($table,$pk,$namekey){
static $prtIDA=array();
static $tableTA=null;
$key=$pk.'|'.$namekey;
if(isset($prtIDA[$key])) return $prtIDA[$key];
if(!isset($tableTA[$table]))$tableTA[$table]=WTable::get($table, 'main_library',$pk );
$tableTA[$table]->whereE('namekey', substr($namekey, 1 ));
$id=$tableTA[$table]->load('lr',$pk );
$prtIDA[$key]=$id;
return $prtIDA[$key];
}
private function _getTableName($table){
$refA=explode('#',$table );
return array_pop($refA );
}
private function _getTableColumnID($table,$column){
static $dbtidA=array();
static $tableT=null;
$key=$table.'|'.$column;
if(isset($dbtidA[$key])) return $dbtidA[$key];
$datasetTablesM=WTable::get('dataset_columns','main_library','dbcid');
$datasetTablesM->makeLJ('dataset_tables','main_library','dbtid','dbtid');
$datasetTablesM->whereE('name',$table, 1 );
$datasetTablesM->whereE('name',$column );
$dbcid=$datasetTablesM->load('lr','dbcid');
if(empty($dbcid)){
WMessage::log(' missing model : '.$table.' column : '.$column , 'translation_imac_dbcid');
WMessage::log($datasetTablesM , 'translation_imac_dbcid');
WMessage::log( debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ) , 'translation_imac_dbcid');
$dbtidA[$key]=0;
return 0;
}
$dbtidA[$key]=$dbcid;
return $dbtidA[$key];
}
}