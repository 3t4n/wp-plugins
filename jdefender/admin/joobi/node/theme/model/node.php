<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Theme_Node_model extends WModel {
function addValidate(){
if(empty($this->namekey)){
if(!empty($this->folder) && !empty($this->type)){
$types=WType::get('theme.typefolder');
$folder=$types->getName($this->type );
$this->namekey=$folder.'.'.WGlobals::filter($this->folder, 'path');
}else{
$this->genNamekey();
}
}
return true;
}
function addExtra(){
if( 106==$this->type){
$fileS=WGet::file();
$themPath=JOOBI_DS_THEME.'mail/'.$this->folder.'/index.html';
if(!$fileS->exist($themPath )){
$code=$fileS->read( JOOBI_DS_NODE.'mailing/install/mails/templatebody/index2.html');
$fileS->write($themPath, $code, 'overwrite');
$code=$fileS->read( JOOBI_DS_NODE.'mailing/install/mails/templatebody/body.html');
$fileS->write( JOOBI_DS_THEME.'mail/'.$this->folder.'/body.html',$code, 'overwrite');
}
}
return true;
}
function editExtra(){
if( 106==$this->type){
$code=WController::getFormValue('code','x', null, 'htmlentity');
if(!empty($code)){
$fileS=WGet::file();
$fileS->write( JOOBI_DS_THEME.'mail/'.$this->folder.'/index.html',$code, 'overwrite');
}
}
return true;
}
function extra(){
$cache=WCache::get();
$cache->resetCache();
return true;
}
function copyValidate(){
$trk=WGlobals::get( JOOBI_VAR_DATA );
$folder=$trk['x']['foldername'];
$folder=strtolower($folder );
$folder=str_replace(' ','_',$folder );
$themeC=WClass::get('theme.helper');
$themeC->unPremium($this->tmid );
$this->core=0;
$this->premium=0;
$this->created=time();
$this->alias='Clone of: '.$this->alias.'  : '.$folder;
$this->setChild('themetrans','name',$this->alias );
$this->folder=$folder;
$this->premium=1;
if($this->type==101){
$explodeA=explode('.',$this->namekey );
$this->namekey=$folder.'.'.$explodeA[1];
$this->_originalSkin=$explodeA[0];
}
return true;
}
function copyExtra(){
$tmid=WGlobals::getEID();
$themeC=WClass::get('theme.helper');
if($this->type==101){
$explodeNamekeyA=explode('.',$this->namekey );
$systemFolderC=WGet::file();
$sourceLocation=JOOBI_DS_THEME.'skin/'.$this->_originalSkin.'/css/'.$explodeNamekeyA[1].'.css';
$path='skin/'.$explodeNamekeyA[0].'/css/'.$explodeNamekeyA[1].'.css';
if($systemFolderC->exist($sourceLocation))$systemFolderC->copy($sourceLocation, JOOBI_DS_THEME . $path, true);
$sourceLocation=JOOBI_DS_THEME.'skin/'.$this->_originalSkin.'/css/'.$explodeNamekeyA[1].'.min.css';
$path='skin/'.$explodeNamekeyA[0].'/css/'.$explodeNamekeyA[1].'.min.css';
if($systemFolderC->exist($sourceLocation))$systemFolderC->copy($sourceLocation, JOOBI_DS_THEME . $path, true);
}else{
$destfolder=$themeC->destfolder($this->type );
$srcfolder=$themeC->getCol($tmid, 'folder') ;
$path=$destfolder. '/'.$this->folder;
$fileC=WClass::get('apps.files');
$fileC->createFolder('theme',$path, 'user');
$sourceLocation=JOOBI_DS_THEME . $destfolder.'/'.$srcfolder;
$systemFolderC=WGet::folder();
$systemFolderC->copy($sourceLocation, JOOBI_DS_THEME . $path, true);
}
$cache=WCache::get();
$cache->resetCache('Theme');
return true;
}
function deleteValidate($eid=0){
$this->_x=$this->load($eid );
return true;
}
function deleteExtra($eid=0){
$systemFolderC=WGet::folder();
$themeC=WClass::get('theme.helper');
if(!empty($this->_x->type) && $this->_x->type !=201){
$destfolder=$themeC->destfolder($this->_x->type );
$path=$destfolder. '/'.$this->_x->folder;
if(!empty($path)){
$systemFolderC->delete( JOOBI_DS_JOOBI.'user/theme/'.$path );
}
if(!empty($this->_x->type) && !empty($this->_x->premium)){
$themeM=WModel::get('theme');
$themeM->whereE('type',$this->_x->type );
$themeM->whereE('wid',$this->_x->wid );
$themeM->whereE('core', 1 );
$themeM->setVal('premium', 1 );
$themeM->update();
}
}
$cache=WCache::get();
$cache->resetCache('Theme');
return true;
}
}