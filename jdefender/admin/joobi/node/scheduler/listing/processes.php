<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement('listing.textlink');
class Scheduler_CoreProcesses_listing extends WListing_textlink {
function create(){
$hidMaxprocess='maxprocess_'.$this->modelID;
$maxprocess=$this->data->$hidMaxprocess;
$this->element->textlink=WText::t('1409690286KTLK');
if($this->value==0){
$this->value='<span class="badge">'.$this->value.'/'.$maxprocess.'</span>';
$this->element->textlink=WText::t('1206961898PIOC');
}elseif($this->value > $maxprocess){
$this->element->color='danger';
$this->value='<span class="badge">'.$this->value.'/'.$maxprocess.' </span>';
}elseif($maxprocess==$this->value){
$this->element->color='warning';
$this->value='<span class="badge">'.$this->value.'/'.$maxprocess.'</span>';
}else{
$this->value='<span class="badge">'.$this->value.'/'.$maxprocess.' </span>';
}
return parent::create();
}}