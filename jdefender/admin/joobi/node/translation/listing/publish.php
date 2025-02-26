<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement('listing.textlink');
class Translation_CorePublish_listing extends WListing_textlink {
function create(){
$availsite=$this->getValue('availsite');
$availadmin=$this->getValue('availadmin');
if(empty($availsite) && empty($availsite)){
$this->element->usebtn=false;
$this->element->lien='#';
$this->element->textlink=WText::t('1402625931RQFO');
}else{
if(isset($this->value) && $this->value>0){
$this->element->textlink=WText::t('1206961996STAF');
$this->element->lien='#';
$this->element->usebtn=true;
$this->element->color='success';
}else{
$this->element->textlink=WText::t('1349115733NNHN');
$this->element->usebtn=true;
$this->element->lien='controller=translation&task=install(lgid=lgid)';
$this->element->color='info';
}
}
return parent::create();
}
}