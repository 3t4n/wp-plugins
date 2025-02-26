<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Images_Rotate_class extends WClasses{
private $_type='';
public function fromImageID($filid,$direction='right',$thumbnails=false){
$filesHelperC=WClass::get('files.helper');
$myFileInfoO=$filesHelperC->getInfo($filid );
if(empty($myFileInfoO)) return false;
$this->_type=$myFileInfoO->type;
$path=$filesHelperC->getPath($filid, true, false);
$status=$this->_processRotation( JOOBI_DS_ROOT.'/'.$path, $direction );
if(!$status ) return false;
$path=$filesHelperC->getPath($filid, true, true);
$status=$this->_processRotation( JOOBI_DS_ROOT.'/'.$path, $direction );
if(!$status ) return false;
$fileM=WModel::get('files','object');
$fileM->whereE('filid',$filid );
$fileM->setVal('modified', time());
$fileM->update();
return true;
}
private function _processRotation($path,$direction='right'){
$type=strtolower($this->_type);
switch ($type){
case 'gif':
$img_src=@imagecreatefromgif($path );
break;
case 'jpg':
case 'jpeg':
$img_src=@imagecreatefromjpeg($path );
break;
case 'png':
$img_src=@imagecreatefrompng($path );
break;
default:
WMessage::log('Image type not defined: '.$type , 'ERROR-image-rotate');
return false;
break;
}
if(!is_resource($img_src)){
$this->codeE('The image is not a ressource!?..');
WMessage::log('HACK : The image '.$img_src.' is not a ressource!?..','image-rotate-HACK');
return false;
}
$degrees=0;
if('left'==$direction){
$degrees=90;
}elseif('right'==$direction){
$degrees=-90;
}elseif( is_numeric($direction)){
$degrees=$direction;
}else{
return false;
}
if(empty($degrees)){
WMessage::log('Rotation angle not defined '.$degrees , 'ERROR-image-rotate');
return false;
}
$rotate=imagerotate($img_src, $degrees, 0 );
$dest=$path;
switch ($type){
case 'gif':
return (( imagegif($rotate, $dest )==true)?true: false);
break;
case 'jpg':
case 'jpeg':
return (( imagejpeg($rotate, $dest )==true)?true: false);break;
case 'png':
return (( imagepng($rotate, $dest, 9 )==true)?true: false);
break;
default:
WMessage::log('Image type not defined #2: '.$type , 'ERROR-image-rotate');
return false;
break;
}
}
}