<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Library_Config_class {
public function updateConfigFile($config,$data){
$path=JOOBI_DS_CONFIG.'config.php';
$content="<?php
defined('JOOBI_SECURE') or die('J....');
class WConfig{";
foreach($config as $p=> $v){
if(!isset($data[$p]) || $v==$data[$p]){
$content .='
var $'.$p.'='.(is_array($v)?$this->_isArray($v ) : ( is_bool($v)?($v?'true' : 'false') : "'" . $v . "'" )). ';';
}else{
$val=( is_bool($data[$p])?($data[$p]?'true' : 'false') : "'" . $data[$p] . "'" );
$content .='
var $'.$p.'='.$val.';';
}
}
$content .='
}';
$ct=substr_count($content, "'" );
if(!($ct % 2 )){
$fileS=WGet::file();
$fileS->write($path, $content, 'overwrite');}
return $data;
}
private function _isArray($a){
$content='array(
';
$first='';
foreach($a as $p=> $v){
$content .=$first . "'" . $p . "'=>'" . $v . "'";
$first='
,';
}$content .=')';
return $content;
}
}