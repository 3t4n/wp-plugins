<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Apps_Roles_picklist extends WPicklist {
function create(){
static $myPicklist=array();
$sql=WModel::get($this->sid ); 
if(empty($sql)){
WMessage::log();
return false;
}
$transNameModel=$sql->getModelNamekey(). 'trans';
$parent=array();
$parent['pkey']=$sql->getPK();
$parent['parent']='parent';
$parent['name']='name';
if(!isset($myPicklist[$transNameModel])){
$exist=WModel::modelExist($transNameModel );
if($exist){
$sql->makeLJ($transNameModel, $sql->getPK());
$sql->whereLanguage( 1 );
$sql->select($parent['name'], 1);
}else{
$sql->select($parent['name']);
}
$sql->select($parent['parent']);
$sql->orderBy($parent['parent'] );
$sql->select($sql->getPK());  
$sql->whereE('type','1'); 
$sql->setLimit( 500 );
$myitems=$sql->load('ol');
$childOrderParent=array();
$list=WOrderingTools::getOrderedList($parent, $myitems, 1, true, $childOrderParent );
$myPicklist[$transNameModel]=$list;
}
$kpey=$parent['pkey'];
$nm=$parent['name'];
if(!empty($myPicklist[$transNameModel])){
foreach($myPicklist[$transNameModel] as $itemList){
$this->addElement($itemList->$kpey, $itemList->$nm );
}}
}}