<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Library_File_class extends WClasses {
var $system='hdd';
var $instance=null;
 private $message=true;
 private static $hddFileC=array();
 private $fileInfoO=null;
 function __construct($storageType='hdd'){
 if(empty($storageType))$storageType='hdd';
  if('local'==$storageType){
 $storageType='hdd';
 } 
  if( is_numeric($storageType)){
$storageID=$storageType;
$mainCredentialsC=WClass::get('main.credentials');
$storageType=$mainCredentialsC->loadFromID($storageType, 'typeNamekey');
 }elseif(!in_array($storageType, array('hdd','ftp'))){
 $mainCredentialsC=WClass::get('main.credentials');
 $storageID=$mainCredentialsC->loadFromID($storageType, 'crdid');
 $storageType=$mainCredentialsC->loadFromID($storageType, 'typeNamekey');
 }else{
 $storageID=0;
 }
 $this->system=$storageType;
if(!isset(self::$hddFileC[$this->system])){
if( in_array($this->system, array('hdd','ftp'))){
self::$hddFileC[$this->system]=WClass::get('library.'.$this->system, null, 'class', false);
}else{
self::$hddFileC[$this->system]=WClass::get('main.'.$this->system, null, 'class', false);
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
if(empty(self::$hddFileC[$this->system])){
return $this->_notStorageSystem();
}if(!empty($storageID)) self::$hddFileC[$this->system]->setStorageID($storageID );
}
}
$this->instance=self::$hddFileC[$this->system];
 }
 public function setFileInformation($fileInfoO){
 $this->fileInfoO=$fileInfoO;
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
 if(!empty($fileInfoO->filid) && empty($fileInfoO->fileID))$fileInfoO->fileID=$fileInfoO->filid;
 }
 public function makePath($folder,$path=''){
 if(!empty(self::$hddFileC[$this->system])) return self::$hddFileC[$this->system]->makePath($folder, $path );
 }
 public function displayMessage($bool=true){
 $this->message=$bool;
 if(!empty(self::$hddFileC[$this->system]) && method_exists( self::$hddFileC[$this->system], 'displayMessage')){
 self::$hddFileC[$this->system]->displayMessage($bool );
 } }
function makeSafe($path){
return preg_replace(array('#[^A-Z0-9\.\_\- ]#i','#(\.){2,}#','#^\.#'), '',$path);
}
public function fileURL($thumbnail=false){
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
if(!empty($this->fileInfoO)) self::$hddFileC[$this->system]->setFileInformation($this->fileInfoO );
return self::$hddFileC[$this->system]->fileURL($thumbnail );
}
public function download(){
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
if(!empty($this->fileInfoO)) self::$hddFileC[$this->system]->setFileInformation($this->fileInfoO );
return self::$hddFileC[$this->system]->download();
}
public function checkExist(){
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
return self::$hddFileC[$this->system]->checkExist();
}
public function exist($file=''){
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
if(!empty($this->fileInfoO)) self::$hddFileC[$this->system]->setFileInformation($this->fileInfoO );
return self::$hddFileC[$this->system]->exist($file, true);
}
public function retreive($path){
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
if(!empty($this->fileInfoO)) self::$hddFileC[$this->system]->setFileInformation($this->fileInfoO );
return self::$hddFileC[$this->system]->retreive($path );
}
public function write($PATH='',$content='',$type='write',$chmod='0644',$safe=true,$use_same_rights=false){
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
$folder=WGet::folder($this->system );
$fold=dirname($PATH );
if(!$folder->exist($fold )){
if($use_same_rights){
if(!$folder->create($fold, '',$safe, $chmod )) return false;
}else{
if(!$folder->create($fold, '',$safe )) return false;
}}
switch($type){
case 'write':
$w=true;
case 'append':
if(!$this->exist($PATH )){
$result=self::$hddFileC[$this->system]->write($PATH, $content,false,$chmod);
}elseif(!isset($w)){
$result=self::$hddFileC[$this->system]->write($PATH, $content, true,$chmod);
} else return true;
return $result;
case 'overwrite':
case 'force':
if($this->exist($PATH )){
if(!$this->delete($PATH )){
if($this->message){
$mess=WMessage::get();
$mess->userE('1212843291IDWJ',array('$PATH'=>$PATH));
$mess->userE('1212843291IDWH');
}return false;
}}
$result=self::$hddFileC[$this->system]->write($PATH, $content,false,$chmod);
if($result===false && $this->message){
$mess=WMessage::get();
$mess->userE('1212843291IDWG',array('$PATH'=>$PATH));
$mess->userE('1212843291IDWH');
}return $result;
default:
if($this->message){
$mess=WMessage::get();
$mess->userN('1212843291IDWK',array('$PATH'=>$PATH));
}return false;
}
if($this->message){
$mess=WMessage::get();
$mess->userN('1212843291IDWL',array('$PATH'=>$PATH));
}
return false;
}
public function read($PATH='',$split=false){
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
if( method_exists( self::$hddFileC[$this->system], ''))
$result=self::$hddFileC[$this->system]->write($PATH, $content,false,$chmod);
if( self::$hddFileC[$this->system]->checkExist()){
if($this->exist($PATH)){
if(!is_readable($PATH) && $this->message){
$mess=WMessage::get();
$mess->userN('1212843291IDWM',array('$PATH'=>$PATH));
return false;
}
}else{
if($this->message){
$mess=WMessage::get();
$mess->userN('1212843291IDWN',array('$PATH'=>$PATH));
WMessage::log(  'Could not access the file '.$PATH , 'file_not_found');
WMessage::log(  debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ) , 'file_not_found');
}
}
}
$buffer=self::$hddFileC[$this->system]->read($PATH );
if($split){
$buffer=preg_split("#\r?\n|\r#", $buffer);
}
return $buffer;
}
public function delete($PATH=''){
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
if(empty($PATH)) return true;
if(is_array($PATH)){
foreach($PATH as $p){
if(!$this->delete($p)) return false;
}return true;
}
if(!self::$hddFileC[$this->system]->checkExist() || self::$hddFileC[$this->system]->exist($PATH, true)){
if(!empty($this->fileInfoO)) self::$hddFileC[$this->system]->setFileInformation($this->fileInfoO );
return self::$hddFileC[$this->system]->delete($PATH, true);
}
if($this->message){
$mess=WMessage::get();
$mess->userN('1212843292GOIT',array('$PATH'=>$PATH));
}
return false;
}
public function upload($src,$dst,$force=false){
$result=$this->_transfer($src, $dst, '',$force, 'upload');
return $result;
}
public function move($src,$dst,$force=false,$displayErrMsg=true){
return $this->_transfer($src, $dst, null, $force, 'move',$displayErrMsg );
}
public function copy($src,$dst,$force=false,$displayErrMsg=true){
return $this->_transfer($src, $dst, null, $force, 'copy',$displayErrMsg);
}
public function size($file,$force=false){
static $size_array=array();
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
if(!isset($size_array[$file])){
if(!$this->exist($file )){
$size_array[$file]=false;
return false;
}
$filesize=self::$hddFileC[$this->system]->fileSize($file );
if($filesize===false){
$size_array[$file]=false;
return false;
}
$size_array[$file]=$filesize;
}
if($size_array[$file]===false) return false;
return $size_array[$file];
}
public function extract($file,&$dst,$useCMS=false){
if(!$this->exist($file )){
$message=WMessage::get();
$message->userE('1341073531FNMN');
$message->adminE($file );
return false;
}
$folder=WGet::folder($this->system );
if(empty($dst)){
$dst=$folder->tempFolder('create', true, false);
if($dst===false){
$message=WMessage::get();
$message->userE('1339467364DNKT');
return false;
}}else{
if(!$folder->exist($dst)){
$folder->create($dst, null, false);
}else{
$folder->emptyFolder($dst );
}}
if($useCMS){
$result=WApplication::extract($file, $dst );
if(!empty($result)){
$folder->changeAccess($dst, '0755', true, true, '0644');
return true;
}}
$comp=null;
$ext=strtolower( substr($file, (strrpos($file, '.')) +1 ));
switch($ext){
case 'gz':
case 'tgz':
$comp='gz';
break;
case 'zip':
if(!class_exists('ZipArchive')) return false;
$zip=new ZipArchive;
$res=$zip->open($file );
if($res===true){
$zip->extractTo($dst );
$zip->close();
return true;
}else{
return false;
}break;
case 'bz2':
case 'bz':
$comp='bz2';
break;
default:
break;
}
$old_mask=@umask(0);
if( PHP_VERSION > '5.3' && class_exists('PharData')){
if('.gz'==substr($file, -3 )){
$fileTar=substr($file, 0, -3 );
if( file_exists($fileTar)){
@unlink($fileTar );
}
}else{
$fileTar=$file;
}
$p=new PharData($file );
$p->decompress();
$file=$fileTar;
$time=time();
if( file_exists($dst)){
@rename($dst, $dst.'_'.$time );
}
$phar=new PharData($file );
if(!$phar->extractTo($dst )){
if($this->message){
$FILE=str_replace( JOOBI_DS_JOOBI, '',$file );
$FOLDER=str_replace( JOOBI_DS_JOOBI, '',$dst );
$this->userE('1213107677BWTJ',array('$FILE'=>$FILE,'$FOLDER'=>$FOLDER));
}@umask($old_mask);
return false;
}
if( @file_exists($file )){
@unlink($file );
}
if( @file_exists($dst.'_'.$time)){
@rmdir($dst.'_'.$time );
}
}else{
WExtension::includes('lib.archivetar');
if(!class_exists('Archive_Tar')){
$this->adminE('Could not find class Archive_Tar.');
return false;
}
$arch=new Archive_Tar($file, $comp );
if(!$arch->extract($dst)){
if($this->message){
$FILE=str_replace( JOOBI_DS_JOOBI, '',$file );
$FOLDER=str_replace( JOOBI_DS_JOOBI, '',$dst );
$this->userE('1213107677BWTJ',array('$FILE'=>$FILE,'$FOLDER'=>$FOLDER));
}@umask($old_mask);
return false;
}
}
$folder->changeAccess($dst, '0755', true, true, '0644');
return true;
}
 public function compress($file,$compression='gz',$force=''){
 return self::$hddFileC[$this->system]->compress($file, $compression, $force );
}
public function changeAccess($file,$chmod){
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
return self::$hddFileC[$this->system]->changeAccess($file,$chmod);
}
private function _transfer($src,$dst,$base=null,$force=false,$function='copy',$displayErrMsg=true){
if(empty(self::$hddFileC[$this->system])) return $this->_notStorageSystem();
if(!empty($base)){
if(!is_string($base)){
if($this->message){
$mess=WMessage::get();
$mess->codeE('You called the copy/move function with a base path (the third parameter) which is not a string. Please correct your code.');
}
return false;
}
$base=rtrim($base, '/');
}
$dst=($base !=''?$base.'/' : ''). $dst;
if(is_array($src)){
$folder=WGet::folder($this->system );
if(!$folder->exist($dst )){
if(!$folder->create($dst, '', true))
return false;
}
$status=true;
foreach($src as $file){
if($this->_transfer($file, $dst, '',$force, $function)===false)
$status=false;
}
}else{
$src=(!empty($base)?$base.'/' : ''). $src;
$localFileC=WGet::file();
if(!$localFileC->exist($src )){
if($this->message){
$mess=WMessage::get();
$FILE=str_replace( JOOBI_DS_JOOBI, '',$src );
if($function=='copy'){
$mess->userW('1213020906DLVD',array('$FILE'=>$FILE));
}else{
$mess->userW('1213020906DLVE',array('$FILE'=>$FILE));
}}
return false;
}
if($this->exist($dst )){
if($force){
if(!$this->delete($dst)){
if($this->message && $displayErrMsg){
$mess=WMessage::get();
$FILE=str_replace( JOOBI_DS_JOOBI, '',$dst );
$mess->userN('1213020906DLVF',array('$FILE'=>$FILE));
}return false;
}
}else{
if($this->message && $displayErrMsg){
$mess=WMessage::get();
$FILE=str_replace( JOOBI_DS_JOOBI, '',$dst );
$mess->userN('1213020906DLVG',array('$FILE'=>$FILE));
}
return false;
}}
$folder=WGet::folder($this->system );
$parent=dirname($dst );
if(!empty($parent) && !$folder->exist($parent )){
if($folder->create($parent,'',true)===false){
if($this->message){
$mess=WMessage::get();
$FOLDER=$parent;
$mess->userW('1213020906DLVH',array('$FOLDER'=>$FOLDER));
}return false;
}}
if(!empty($this->fileInfoO)) self::$hddFileC[$this->system]->setFileInformation($this->fileInfoO );
$status=self::$hddFileC[$this->system]->$function($src, $dst, true);
}
return $status;
}
 private function _notStorageSystem(){
 $message=WMessage::get();
$NAME=$this->system;
if(empty($NAME )){
return false;
$NAME='"not define"';
}$message->adminE('The storage '.$NAME.' was not found!');
WMessage::log('no storage','no-storage-defined');
WMessage::log( debugB(), 'no-storage-defined');
return false;
 }
 }