<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
WLoadFile('netcom.class.client');
class Netcom_Netcom_class extends Netcom_Client_class {
var $APIVersion='1.0';
var $APIUserID=0;
var $servicesCredentials=array(
'ping'=> true
);
function ping($data){
WMessage::log($data, 'netcom-ping-data');
if(empty($data)) return true;
return $data;
}
function dictionaryTransFile($data=null){
if(!is_object($data )){
$reply=null;
$reply->error='File data must be in object form.';
return $reply;
}
$filePath=JOOBI_DS_USER.'temp/dictionarytrans/'.$data->filename;
$filehandler=WGet::file();
$filehandler->write($filePath, base64_decode($data->content ), 'force');
return JOOBI_FOLDER.'/user/temp/dictionarytrans/'.$data->filename;
}
}
