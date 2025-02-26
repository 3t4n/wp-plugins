<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Netcom_Client_class extends WClasses {
var $APIVersion='1.0';
var $APIUserID=0;
var $servicesCredentials=array(
);
public function getServicesCredentials(){
return $this->servicesCredentials;
}
public function setAPIUserID($UserID){
$this->APIUserID=$UserID;
}
public function setVersion($version){
$this->APIVersion=$version;
}
public function createResponseMessage($status,$message){
$errorMessage=new NetcomResponse;
if($status){
$errorMessage->status='SUCCESS';
}else{
$errorMessage->status='FAILED';
}
if(!empty($message)){
$errorMessage->message=$message;
}
return $errorMessage;
}
}
class NetcomResponse {
var $status='';
var $message='';
}